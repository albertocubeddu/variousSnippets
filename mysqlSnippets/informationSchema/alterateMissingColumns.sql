#Comparing COLUMNS of two databases by the TABLE_SCHEMA and output an ALTER statments.
#Compare which filed are present in database_2 BUT ARE NOT PRESENT in database_1
#At the end of the query you can copy paste the result checkout the database_1 and align it. 

SELECT CONCAT('ALTER TABLE ', t2.TABLE_NAME, ' ADD COLUMN ', t2.COLUMN_NAME, ' ' , t2.COLUMN_TYPE, ',')
FROM

	(SELECT * FROM COLUMNS WHERE TABLE_SCHEMA='database_2') AS t2
	LEFT JOIN
	(SELECT * FROM COLUMNS WHERE TABLE_SCHEMA='database_1') AS t1
	ON t1.TABLE_NAME = t2.TABLE_NAME AND t1.COLUMN_NAME = t2.COLUMN_NAME

WHERE t1.COLUMN_NAME IS NULL
