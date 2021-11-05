<?php
//ver3

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Lf-uawZAAAAADHtI_2uCpd9VA5J_Co-zGhHGMag';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        // Verified - send email        
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
    } else {
        // Not verified - show form error        
        header('Location: contact_wrong.html');
        exit;
    }
}

?>  
 