<?php

function check($seq){
    $stack = [];

    foreach(str_split($seq) as $c){
        if($c == '(' || $c == '{' || $c == '['){
            array_push($stack, $c);
        }
        elseif($c == ')' || $c == '}' || $c == ']'){
            end($stack);
            if(empty($stack) || !are_pair(end($stack), $c))
                return false;
            else array_pop($stack);
        }
    }
    return empty($stack) ? true : false;
}

function are_pair($op, $ed){
    if($op == '(' && $ed == ')') return true;
    else if($op == '{' && $ed == '}') return true;
    else if($op == '[' && $ed == ']') return true;
    return false;
}

var_dump(check('([])'));

