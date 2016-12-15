$var = 	| isset($var) 	| empty ($var) 	| is_null($var)
 ---  	| ----------- 	| ------------ 	| -------------
“”   	| TRUE        	| TRUE         	| FALSE	 	
” ”  	| TRUE      	| FALSE 	   	| FALSE
FALSE 	| TRUE 		    | TRUE 	       	| FALSE
TRUE  	| TRUE        	| FALSE        	| FALSE
array() | TRUE 			| TRUE 		   	| FALSE	
NULL 	| FALSE			| TRUE 		   	| TRUE
array() | TRUE 			| TRUE 		   	| FALSE
"0"		| TRUE 			| TRUE 		   	| FALSE
0		| TRUE 			| TRUE 		   	| FALSE
0.0	 	| FALSE 		| TRUE 		   	| TRUE
var $a 	| TRUE 			| FALSE		   	| FALSE
(“\ 0”) | TRUE 		    | FALSE        	| FALSE