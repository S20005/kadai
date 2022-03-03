<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>レシピサイト</title>
</head>
<body>

<?php

$pro_name=$_POST['name'];
$pro_foods=$_POST['foods'];
$pro_cook=$_POST['cook'];
$pro_gazou=$_FILES['gazou'];

$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_foods=htmlspecialchars($pro_foods,ENT_QUOTES,'UTF-8');
$pro_cook=htmlspecialchars($pro_cook,ENT_QUOTES,'UTF-8');

if($pro_name==''){
	print '料理名が入力されていません。<br />';
}else{
	print '料理名:';
	print $pro_name;
	print '<br />';
}

if($pro_foods==''){
	print '材料を入力してください。<br />';
}else{
	print '材料:';
	print $pro_foods;
	print '<br />';
}

if($pro_cook==''){
	print '調理法を入力してください。<br />';
}else{
	print '調理法:';
	print $pro_cook;
	print '<br />';
}



if($pro_gazou['size']>0)
{
	if($pro_gazou['size']>1000000)
	{
		print '画像が大き過ぎます';
	}
	else
	{
		move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
		print '<img src="./gazou/'.$pro_gazou['name'].'">';
		print '<br />';
	}
}

if($pro_name=='' || $pro_foods=='' || $pro_cook=='' || $pro_gazou['size']>1000000){
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print 'このレシピを登録します。<br />';
	print '<form method="post" action="to_add_done.php">';
	print '<input type="hidden" name="name" value="'.$pro_name.'">';
	print '<input type="hidden" name="foods" value="'.$pro_foods.'">';
	print '<input type="hidden" name="cook" value="'.$pro_cook.'">';
	print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'] .'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="登録">';
	print '</form>';
}

?>
</body>
</html>