#Create a heading and then exporting everything in CSV
SELECT "col1", "col2", "col3"
UNION ALL 
SELECT users.id, user.name, user.pass
WHERE users.active = 1
INTO OUTFILE '/tmp/user.csv'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n';


