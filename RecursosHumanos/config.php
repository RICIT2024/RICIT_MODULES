<?php

use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\AccountMenu;
use humhub\modules\user\widgets\ProfileMenu;
use ricit\humhub\modules\RecursosHumanos\Events;

return [
	'id' => 'RecursosHumanos',
	'class' => 'ricit\humhub\modules\RecursosHumanos\Module',
	'namespace' => 'ricit\humhub\modules\RecursosHumanos',
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
