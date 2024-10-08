<?php
Перед использованием убедитесь, что ваш массив отсортирован.
сложность O(√n), что делает его более эффективным, чем простой линейный поиск O(n)

Инициализация:
Подсчитывается количество элементов $num в массиве.
Шаг (или блок) для прыжка вычисляется как квадратный корень из общего числа элементов: step = sqrt(num).
Поиск блока:

Сначала происходит поиск блока, в котором может находиться искомый элемент ($key).
Мы проверяем, находится ли значение последнего элемента текущего блока ($list[min($step, $num) - 1]) меньше, 
чем $key. Если это так, перемещаемся к следующему блоку.
Если предыдущий индекс ($prev) становится больше или равным количеству элементов в списке, возвращаем -1, что означает, что элемент не найден.
Линейный поиск в блоке:

После нахождения возможного блока выполняется линейный поиск внутри блока для нахождения искомого элемента.
Если элемент найден, возвращается его индекс; если нет — возвращается -1.

Jump Search является полезным методом для поиска в отсортированных массивах, 
особенно когда данные хранятся в виде массива без возможности применения бинарного поиска. 
Он сочетает в себе простоту линейного поиска с преимуществами разбивки массива на более мелкие части.
/**
   * Jump Search algorithm in PHP
   * References: https://www.geeksforgeeks.org/jump-search/
   * The list must be sorted in ascending order before performing jumpSearch
   *
   * @param Array $list refers to a sorted list of integer
   * @param integer $key refers to the integer target to be searched from the sorted list
   * @return int index of $key if found, otherwise -1 is returned
 */

function jumpSearch($list, $key)
{
    /*number of elements in the sorted array*/
    $num = count($list);

    /*block size to be jumped*/
    $step = (int)sqrt($num);
    $prev = 0;

    while ($list[min($step, $num) - 1] < $key) {
        $prev = $step;
        $step += (int)sqrt($num);
        if ($prev >= $num) {
            return -1;
        }
    }

    /*Performing linear search for $key in block*/
    while ($list[$prev] < $key) {
        $prev++;
        if ($prev == min($step, $num)) {
            return -1;
        }
    }

     return $list[$prev] === $key ? $prev : -1;
}
