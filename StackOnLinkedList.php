<?php


namespace app\index\controller;

/**
 * Class StackOnLinkedList
 * @package app\index\controller
 * @title 用链表实现栈（链式栈）
 */
class StackOnLinkedList
{
    public $head; //头指针
    public $length; //链表大小

    public function __construct()
    {
        $this->head = new SingleLinkedListNode();
        $this->length = 0;
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

        $node = new SingleLinkedListNode($data);
        $node->next = $this->head->next;
        $this->head->next = $node;
        $this->length++;

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
        if ($this->length === 0) {
            return false;
        }

        $deleteNode = $this->head->next;
        $this->head->next = $this->head->next->next;
        $this->length--;
        unset($deleteNode);

        return true;
    }

    public function top()
    {
        if ($this->length === 0) {
            return null;
        }
        return $this->head->next;
    }

    public function getLength()
    {
        return $this->length;
    }
}