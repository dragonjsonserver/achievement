<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Entity;

/**
 * Abstrakte Entityklasse einer Herausforderung
 */
abstract class AbstractAchievement implements \DragonJsonServerAchievement\Entity\AchievementInterface
{
	/**
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $gamedesign_identifier;
	
	/**
	 * @Doctrine\ORM\Mapping\Column(type="string")
	 **/
	protected $data;
	
	/**
	 * Setzt den Gamedesign Identifier der Herausforderung
	 * @param string $gamedesign_identifier
	 * @return AbstractAchievement
	 */
	public function setGamedesignIdentifier($gamedesign_identifier)
	{
		$this->gamedesign_identifier = $gamedesign_identifier;
		return $this;
	}
	
	/**
	 * Gibt den Gamedesign Identifier der Herausforderung zurück
	 * @return string
	 */
	public function getGamedesignIdentifier()
	{
		return $this->gamedesign_identifier;
	}
	
	/**
	 * Setzt die Daten der Herausforderung
	 * @param mixed $data
	 * @return AbstractAchievement
	 */
	public function setData($data)
	{
		$this->data = \Zend\Json\Encoder::encode($data);
		return $this;
	}
	
	/**
	 * Gibt die Daten der Herausforderung zurück
	 * @return mixed
	 */
	public function getData()
	{
		return \Zend\Json\Decoder::decode($this->data, \Zend\Json\Json::TYPE_ARRAY);
	}
	
	/**
	 * Gibt die Attribute des Avatars als Array zurück
	 * @return array
	 */
	public function toArray()
	{
		return [
			'gamedesign_identifier' => $this->getGamedesignIdentifier(),
			'data' => $this->getData(),
		];
	}
}
