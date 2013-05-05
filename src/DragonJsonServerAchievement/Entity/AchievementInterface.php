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
 * Schnittstelle für Entityklassen von Herausforderungen
 */
interface AchievementInterface
{
	/**
	 * Gibt den Gamedesign Identifier der Herausforderung zurück
	 * @return string
	 */
	public function getGamedesignIdentifier();
	
	/**
	 * Setzt die Daten der Herausforderung
	 * @param mixed $data
	 * @return AbstractAchievement
	 */
	public function setData($data);
	
	/**
	 * Gibt die Daten der Herausforderung zurück
	 * @return mixed
	 */
	public function getData();
}
