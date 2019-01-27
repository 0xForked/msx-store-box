<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateProductTable extends AbstractMigration
{

    public function up()
    {
        $product = $this->table('products');
        $product->addColumn('unique_id', 'string', ['limit' => 150])
                ->addColumn('thumbnail', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('title', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('description', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR, 'null' => true])
                //array e.g ['indonesia','english'] = language
                ->addColumn('language', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR, 'null' => true])
                ->addColumn('pages', 'integer')
                ->addColumn('year', 'integer')
                ->addColumn('price', 'integer')
                ->addColumn('publisher', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('published_date', 'string', ['limit' => 150, 'null' => true])
                //array e.g {"isbn10": "123","isbn12": "456"}
                ->addColumn('isbns', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR, 'null' => true])
                ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => true])
                ->addColumn('updated_at', 'datetime', ['null' => true])
                ->addIndex(['unique_id'], ['unique' => true])
                ->save();
    }

    public function down()
    {

    }

}
