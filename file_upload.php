<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
</head>
<body>
   <section class="form">
       <div class="container">
           <form action="file_upload.php" method="post" enctype="multipart/form-data">
               Upload your file: <input type="file" name="fileToUpload" id="fileToUpload">
               <br/><br/>
               <input type="submit" value="Upload Image" name="submit">
           </form>
       </div>
   </section>

   <?php
   //Run the script only if the request method is post
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   //the file upload script
	   $target_dir = "uploads/"; /*specifies the directory where the file is going to be placed*/
	   $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]); /*$target_file specifies the path of the file to be uploaded*/
	   $uploadOk = 1;
	   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); /*$imageFileType holds the file extension of the file (in lower case)*/

	   // Check if image file is a actual image or fake image
	   if (isset($_POST["submit"])) {
		   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		   /* If accessing the filename image is impossible, or if it isn't a valid picture, getimagesize() will return FALSE and generate a warning. */
		   if ($check !== false){
			   echo "File is an image - " . $check["mime"] . "." . "<br/>";
			   $uploadOk = 1;
		   } else {
			   echo "File is not an image";
			   $uploadOk = 0;
		   }
	   }

	   // Check if file already exists
	   if (file_exists($target_file)) {
		   echo "Sorry, file already exists." . "<br/>";
		   $uploadOk = 0;
	   }

	   // Check file size
	   /* If the file is larger than 500KB, an error message is displayed, and $uploadOk is set to 0*/
	   if ($_FILES["fileToUpload"]["size"] > 500000) {
		   echo "Sorry, your file is too large." . "<br/>";
		   $uploadOk = 0;
	   }

	   // Allow certain file formats
	   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." . "<br/>";
		   $uploadOk = 0;
	   }

	   // Check if $uploadOk is set to 0 by an error
	   if ($uploadOk == 0) {
		   echo "Sorry, your file was not uploaded";
		   // if everything is ok, try to upload file
	   } else {
		   /* This function checks to ensure that the file designated by filename is a valid upload file (meaning that it was uploaded via PHP's HTTP POST upload mechanism). If the file is valid, it will be moved to the filename given by destination. */
		   /* Returns TRUE on success. */
		   if ( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		   {
			   echo  " The file " . basename( $_FILES["fileToUpload"]["name"]) . " has been uploaded.";
		   } else {
			   echo "Sorry, there was an error uploading your file.";
		   }
	   }
   }
   ?>
</body>
</html>