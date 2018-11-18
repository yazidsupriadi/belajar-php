<?php

class contohStatic{

    //konstanta
    const nama='yazid';

    public static $angka=1;
    public static function halo(){
        return "hallo".self::$angka;
    }

}

echo contohStatic::halo();
echo "<br>";

echo contohStatic::nama;


//magic constant
echo __LINE__;
echo "<br>";
echo __FILE__;
?>