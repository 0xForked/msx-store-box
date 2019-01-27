<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateAuthorTable extends AbstractMigration
{

    public function up()
    {
        $author = $this->table('authors');
        $author->addColumn('unique_id', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('thumbnail', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('fullname', 'string', ['limit' => 150, 'null' => false])
                ->addColumn('email', 'string', ['limit' => 150, 'null' => false])
                ->addColumn('gender', 'string', ['limit' => 150, 'null' => true])
                // array e.g. {"place":"test", "date":"03 Sept 2019"}
                ->addColumn('birth', 'text', ['limit' =>  MysqlAdapter::TEXT_REGULAR, 'null' => true])
                ->addIndex(['unique_id'], ['unique' => true])
                ->create();
    }

    public function down()
    {

    }
}
