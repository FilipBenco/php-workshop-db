<?php

use yii\db\Migration;

/**
 * Class m180530_131649_service_owner_relation
 */
class m180530_131649_service_owner_relation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{services}}', 'user_id', $this->integer()->notNull());
        $this->createIndex('idx_service_user_id', '{{services}}', 'user_id');
        $this->addForeignKey(
            'fk_service_owner',
            '{{services}}',
            'user_id',
            '{{users}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_service_owner','{{services}}');
        $this->dropIndex('idx_service_user_id', '{{services}}');
        $this->dropColumn('{{services}}', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180530_131649_service_owner_relation cannot be reverted.\n";

        return false;
    }
    */
}
