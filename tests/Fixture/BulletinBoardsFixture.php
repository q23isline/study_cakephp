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
                'id' => '57177ca5-6960-49c3-a4cd-5e4febe154ef',
                'commentNumber' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-04-22 12:14:35',
                'modified' => '2023-04-22 12:14:35',
            ],
        ];
        parent::init();
    }
}
