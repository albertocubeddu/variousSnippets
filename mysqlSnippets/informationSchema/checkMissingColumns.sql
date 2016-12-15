#Comparing TABLE and COLUMNS of two databases by the TABLE_SCHEMA and output the difference
#The output is the table missing from database_1 but are prenset in database_2

SELECT t2.TABLE_NAME, t2.COLUMN_NAME
	FROM
		(SELECT * FROM COLUMNS WHERE TABLE_SCHEMA='database_2') AS t2
		LEFT JOIN
		(SELECT * FROM COLUMNS WHERE TABLE_SCHEMA='database_1') AS t1
	ON t1.TABLE_NAME = t2.TABLE_NAME AND t1.COLUMN_NAME = t2.COLUMN_NAME
WHERE t1.COLUMN_NAME IS NULL