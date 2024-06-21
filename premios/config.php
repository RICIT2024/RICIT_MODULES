<?php

use ricit\humhub\modules\premios\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\AccountMenu;
use humhub\modules\user\widgets\ProfileMenu;

return [
	'id' => 'premios',
	'class' => 'ricit\humhub\modules\premios\Module',
	'namespace' => 'ricit\humhub\modules\premios',
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
