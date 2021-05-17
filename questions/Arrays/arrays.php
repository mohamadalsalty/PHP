<?php
// 1- How to extract the value 30 from the following array?
$a = array( 10, 20, 25, 30, 40 );
echo $a[3];


// 2- How to extract the value 3 from the following array?
$string = array( "zero"=>0, "one"=>1, "two"=>2, "three"=>3, "four"=>4 );
echo $string['three'];


// 3- If you have the following array, how do you extract the value 3 from the array?
$a=[ [ 0 , 1 , 5 ] , [ 2 , [ 3 , 4 ] ] ];
echo $a[1][1][0];


// 4- If you have the following array, how do you extract the value 4 from the array?
$b=[ [0 , 1 , 5 , [ 2 , [ 3 , 4 ] ] ] ];
echo $b[0][3][1][1];


// 5- If you have the following array, how do you extract the value 4 from the array?
$c = array( "a"=>array( "b"=>0,"c"=>1), "d"=>array("e"=>2,"o"=>array("b"=>4)));
echo $c["d"]["o"]["b"];


?>