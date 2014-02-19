<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2014 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAchievement
 */

/**
 * @return array
 */
return [
	'dragonjsonserverachievement' => [
		'counttypes' => [
			'addition' => '\DragonJsonServerAchievement\Counttype\Addition',
			'maximum' => '\DragonJsonServerAchievement\Counttype\Maximum',
			'collection' => '\DragonJsonServerAchievement\Counttype\Collection',
		],
		'achievements' => [],
	],
	'dragonjsonserver' => [
	    'apiclasses' => [
	        '\DragonJsonServerAchievement\Api\Achievement' => 'Achievement',
	    ],
	],
	'service_manager' => [
		'invokables' => [
            '\DragonJsonServerAchievement\Service\Achievement' => '\DragonJsonServerAchievement\Service\Achievement',
		],
	],
];
