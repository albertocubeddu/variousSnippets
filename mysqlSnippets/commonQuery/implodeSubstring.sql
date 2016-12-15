#Example how to transform a GROUP_CONCAT in an Array and perform some operation on it. 
#In this case we are taking the 1 and -1 value and we are doing a subtraction

SELECT
	SUBSTRING_INDEX(  SUBSTRING_INDEX(GROUP_CONCAT(t1.score),',',2),',',1) -
	SUBSTRING_INDEX(  SUBSTRING_INDEX(GROUP_CONCAT(t1.score),',',2),',',-1) as pointsDifference
FROM table_1 as t1
GROUP BY group_id;

