<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateTransactionTable extends AbstractMigration
{

    public function up()
    {

        $transaction = $this->table('transactions');
        $transaction->addColumn('date', 'date')
            ->addColumn('ref_id',  'string', ['limit' => 225])
            ->addColumn('no_order', 'integer')
            ->addColumn('tr_status', 'integer')
            ->addColumn('notes', 'string', ['limit' => 225])
            ->addColumn('brutto', 'integer')
            ->addColumn('disc', 'integer')
            ->addColumn('netto', 'integer')
            ->addColumn('tax', 'integer')
            ->addColumn('total', 'integer')
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();
    }

    public function down()
    {

    }
}
