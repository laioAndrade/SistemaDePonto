<?php

function converteData( $data){
    $data = str_replace("-", "/", $data);
    echo date('d/m/Y', strtotime($data));
}

function converteDataComHora( $data){
    $data = str_replace("-", "/", $data);
    echo date('d/m/Y', strtotime($data))." ás ".date('H:i:s', strtotime($data));

}

?>