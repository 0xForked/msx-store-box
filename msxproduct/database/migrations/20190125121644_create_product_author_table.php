<?php


use Phinx\Migration\AbstractMigration;

class CreateProductAuthorTable extends AbstractMigration
{

    public function up()
    {
        $author_product = $this->table('product_author');
        $author_product->addColumn('author_id', 'integer', ['null' => true])
                        ->addColumn('product_id', 'integer', ['null' => true])
                        ->addForeignKey('author_id', 'authors', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                        ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                        ->create();
    }

    public function down()
    {

    }

}
