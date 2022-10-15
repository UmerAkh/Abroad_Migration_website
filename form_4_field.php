
<link rel = "stylesheet" href="css/form_4_field.css?1421181591">
<?php
    $country_field =$_SESSION["country_1"];
?>

<form class="form-styling" action="" method="post">
    <div class="input-group">
        <img class="icon__value form-icon" src="icon/Country_Icon_assessment.svg" alt="First slide">
        <input disabled value="<?php echo (isset($country_field))?$country_field:"";?>" style="font-size: 1.4rem;" id="country_field" type="text" class="form-control form-text-field" name="country_field" placeholder="Select Country">
    </div>
    <div class="input-group">
        <img class="icon__value form-icon" src="icon/user.svg" alt="First slide">
        <input maxlength="50" required style="font-size: 1.4rem;" id="name_field" type="text" class="form-control form-text-field" name="name_field" placeholder="Enter Name">
    </div>

    <div class="input-group">
        <img class="icon__value form-icon" src="icon/email-icon.svg" alt="First slide">
        <input  maxlength="40" required style="font-size: 1.4rem;" id="email_field" type="email" class="form-control form-text-field" name="email_field" placeholder="Enter Email" >
    </div>

    <div class="input-group">
        <img class="icon__value form-icon" src="icon/phone-icon.svg" alt="First slide">
        <input maxlength="12" style="font-size: 1.4rem;" id="phone_field" type="text" class="form-control form-text-field" name="phone_field" placeholder="Enter Phone">
    </div>

    <div class="input-group" style='height: max-content !important;'>
        <img class="icon__value form-icon" src="icon/message-icon.svg" alt="First slide">
        <textarea maxlength="500" style="font-size: 1.4rem;" class="form-control form-text-field" rows="5" id="comment_field" name="comment_field"></textarea>                
    </div>
    <button onclick="reload()"class="custom-button-styling-2" name="country_apply-form">
        Apply Now
    </button>
    

</form>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';
    $hello = TRUE;
    $names = $email = $phone_number = $comment = "";
    $sendEmailFlag = 1;

    $somevar = 0;

    if(isset ($_POST['country_apply-form'])){
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
        sendDataToDB($names, $country_field, $phone_number, $comment, $email);
        sendMail($names, $country_field, $phone_number, $comment, $email);
    }

    function sendDataToDB($names, $country, $phone_number, $comment, $email){
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
            $stmt = $dbconn->prepare("INSERT INTO apply_country 
            (name, email, phone_number, country, comment)
            VALUES (:name, :email, :phone_number, :country, :comment)");
            $stmt->bindValue(':name', $names);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone_number', $phone_number);
            $stmt->bindValue(':country', $country);
            $stmt->bindValue(':comment', $comment);

            $stmt->execute();
        } catch (Exception $e) {
            echo ('An error has occured ('.$e.'): '.mysql_errno());		
        }	
    }

    function sendMail($names, $country, $phone_number, $comment, $email){
        include 'credential-email-mysql.php';
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Mailer = "smtp";

        $mail->SMTPDebug  = 1;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
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
        $mail->Subject = $country." immigration Application Submitted by ".$names;
        $content = 'Hello,<br><br> <b>Immigration Application has been submitted  by '.$names.'</b><br><br>'
        .'Name: '.$names.'<br>'
        .'Applicant Email: '.$email.'<br>'
        .'Selected Country: '.$country.'<br>'
        .'Phone Number: '.$phone_number.'<br>'
        .'<br>Comments: '.$comment.'<br><br><br>Thanks,';


        $mail->MsgHTML($content); 

            if(!$mail->Send()) {
            } 

    }
      
?>

<script >
           if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
