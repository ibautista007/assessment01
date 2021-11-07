<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'])) {
   
        $to      = 'anime.mxa@gmail.com';
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $subject = 'WEBMAIL FROM : '. $name;
        $headers = 'From: '. $email ."\r\n" .
        'Reply-To: '. $email ."\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $message  = $_POST["text"] . "\nPhone number is:" . $phone . "\nEmail: " . $email;
        
        //Copy to customer
        if(isset($_POST['copy']) &&$_POST['copy'] == 'yes'){
            mail($email, $subject, $message);    
        }

        mail($to, $subject, $message, $headers);
        header('Location: contact.html');
        exit;
        

}

?>  
 