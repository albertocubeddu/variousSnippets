<?php
/**
 * When to use it: 
 * We can use this pattern when we need to DECORATE an object with various ADD-ONS
 *
 * How to use it:
 * There are several way to implements this pattern, i decide to use a class/interface solution because we are respecting the SOLID pricinple. the I one.
 *
 * Basically we have an abstract class (pizza) that is used for create the concrete class (ex: pizza margherita)
 *
 * Another class is the pizza_decorator that take in input the concrete class (ex. pizza margherita) [so we are using the dependecy injection] and thanks 
 * to an interface (Idecorator) can assign the various price and ingredients of the concrete class (ex: pizza margherita).
 */


abstract class pizza
{
	protected $ingredients;
	protected $cost;
	protected $name;

	public function __construct()
	{
		$this->name = '';
		$this->cost = 0.0;
		$this->ingredients = '';
	}

	/**
	 * Get the descripion of the pizza
	 * @return string Get the name and the ingredients on the pizza
	 */
	public function getIngredients()
	{
		echo $this->name;
		echo "  ";
		echo $this->ingredients;
	}

	/**
	 * Get the price of the pizza
	 * @return float get the price of the pizza
	 */
	public function getPrice()
	{
		echo round($this->cost,2);
	}

	/**
	 * Add the ingredients 
	 * @param string $ingredients the ingredients that we want to add
	 */
	public function setIngredients(string $ingredients)
	{
		$this->ingredients .= $ingredients;
	}

	/**
	 * Incarse the price to the pizza
	 * @param float $cost the cost of the pizza
	 */
	public function setPrice(float $cost)
	{
		$this->cost += round($cost,2);
	}
}

/**
 * Create a base class for the pizza
 */
class pizzaMargherita extends pizza
{
	public function __construct()
	{
		$this->name = "margherita";
		$this->cost = 5.0;
		$this->ingredients = 'mozzarella,tomate';
	}
}


/**
 * Create the decorator
 */
class pizza_decorator 
{
	protected $pizza;

	public function __construct(pizza $pizza_in)
	{
		$this->pizza = $pizza_in;
	}

	public function add_topping(Idecorator $decoration)
	{
	 	$decoration->set($this->pizza);
	}
}

/**
 * The interface that we use for set the pizza attribute
 */
interface Idecorator
{
	public function set(pizza $pizza);
}

class mozzarella implements Idecorator
{
	public function set(pizza $pizza)
	{
		$pizza->setIngredients("mozzarella");
		$pizza->setPrice("0.80");
	}
}

class tomate implements Idecorator
{
	public function set(pizza $pizza)
	{
		$pizza->setIngredients(",tomate");
		$pizza->setPrice("0.40");
	}
}

//We create a pizzaMargherita and we decorate with mozzarella and tomate.
//That's mean that our margherita will have double mozzarella and double tomate.
$pizza = new pizzaMargherita();
$decorator = new pizza_decorator($pizza);
	$decorator->add_topping(new mozzarella());
	$decorator->add_topping(new tomate());
$pizza->getIngredients();
$pizza->getPrice();

?>