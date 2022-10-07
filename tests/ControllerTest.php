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
         
         $m = new ConcreteModelClass();         //create new model object 
 
         $model = $m;   //stores model object $m in private property $model
 
         $model_output = $controller->setModel($m);
 
         $this->assertNull($model_output, 'Model initialized as null');     //assert if Model was is initialized as NULL
 
     }

    /** @test */
    public function test_setView(): void 
    {

        $controller = new ConcreteControllerClass();       //create new Controller object

        $v = new View();    //create new View object

        $view = $this->getPrivateProperty( 'Controller', 'view');       //use getPrivateProperty function to access provate variable $view

        $view = $v;     //store model object $v in private property $view

        $view_output = $controller->setView($v);

        $this->assertNull($view_output, 'View initialized as null');    //asset of View was initialized as NULL

    }
    
}