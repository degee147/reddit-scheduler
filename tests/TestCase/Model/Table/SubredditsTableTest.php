<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubredditsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubredditsTable Test Case
 */
class SubredditsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubredditsTable
     */
    public $Subreddits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Subreddits',
        'app.Posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Subreddits') ? [] : ['className' => SubredditsTable::class];
        $this->Subreddits = TableRegistry::getTableLocator()->get('Subreddits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subreddits);

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
}
