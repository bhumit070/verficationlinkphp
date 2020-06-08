<?php
session_start();
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require_once "vendor/autoload.php";

//  PHPMailer Object

 if(isset($_POST['email']) && isset($_POST['name'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $link ="localhost/otp/verification.php?token=".password_hash($email , PASSWORD_DEFAULT);
    $conn = mysqli_connect("localhost","bhumit070","Bhum!t070","verification");
    $sqluser = mysqli_query($conn , "insert into tbl_user (name , email) values ('$name','$email')") or die(mysqli_error($conn));
    if($sqluser) {
        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();                         //Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';     //Specify main SMTP server
        $mail->SMTPAuth   = true;                //Enable SMTP authentication
        $mail->Username   = 'addyouremail@email.com';  //    SMTP username
        $mail->Password   = 'enteryourpassword';        //  SMTP password
        $mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
        $mail->Port       = 587;                 //TCP port to connect to

        //adding sender's details

        $mail->setFrom('bhumit070@gmail.com', 'Bhoomit Ganatra');            
        $mail->addAddress($email , $name);  

        //   if you want to send files uncomment this 
        //   $mail->addAttachment('url', 'filename');     Name is optional

        //   email content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Verification Link for <b> BEEFORUM </b>';
        $mail->Body    = 'Hello '.$name.'<br>Your verificatiob link to signup into <b> BEEFORUM </b> is <b> <a href=" ' . $link . ' "> LINK <a/> </b>';
        $mail->AltBody = 'this is alt text for test message';

        if($mail->send()) {
            echo "OTP sent successfully";
        }
        else {
            echo "mailer error : ".$mail->ErrorInfo;
        }
        }
    }
    else {
        echo "Error" ;
    }


?>
