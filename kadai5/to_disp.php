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

$pro_code=$_GET['procode'];

$dsn='mysql:dbname=kadai5;host=localhost;charset=utf8';
$user='root';
$password='password';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name,foods,cook,gazou FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_foods=$rec['foods'];
$pro_cook=$rec['cook'];
$pro_gazou_name=$rec['gazou'];

$dbh=null;

if($pro_gazou_name=='')
{
	$disp_gazou='';
}
else
{
	$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
}

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

詳細<br />
<br />
<br />
料理名<br />
<?php print $pro_name; ?>
<br />
材料：<br />
<?php print $pro_foods; ?>
<br />
作り方：<br />
<?php print $pro_cook; ?>
<br />
<?php print $disp_gazou; ?>
<br />
<br />
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>