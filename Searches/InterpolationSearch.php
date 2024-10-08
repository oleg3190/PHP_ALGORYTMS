<?php

сложность 
O(1) 
O(log log n)
O(n)
/**
 * Interpolation Search********
 *Функция interpolationSearch реализует алгоритм интерполяционного поиска, который служит для поиска элемента в отсортированном массиве. 
 Этот метод более эффективен, чем бинарный поиск, когда данные распределены равномерно. [10, 20, 30, 40, 50]

Инициализация переменных:

$length: длина массива (последний индекс).
$low: начальный индекс (0).
$high: конечный индекс (длина массива - 1).
$position: переменная для хранения позиции найденного элемента (по умолчанию -1).

Алгоритм требует, чтобы массив был отсортирован. В противном случае результаты будут неправильными.
Интерполяционный поиск может иметь лучшую производительность, чем бинарный поиск, 
особенно для равномерно распределенных данных, но в худшем случае его сложность может составлять O(n).
 
 * Description***********
 * Searches for a key in a sorted array
 *
 *
 * How************
 * Loop through the array:
 * Determine the index from the low and high indices
 * if the (value of index in array) is = key return the "POSITION", end loop
 * if the (value of index in array) is < key increase the low index
 * if the (value of index in array) is > key decrease the high index
 * repeat the loop
 */
function interpolationSearch($arr, $key)
{
    $length = count($arr) - 1;
    $low = 0;
    $high = $length;
    $position = -1;
    //loop, between low & high
    while ($low <= $high && $key >= $arr[$low] && $key <= $arr[$high]) {
        //GET INDEX
        $delta = ($key - $arr[$low]) / ($arr[$high] - $arr[$low]);
        $index = $low + floor(($high - $low) * $delta);

        //GET VALUE OF INDEX IN ARRAY...
        $indexValue = $arr[$index];

        if ($indexValue === $key) {
            //index value equals key
            //FOUND TARGET
            //return index value
            $position = $index;
            return (int) $position;
        } elseif ($indexValue < $key) {
            //index value lower than key
            //increase low index
            $low = $index + 1;
        } elseif ($indexValue > $key) {
            //index value higher than key
            //decrease high index
            $high = $index - 1;
        }
    }

    //when key not found in array or array not sorted
    return null;
}
