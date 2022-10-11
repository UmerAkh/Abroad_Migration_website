<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel = "stylesheet" href="css/aboutus.css?1483185340">
</head>
<body>
    <?php
        $title = "Header";                   // (1) Set the title
        include "header.php";                 // (2) Include the header
    ?>

    <?php
        $title = "image slider";                   // (1) Set the title
        include "image-slider.php";                 // (2) Include the header
    ?>

    <div class="about-us-grid">
        <div class="item1 at-container-2">
            <div>
                <span class="font-size-mobile-txt-3-heading">COMPANY OVERVIEW</span>
            </div>
            <div class= "at-item-2 font-size-mobile-txt-3">
            Abroad Migration is a Dubai-based immigration consultancy
             that specializes in offering services for migrating to Europe
             , Canada, and Australia. We provide services for work permits,
              PR, expedited entry, and student visas and take pride in delivering
               our customers top-notch quality service while upholding our reputation
                for always exceeding client expectations. We have worked hard over the
                 last decade to guarantee that our customers always have the best
                  possible opportunity of securing visa approval. 
            </div>
            <div class="at-item-2 font-size-mobile-txt-3">
            Abroad Migration promises to serve professional knowledge,
             services, and guidance with the highest level of ethical 
             conduct. Our cosmic consciousness perspective defines long-lasting
              customer relationships. Abroad Migration is a multi-specialty
               immigration service company led by a team of professionals.
                We provide an utterly special viewpoint to our cherished client
                 relationships. We at Abroad Migration are proud of the
                  accomplishments of our clients and love what we do. Unlike
                   our competitors, who strive to handle all aspects of law,
                    immigration is our primary focus and area of expertise.
                     Since Covid-19 emerged, the rules and regulations have
                      been evolving, and as a consulting company you can rely
                       on, we stay informed of these developments.
            </div>
        </div>
        <div class="item2">
            <div class="container-1-grid-inner">
                <img style=" margin-left: auto;" class="containerOneImage"src='images/about-us-pic1.png' width="900px" height="500px" alt=''>
                <div class="containerOneText">

                    <p style="margin: auto;width: max-content;" class="font-size-mobile-txt-3-heading">OUR MISSION</p>
                    <div style="border-left: solid 3px #DEAD00;">
                        <p style = "padding-left: 30px;" class="font-size-mobile-txt-3">We strive to use our expertise, skills, and technological resources to lessen anxiety and provide a sense of security. At the same time, you can take command of more important matters of concern.</p>
                    </div>
                </div>
                        
            </div>
        </div>
        <div class="item3">
        <div class="container-1-grid-inner">
                <div class="containerOneText">

                    <p style="margin: auto;width: max-content;" class="font-size-mobile-txt-3-heading">OUR VISION</p>
                    <div style="border-left: solid #DEAD00;">
                        <p style = "padding-left: 30px;" class="font-size-mobile-txt-3">We believe that any immigration procedure should emphasize the individual.
                            It is simple to become overwhelmed by the complexities of immigration
                            regulations and lose focus on the people who matter most at this
                            moment of uncertainty and safety concerns. Abroad Migration
                                recognizes that our clients are the most significant constituent
                                of every immigration process.
                        </p>
                    </div>
                </div>
                <img class="containerOneImage"src='images/about-us-pic2.png' width="900px" height="500px" alt=''>

                        
            </div>
        </div>  
    </div>

    <?php
        $title = "Footer";                   // (1) Set the title
        include "footer.php";                 // (2) Include the header
    ?>

</body>