<?php
$id=$_POST['id'];
//echo $id;
require_once "DAOPDO.class.php";
$con=array("dbname"=>"test");
$pdo=DAOPDO::getSingleton($con);
$sql="delete from users where id=$id";
$res=$pdo->query($sql);
if ($res){
    $arr=array(
        "code"=>1,
        "mes"=>"删除成功"
    );
    echo json_encode($arr);
}else{
    $arr=array(
        "code"=>0,
        "mes"=>"删除失败"
    );
    echo json_encode($arr);
}