#Retrieve the (n) and (n-1) value by a certain date.
# (?) is The date that you want to retrieve and compare with the older one.
 
SELECT t1.col1,
    (
    	SELECT GROUP_CONCAT(t2.value_to_retrieve ORDER BY as_of_date DESC LIMIT 2) 
    	FROM table_2 as t2 
    		WHERE t2.col1 <=> t1.col1 
    		AND t2.as_of_date <= ? 
    	GROUP BY t2.col1) as value_retrieved
    )
FROM table_1 as t1 
WHERE t1.as_of_date = ?
GROUP BY col1;