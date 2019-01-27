<?php


use Phinx\Migration\AbstractMigration;

class CreateCategoryTable extends AbstractMigration
{

    public function up()
    {
        $category = $this->table('categories');
        $category->addColumn('title', 'string', ['limit' => 100, 'null' => false])
                ->addColumn('slug', 'string', ['limit' => 100, 'null' => false])
                ->addColumn('desc', 'string', ['limit' => 100, 'null' => false])
                ->create();
    }

    public function down()
    {

    }

}
