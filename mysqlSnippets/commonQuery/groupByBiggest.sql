#Match all the line with a smallest < bigger number and check the left joined table to see that no bigger date has found.

SELECT s.*
FROM `group_table` o                    # 's' from 'smallest extract in group'
  LEFT JOIN `group_table` b             # 'b' from 'bigger extract in group'
      ON o.id = b.id AND o.number < b.number
WHERE b.number is NULL                 # bigger date not found