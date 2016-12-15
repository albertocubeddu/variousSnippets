<?php
/* 
Author : Alberto Cubeddu
Description: The simple Factory pattern allow to have a centralized location where all the object are created.
*/


/*
Explain about constructor or static method

First of all why put a definition of constructor based on what wikipedia say:

CONSTRUCTOR : In class-based object-oriented programming, a constructor (abbreviation: ctor) in a class is a special type of subroutine called to create an object. 
	It prepares the new object for use, often accepting arguments that the constructor uses to set required member variables.

	A constructor resembles an instance method, but it differs from a method in that it has no explicit return type, it is not implicitly inherited and it usually has 
	different rules for scope modifiers. Constructors often have the same name as the declaring class. They have the task of initializing the object's data members and
 	of establishing the invariant of the class, failing if the invariant is invalid. A properly written constructor leaves the resulting object in a valid state.
 	Immutable objects must be initialized in a constructor.

STATIC METHOD: Static methods are meant to be relevant to all the instances of a class rather than to any specific instance. 
	A static method can be invoked even if no instances of the class exist yet. Static methods are called "static" because they are resolved at compile time based on 
	the class they are called on and not dynamically as in the case with instance methods which are resolved polymorphically based on the runtime type of the object. 
	Therefore, static methods cannot be overridden.

So based on this two definition we can easely know that the best solution is to use the static method.
Static method can be called even when no object of that kind of class is created! 

I write it down the example both with the constructor that with the static funciton. 
 */

class thingFactory{
	
	public static $countThing = 0;


	public function __construct($className = ''){
		if ($className == ''){
			throw new Exception('Specify a class');
		}else{
			if (class_exists($className)){
				$newClass = new $className;
				++self::$countThing;
				
				//Common method....
				$newClass->helloWorld();
				return $newClass;
			
			}else{
				throw new Exception('Thing class not found');
			}
		}
	}
	

	public static function build ($className = ''){
		if ($className == ''){
			throw new Exception('Specify a class');
		}else{
			if (class_exists($className)){
				$newClass = new $className;
				++self::$countThing;
				
				//Common method....
				$newClass->helloWorld();
				return $newClass;
			
			}else{
				throw new Exception('Thing class not found');
			}
		}
	}
}
	

abstract class Thing {
	abstract function helloWorld();

	public function helloKitty(){
		echo "Kitty";
	}
}


class simpleThing extends Thing{
	public function __construct(){

	}

	public function helloWorld(){
		echo "Hello World i'm a simple Thing!<br/>";
	}
}

class advancedThing extends Thing{
	public function __construct(){
	}

	public function helloWorld(){
		echo "Hello World i'm a ADVANCED Thing!<br/>";
	}
}


$simple = new thingFactory("simpleThing");
$adv = thingFactory::build("advancedThing");
$simple2 = thingFactory::build("simpleThing");
$simple2->helloKitty();

var_dump($simple);
var_dump($adv);
var_dump($simple2);

echo "there is/are : ".thingFactory::$countThing." object";

?>