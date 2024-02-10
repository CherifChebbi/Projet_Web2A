<?php 
class XLS{
static function export($datas,$filename){
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=file.xls");  
    // header("Pragma: no-cache"); 
    // header("Expires: 0");

    $i =0;
    foreach($datas as $v){
        if($i==0){
        echo '"'.implode('";"',array_keys($v)).'"'."\n";

    }
    echo '"'.implode('";"',$v).'"'."\n";
    $i++;
}
}
}