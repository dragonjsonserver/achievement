<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

namespace DragonJsonServerAchievement\Event;

/**
 * Eventklasse für die Aktualisierung des Levels einer Herausforderung
 */
class ChangeLevel extends \Zend\EventManager\Event
{
	/**
	 * @var string
	 */
	protected $name = 'ChangeLevel';

    /**
     * Setzt die Herausforderung deren Level aktualisiert wurde
     * @param \DragonJsonServerAchievement\Entity\AchievementInterface $achievement
     * @return ChangeLevel
     */
    public function setAchievement(\DragonJsonServerAchievement\Entity\AchievementInterface $achievement)
    {
        $this->setParam('achievement', $achievement);
        return $this;
    }

    /**
     * Gibt die Herausforderung deren Level aktualisiert wurde zurück
     * @return \DragonJsonServerAchievement\Entity\AchievementInterface
     */
    public function getAchievement()
    {
        return $this->getParam('achievement');
    }

    /**
     * Setzt das alte Level der Herausforderung
     * @param integer $old_level
     * @return ChangeLevel
     */
    public function setOldLevel($old_level)
    {
        $this->setParam('old_level', $old_level);
        return $this;
    }

    /**
     * Gibt das alte Level der Herausforderung zurück
     * @return integer
     */
    public function getOldLevel()
    {
        return $this->getParam('old_level');
    }

    /**
     * Setzt das neue Level der Herausforderung
     * @param integer $new_level
     * @return ChangeLevel
     */
    public function setNewLevel($new_level)
    {
        $this->setParam('new_level', $new_level);
        return $this;
    }

    /**
     * Gibt das neue Level der Herausforderung zurück
     * @return integer
     */
    public function getNewLevel()
    {
        return $this->getParam('new_level');
    }
}
