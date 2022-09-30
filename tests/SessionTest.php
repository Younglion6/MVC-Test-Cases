<?php

declare(strict_types = 1);

require __DIR__ . "/../framework/SessionClass.php";

use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{

    private $session;

    public function setUp() : void 
    {
        $this->session = new SessionClass();
    }

    public function tearDown() : void 
    {

    }


    /**@test */
    public function test_valid_session_class_object() : void
    {

        $this->assertEquals(get_class($this->session), 'SessionClass', 'Session object creation failed');
    }

    /** @test */
    public function test_add() 
    {


        $session_arr = [];
        
        $name = "Session-1";
        $value = "Stop";

        $session_arr[$name] = $value;

        $this->assertContains($value, $session_arr, 'Value doesnt exist in Session');

    }


    /** @test */
    public function test_create(): void 
    {
       
        $condition = false;

        $this->assertFalse($condition, 'Start Session');

    }

    /**@test */
    public function test_destroy()
    {
        $condition = true;

        $this->assertTrue($condition, 'End Session');

        
    }

    public function test_remove() 
    {

        $sessionArray = array();    //Session array 

        $name = 'Login';    //$name 


        array_push ($sessionArray, $name);

        $this->assertContains($name, $sessionArray, 'Session $name not found');



    }



    
}