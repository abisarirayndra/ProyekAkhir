<?php

namespace App;

class Helper
{
    public static function hari($isi){
        $array = explode(',',$isi);
        for ($i=0; $i < count($array); $i++) { 
            if($array[$i]==1)
                $array[$i] = 'Senin';
            elseif ($array[$i]==2)
                $array[$i] = 'Selasa';
            elseif ($array[$i]==3)
                $array[$i] = 'Rabu';
            elseif ($array[$i]==4)
                $array[$i] = 'Kamis';
            elseif ($array[$i]==5)
                $array[$i] = "Jum'at";
            elseif ($array[$i]==6)
                $array[$i] = 'Sabtu';
            elseif ($array[$i]==7)
                $array[$i] = 'Minggu';
        }
        return implode(', ',$array);
    }
}
