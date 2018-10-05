<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BiddingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BiddingsTable Test Case
 */
class BiddingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BiddingsTable
     */
    public $Biddings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.biddings',
        'app.tournaments',
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
        $config = TableRegistry::getTableLocator()->exists('Biddings') ? [] : ['className' => BiddingsTable::class];
        $this->Biddings = TableRegistry::getTableLocator()->get('Biddings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Biddings);

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
