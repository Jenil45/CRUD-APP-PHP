<?php

$fptr = fopen("myFile.txt" , "r");                                // fopen(file_name , file_mode);

/*

if(!$fptr)
{
    die("Unable to open file.");
}

// to read file
$content = fread($fptr , filesize("myFile.txt"));                   // fread(file_pointer , file_size);
fclose($fptr);                                                      // fclose(file_pointer);
echo $content;

*/

/*  

// fgets() reads file line by line
echo fgets($fptr);
echo fgets($fptr);
echo fgets($fptr);
echo fgets($fptr);

while($a=fgets($fptr))
{
    echo $a;
}
*/

/*

// fgetc() reads file character by character
while($a=fgetc($fptr))
{
    echo $a;
    break;
}
*/
?>