<?PHP
define('dbhost','localhost'); 
define('dbname','');    
define('dbpw',''); 
define('dbuname','root');
define('$conn','0');
          
 $conn =mysqli_connect(dbhost,dbuname,dbpw,dbname);
 mysqli_select_db($conn,dbname);

 if (mysqli_connect_errno()) {
        echo 'Connect failed' . mysqli_connect_error();
    }
    
mysqli_query($conn,"set character_set_server 'utf8'");
mysqli_query($conn,"SET NAMES 'utf8'");
?>