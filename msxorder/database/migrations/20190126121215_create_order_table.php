<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateOrderTable extends AbstractMigration
{
    public function up()
    {
        $order = $this->table('orders');
        $order->addColumn('date', 'date')
            ->addColumn('no_order', 'integer')
            ->addColumn('transaction_id', 'integer')
            //isi data product dalam bentuk json (title, thumbnail, publisher, id)
            ->addColumn('product', 'text', ['limit' =>  MysqlAdapter::TEXT_REGULAR, 'null' => true])
            ->addColumn('notes', 'string', ['limit' => 225])
            ->addColumn('qty', 'integer')
            ->addColumn('price', 'integer')
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
