<?php
    function polacz() {
        global $polaczenie;
        $polaczenie=mysqli_connect("localhost","root","","aplikacja");
        if($polaczenie){
            mysqli_set_charset($polaczenie, "UTF8");

            return true;
        }
        else return false; 
    }
?>