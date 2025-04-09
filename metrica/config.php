<?php

use ricit\humhub\modules\metrica\Events;
use humhub\modules\admin\widgets\AdminMenu;

return [
	'id' => 'metrica',
	'class' => 'ricit\humhub\modules\metrica\Module',
	'namespace' => 'ricit\humhub\modules\metrica',
	'events' => [
		[
			'class' => AdminMenu::class,
			'event' => AdminMenu::EVENT_INIT,
			'callback' => [Events::class, 'onAdminMenuInit']
		],
	],
];
