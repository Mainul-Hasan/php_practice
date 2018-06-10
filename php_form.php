<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php Form</title>
    <style>
        body{
            background-color: #8b8b8b;
            overflow: hidden;
        }
        p{
            padding: 0;
            margin: 0;
        }
        h1,h2,h3,h4,h5,h6{
            padding: 0;
            margin: 0;
        }
        .container{
            display: flex;
        }
        .error{
            color: red;
        }
        .form_class{
            background-color: aliceblue;
            padding: 10px;
        }
        .display_input{
            background-color: #ebebeb;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    // define input variables and set them to empty
    $name = $email = $website = $comment = $gender = "";
    // define error input variables and set them to empty
    $nameErr = $emailErr = $genderErr = $websiteErr = "";

    // define the function for performing validation
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Run validation if the method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //name
        if (empty($_POST["name"])){
            $nameErr = "Name is required";
        } else {
	        $name = test_input($_POST["name"]);
	        // check if name only contains letters and whitespace
	        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		        $nameErr = "Only letters and white space allowed";
	        }
        }
        //email
	    if (empty($_POST["email"])){
		    $emailErr = "Email is required";
	    } else {
		    $email = test_input($_POST["email"]);
		    // check if e-mail address is well-formed
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $emailErr = "Invalid email format";
		    }
	    }
	    //website
	    if (empty($_POST["website"])){
		    $website = "";
	    } else {
		    $website= test_input($_POST["website"]);
		    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
			    $websiteErr = "Invalid URL";
	        }
	    }
	    //comment
	    if (empty($_POST["comment"])){
		    $comment = "";
	    } else {
		    $comment = test_input($_POST["comment"]);
	    }
	    //gender
	    if (empty($_POST["comment"])){
		    $genderErr = "Gender is required";
	    } else {
		    $gender = test_input($_POST["gender"]);
	    }
    }
    ?>
    <section class="container">
        <div class="form_class">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h2>Fill up the form</h2>
                Name: <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error">* <?php echo $nameErr; ?></span>
                <br/><br/>
                E-mail: <input type="text" name="email" value="<?php echo $email ?>">
                <span class="error">* <?php echo $emailErr; ?></span>
                <br/><br/>
                Website: <input type="text" name="website" value="<?php echo $website; ?>">
                <span class="error">* <?php echo $websiteErr; ?></span>
                <br/><br/>
                Comment: <textarea name="comment" cols="40" rows="5"><?php echo $comment; ?></textarea>
                <br/><br/>
                Gender:
                <br/>
                <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked"; ?> >Male
                <input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked"; ?> >Female
                <input type="radio" name="gender" value="other" <?php if (isset($gender) && $gender=="other") echo "checked"; ?> >Other
                <span class="error">* <?php echo $genderErr;?></span>
                <br/><br/>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="display_input">
            <h2>Your Input: </h2>
            <h3>Name: </h3> <p><?php echo $name ?></p>
            <h3>Email: </h3> <p><?php echo $email ?></p>
            <h3>Website: </h3> <p><?php echo $website ?></p>
            <h3>Comment: </h3> <p><?php echo $comment ?></p>
            <h3>Gender: </h3> <p><?php echo $gender ?></p>
        </div>
    </section>
</body>
</html>