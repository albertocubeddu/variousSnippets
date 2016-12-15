#Most basic solution
SELECT * FROM tb1 
	JOIN tb2
	ON tb1.col = tb2.col OR (tb1.col IS NULL AND tb2.col IS NULL);

#Best option
#In this case we are using the NULL-SAFE operator
SELECT * FROM tb1 
	JOIN tb2
	ON tb1.col <=> tb2.col;

