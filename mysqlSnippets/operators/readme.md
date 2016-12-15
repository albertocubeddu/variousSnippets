# Operators
List of the operators and example where has been used.

## NULL-SAFE OPERATOR
> joinOnNull(nullSafeEqual).sql

The <=> operator is equivalent to the standard SQL IS NOT DISTINCT FROM operator. 
```
mysql> SELECT 1 <=> 1, NULL <=> NULL, 1 <=> NULL;
        -> 1, 1, 0
mysql> SELECT 1 = 1, NULL = NULL, 1 = NULL;
        -> 1, NULL, NULL
```
