<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BulletinBoardsFixture
 */
class BulletinBoardsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'aa455fd4-641e-4346-8f77-0f9c512627c0',
                'comment_number' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-04-22 12:28:42',
                'modified' => '2023-04-22 12:28:42',
            ],
        ];
        parent::init();
    }
}
