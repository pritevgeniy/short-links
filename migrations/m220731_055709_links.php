<?php

use yii\db\Migration;

/**
 * Class m220731_055709_links
 */
class m220731_055709_links extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('links', [
            'id' => $this->primaryKey(),
            'short' => $this->string(10)->notNull()->unique(),
            'long' => $this->text()->notNull(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('links');
    }
}
