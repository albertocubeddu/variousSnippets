#Creating table comparing two databases by the TABLE_SCHEMA and output a CREATE statments.
#Compare which table are present in database_2 BUT ARE NOT PRESENT in database_1
#At the end of the query you can copy paste the result checkout the database_1 and align it. 


SELECT CONCAT('CREATE TABLE ',t2.TABLE_NAME,' LIKE cwatch_temp.',t2.TABLE_NAME)
	FROM
		(SELECT * FROM TABLES WHERE TABLE_SCHEMA='database_2') AS t2
		LEFT JOIN
		(SELECT * FROM TABLES WHERE TABLE_SCHEMA='database_1') AS t1
	ON t1.TABLE_NAME = t2.TABLE_NAME
WHERE t1.TABLE_NAME IS NULL
