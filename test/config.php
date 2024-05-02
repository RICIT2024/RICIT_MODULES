<?php

use ricit\humhub\modules\test\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\AccountMenu;
use humhub\widgets\TopMenu;
use humhub\modules\user\widgets\ProfileMenu;


return [
	'id' => 'test',
	'class' => 'ricit\humhub\modules\test\Module',
	'namespace' => 'ricit\humhub\modules\test',
	'events' => [
		[
			'class' => TopMenu::class,
			'event' => TopMenu::EVENT_INIT,
			'callback' => [Events::class, 'onTopMenuInit'],
		],
		[
			'class' => AdminMenu::class,
			'event' => AdminMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAdminMenuInit']
		],
		[
			'class' => ProfileMenu::class,
			'event' => ProfileMenu::EVENT_INIT,
			'callback' => [Events::class, 'onProfileMenuInit']
		],
		[
			'class' => AccountMenu::class,
			'event' => AccountMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAccountMenuInit']
		],
	],
];
