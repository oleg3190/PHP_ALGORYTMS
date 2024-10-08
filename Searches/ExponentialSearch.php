<?php

Лучший случай: O(1) (если элемент находится по индексу 0)
Средний и худший случай: O(log n)

Поиск диапазона, в котором может находиться искомый элемент.
Выполнение бинарного поиска в найденном диапазоне.

Поиск диапазона:

Начинаем с индекса 1 и удваиваем его значение (то есть проверяем индексы 1, 2, 4, 8 и т.д.), пока не найдем индекс, где значение массива больше искомого значения. При этом мы гарантируем, что мы не выходим за пределы массива.
Определение границ для бинарного поиска:

floor — это индекс, на котором предыдущее значение меньше или равно искомому, а ceiling — это минимальное из текущего индекса (то есть границы, где значение превышает искомое) и длины массива.
Вызов бинарного поиска:

/*
 * Exponential Search Algorithm
 *
 * The algorithm consists of two stages.
 * The first stage determines a range in which the search key would reside
 **** if it were in the list.
 * In the second stage, a binary search is performed on this range.
 */

/**
 * @param  Array  $arr
 * @param  int  $value
 * @param  int  $floor
 * @param  int  $ceiling
 * @return int
 **/
function binarySearch($arr, $value, $floor, $ceiling)
{
    // Get $middle index
    $mid = floor(($floor + $ceiling) / 2);

    // Return position if $value is at the $mid position
    if ($arr[$mid] === $value) {
        return (int) $mid;
    }

    //Return -1 is range is wrong
    if ($floor > $ceiling) {
        return -1;
    }

    // search the left part of the $array
    // If the $middle element is greater than the $value
    if ($arr[$mid] > $value) {
        return binarySearch($arr, $value, $floor, $mid - 1);
    } else {     // search the right part of the $array If the $middle element is lower than the $value
        return binarySearch($arr, $value, $mid + 1, $ceiling);
    }
}

/**
 * @param  Array  $arr
 * @param  int  $value
 * @return int
 */
function exponentialSearch($arr, $value)
{
    // If $value is the first element of the $array return this position
    if ($arr[0] === $value) {
        return 0;
    }

    // Find range for binary search
    $i = 1;
    $length = count($arr);
    while ($i < $length && $arr[$i] <= $value) {
        $i = $i * 2;
    }
    $floor = $i / 2;
    $ceiling = min($i, $length);

    // Call binary search for the range found above
    return binarySearch($arr, $value, $floor, $ceiling);
}
