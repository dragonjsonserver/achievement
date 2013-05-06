<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Counttype;

/**
 * Schnittstelle für Zähltypen von Herausforderungen
 */
interface CounttypeInterface
{
	/**
	 * Gibt den Standardwert mit dem gestartet wird zurück
	 * @return mixed
	 */
	public function getDefault();
	
	/**
	 * Fügt zum alten Wert den Wert hinzu und gibt den neuen Wert zurück
	 * @param mixed $old_data
	 * @param mixed $data
	 * @return mixed
	 */
	public function addData($old_data, $data);
	
	/**
	 * Gibt den Zählstand des übergebenen Wertes zur Levelbestimmung zurück
	 * @param mixed $data
	 * @return integer
	 */
	public function getCount($data);
}
