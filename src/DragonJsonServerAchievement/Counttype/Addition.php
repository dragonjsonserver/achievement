<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2014 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Counttype;

/**
 * Zähltyp für Werte die immer aufaddiert werden
 */
class Addition implements CounttypeInterface
{
	/**
	 * Gibt den Standardwert mit dem gestartet wird zurück
	 * @return mixed
	 */
	public function getDefault()
	{
		return 0;
	}
	
	/**
	 * Fügt zum alten Wert den Wert hinzu und gibt den neuen Wert zurück
	 * @param mixed $old_data
	 * @param mixed $data
	 * @return mixed
	 */
	public function addData($old_data, $data)
	{
		return $old_data + $data;
	}
	
	/**
	 * Gibt den Zählstand des übergebenen Wertes zur Levelbestimmung zurück
	 * @param mixed $data
	 * @return integer
	 */
	public function getCount($data)
	{
		return $data;
	}
}
