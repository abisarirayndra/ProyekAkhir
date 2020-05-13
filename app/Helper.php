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

    public static function jam_min($minutes){
        if($minutes <= 0) 
            return Date("H:i:s",strtotime("00:00:00"));
        else    
            $hasil = sprintf("%02d",floor($minutes / 60)).':'.sprintf("%02d",str_pad(($minutes % 60), 2, "0", STR_PAD_LEFT)).':00';
            return Date("H:i:s",strtotime("$hasil"));
    }

    /**
     * Mengkonversi data berformat waktu menjadi string
     *
     * @param  $time
     * @return ($hours * 60) + $minutes;
     */
    public static function time_to_int($time){
        if($time != '0') {
            list($hours, $minutes) = explode(':', $time);
            return ($hours * 60) + $minutes;
        }
        return 0;
    }

    /**
     * Mengkonversi nilai, Contoh : 1 menjadi 01
     *
     * @param  $id
     * @return $id
     */
    public static function convert_id($id){
        if( strlen($id) == 1 ){
            return '0'.$id;
        }else
            return $id;
    }
}
