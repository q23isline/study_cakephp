<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBulletinBoards extends AbstractMigration
{
    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('bulletin_boards');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
            'signed' => false,
            'comment' => 'ID',
        ]);
        $table->addColumn('comment_number', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            'comment' => 'コメント番号',
        ]);
        $table->addColumn('comment', 'string', [
            'default' => null,
            'limit' => 1000,
            'null' => false,
            'comment' => 'コメント',
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
            'comment' => '作成日',
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
            'comment' => '更新日',
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
