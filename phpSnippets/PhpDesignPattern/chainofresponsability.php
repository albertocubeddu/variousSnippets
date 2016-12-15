<?php
/**
 * When to use it: 
 * We can use this pattern when we need to process something different time and we wait for a successful result
 *
 * How to use it:
 * Just use the abstract class as the main point to start the process and to use an abstract function
 * We can't use an interface because we need the setNext function in all the subclasses.
 *
 * Create as many class as you need to do all the check and return a result that you analyze in the process.
 * After you create the class you have to create the (Chain of Responsability) to know which one is the successor.
 */


/**
 * In this example we gonna check if the username that the user has provided is in some column of our "IMAGINARY" database.
 * If you are used to work with datastructure this is a linked list.
 */

/**
 * Abstract Class
 */
abstract class CheckLogin
{
	private $next;

	public function __construct()
	{
		$this->next = null;
	}

	/**
	 * Set the next process to chain
	 * @param CheckLogin $next The object that we want to link
	 */
    public function setNext(CheckLogin $next)
    {
        $this->next = $next;
        return $this->next;
    }

    /**
     * Process the chain, 
     * @param  [type] $input Just the input from the user.	
     */
    public function process($input)
    {
    	//here we control the return if if successful or not.
        if ($this->_check($input))
        {
        	echo "username found";
        }
        //not succesful but we have a link?
        else if ($this->next !== null) {
            $this->next->process($input);
        }
        //no more link? No result found sorry!
        else
        {
        	echo "username not found";
        }
    }

    /**
     * Check if we found what we are looking for
     * @param  string $username username
     * @return boolean     true/false 
     */
    abstract protected function _check($username);
}

class EmailChecker extends CheckLogin
{
	/**
	 * Check if the username is in the email column in our "fake" database
	 * @param  string $username the username
	 * @return boolean
	 */
	protected function _check($username)
	{
		echo "Checking if {$username} is in email column <br/>";
		if ($username =="alberto")
		{
			return true;
		}
		return false;
	}
}

class UsernameChecker extends CheckLogin
{
	/**
	 * Check if the username is in the username column in our "fake" database
	 * @param  string $username the username
	 * @return boolean
	 */
	protected function _check($username)
	{
		echo "Checking if {$username} is in username column <br/>";
		if ($username =="roberto")
		{
			return true;
		}
		return false;
	}
}

class APIChecker extends CheckLogin
{
	/**
	 * Check if the username is in the email column in our "fake" database
	 * @param  string $username the username
	 * @return boolean
	 */
	protected function _check($username)
	{
		echo "Checking if {$username} is in API column <br/>";
		if ($username =="davide")
		{
			return true;
		}
		return false;
	}
}

$email = new EmailChecker();
$username = new UsernameChecker();
$api = new APIChecker();

//Create the chain of responsability (link the object togheter)
$email->setNext($username);
$username->setNext($api);

//It gonna exit when we find a value
$email->process("roberto");

?>
