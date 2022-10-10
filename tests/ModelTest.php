<?php

declare(strict_types = 1);

//require __DIR__ . "/../framework/Model.php";

use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{

    private $model;

    public function setUp(): void
    {
        $this->model = new ConcreteModelClass();
    }

    public function tearDown(): void
    { }

    /** @test */ 
    public function testValid_Model_Object(): void
    {
       
        $this->assertEquals(get_class($this->model), 'ConcreteModelClass', 'Model object creation failed');

    }

    /** @test */
    public function test_getAll()
    {

        $model = new ConcreteModelClass();

        $results = $model->getAll();

        $this->assertisArray($results);

    }





   

}