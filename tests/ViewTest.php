<?php

declare(strict_types = 1);

require __DIR__ . "/../app/View.php";


class ViewTest extends PHPUnit\Framework\TestCase
{

    private $view;

    public function setUp(): void
    {
        $this->view = new View();
    }

    public function tearDown(): void
    { }

    /** Tests for valid View Class objet */
    public function testValid_View_Object(): void
    {

        //$view = new View();
        //$this->assertIsObject($view);
        $this->assertEquals(get_class($this->view), 'View', 'View object creation failed');


    }

    /** @test */
    // Tests the parameters of the setTemplate funciton
    public function test_setTemplate_Method_Arguments(): void
    {
        $test = $this->createMock(View::class);
        $test
            ->expects(self::once())
            ->method('setTemplate')
            ->with('view.tpl.php')
            ->willReturn(True);
 
        self::assertTrue($test->setTemplate('view.tpl.php'));
    }
    


    /** Tests setTemplate function */
    public function test_setTemplate()
    {
        $view = new View();

        $expectedValue = "view.tpl.php";

        $view->setTemplate($expectedValue);

        //$this->assertIsString($output);

        $property = $this->getPrivateProperty( 'View', 'tpl');   //accessed the View class and private varible $tpl

        $this->assertEquals( $property->getValue( $view ), $expectedValue);

        
    }

    public function getPrivateProperty( $className, $propertyName ) 
    {
        $reflector = new ReflectionClass( $className);
        $property = $reflector->getProperty( $propertyName);
        $property->setAccessible( true );

        return $property;
    }

   /** @test */
    public function test_display()
    {

        $view = new View();

        $filename = "view.tpl.php";         //expected $tpl file stored as a string 

        $view->setTemplate($filename);

        $display = $view->display();

        $this->assertIsString($display, 'Display returns a String');     //returns true if $filename is a string value

    }


    

    

    
    
  
    

}