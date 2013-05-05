<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Api;

/**
 * API Klasse zur Verwaltung von Herausforderungen
 */
class Achievement
{
    use \DragonJsonServer\ServiceManagerTrait;

    /**
     * Gibt die Gamedesign Konfigurationen der Herausforderungen zurück
     * @return array
     */
    public function getGamedesignConfigs()
    {
        return $this->getServiceManager()->get('Config')['dragonjsonserverachievement']['achievements'];
    }
}
