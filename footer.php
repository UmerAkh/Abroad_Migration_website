
<head>
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel = "stylesheet" href="css/style.css?1929191319">
    <link rel = "stylesheet" href="css/footer.css?1929118319">
</head>
<body>
<div class="footer-grid" id="Test5">
            <div class="grid-container-footer">
                <div class="footer1"> </div>
                <div class="footer2">
                    <div class= "footer-logo-styling-container">
                        <img style="margin:auto;"src="images/Abroad-Migration-logo 1.png" alt="First slide">
                        <span style="text-align: -webkit-left;" class="font-size-mobile-txt-2">
                        Abroad Migration is a Dubai-based immigration
                         consultancy that specializes in offering services
                          for migrating to Europe, Canada, and Australia with
                           professional knowledge, services, and guidance with the highest
                            level of ethical conduct.
                        </span>
                    </div>
                </div>
                <div class="footer3">
                    <div style="display: grid; gap: 40px;">
                        <div class="quick-links-styling">
                            <h4>
                                <b>QUICK LINKS</b>
                            </h4>
                            <br>
                            <span class="font-size-mobile-txt-2 text-hover-page-link">Home</span>
                            <span class="font-size-mobile-txt-2 text-hover-page-link">About Us</span>
                            <span class="font-size-mobile-txt-2 text-hover-page-link">Assessment Form</span>
                            <span class="font-size-mobile-txt-2 text-hover-page-link">Success Stories</span>
                            <span class="font-size-mobile-txt-2 text-hover-page-link">Contact Us</span>
                        </div>
                        <div class="footer3-b">
                            <div style="padding: 30px 0 30px 0;">
                                <div class="custom-search">
                                    <form action ="" method="POST">
                                        <input required maxlength="40" name="email-subscription" type="email" id="email-subscription" class="custom-search-input email-input" placeholder="Enter your email">
                                        <button onlcick="reload()" id="subscriptionBtn" name = "subscriptionBtn" class="custom-search-botton email-button" type="submit">Subscribe</button>  
                                    </form>
                                </div>
                            </div>
                            <div class="bank-icon">
                            <img class="icon-container-icons-styling-2 bounce2" src="icon/paypal.svg" width="70px" height="70px" alt="First slide">
                            <img class="icon-container-icons-styling-2 bounce2"src="icon/mastercard.svg" width="70px" height="70px" alt="First slide">
                            <img class="icon-container-icons-styling-2 bounce2"src="icon/visa.svg" width="70px" height="70px" alt="First slide">
                            <img class="icon-container-icons-styling-2 bounce2" src="icon/bank.svg" width="70px" height="70px" alt="First slide">

                            </div>
                        </div>


                    </div>

                </div>  
                <div class="footer4">
                <div style="display: grid; gap: 10px;">
                        <div class="get-in-touch-links-styling">
                            <h4 style="margin:auto;">
                                <b>GET IN TOUCH</b>
                            </h4>
                            <br>
                            <div class="get-in-touch-mini">
                                <img src="icon/office-block-svgrepo-com 1.svg" width="40px" height="40px" alt="First slide">
                                <span class="font-size-mobile-txt-2" style="display: grid;"> <b>UAE Office</b>Business bay, Dubai 04 4581018 Citadel Tower 206</span>
                            </div>
                            <div class="get-in-touch-mini">
                                <img src="icon/office-phone-svgrepo-com 1.svg" width="40px" height="40px" alt="First slide">
                                <span class="font-size-mobile-txt-2"><b>Landline: </b> +971 54 5990002</span>
                            </div>
                            <div class="get-in-touch-mini">
                                <img src="icon/email-svgrepo-com 1.svg" width="40px" height="40px" alt="First slide">
                                <span class="font-size-mobile-txt-2"> Info@abroadmigrationdc.com</span>    
                            </div>
                            <div class="get-in-touch-mini">
                                <img src="icon/wall-clock-svgrepo-com 1.svg" width="40px" height="40px" alt="First slide">
                                <span class="font-size-mobile-txt-2"> Mon-Sun / 9:00AM - 8:00PM GMT+4</span>
                            </div>
                            
                        </div>
                        <div class="footer4-b">
                            <div class="social-media-icons">
                                <img class="icon-container-icons-styling-2 bounce2" src="icon/facebook-icon.svg" width="60px" height="60px" alt="First slide">
                                <img class="icon-container-icons-styling-2 bounce2" src="icon/insta-icon.svg" width="60px" height="60px" alt="First slide">
                                <img class="icon-container-icons-styling-2 bounce2" src="icon/tiktok-icon 1.svg" width="60px" height="60px" alt="First slide">
                                <img class="icon-container-icons-styling-2 bounce2" src="icon/twitter-icon.svg" width="60px" height="60px" alt="First slide">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="footer5">
                    <span style="font-size: 12px;">Copyright 2022 AbroadMigrationDC. Designed By <a target="_blank" href="https://www.upwork.com/services/product/design-ui-ux-design-prototype-and-wireframe-for-website-or-app-1370903382705557504">SADIGITECH</a></span>
                </div>
            </div>

        </div>
</body>

<?php
use PHPMailer\PHPMailer\Exception;
$email = "";


if(isset ($_POST['email-subscription'])){
    $email = $_POST['email-subscription'];
    sendDataToDBEmail($email);
}

function sendDataToDBEmail($email){
    $servername = "82.180.175.51";
    $username = "u255565930_abroadmig";
    $password = "MigrationAbroad@123";
    $db = "u255565930_Abroad_Mig_web";
    $dbconn = new PDO('mysql:host=82.180.175.51;dbname=u255565930_Abroad_Mig_web',
    'u255565930_abroadmig',
    'MigrationAbroad@123',
    array(PDO::ATTR_PERSISTENT => true));

    if($dbconn) {
        echo "Connection Successful";
    }
    else {
        echo "Connection Failed";
    }

    try {	
        $stmt = $dbconn->prepare("INSERT INTO news_letter (email) VALUES (:email)");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
    } catch (Exception $e) {
        echo ('An error has occured ('.$e.'): '.mysql_errno());		
    }	
}
?>

<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

