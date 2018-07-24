<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testPhpVersion()
	{
    	
    	$actual = phpversion();
    	$expected = '7.2';
    	$this->assertEquals( $expected, $actual, 'Wrong PHP version!' );
	}
	public function testAdsress()
	{
    	
    	$response = $this->get('/');
    	$expected = 'FIU';
    	$this->find( $expected, $actual, 'Wrong PHP version!' );
	}
}
