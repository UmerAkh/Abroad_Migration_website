<link rel = "stylesheet" href="css/contact-us.css?1422515178" type="text/css"/>
<link rel = "stylesheet" href="css/form_4_field.css?1421615378" type="text/css"/>
<link rel="shortcut icon" href="icon/FAVICON.svg" type="image/svg+xml"/>

<?php
        $title = "Header";                   // (1) Set the title
        include "header.php";                 // (2) Include the header
        # read up on session.auto_start
        // $_SESSION["country_1"] = "Canada";
?>

<?php
    $title = "image slider";                   // (1) Set the title
    include "image-slider.php";                 // (2) Include the header
?>

<div class="assessment-form-main-container">
  <div class="item1-form"> 
        <form class="form-styling-2" action="contact-us.php" method="post">
            <div class="heading-styling-contact-us">
                <b>KEEP IN TOUCH WITH US</b>
            </div>

            <div class="input-group">
                <img class="icon__value form-icon" src="icon/user.svg" alt="First slide">
                <input maxlength="50" required style="font-size: 1.6rem;" id="name_field" type="text" class="form-control form-text-field" name="name_field" placeholder="Enter Name">
            </div>

            <div class="input-group">
                <img class="icon__value form-icon" src="icon/email-icon.svg" alt="First slide">
                <input maxlength="40" required style="font-size: 1.6rem;" id="email_field" type="email" class="form-control form-text-field" name="email_field" placeholder="Enter Email" >
            </div>

            <div class="input-group">
                <img class="icon__value form-icon" src="icon/phone-icon.svg" alt="First slide">
                <input maxlength="12" style="font-size: 1.6rem;" id="phone_field" type="text" class="form-control form-text-field" name="phone_field" placeholder="Enter Phone">
            </div>

            <div class="input-group" style='height: max-content !important;'>
                <img class="icon__value form-icon" src="icon/message-icon.svg" alt="First slide">
                <textarea required maxlength="500" style="font-size: 1.6rem;" class="form-control form-text-field" rows="5" id="comment_field" name="comment_field"></textarea>                
            </div>
            
            <button class="custom-button-styling-2" name="contact-us-form">
                Message
            </button>
        </form>
 
  </div>
  <div class="office-info-styling at-container-2" style="">
        <div class="at-item-2">
            <h2 class="heading-styling-contact-us" style="text-align-last: center;"><b >ABU DHABI OFFICE</b></h2>
            <p>206 The Citadel Tower</p>
            <p> Business bay Dubai</p>
            <p>+971 44 581018</p>
            <p>Info@abroadmigrationdc.com</p>
        </div>
  </div>
</div>


<?php
        $title = "Footer";                   // (1) Set the title
        include "footer.php";                 // (2) Include the header
        
?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';
    
    $names = $email = $phone_number = $comment = "";
    if(isset ($_POST['contact-us-form'])){
        $names = $_POST['name_field']; //not null
        $email = $_POST['email_field']; //not null
        $phone_number = $_POST['phone_field'];
        $comment = $_POST['comment_field'];
          if (empty($phone_number)) {
            $phone_number = 'None';
          }
      
          if (empty($comment)) {
            $comment = 'None';
          }
        sendDataToDB($names, $phone_number, $comment, $email);
        sendMail($names, $phone_number, $comment, $email);
    }
    
    function sendDataToDB($names, $phone_number, $comment, $email){
        include 'credential-email-mysql.php';
        $servername = "82.180.175.51";
        $db = "u255565930_Abroad_Mig_web";
        $dbconn = new PDO('mysql:host=82.180.175.51;dbname=u255565930_Abroad_Mig_web',
        $username,
        $password,
        array(PDO::ATTR_PERSISTENT => true));
    
        if($dbconn) {
            // echo "Connection Successful";
        }

        try {
            $stmt = $dbconn->prepare("INSERT INTO contact_us 
            (name, email, phone_number, comment)
            VALUES (:name, :email, :phone_number, :comment)");
            $stmt->bindValue(':name', $names);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone_number', $phone_number);
            $stmt->bindValue(':comment', $comment);
        
            $stmt->execute();
        } catch (Exception $e) {
            echo ('An error has occured ('.$e.'): '.mysql_errno());		
        }	
    }
    
    function sendMail($names, $phone_number, $comment, $email){
        include 'credential-email-mysql.php';
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
    
        $mail->SMTPDebug  = 1;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = $emailPort;
        $mail->Host       = $emailHost;
        $mail->Username   = $emailUsername;
        $mail->Password   = $emailPassword;
        $mail->SMTPDebug = false;  
    
        $mail->IsHTML(false);
        $mail->AddAddress($recipientNameEmail, "Abroad Migration Info");
        $mail->SetFrom("Website.Service@abroadmigrationdc.com", "Abroad Migration");
        $mail->AddReplyTo($emailFrom, "Abroad Migration");
        $mail->AddCC($emailFrom, "From Abroad Migration Website");
        $mail->Subject = "Message from ".$names;
        $content = 'Hello,<br><br> <b>Message received from '.$names.'</b><br><br>'
        .'Name: '.$names.'<br>'
        .'Applicant Email: '.$email.'<br>'
        .'Phone Number: '.$phone_number.'<br>'
        .'<br>Question: '.$comment.'<br><br><br>Thanks,';
        $mail->MsgHTML($content); 
            if(!$mail->Send()) {
                // echo "Error while sending Email.";
            //  var_dump($mail);
            
            } 
    }
      
?>

<script >
           if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>