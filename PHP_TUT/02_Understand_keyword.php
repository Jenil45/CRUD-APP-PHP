<?php
    
    // Super global variables
    
    /* (1) $_GET :- The link will contain all the data 
    
    print_r($_GET);             // to print array
    // Get output like this : key-value pairs ====>   Array ( [email] => jenmnk.dhghj@gmail.com [pass] => dbjbk )
    
    echo '<br>'. $_GET['email'];    // for specific value
    
    */
    
    /* (2) $_POST :- The link will contain only the next path
    
    print_r($_POST);             // to print array
    // Get output like this : key-value pairs ====>   Array ( [email] => jenmnk.dhghj@gmail.com [pass] => dbjbk )
    
    echo '<br>'. $_POST['email'];    // for specific value
    
    */
    
    
    // $_REQUEST :- We can handle both get and post 
    
    
    /* (3) $_SERVER :- We can get the informations of server    
*/

/* (4) $_COOKIE :- Cookie is the samll temporary file that server makes on user's computer. The cookie can create and retrieve by using PHP
// syntax : setcookie(name, value, expire, path, domain, secure, httponly);   ==> we can create cookie by this

// $cookie_name = "jenil thakor";
// $cookie_value = "45";

// setcookie($cookie_name , $cookie_value , time() + (120) , "/");

// if(!isset($_COOKIE[$cookie_name])) {
    //     echo "Cookie named '" . $cookie_name . "' is not set!";
    //   } else {
        //     echo "Cookie '" . $cookie_name . "' is set!<br>";
        //     echo "Value is: " . $_COOKIE[$cookie_name];
        //   }
        
        
        /*
        $cookie_name = "user";
        $cookie_value = "Jenil Thakor";
        setcookie($cookie_name, $cookie_value, time() + 40, "/"); // 86400 = 1 day
        ?>
        <html>
        <body>
        
        <?php
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named '" . $cookie_name . "' is not set!";
        } else {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
        ?>
        
        </body>  </html>
        */


        
    /* (5) $_SESSION :- Used to store session

        //steps :-
        // s1 : session_start();
        // s2 : $_SESSION[name] = value;    set session name and value
        // s3 : echo $_SESSION[name];       get  session value

        // delete session 
        // s1 : session_unset();            remove all session variable
        // s2 : session_destroy();          destroy the session

        
        session_start();
        
        $_SESSION["favplayer"] = "Rohit Sharmma";
        
        echo "Session variable is set";
        
        */

    // $_FILES
    
?>


