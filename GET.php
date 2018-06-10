<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Method</title>
</head>
<body>
	<div>
        <form action="GET.php" method="get">
            Name: <input type="text" name="name">
            Email <input type="text" name="email">
            <input type="submit" value="Submit">
        </form>
	</div>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$name = $_GET['name'];
		$email = $_GET['email'];
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