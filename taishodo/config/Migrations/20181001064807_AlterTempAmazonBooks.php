<?php
use Migrations\AbstractMigration;

class AlterTempAmazonBooks extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('temp_amazon_books');
        $table->rename('amazon_books')
              ->save();
    }
}
