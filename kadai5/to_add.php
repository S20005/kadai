<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>レシピサイト</title>
</head>
<body>

レシピ登録<br />
<br />
<form method="post" action="to_add_check.php" enctype="multipart/form-data">
料理名を入力。<br />
<input type="text" name="name" style="width:200px"><br />
材料を入力。<br />
<input type="text" name="foods" style="width:500px"><br />
レシピを入力。<br />
<input type="text" name="cook" style="width:500px" ><br />
画像を選択。<br />
<input type="file" name="gazou" style="width:400px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="登録">
</form>

</body>
</html>