<?php

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    echo "Email is : ".$email;
}
else {
    echo "email is not set";
}