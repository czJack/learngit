<?php

/*** 排序 ***/

/**
 * @title 冒泡排序
 * @user: cz9384
 * @return bool
 * @Date: 2021/6/2
 * @throws
 */
function bubble_sort(array &$data)
{
    $len = count($data);

    for ($i = 0; $i < $len - 1; $i++) {
        $flag = false;
        for ($j = 0; $j < $len - $i -1; $j++) {
            if ($data[$j] > $data[$j+1]) {
                swap($data, $j, $j+1);
                $flag = true;
            }
        }
        if (!$flag) {
            break;
        }
    }

    return true;
}

/**
 * @title 插入排序
 * @user: cz9384
 * @return
 * @Date: 2021/6/2
 * @throws
 */
function insert_sort(array &$data)
{
    $len = count($data);

    for ($i = 1; $i < $len; $i++) {
        $j = $i;
        $value = $data[$j];
        while($j > 0) {
            if ($data[$j-1] > $value) {
                $data[$j] = $data[$j-1];
            }
            $j--;
        }
        $data[$j] = $value;
    }

    return true;
}

/**
 * @title 选择排序
 * @user: cz9384
 * @return
 * @Date: 2021/6/2
 * @throws
 */
function select_sort(array &$data)
{
    $len = count($data);

    for ($i = 0; $i < $len - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($data[$j] < $data[$minIndex]) {
                $minIndex = $j;
            }
        }
        if ($minIndex !== $i) {
            swap($data, $minIndex, $i);
        }
    }

    return true;
}

/**
 * @title 归并排序
 * @user: cz9384
 * @return
 * @Date: 2021/6/2
 * @throws
 */
function mergeSort(array &$data)
{
    $len = count($data);
    mSort($data, 0, $len-1);
}

/**
 * @title 归并递归调用
 * @user: cz9384
 * @return
 * @Date: 2021/6/2
 * @throws
 */
function mSort(array &$data, $left, $right)
{
    if ($left >= $right) {
        return;
    }

    $middle = (int)(($left + $right) / 2);

    mSort($data, $left, $middle);
    mSort($data, $middle + 1, $right);
    merge($data, $left, $middle, $right);
}

/**
 * @title 归并排序合并数组
 * @user: cz9384
 * @return
 * @Date: 2021/6/2
 * @throws
 */
function merge(array &$data, $left, $middle, $right)
{
    $a_i = $left;
    $b_i = $middle+1;

    while($a_i <= $middle && $b_i <= $right) {
        if ($data[$a_i] < $data[$b_i]) {
            $temp[] = $data[$a_i++];
        } else {
            $temp[] = $data[$b_i++];
        }
    }

    while($a_i <= $middle) {
        $temp[] = $data[$a_i++];
    }
    while($b_i <= $right) {
        $temp[] = $data[$b_i++];
    }

    for ($i = 0,$len = count($temp);$i < $len; $i++) {
        $data[$left+$i] = $temp[$i];
    }
}

/**
 * @title 快速排序
 * @user: cz9384
 * @return
 * @Date: 2021/6/3
 * @throws
 */
function quick_sort(array &$data)
{
    $len = count($data);
    qSort($data, 0, $len-1);
}

/**
 * @title 快速排序递归实现
 * @user: cz9384
 * @return
 * @Date: 2021/6/3
 * @throws
 */
function qSort(array &$data, $left, $right)
{
    if ($left >= $right) {
        return;
    }

    $k = partition($data, $left, $right); //获取之间位置 k

    qSort($data, $left, $k-1);
    qSort($data, $k+1, $right);
}

/**
 * @title 数组分区获取中间索引
 * @user: cz9384
 * @return
 * @Date: 2021/6/3
 * @throws
 */
function partition(array &$data, $start, $end)
{
    $pivot = $data[$start]; //选择第一个值作为基准
    $i = $start + 1;
    $j = $end;

    while($i !== $j) {
        while($j !== $i) {
            if ($data[$j] < $pivot) {
                swap($data, $j, $start);
                break;
            } else {
                $j--;
            }
        }
        while($j !== $i) {
            if ($data[$i] > $pivot) {
                swap($data, $i, $start);
                break;
            } else {
                $i++;
            }
        }
    }

    return array_search($pivot, $data);
}

/**
 * @title 交换数组中两个元素
 * @user: cz9384
 * @return
 * @Date: 2021/6/2
 * @throws
 */
function swap(array &$data, $i, $j)
{
    $temp = $data[$i];
    $data[$i] = $data[$j];
    $data[$j] = $temp;
}