<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailer OTP Authentication</title>
</head>

<body>
    <form method="POST" id="myform">
        Enter your Email <br>
        <input type="email" name="email" required id="email"  autofocus> <br> <br>

        Enter your name <br>
        <input type="name" name="name" required id="email" > <br> <br>

        <input type="button" id="sendOtp" value="Click here to Receive OTP" onclick="sendotp()"> <br> <br> <br> 
        <div id="result"></div>
    </form>

    <script> 
        function sendotp(){
            var result = document.getElementById("result");
            result.innerHTML = "Sending Verification Link";
            // alert("send otp is here");
            var request = new XMLHttpRequest();
            request.open("POST" , "mailer.php");

            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById("result").innerHTML = this.responseText;
                }
            };

            var myform = document.getElementById("myform");
            var formdata = new FormData(myform);
            request.send(formdata);
        }
    </script>
</body>

</html>