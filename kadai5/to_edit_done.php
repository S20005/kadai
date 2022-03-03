<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>レシピサイト</title>
</head>
<body>

<?php

try
{

$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_foods=$_POST['foods'];
$pro_cook=$_POST['cook'];
$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou_name=$_POST['gazou_name'];

$pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_foods=htmlspecialchars($pro_foods,ENT_QUOTES,'UTF-8');
$pro_cook=htmlspecialchars($pro_cook,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=kadai5;host=localhost;charset=utf8';
$user='root';
$password='password';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE mst_product SET name=?,foods=?,cook=?,gazou=? WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_foods;
$data[]=$pro_cook;
$data[]=$pro_gazou_name;
$data[]=$pro_code;
$stmt->execute($data);

$dbh=null;

if($pro_gazou_name_old!=$pro_gazou_name)
{
	if($pro_gazou_name_old!='')
	{
		unlink('./gazou/'.$pro_gazou_name_old);
	}
}

print '修正しました。<br />';

}
catch(Exception$e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="pro_list.php">戻る</a>

</body>
</html>