<?php
/* 
	Stack is a data structure. 
	
	Description of a stack:
	The stack also knowed as LIFO(Last In, First Out) is an abstract data type that serve as a collection
	of elements. It has two principal function PUSH and POP. 

	Using: 
	It used when we need to store value and retrive it as first.
*/
class albertoStack{
	private $stack;

	public function __construct(){
		$this->stack = new SplStack();
	}	

	public function run(){
		$this->stack->push('a');
		$this->stack->push('b');
		$this->stack->push('c');
		$this->stack->push('d');
		$this->stack->push('e');
	}

	public function insert($value){
		$this->stack->push($value);
	}

	public function remove(){
		return $this->stack->pop();
	}

	public function display(){
		$this->stack->rewind();
		while ($this->stack->valid()){
			echo $this->stack->current();
			$this->stack->next();
			echo (($this->stack->valid() ? " - " : " ") );
		}
	}
}

$test = new albertoStack();
$test->run();
$test->display();
?>