<?php

function setRecentProduct($item,$url)
{
    $newItem = array($item => $url);

    if (!isset($_SESSION['items'])) {
        $_SESSION['items'] = array();
    }

    if (!in_array($newItem, $_SESSION['items'])) {
        if (!isset($_SESSION['items']) && count($_SESSION['items']) < 5) {
            $_SESSION['items'] = array($newItem);
        } elseif (count($_SESSION['items']) == 5) {
            array_shift($_SESSION['items']);
            array_push($_SESSION['items'], $newItem);
        } else {
            array_push($_SESSION['items'], $newItem);
        }
    }
}


function getRecentProducts(){
    $str ="<h5>you recently also viewed:</h5>";

   // var_dump($_SESSION['items']);

    if ($_SESSION['items']>0){
        echo $str. "<ul>";
        foreach ($_SESSION['items'] as $v1){
            foreach ($v1 as $v2 => $v3){
                echo '<li ><a href=" '. $v3 . '">
                <img style="margin: 10px; width: 100px; height:auto; float:left" src="../asset/Ducks/'.$v2.'">
                </a></li>';
            }
        }  echo "</ul>";
    }else{
        echo " Nothing selected yet!";
    }
}

