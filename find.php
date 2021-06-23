/*** 查找算法 ***/

     /**
     * @title 二分查找
     * @param $data
     * @param $val
     * @user: cz9384
     * @return
     * @Date: 2021/6/23
     * @throws
     */
    function binary_find(array $data, $val)
    {
        $left = 0;
        $right = count($data) - 1;
        $find = -1;

        while(true) {
            if ($left > $right) {
                break;
            }

            $middle = (int)(($left + $right)/ 2);

            if ($data[$middle] === $val) {
                $find = $middle;
                break;
            } else if ($data[$middle] < $val) {
                $left = $middle + 1;
            } else {
                $right = $middle - 1;
            }
        }

        return $find;
    }
