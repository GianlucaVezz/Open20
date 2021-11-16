<?php
use open20\amos\core\migration\AmosMigrationPermissions;
use yii\db\Migration;
use yii\rbac\Permission;

/**
 * Class m200708_100000_update_cross_topic_view */
class m200708_100000_update_cross_topic_view extends Migration
{
    private $viewName = 'preference_cross_topic_view';

    public function safeUp()
    {
        $this->execute("

        CREATE OR REPLACE VIEW $this->viewName AS
        SELECT SUBSTRING_INDEX(group_concat(id),',',1) as first_id, group_concat(id) as list_cross_ids, SUBSTRING_INDEX(tag.codice,'_',-1) as cod_topic, count(*) numero
            FROM tag
            WHERE tag.codice like 'pctopic%'
            group by cod_topic
            having numero = (
                    select count(*) as num
                    from tag
                    WHERE tag.codice like 'pctarget%'
                ) 
            order by pc_topic_order
            ;
        
        ");
        
    }
    
    public function safeDown()
    {
        $this->execute("

        CREATE OR REPLACE VIEW $this->viewName AS
        SELECT SUBSTRING_INDEX(group_concat(id),',',1) as first_id, group_concat(id) as list_cross_ids, SUBSTRING_INDEX(tag.codice,'_',-1) as cod_topic, count(*) numero
            FROM tag
            WHERE tag.codice like 'pctopic%'
            group by cod_topic
            having numero = (
                    select count(*) as num
                    from tag
                    WHERE tag.codice like 'pctarget%'
                ) 
            ;
        
        ");
    }

}
