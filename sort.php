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