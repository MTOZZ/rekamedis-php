<?php
session_start();

include_once "conn.php";

//koneksi
$koneksi = mysqli_connect($koneksi['host'],$koneksi['user'],$koneksi['pass'],$koneksi['db']);
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
//fungsi base url
function base_url($url=null){
    $base_url= "http://localhost/rumahsakit";
    if($url != null){
        return $base_url."/".$url;
    }else{
        return $base_url;
    }
}
?>