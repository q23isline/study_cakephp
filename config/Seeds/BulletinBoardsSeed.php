<?php
declare(strict_types=1);

use Cake\Utility\Text;
use Migrations\AbstractSeed;

/**
 * BulletinBoards seed.
 */
class BulletinBoardsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Text::uuid(),
                'comment_number' => 1,
                'comment' => '就活しんどすぎる',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Text::uuid(),
                'comment_number' => 2,
                'comment' => "内定がほしい\nもう面接したくない",
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Text::uuid(),
                'comment_number' => 3,
                'comment' => '面接ねー',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Text::uuid(),
                'comment_number' => 4,
                'comment' => "日本語しゃべれねー\n日本語学びたい",
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Text::uuid(),
                'comment_number' => 5,
                'comment' => ">>4\nOh!\nyou No Japanese?",
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Text::uuid(),
                'comment_number' => 6,
                'comment' => ">>5\nん？",
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Text::uuid(),
                'comment_number' => 7,
                'comment' => ">>5\n日本人だよ\n何言ってるの",
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('bulletin_boards');

        // delete insert
        $table->truncate();
        $table->insert($data)->save();
    }
}
