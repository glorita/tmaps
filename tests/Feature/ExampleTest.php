<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/map');

        $response->assertStatus(200);
    }
   
	public function testDatabase()
	{
	    // Make call to application...
	
	    $this->assertDatabaseHas('tmaps', [
	        'city' => 'Miami'
	    ]);
	}
    
}
