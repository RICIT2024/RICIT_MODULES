<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

 namespace ricit\humhub\modules\test\permissions;

use humhub\modules\user\models\User;
use Yii;

/**
 * WriteAccess Permission
 */
class WriteAccess extends \humhub\libs\BasePermission
{
    /**
     * @inheritdoc
     */
    protected $moduleId = 'test';

    /**
     * @inheritdoc
     */
    public $defaultAllowedGroups = [
        User::USERGROUP_SELF
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        User::USERGROUP_SELF,
        User::USERGROUP_GUEST,
        User::USERGROUP_FRIEND,
    ];

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('TestModule.permissions', 'Add files');
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('TestModule.permissions', 'Allows the user to upload new records');
    }

}
