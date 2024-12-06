<?php
session_start();

if(isset($_POST['send_enquiry'])){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $company=$_REQUEST['company'];
    $comment=$_REQUEST['comment'];
    sendenquiry($name,$email,$phone,$company,$comment);
}

function sendenquiry($name,$email,$phone,$company,$comment){
    if(!empty($name) && !empty($email) && !empty($phone) && !empty($company) && !empty($comment)){
        // echo"<script type='text/javascript'>alert('Your Application for Home Tutor successfully recieved.')</script>";
        // Send registration info on mail
        $to = "brandmarkcreation@gmail.com,coderstechnologies@gmail.com";
        $subject = "Service Enquiry from ".$name.", ".$company;

        $message = "
        <html>
        <head>
        <title>New enquiry on www.brandmarkcreation.com</title>
        </head>
        <body>
        <h1></h1>
        <label>Message Board</label>
        <table>        
        <tr>
        <td>Name      : $name</td>
        </tr>
        <tr>
        <td>Email     : $email</td>
        </tr>
        <tr>
        <td>Phone   : $phone</td>
        </tr>
        <tr>
        <td>Company : $company</td>
        </tr>
        <tr>
        <td>Requirement   : <br>$comment</td>
        </tr>
        </table>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From:  '.$email . "\r\n";

        $headers .= 'Cc: brandmarkcreation@gmail.com' . "\r\n";

        $send= mail($to,$subject,$message,$headers);
        if($send){
            // echo 'Thank You. We will contact you very soon.';
            echo"<script type='text/javascript'>alert('Message Recieved. We will contact you very soon.')</script>";
            echo '<script> window.location="index.html" </script>';
        }else{
            echo 'error';
        }		   
    }
    else{
        echo"<script type='text/javascript'>alert('SOMETHING_WENT_WRONG')</script>";
        echo '<script> window.location="index.html" </script>';
    }    
}
?>