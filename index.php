<?php
$x = 1;
while ($x<=5){
    echo "The number is: $x <br>";
    $x++;
}
echo "<br>";
$x = 1;
do {
    echo "The no is $x <br>";
    $x++;
}while ($x<=5);
echo "<br>";
for ($i=0; $i <= 10; $i++){
    echo "The num is: $i <br>";
}

echo "<br>";
$students= ["red","green","blue"];
//echo "<pre>";
//print_r($students);
//echo "</pre>";

foreach ($students as $value){
    echo "$value <br>";
}

echo "<br>";

$cars = array("car1"=>"Volvo","car2"=>"audi","car3"=>"toyota");

foreach ($cars as $key=>$value){
    echo "$key.$value";
    echo "<br>";
}



?>
