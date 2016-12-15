#Null cheatsheet

mysql> SELECT 0 IS NULL, 0 IS NOT NULL, '' IS NULL, '' IS NOT NULL;

| 0 IS NULL | 0 IS NOT NULL | '' IS NULL | '' IS NOT NULL |
| --------- | ------------- | ---------- | -------------- |
|         0 |             1 |          0 |              1 |
