<?php

use yii\db\Migration;

/**
 * Class m180530_131649_service_owner_relation
 */
class m180610_131649_shared_service_relation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{shared_services_rel}}', [
            'user_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull()
        ]);
        $this->addPrimaryKey('pk_shared_services_rel', '{{shared_services_rel}}', ['user_id', 'service_id']);
        $this->addForeignKey(
            'fk_shared_service_user_id',
            '{{shared_services_rel}}',
            'user_id',
            '{{users}}',
            'id'
        );
        $this->addForeignKey(
            'fk_shared_service_service_id',
            '{{shared_services_rel}}',
            'service_id',
            '{{services}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_shared_service_service_id','{{shared_services_rel}}');
        $this->dropForeignKey('fk_shared_service_user_id','{{shared_services_rel}}');
        $this->dropTable('{{shared_services_rel}}');
    }

}
