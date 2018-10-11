<?php
use Migrations\AbstractMigration;

class CreateProjects extends AbstractMigration
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
        $table = $this->table('projects');
        $table->addColumn('project_number', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('segment', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('orderer', 'string', [
            'default' => null,
            'limit' => 500,
            'null' => true,
        ]);
        $table->addColumn('project_name', 'string', [
            'default' => null,
            'limit' => 1000,
            'null' => true,
        ]);
        $table->addColumn('staff', 'string', [
            'default' => null,
            'limit' => 500,
            'null' => true,
        ]);
        $table->addColumn('team', 'string', [
            'default' => null,
            'limit' => 500,
            'null' => true,
        ]);
        $table->addColumn('contract_amount', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('estimate_amount', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('order_planed_month', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('completion_planed_month', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('completion_planed_term', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('probability_orders', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);

        $table->create();
    }
}
