<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoardsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoardsUsersTable Test Case
 */
class BoardsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BoardsUsersTable
     */
    public $BoardsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.boards_users',
        'app.boards',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BoardsUsers') ? [] : ['className' => BoardsUsersTable::class];
        $this->BoardsUsers = TableRegistry::getTableLocator()->get('BoardsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BoardsUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
