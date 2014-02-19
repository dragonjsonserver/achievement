<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2014 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Event;

/**
 * Eventklasse für die Aktualisierung einer Herausforderung
 */
class ChangeAchievement extends \Zend\EventManager\Event
{
	/**
	 * @var string
	 */
	protected $name = 'ChangeAchievement';

    /**
     * Setzt die Herausforderung die aktualisiert wurde
     * @param \DragonJsonServerAchievement\Entity\AchievementInterface $achievement
     * @return ChangeAchievement
     */
    public function setAchievement(\DragonJsonServerAchievement\Entity\AchievementInterface $achievement)
    {
        $this->setParam('achievement', $achievement);
        return $this;
    }

    /**
     * Gibt die Herausforderung die aktualisiert wurde zurück
     * @return \DragonJsonServerAchievement\Entity\AchievementInterface
     */
    public function getAchievement()
    {
        return $this->getParam('achievement');
    }
}
