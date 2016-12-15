#Retrieve the GREATEST value from different column and store the name of the column
SELECT CASE GREATEST(`column_1`,`column_2`, `column_3`, `column_4`, `column_5`)
    WHEN `column_1` THEN "column_1_name"
    WHEN `column_2` THEN "column_2_name"
    WHEN `column_3` THEN "column_3_name"
    WHEN `column_4` THEN "column_4_name"
    WHEN `column_5` THEN `column_5_name`
    ELSE 0
    END AS max_column,
  GREATEST(`column_1`,`column_2`, `column_3`, `column_4`, `column_5`) as max_value 
FROM table
GROUP BY some_column;