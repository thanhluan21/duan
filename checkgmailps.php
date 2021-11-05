<?php
 include_once "config.php";
 $connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
 if ( !$connection ) {
   //  echo mysqli_error( $connection );
     throw new Exception( "Database cannot Connect" );
 }
$email=$_POST["email"];
$sqlcheckmail="SELECT * FROM pharmacists  where email='$email'";
$resultCheckemail=mysqli_query($connection,$sqlcheckmail);
$check=mysqli_fetch_row($resultCheckemail);


    function abc($email){
        $a=$email;
        $email_list1 = strtolower($a);
        $email_list=$email_list1;
        require('smtp-validate-email.php');
        $from = 'a-happy-camper@campspot.net';
    
            $validator = new SMTP_Validate_Email($email_list1, $from);
            $smtp_results = $validator->validate();
            if ($smtp_results[$email_list]) {
                return 1;
            } else {
                return 0;   
           }
    } 





if($check||abc($email)==false)
{
    echo "true";
}else{
    echo "false";
}
?>