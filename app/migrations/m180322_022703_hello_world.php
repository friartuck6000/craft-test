<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;

/**
 * m180322_022703_hello_world migration.
 */
class m180322_022703_hello_world extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Place migration code here...
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180322_022703_hello_world cannot be reverted.\n";
        return false;
    }
}
