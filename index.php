<?php error_reporting(-1);
// Из  массива  А(N)  удалить  все  элементы,  стоящие  между  первым  
// минимальным и последним максимальным элементами.  
$A = [1, 2, 1, 3, 9, 7, 8, 12, 14, 16 ,14, 7, 9];

echo("A(n):<br>");
print_r($A);
echo("<br>Result:<br>");
print_r(make_this($A));


function search_last_max_val($array){  // ищет максимальное значение 
    $maxval = $array[count($array)-1];
    $maxpos = count($array)-1;
    for($i = count($array)-2; $i >= 0;$i--){
        if($array[$i] > $maxval){
            $maxval = $array[$i];
            $maxpos = $i;
        }
        if($array[$i] > $array[$i-1]){
            break;
        }
    }   
    return [$maxval, $maxpos];
}

function search_first_min_val($array){  // ищет максимальное значение 
    $minval = $array[1];
    $minpos = 1;
    for($i = 1; $i < count($array); $i++){
        if($array[$i] < $minval){
            $minval = $array[$i];
            $minpos = $i;
        }
        if($array[$i]<$array[$i+1]){
            break;
        }
    }   
    return [$minval, $minpos];
}

function delete_elem($array, $index){ // удаляет элемент из массива 
    $res = [];
    $n = 0;
    for($i = 0; $i < count($array); $i++){
        if($i == $index){
            continue;
        }else{
            $res[$n] = $array[$i];
            $n++;
        }
    }
    return $res;
}

function make_this($array){    //выполняет задание 
    $lsmax = search_last_max_val($array);
    $fsmin = search_first_min_val($array);
    $arr = $array;
    $tm = $lsmax[1];
    for($i = $fsmin[1]+1; $i < $tm; $i++){
        $arr = delete_elem($arr, $i);
        $tm--;
        $i--;
    }     
    return $arr;
}