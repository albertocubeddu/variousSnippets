#Having two table with a relation 1-N we want to retrieve the last result compared to the MAX(Date)

SELECT tb1.ID, tb2.valuetoretrieve FROM table_1 AS tb1
    LEFT JOIN table_2 AS tb2 ON (tb2.ID = tb1.ID)    
    WHERE 
	(
		tb2.created_date = (
   			SELECT MAX(created_date) FROM table_2 AS tb3
   	    		WHERE  (tb3.ID = tb1.ID) 
		)
	) 
AND tb1.ID = ?
