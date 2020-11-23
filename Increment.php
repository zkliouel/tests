<?php



/**
 * Increment an array of digits
 * @param int[] $val
 *
 * @return int[]
 */
public static function increment(array $val) : array
{
    for ($i = count($val) - 1; $i >= 0; $i--) {
        if (++$val[$i] < 10)
            return $val;
        $val[$i] = 0;
    }
    $val = array_merge([1],$val);
    return $val;
}
