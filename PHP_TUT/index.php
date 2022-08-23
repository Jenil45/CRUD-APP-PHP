<?php


    // To print anything
    echo "Hello World <br>";

    // Making a variable
    $name = "My name is Jenil";

    echo "<h1>" .$name. "</h1>";
    echo "<h2>" .$name. "</h2>";
    echo "<h3>" .$name. "</h3>";
    echo "<h4>" .$name. "</h4>";
    echo "<h5>" .$name. "</h5>";

    // Data type
    $x = "Jenil";
    var_dump($x);                   // use to know data type

    $y = 500;
    var_dump($y);
    $z = 500.500;
    var_dump($z);
    $p = false;
    var_dump($p);

    // Constant variable define(var_name , value , case-sensitive)
    define("num" , 500);
    echo "<br> Constant value is ".num;
        // we can't use $ sign with constants
        // constants are global variable

    
    // If statement

    $a = 30;
    $b = 30;

    // first syntax
    if($a == $b)
    {
        echo "<br>".$a." is equal to ".$b."<br>";
    }

    elseif($a > $b)
    {
        echo $a." is greater than ".$b."<br>";
    }

    else
    {
        echo $a." is less than ".$b."<br>";
    }
    // second syntax
    if($a == $b):
        echo $a." is equal to ".$b."<br>";
    endif;    


    // Switch statements

    $weekday = 2;

    switch($weekday){

        case 1 :
            echo "Today is Monday";
            break;
        case 2 :
            echo "Today is Tuesday";
            break;
        case 3 :
            echo "Today is Wednesday";
            break;
        case 4 :
            echo "Today is Thursday";
            break;
        case 5 :
            echo "Today is Friday";
            break;
        case 6 :
            echo "Today is Saturday";
            break;
        case 7 :
            echo "Today is Sunday";
            break;
        default:
            echo "Enter a valid weekday";
        break;    
    }

   // Ternary operator
   // (condition)? True statement : False statement
   
   $x = 10;

   ($x > 20)? $z = "Greater" : $z = "Smaller";
   
   echo "<br>".$z;;
    
   // String operator
   $a = "Hello";
   $a .= "World";
   echo "<br>".$a;

   // while loop

   $a = 1;

   while($a <= 10)
   {
       echo "<br> <li> Hello Jenil";
       $a = $a + 1;
   }

   // do while loop
   $a = 1;

   do{

    echo "<br> Hello guys";
    $a = $a + 3;
   }while($a <= 10);

   // for loop

   for ($i=1; $i <= 10; $i++) { 
       echo "<br> Hi bros";
   }

   // nested loop

   echo "<br>";

   for ($i=1; $i <= 100 ; $i= $i + 10) { 
       for ($j=$i; $j < $i + 10 ; $j++) { 
           echo $j." ";
       }

       echo "<br>";
   }

   // function 

   function greet()
   {
       echo "<br>GOOD MORNING";
   }

   greet();
   greet();
   greet();

   // function with parameters

   function sum($a , $b)
   {
       echo $a + $b . "<br>";
   }

   sum(15,20);
   sum(25,30);
   sum(35,40);

   
?>
