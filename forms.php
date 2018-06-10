<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Forms</title>
</head>
<body>
	<form action="forms.php" method="post">
		Name: <input type="text" name="name">
		Email <input type="text" name="email">
		<input type="submit" value="Submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['name'];
		$email = $_POST['email'];
		if (!empty($name) && !empty($email)){
			echo "Welcome $name, your email is $email";
		}
		else {
			echo "Name and/or email is empty";
		}
	}

	?>
</body>
</html>