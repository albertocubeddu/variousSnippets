<?php
/* 
	SplMaxHeap/SqlMinHeap extends SplHeap implements Iterator , Countable.
	
	Description of a max heap:
	A max-heap is a complete binary tree in which the value in each internal node is greater than or equal to the values in the children of that node.
	The root node is always greater than other node in the tree.

	Using: 
	It's used for sort item in the best way as possible. 

	Danger:
	If you retrive the element from the heap you DESTROY the heap!
*/


class albertoHeap{
	private $heap;

	public function __construct(SplHeap $heap){
		$this->heap = $heap;
	}
	
	public function run(){
		$this->heap->insert(3);
		$this->heap->insert(4);
		$this->heap->insert(1);
		$this->heap->insert(7);
		$this->heap->insert(4);
		$this->heap->insert(2);
		$this->heap->insert(9);
		$this->heap->insert(9);
	}

	public function display(){
		$className=get_class($this->heap);
		print("I am a {$className} <br/>");
		print("the heap has {$this->heap->count()} elements <br/>");
		while ($this->heap->valid()){
			echo $this->heap->current(), PHP_EOL;
			$this->heap->next();		
			echo (($this->heap->isEmpty()) ? " " : " - ");
		}
		echo "<br><br>";
	}
}

// We use a max heap if we want the value stored from the biggest to the smallest.
$maxheap = new SplMaxHeap();	
$testMax = new albertoHeap($maxheap);
$testMax->run();
$testMax->display();

// Reverse of the MaxHeap, so from the smallest to the biggest!
$minheap = new SplMinHeap();	
$testMin = new albertoHeap($minheap);
$testMin->run();
$testMin->display();








?>
