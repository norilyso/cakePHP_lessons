<?php
use Migrations\AbstractMigration;

class ChangeProjectHeaders extends AbstractMigration
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
        $table->changeColumn('segment', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->changeColumn('orderer', 'string', [
            'default' => null,
            'limit' => 500,
            'null' => true,
        ]);
        $table->changeColumn('project_name', 'string', [
            'default' => null,
            'limit' => 1000,
            'null' => true,
        ]);
        $table->changeColumn('staff', 'string', [
            'default' => null,
            'limit' => 500,
            'null' => true,
        ]);
        $table->changeColumn('team', 'string', [
            'default' => null,
            'limit' => 500,
            'null' => true,
        ]);
        $table->changeColumn('contract_amount', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->changeColumn('estimate_amount', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->changeColumn('order_planed_month', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->changeColumn('completion_planed_month', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->changeColumn('completion_planed_term', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->changeColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->changeColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);

    }
}
