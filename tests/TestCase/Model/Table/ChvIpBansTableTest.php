<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChvIpBansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChvIpBansTable Test Case
 */
class ChvIpBansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChvIpBansTable
     */
    public $ChvIpBans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ChvIpBans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ChvIpBans') ? [] : ['className' => ChvIpBansTable::class];
        $this->ChvIpBans = TableRegistry::getTableLocator()->get('ChvIpBans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChvIpBans);

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
