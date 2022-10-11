<link rel = "stylesheet" href="css/assessment-form-page.css?1452283378" type="text/css"/>
<link rel = "stylesheet" href="css/form_4_field.css?1422512478" type="text/css"/>
<!-- <link rel = "stylesheet" href="css/style.css?1422585378"> -->

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
        <form class="form-styling" action="assessment-form-page.php" method="post">
            <div>
                <b>ASSESSMENT REQUEST</b>
            </div>
            <br>
            <div class="input-group">
                <img class="icon__value form-icon" src="icon/user.svg" alt="First slide">
                <input maxlength="50"  style="font-size: 1.4rem;" id="name_field" type="text" class="form-control form-text-field" name="name_field" placeholder="Enter Name" required>
            </div>

            <div class="input-group">
                <img class="icon__value form-icon" src="icon/email-icon.svg" alt="First slide">
                <input maxlength="50" required style="font-size: 1.4rem;" id="email_field" type="email" class="form-control form-text-field" name="email_field" placeholder="Enter Email" >
            </div>
            <div class="input-group">
                <img class="icon__value form-icon" src="icon/Country_Icon_assessment.svg" alt="First slide">
                <select required style="font-size: 1.4rem;" class="custom-select form-text-field" id="country_field" name="country_field">
                    <option selected>Select Country</option>
                    <option value="canada">Canada</option>
                    <option value="poland">Poland</option>
                    <option value="malta">Malta</option>
                    <option value="portugal">Portugal</option>
                    <option value="czech republic" >Czech Republic</option>
                    <option value="australia" disabled>Australia (soon)</option>
                </select>
            </div>
            <div class="input-group">
                <img class="icon__value form-icon" src="icon/immigration_icon_Assessment.svg" alt="First slide">
                <select required class="custom-select form-text-field" style="font-size: 1.4rem;" id="immigration_field" name="immigration_field">
                    <option selected>Select Immigration Type</option>
                    <option value="workVisa">Work Visa</option>
                    <option value="businessVisa">Business Visa</option>
                    <option value="investorVisa">Investor Visa</option>
                    <option value="studentVisa">Student Visa</option>
                    <option value="visitVisa">Visit Visa</option>
                </select>
            </div>
            <div class="input-group">
                <img class="icon__value form-icon" src="icon/phone-icon.svg" alt="First slide">
                <input style="font-size: 1.4rem;" id="phone_field" type="text" class="form-control form-text-field" name="phone_field" placeholder="Enter Phone">
            </div>

            <div class="input-group" style='height: max-content !important;'>
                <img class="icon__value form-icon" src="icon/message-icon.svg" alt="First slide">
                <textarea maxlength="400" style="font-size: 1.4rem;" class="form-control form-text-field" rows="5" id="comment_field" name="comment_field"></textarea>                </div>
                <button class="custom-button-styling-2" name="submit_assessment_form">
                    Apply Now
                </button>
        </form>
 
  </div>
  <div class="item2-image">
    <img class="assessment-image"src='images/1-01 1.png' width="600px" height="500px" alt=''>
    <div style="margin-top: 40px;">
    Take our pre-consultation assessment and schedule a
     personal consultation with our experts if you are
      serious about immigrating and would like a detailed
       analysis of your eligibility and possible immigration
        route. In this session, we will assess your
         immigration potential, go over all of your options,
          and create a "road map" to help you reach the
           country of your dreams.
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




$name = $email = $country = $immigrationType =
 $phoneNumber = $comment = "";

if(isset ($_POST['submit_assessment_form'])){
    $names = $_POST['name_field']; //not null
    $country = $_POST['country_field'];
    $immigration_type = $_POST['immigration_field'];
    $phone_number = $_POST['phone_field'];
    $comment = $_POST['comment_field'];
    $email = $_POST['email_field']; //not null

    if ($immigration_type === 'Select Immigration Type') {
        $immigration_type = 'None Selected';
      }

      if (empty($phone_number)) {
        $phone_number = 'None';
      }

      if (empty($comment)) {
        $comment = 'None';
      }

      if ($country === 'Select Country') {
        $country = 'None Selected';
      }

    sendDataToDB($names, $country, $immigration_type, $phone_number, $comment, $email);
    sendMail($names, $country, $immigration_type, $phone_number, $comment, $email);
}

function sendDataToDB($names, $country, $immigration_type, $phone_number, $comment, $email){
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
        $stmt = $dbconn->prepare("INSERT INTO assessment_table (name, country, immigration_type, phone_number, comments, email)
        VALUES (:name, :country, :immigration_type, :phone_number, :comments, :email)");
        $stmt->bindValue(':name', $names);
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':immigration_type', $immigration_type);
        $stmt->bindValue(':phone_number', $phone_number);
        $stmt->bindValue(':comments', $comment);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
    } catch (Exception $e) {
        echo ('An error has occured ('.$e.'): '.mysql_errno());		
    }	

    function sendMail($names, $country, $immigration_type, $phone_number, $comment, $email){
        include 'credential-email-mysql.php';
        $mail = new PHPMailer();
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
        $mail->AddAddress($recipientNameEmail, "recipient-name");
        $mail->SetFrom($emailFrom, "Abroad Migration");
        $mail->AddReplyTo($emailFrom, "Abroad Migration");
        $mail->AddCC($emailFrom, "cc-recipient-name");
        $mail->Subject = "Assessment Requested by ".$names;
        $content = 'Hello,<br><br> <b>Assessment Request has been made by '.$names.'</b><br><br>'
        .'Name: '.$names.'<br>'
        .'Applicant Email: '.$email.'<br>'
        .'Selected Country: '.$country.'<br>'
        .'Immigration Type: '.$immigration_type.'<br>'
        .'Phone Number: '.$phone_number.'<br>'
        .'<br>Comments: '.$comment.'<br><br><br>Thanks,';
            
        $mail->MsgHTML($content); 
            if(!$mail->Send()) {
            echo "Error while sending Email.";
            }
    }  
}
?>

<script >
           if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>