<?php

namespace App\Utils;

class Arrays {

    public static function prepareArgs(Array $pattern, Array $given){
        foreach($given as $key => $val){
            $pattern[$key] = $val;
        }
        return $pattern;
    }

}



