<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\news\migrations
 * @category   CategoryName
 */

use open20\amos\core\migration\AmosMigrationPermissions;

/**
 * Class m170914_135007_add_validatore_news_to_validator_role
 */
class m180522_171607_delete_community_manager_rule extends AmosMigrationPermissions
{
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        return [
            [
                'name' => \open20\amos\discussioni\rules\DeleteCommunityManagerDiscussioniRule::className(),
                'type' => \yii\rbac\Permission::TYPE_PERMISSION,
                'description' => 'Regola per cancellare una discussionw se sei CM',
                'ruleName' =>  \open20\amos\discussioni\rules\DeleteCommunityManagerDiscussioniRule::className(),
                'parent' => ['CREATORE_DISCUSSIONI'],
                'children' => ['DISCUSSIONITOPIC_DELETE']
            ]
        ];
    }
}
