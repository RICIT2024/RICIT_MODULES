<?php

use ricit\humhub\modules\software\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\user\widgets\AccountMenu;
use humhub\modules\user\widgets\ProfileMenu;

return [
	'id' => 'software',
	'class' => 'ricit\humhub\modules\software\Module',
	'namespace' => 'ricit\humhub\modules\software',
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
