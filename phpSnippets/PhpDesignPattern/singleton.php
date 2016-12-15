<?php 
/* 
Author : Alberto Cubeddu
Description: The singleton ANTI-PATTERN restricts the initialization of a class to one OBJECT!
	Very useful when you need to control everything from one class.

	DATABASE CLASS IS A MUST. Just create a OBJECT that serve for all the application insted of create multiple connection.
*/

/**
 * Dummy class just for demostration
 */
class someObj{
	public function __construct($name,$surname){
		//do stuff ()
	}
}

class singleton{
	private $name = null, $surname = null;

	//we use static because is a share variable all across all the objects that we will create.
	private static $instance = null;

	/**
	 * Constructor
	 * @param array $detail name and surname
	 */
	public function __construct($detail=array()){
		$this->name = $detail['name'];
		$this->surname = $detail['surname'];

		$this->obj = new someObj($this->name,$this->surname);
	}

	//CONNECT FUNCTION :: STATIC FUNCTION!
	public static function connect($detail){
		//already exist an instance or not?
		if (self::$instance == null){
			self::$instance = new singleton($detail);
		}
		return self::$instance;
	}

	public function setname($var){
		$this->name = $var;
	}
}

$detail = array(
	'name' => 'alberto',
	'surname' => 'cubeddu'
	);


$p1 = singleton::connect($detail);
var_dump($p1);

$p2 = singleton::connect($detail);
$p2->setname("davide");
var_dump($p2);

$p3 = singleton::connect($detail);
var_dump($p3);

// As you can see all the output is linked to the FIRST OBJECT that we initialize! 

?>