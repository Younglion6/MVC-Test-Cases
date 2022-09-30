<?php

declare(strict_types = 1);

require __DIR__ . "/../framework/Controller.php";


use PHPUnit\Framework\TestCase;


class ControllerTest extends TestCase 
{

    private $controller;

    public function setUp() : void 
    {
        $this->controller = new ConcreteControllerClass();
    }


    public function tearDown(): void 
    {

    }

    /** @test */
    public function test_controllerObject() 
    {
        $this->assertEquals(get_class($this->controller),'ConcreteControllerClass', 'Controller objected creation failed');
    }


    public function getPrivateProperty( $className, $propertyName ) 
    {
        $reflector = new ReflectionClass( $className);
        $property = $reflector->getProperty( $propertyName);
        $property->setAccessible( true );

        return $property;
    }


     /** @test */
     public function test_setModel(): Void 
     {
         $controller = new ConcreteControllerClass();    //create new controller object
 
         $model = $this->getPrivateProperty( 'Controller', 'model'); //gets the private property $model from Controlller class
         
         $m = new ConcreteModelClass();
 
         $model = $m;
 
         $model_output = $controller->setModel($m);
 
         $this->assertNull($model_output, 'Model initialized as null');
 
     }

    /** @test */
    public function test_setView(): void 
    {

        $controller = new ConcreteControllerClass();

        $v = new View();

        $view = $this->getPrivateProperty( 'Controller', 'view');

        $view = $v;

        $view_output = $controller->setView($v);

        $this->assertNull($view_output, 'View initialized as null');

    }
    
}