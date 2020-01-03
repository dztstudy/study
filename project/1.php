<?php
require_once "DAOPDO.class.php";
$configs=array("dbname"=>"test");
$pdo=DAOPDO::getSingleton($configs);
$sql="select * from users";
$arr=$pdo->fetchAll($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        html,body{
            width: 100%;
            height: 100%;
        }
        table{
            width: 400px;
            background-color: red;
            border: 1px solid #000;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<table border="1"cellspacing="0">
    <tr>
        <th>姓名</th>
        <th>密码</th>
        <th>昵称</th>
        <th>操作</th>
    </tr>
    <?php foreach ($arr as $key=>$value) { ?>
        <tr>
            <td><?php echo $value['name']?></td>
            <td><?php echo $value['pass']?></td>
            <td><?php echo $value['rname']?></td>
            <td><a id="<?php echo $value['id']?>" href="2.php">删除</a></td>
        </tr>
    <?php } ?>
</table>

<script src="jquery.min.js"></script>
<script>
    $("a").click(function () {
        var $id=$(this).attr("id");
        $.ajax({
            url:"02.php",
            type:"post",
            data:{id:$id},
            dataType:"json",
            success:function (data) {
                if (data.code==1){
                    alert("删除成功");
                } else {
                    alert("删除失败");
                }
            }
        })
    })

</script>
</body>
</html>
