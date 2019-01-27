<?php


use Phinx\Migration\AbstractMigration;

class CreateProductCategoryTable extends AbstractMigration
{

    public function up()
    {
        $category_product = $this->table('product_category');
        $category_product->addColumn('category_id', 'integer', ['null' => true])
                        ->addColumn('product_id', 'integer', ['null' => true])
                        ->addForeignKey('category_id', 'categories', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                        ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                        ->create();
    }

    public function down()
    {

    }

}
