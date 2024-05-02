<?php

use humhub\commands\CronController;
use humhub\modules\Reporte\Events;
use humhub\modules\admin\widgets\AdminMenu;

return [
	'id' => 'Reporte',
	'class' => 'ricit\humhub\modules\Reporte\Module',
	'namespace' => 'ricit\humhub\modules\Reporte',
	'events' => [
		[
			'class' => AdminMenu::class,
			'event' => AdminMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAdminMenuInit']
		],
		['class' => CronController::class, 'event' => CronController::EVENT_ON_DAILY_RUN, 'callback' => ['humhub\modules\social_stats\Events', 'onDailyCronRun']],
	],
];
