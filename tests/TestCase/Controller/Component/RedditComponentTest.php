<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\RedditComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\RedditComponent Test Case
 */
class RedditComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\RedditComponent
     */
    public $Reddit;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Reddit = new RedditComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reddit);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
