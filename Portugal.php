<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <link rel = "stylesheet" href="css/About-Canada.css?1428185378" type="text/css"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel = "stylesheet" href="css/style.css?1422686389"> -->

</head>
<body>
    <?php
        $title = "Header";                   // (1) Set the title
        include "header.php";                 // (2) Include the header
        # read up on session.auto_start
        $_SESSION["country_1"] = "Portugal";
    ?>

    <?php
        $title = "image slider";                   // (1) Set the title
        include "image-slider.php";                 // (2) Include the header
    ?>
    <div class="canada-page-us-grid">
        <div class="item1">
        <span class="font-size-mobile-txt-3"> Our efficient visa application method entails
             rapid checking, follow-up, and approval. By working with
              Abroad Migration specialists, you can be confident that
               swift, competent advice will be provided to you.
        </span>
        </div>
        <div class="country-icons">
        <?php
            $title = "Icons-page3";                   // (1) Set the title
            include "country-page-icons.php";                 // (2) Include the header
        ?>
        </div>
        <div class="business-immigration-country">
            <div class="businessImmigrationCoun">
                <span class="font-size-mobile-txt-3-heading">
                    YOUR IMIGRATION JOURNEY TO EUROPE STARTS HERE 
                </span>
                <div>
                    <span class="font-size-mobile-txt-3">
                    Were you looking forward to getting a work permit, permanent
                     residency, express entry, student visa, or a simple visit visa?
                      Don't worry; we will get it covered for you. Our company
                       offers services of immigration to Europe, mainly immigration
                        to Malta, Portugal, Poland, and the Czech Republic. With
                         the help of Abroad Migration consultants, you will get
                          your visas swiftly and without facing many difficulties. 
                       </span>
                </div>
                <span class="font-size-mobile-txt-3-heading">
                    REASONS TO CHOOSE ABROAD MIGRATION                 
                </span>
                <div class="font-size-mobile-txt-3">
                We can officially represent you before the European government
                 for your visas and permits since we are an approved consultant
                  agency, which makes your case safe and secure. We are 
                  situated in Dubai and available every day of the week.
                   You connect with a skilled consultant directly, NOT with
                    an inexperienced agent. We offer FREE access to a wealth
                     of connections, recommendations, and relocation and
                      settlement information. 
                </div>
                <span class="font-size-mobile-txt-3-heading">
                    WHAT MAKES US DIFFERENT               
                </span>
                <div class="font-size-mobile-txt-3">
                We will ensure you receive a high-quality, professional
                 service from the moment you contact us. We will also look
                  into immigration options to safeguard your Migration is
                   simple, quick, and effective. Your case will be handled
                    by our team and us personally, guaranteeing that your
                     demands are continuously satisfied from the start until
                      the day you acquire your visas or permits and beyond. 
                </div>
            </div>
            <div class="businessImmigrationContainer">
                <div>
                   <span class="font-size-mobile-txt-3-heading">APPLY NOW</span> 
                </div>
                <br>
                <?php
                    $title = "form_4_field";                   // (1) Set the title
                    include "form_4_field.php";                 // (2) Include the header
                ?>

            </div>
        </div>
    </div>
    <?php
        $title = "Footer";                   // (1) Set the title
        include "footer.php";                 // (2) Include the header
        
    ?>

</body>

<?php

// echo $txt2;
?>
