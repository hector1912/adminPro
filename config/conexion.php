<?php
    class conexion
    {        
        function conectar()
        {
            $host     = "localhost"; // Host name 
            $username = "root"; // Mysql username 
            $password = ""; // Mysql password 
            $db_name  = "dbpro"; // Database name 

            $con=@mysqli_connect($host, $username, $password, $db_name);
            if(!$con){
                die("imposible conectarse: ".mysqli_error($con));
            }
            if (@mysqli_connect_errno()) {
                die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
            }
            return $con;
        }

        function page_protect()
        {
            session_start();
            
            global $db;
            
            /* Secure against Session Hijacking by checking user agent */
            if (isset($_SESSION['HTTP_USER_AGENT'])) {
                if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
                    session_destroy();
                    echo "<meta http-equiv='refresh' content='0; url=../../login/'>";
                    exit();
                }
            }
            
            // before we allow sessions, we need to check authentication key - ckey and ctime stored in database
            
            /* If session not set, check for cookies set by Remember me */
            if (!isset($_SESSION['user_data']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level'])) {
                session_destroy();
                echo "<meta http-equiv='refresh' content='0; url=../../login/'>";
                exit();
            } else {
                
            }
            
        }
    }
    // $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // if(!$con){
    //     die("imposible conectarse: ".mysqli_error($con));
    // }
    // if (@mysqli_connect_errno()) {
    //     die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    // }
?>
