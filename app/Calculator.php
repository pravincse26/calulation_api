<?php
namespace App;

class Calculator{

    public function calc($action,$a,$b)
    {
        switch  (trim($action))
        {
            case 'add':
                $result=$a+$b;
                break;
            case 'sub':
                $result=$a-$b;
                break;
            case 'mul':
                $result=$a*$b;
                break;
            case 'div':
                $result=$a/$b;
                break;
            default : $result="error";
        }
        return $result;
    }
}

?>
