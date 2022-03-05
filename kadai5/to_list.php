<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>レシピサイト</title>
</head>
<body>

<?php

try{

	$dsn='mysql:dbname=kadai5;host=localhost;charset=utf8';
	$user='root';
	$password='password';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql='SELECT code,name,foods,cook FROM mst_product WHERE 1';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();

	$dbh=null;

	print 'レシピ一覧<br /><br />';

	print '<form method="post" action="to_branch.php">';
		while(true){
			$rec=$stmt->fetch(PDO::FETCH_ASSOC);
			if($rec==false){
				break;
			}
			print '<input type="radio" name="procode" value="'.$rec['code']. '">';
			print '料理名: ';
			print $rec['name'];
			print '<br/>';
			print '材料: ';
			print $rec['foods'];
			print '<br/>';
			print '作り方: ';
			print $rec['cook'];
			print '<br />';
			}
			print '<input type="submit" name="disp" value="詳細">';
			print '<input type="submit" name="add" value="追加">';
	print '</form>';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>