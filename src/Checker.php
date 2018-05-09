<?php


namespace BracketsChecker;

class Checker
{
    private $str;

    public function set_str($str){
        $this->str = $str;
    }

    public function check(){
        $stack = [];

        try{
            foreach(str_split($this->str) as $c){
                if($c == '(' || $c == '{' || $c == '['){
                    array_push($stack, $c);
                }
                elseif($c == ')' || $c == '}' || $c == ']'){
                    end($stack);
                    if(empty($stack) || !$this->are_pair(end($stack), $c))
                        return false;
                    else array_pop($stack);
                }
            }
            return empty($stack) ? true : false;
        } catch (\Exception $e){
            $e->getMessage();
        }
    }

    private function are_pair($op, $ed){
        if($op == '(' && $ed == ')') return true;
        else if($op == '{' && $ed == '}') return true;
        else if($op == '[' && $ed == ']') return true;
        return false;
    }
}