<?php 
/**
 * Strategy Pattern:
 *
 * When to use it: 
 * 		Situation when you need different algorithms using the same data. 
 *   Example:
 * 		You have a text and you need to display it in LowerCase, UpperCase, WithoutSpace etc.etc.
 *
 * How to use it:
 * 		We need to identify all the algorithms that we need to use and separate it in different class with a common interface.
 *   	The main class need to call the function that we declare on the interface with the class that will be the algorithm.
 *
 */

interface Idisplayable {
	public function display($sentence);
}

class display_star implements Idisplayable
{
	public function display($sentence)
	{
		$sentence = preg_replace('/\s/', '*', $sentence);
		echo $sentence; 
	}
}

class display_point implements Idisplayable
{
	public function display($sentence)
	{
		$sentence = preg_replace('/\s/', '.', $sentence);
		echo $sentence; 
	}
}

class display_upper_case implements Idisplayable
{
	public function display($sentence)
	{
		$sentence = ucwords($sentence);
		echo $sentence;
	}
}

class Context{
	protected $mySentence;
	
	public function __construct()
	{
		$this->mySentence  = "hi i'm a new sentence";
	}

	public function display(Idisplayable $displayable)
	{
		$displayable->display($this->mySentence);
	}
}

?>

<?php 
$context = new Context();

$context->display(new display_star());
echo ("<br/>");
$context->display(new display_point());
echo ("<br/>");
$context->display(new display_upper_case());

?>