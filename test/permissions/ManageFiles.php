<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace ricit\humhub\modules\test\permissions;

use Yii;
use humhub\modules\user\models\User;

/**
 * ManageDocs Permissions
 */
class ManageDocs extends \humhub\libs\BasePermission
{

    /**
     * @inheritdoc
     */
    public $defaultAllowedGroups = [
        User::USERGROUP_SELF,
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        User::USERGROUP_SELF
    ];

    /**
     * @inheritdoc
     */
    protected $moduleId = 'test';

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('TestModule.permissions', 'Manage Documents');
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('TestModule.permissions', 'Allows the user to modify or delete any record.');
    }

}
