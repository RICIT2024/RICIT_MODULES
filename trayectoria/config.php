<?php

use ricit\humhub\modules\trayectoria\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\AccountMenu;
use humhub\modules\user\widgets\ProfileMenu;

return [
	'id' => 'trayectoria',
	'class' => 'ricit\humhub\modules\trayectoria\Module',
	'namespace' => 'ricit\humhub\modules\trayectoria',
	'events' => [
		[
			'class' => AdminMenu::class,
			'event' => AdminMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAdminMenuInit']
		],
		[
			'class' => AccountMenu::class,
			'event' => AccountMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAccountMenuInit']
		],
		[
			'class' => ProfileMenu::class,
			'event' => ProfileMenu::EVENT_INIT,
			'callback' => [Events::class, 'onProfileMenuInit']
		]
	],
];
