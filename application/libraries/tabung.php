<?php

class tabung {
    function volume($jari, $tinggi){
        echo "Phi: 3.14";
        echo "<br/>";
        echo "Jari - Jari : " , $jari;
        echo "<br/>";
        echo "Tinggi : " , $tinggi;
        echo "<br/>";
        echo "<br/>";

        $volume = 3.14 * $jari * $jari * $tinggi;
        echo "Volume tabung adalah " , $volume;
        echo "<hr/>";

        $Lp_tabung = 2 * 3.14 * $jari * ($jari + $tinggi);
        echo "Luas permukaan tabung adalah " , $Lp_tabung;
        echo "<hr/>";

        $L_selimut = 2 * 3.14 * $jari * $tinggi;
        echo "Luas selimut tabung adalah " , $L_selimut;
        echo "<hr/>";
    }