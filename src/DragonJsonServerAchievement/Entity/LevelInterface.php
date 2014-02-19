<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2014 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Entity;

/**
 * Schnittstelle für Entityklassen von Herausforderungen mit dem Level
 */
interface LevelInterface
{
	/**
	 * Setzt das Level der Herausforderung
	 * @param integer $data
	 * @return LevelInterface
	 */
	public function setLevel($level);
	
	/**
	 * Gibt das Level der Herausforderung zurück
	 * @return integer
	 */
	public function getLevel();
}
