<?php
//first open the file
$myfile = fopen("hello.txt", "r") or die("Unable to open file!");
//then read the file
//echo fread($myfile, filesize("hello.txt"));
//at last close the file after using


//another way to read a file line by line
while(!feof($myfile)){
    echo fgets($myfile)."<br/>";
}

fclose($myfile);

?>