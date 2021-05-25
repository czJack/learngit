<?php


namespace app\index\controller;

/**
 * Class StackOnArray
 * @package app\index\controller
 * @title 数组实现栈（顺序栈）
 */
class StackOnArray
{
    public $data; //数组
    public $head; //头指针

    public function __construct()
    {
        $this->data = [];
        $this->head = -1;
    }

    /**
     * @title 入栈
     * @user: cz9384
     * @return
     * @Date: 2021/5/24
     * @throws
     */
    public function push($data = null)
    {
        if (null === $data) {
            return false;
        }

        $this->head++;
        $this->data[$this->head] = $data;

        return true;
    }

    /**
     * @title 出栈
     * @user: cz9384
     * @return
     * @Date: 2021/5/24
     * @throws
     */
    public function pop()
    {
        if ($this->head === -1) {
            return false;
        }

        $data = $this->data[$this->head];
        $this->head--;

        return $data;
    }

    /**
     * @title 获取栈长度
     * @user: cz9384
     * @return
     * @Date: 2021/5/24
     * @throws
     */
    public function getLength()
    {
        return $this->head + 1;
    }

    /**
     * @title 获取栈首元素
     * @user: cz9384
     * @return
     * @Date: 2021/5/24
     * @throws
     */
    public function top()
    {
        if ($this->head === -1) {
            return null;
        }
        return $this->data[$this->head];
    }
}