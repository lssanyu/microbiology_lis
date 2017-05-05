<?php
/**
 * Tests the UserController functions that store, edit and delete users 
 * @author  (c) @iLabAfrica, Emmanuel Kitsao, Brian Kiprop, Thomas Mapesa, Anthony Ereng
 */
class MigrationSeedTest extends TestCase 
{
    /**
    * Initial setup function for tests
    *
    * @return void
    */
    public function setUp(){
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function testHome()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }

    public function testSeedUpdater()
    {
        Artisan::call('update:seed');
    }
}