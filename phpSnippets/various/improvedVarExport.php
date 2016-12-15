<?php
/**
 * An implementation of var_export() that is compatible with instances
 * of stdClass.
 * @param mixed $variable The variable you want to export
 * @param bool $return If used and set to true, improved_var_export()
 *     will return the variable representation instead of outputting it.
 * @return mixed|null Returns the variable representation when the
 *     return parameter is used and evaluates to TRUE. Otherwise, this
 *     function will return NULL.
 * Author: http://stackoverflow.com/questions/139474/how-can-i-capture-the-result-of-var-dump-to-a-string
 */
 
function improved_var_export ($variable, $return = false) {
    if ($variable instanceof stdClass) {
        $result = '(object) '.improved_var_export(get_object_vars($variable), true);
    } else if (is_array($variable)) {
        $array = array ();
        foreach ($variable as $key => $value) {
            $array[] = var_export($key, true).' => '.improved_var_export($value, true);
        }
        $result = 'array ('.implode(', ', $array).')';
    } else {
        $result = var_export($variable, true);
    }

    if (!$return) {
        print $result;
        return null;
    } else {
        return $result;
    }
}
