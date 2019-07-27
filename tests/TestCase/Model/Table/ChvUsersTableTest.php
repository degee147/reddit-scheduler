<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChvUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChvUsersTable Test Case
 */
class ChvUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChvUsersTable
     */
    public $ChvUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ChvUsers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ChvUsers') ? [] : ['className' => ChvUsersTable::class];
        $this->ChvUsers = TableRegistry::getTableLocator()->get('ChvUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChvUsers);

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
