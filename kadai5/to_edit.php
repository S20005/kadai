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
$pro_gazou_name_old=$rec['gazou'];

$dbh=null;

if($pro_gazou_name_old=='')
{
	$disp_gazou='';
}
else
{
	$disp_gazou='<img src="./gazou/'.$pro_gazou_name_old.'">';
}

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

レシピ修正<br />
<br />
<br />
<form method="post" action="to_edit_check.php" enctype="multipart/form-data">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
<input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
商品名：<br />
<input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />
材料：<br />
<input type="text" name="foods" style="width:400px" value="<?php print $pro_foods; ?>"><br />
<br />
作り方：<br />
<input type="text" name="cook" style="width:400px" value="<?php print $pro_cook; ?>"><br />
<br />
<?php print $disp_gazou; ?>
<br />
画像を選んでください。<br />
<input type="file" name="gazou" style="width:400px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="登録">
</form>

</body>
</html>