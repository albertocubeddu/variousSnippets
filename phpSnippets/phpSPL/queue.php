<?php
/* 
	queue is a data structure. 
	
	Description of a queue:
	The queue also knowed as FIFO(First In, First Out) is an abstract data type that serve as a collection
	of elements. It has two principal function enqueue and dequeue. 

	Using: 
	It used when we need to store value and retrive the first value stored in past.
*/
class albertoQueue{
	private $queue;

	public function __construct(){
		$this->queue = new SplQueue();
	}	

	public function run(){
		$this->queue->enqueue('a');
		$this->queue->enqueue('b');
		$this->queue->enqueue('c');
		$this->queue->enqueue('d');
		$this->queue->enqueue('e');
	}

	public function insert($value){
		$this->queue->enqueue($value);
	}

	public function remove(){
		return $this->queue->dequeue();
	}

	public function display(){
		$this->queue->rewind();
		while ($this->queue->valid()){
			echo $this->queue->current();
			$this->queue->next();
			echo (($this->queue->valid() ? " - " : " ") );
		}
	}
}

$test = new albertoQueue();
$test->run();
$test->display();
?>