<?php 
/*
This snippet is useful when you need to traverse the array in two parts.
$postInRow is the derived array from array_chunk
$post are the element of the array

OUTPUT:
Iteration
	one, two, three,
Iteration
	four, five, six,

 */
$posts=array("one","two","three","four","five","six");
foreach(array_chunk($posts, 3) as $postsInRow): 
	$last_key = end(array_keys($postsInRow));
	echo "\nIteration\n";
	foreach($postsInRow as $key => $post):
		echo $last_key == $key ? "{$post}" : "{$post}, ";
	endforeach;
endforeach; 