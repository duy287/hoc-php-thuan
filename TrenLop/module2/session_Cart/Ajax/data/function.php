<?php

function findProduct( $id, $array){
    foreach($array as $item){
        if($id == $item['id']){
            return $item;
        }
    }
    return [];
}
?>