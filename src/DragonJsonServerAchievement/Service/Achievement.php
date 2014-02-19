<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2014 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Service;

/**
 * Serviceklasse zur Verwaltung von Herausforderungen
 */
class Achievement
{
	use \DragonJsonServer\ServiceManagerTrait;
	use \DragonJsonServer\EventManagerTrait;
	
	/**
	 * Gibt die Gamedesign Konfigurationen für die Herausforderung zurück
	 * @param \DragonJsonServerAchievement\Entity\AchievementInterface $achievement
	 * @return array 
	 */
	public function getGamedesignConfig(\DragonJsonServerAchievement\Entity\AchievementInterface $achievement)
	{
		$gamedesignConfigs = $this->getServiceManager()->get('Config')['dragonjsonserverachievement']['achievements'];
		$gamedesign_identifier = $achievement->getGamedesignIdentifier();
		if (!isset($gamedesignConfigs[$gamedesign_identifier])) {
    		throw new \DragonJsonServer\Exception(
    			'invalid gamedesign_identifier', 
    			['gamedesign_identifier' => $gamedesign_identifier]
    		); 
		}
		return $gamedesignConfigs[$gamedesign_identifier];
	}
	
	/**
	 * Gibt das Objekt des Zähltypen für die Gamedesign Konfiguration zurück
	 * @param array $gamedesignConfig
	 * @return \DragonJsonServerAchievement\Counttype\CounttypeInterface 
	 */
	public function getCounttype(array $gamedesignConfig)
	{
		$configCounttypes = $this->getServiceManager()->get('Config')['dragonjsonserverachievement']['counttypes'];
		$counttype = $gamedesignConfig['counttype'];
		if (!isset($configCounttypes[$counttype])) {
    		throw new \DragonJsonServer\Exception(
    			'invalid counttype', 
    			['counttype' => $counttype]
    		); 
		}
		$classname = $configCounttypes[$counttype];
		return new $classname;
	}
	
	/**
	 * Gibt das Level für die Gamedesign Konfiguration und den Zählstand zurück
	 * @param array $gamedesignConfig
	 * @param integer $count
	 * @return integer $level
	 */
	public function getLevelByGamedesignConfigAndCount(array $gamedesignConfig, $count)
	{
		$current = 0;
		foreach ($gamedesignConfig['levels'] as $level => $mincount) {
			if ($count < $mincount) {
				break;
			}
			$current = $level;
		}
		return $current;
	}
	
	/**
	 * Gibt das Level für die Herausforderung zurück
	 * @param \DragonJsonServerAchievement\Entity\AchievementInterface $achievement
	 * @return integer $level
	 */
	public function getLevelByAchievement(\DragonJsonServerAchievement\Entity\AchievementInterface $achievement)
	{
		$gamedesignConfig = $this->getGamedesignConfig($achievement);
		$counttype = $this->getCounttype($gamedesignConfig);
		return $this->getLevelByGamedesignConfigAndCount($gamedesignConfig, $counttype->getCount($achievement->getData()));
	}
	
	/**
	 * Aktualisiert die Herausforderung mit den übergebenen Daten
	 * @param \DragonJsonServerAchievement\Entity\AchievementInterface $achievement
	 * @param mixed $data
	 * @return Achievement
	 */
	public function changeAchievement(\DragonJsonServerAchievement\Entity\AchievementInterface $achievement, $data)
	{
		$this->getServiceManager()->get('\DragonJsonServerDoctrine\Service\Doctrine')->transactional(function ($entityManager) use ($achievement, $data) {
			$gamedesignConfig = $this->getGamedesignConfig($achievement);
			$counttype = $this->getCounttype($gamedesignConfig);
			$old_data = $achievement->getData();
			if (null === $old_data) {
				$old_data = $counttype->getDefault();
			}
			if ($achievement instanceof \DragonJsonServerAchievement\Entity\LevelInterface) {
				$old_level = $achievement->getLevel();
			}
			$new_data = $counttype->addData($old_data, $data);
			if ($old_data == $new_data) {
				return;
			}
			$achievement->setData($new_data);
			$this->getEventManager()->trigger(
				(new \DragonJsonServerAchievement\Event\ChangeAchievement())
					->setTarget($this)
					->setAchievement($achievement)
			);
			if (isset($gamedesignConfig['levels'])) {
				if (!isset($old_level)) {
					$old_level = $this->getLevelByGamedesignConfigAndCount($gamedesignConfig, $counttype->getCount($old_data));
				}
				$new_level = $this->getLevelByGamedesignConfigAndCount($gamedesignConfig, $counttype->getCount($new_data));
				if ($old_level != $new_level) {
					if ($achievement instanceof \DragonJsonServerAchievement\Entity\LevelInterface) {
						$achievement->setLevel($new_level);
					}
					$this->getEventManager()->trigger(
						(new \DragonJsonServerAchievement\Event\ChangeLevel())
							->setTarget($this)
							->setAchievement($achievement)
							->setOldLevel($old_level)
							->setNewLevel($new_level)
					);
				}
			}
			$entityManager->persist($achievement);
			$entityManager->flush();
		});
		return $this;
	}
}
