<?php
$myfile = fopen("testfile.txt", "w") or die("Unable to open file");
$text = "John Doe\n";
fwrite($myfile,$text);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);


fclose($myfile);
?>