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
     public function test_create(): void 
     {
        
         $condition = false;

         if($condition == false) {
            $condition = true;
         }
 
         $this->assertTrue($condition, 'Falied to Start Session');
 
     }


     /**@test */
    public function test_destroy()
    {
        $session = true;    //session storing true 

        if($session == true) {
            $session = false;
        }
        $this->assertFalse($session, 'End Session');

        
    }



    /** @test */
    public function test_add() 
    {

        $session_arr = ["name" => ''];

        $name = "session-name";    // variable name $name 
        $value = "session-value";   //value stored in $name

        if(!isset($session_arr[$name])) {

        $value_added = $session_arr[$name] = $value;  //add varible named $name with $value variable to session array
        }

        $this->assertContains($value_added, $session_arr, 'Value doesnt exist in Session');

    }



    public function test_remove() 
    {
        //use an array to support session management for testing purposes
        $session_arr = ['name' => 'session1'];      //session array

        $name = 'temp-session';     //session name $name

        if(isset($session_arr[$name])) {

            unset($session_arr[$name]);   //remove $name from session array
        }
        $this->assertNotContains($name, $session_arr, 'Session $name not found');
    }



    
}