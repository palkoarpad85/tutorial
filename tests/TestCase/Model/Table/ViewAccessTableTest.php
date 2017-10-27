<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViewAccessTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViewAccessTable Test Case
 */
class ViewAccessTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ViewAccessTable
     */
    public $ViewAccess;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.view_access',
        'app.roles',
        'app.users',
        'app.roles_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ViewAccess') ? [] : ['className' => ViewAccessTable::class];
        $this->ViewAccess = TableRegistry::get('ViewAccess', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ViewAccess);

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
