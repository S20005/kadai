<?php

if(isset($_POST['disp'])==true){
	if(isset($_POST['procode'])==false)
	{
		header('Location:to_ng.php');
		exit();
	}
	$pro_code=$_POST['procode'];
	header('Location:to_disp.php?procode='.$pro_code);
	exit();
}

if(isset($_POST['add'])==true){
	header('Location:to_add.php');
	exit();
}

?>