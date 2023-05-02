<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BulletinBoardsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BulletinBoardsTable Test Case
 */
class BulletinBoardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BulletinBoardsTable
     */
    protected $BulletinBoards;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.BulletinBoards',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BulletinBoards') ? [] : ['className' => BulletinBoardsTable::class];
        $this->BulletinBoards = $this->getTableLocator()->get('BulletinBoards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BulletinBoards);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BulletinBoardsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
