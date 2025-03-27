<?php

use ricit\humhub\modules\profile\Events;
use humhub\modules\admin\widgets\AdminMenu;

return [
	'id' => 'profile',
	'class' => 'ricit\humhub\modules\profile\Module',
	'namespace' => 'ricit\humhub\modules\profile',
	'events' => [
		
		[
			'class' => AdminMenu::class,
			'event' => AdminMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAdminMenuInit']
		],
	],
];
