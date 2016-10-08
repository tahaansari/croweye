<?php  



    require "includes/config.php";
    require "includes/functions.php";

    session_start();

    if(isset($_SESSION['is_logged_in'])){

        if($_SESSION['login_type']=='admin' || $_SESSION['login_type']=='user'){

             header("Location:admin/user_view.php");
             exit();

        }else if($_SESSION['login_type']=='client'){

            header("Location:admin/client_view.php");
            exit();

        }

    }

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Crow Eye</title><!-- Load Roboto font -->
    <link href=
    'http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext'
    rel='stylesheet' type='text/css'><!-- Load css styles -->

    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="assets/css/jquery-ui.css"> -->
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type=
    "text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pluton.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
    <link href="assets/css/jquery.cslider.css" rel="stylesheet" type=
    "text/css">
    <link href="assets/css/jquery.bxslider.css" rel="stylesheet" type=
    "text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custombox.css" rel="stylesheet" type="text/css">

    <link href="assets/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">



    <link href="assets/css/cust_style.css" rel="stylesheet" type="text/css">

    

    <!-- Fav and touch icons -->
    <link href="images/ico/apple-touch-icon-144.png" rel=
    "apple-touch-icon-precomposed" sizes="144x144">
    <link href="images/ico/apple-touch-icon-114.png" rel=
    "apple-touch-icon-precomposed" sizes="114x114">
    <link href="images/apple-touch-icon-72.png" rel=
    "apple-touch-icon-precomposed" sizes="72x72">
    <link href="images/ico/apple-touch-icon-57.png" rel=
    "apple-touch-icon-precomposed">
    <link href="images/ico/favicon.ico" rel="shortcut icon">
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="index.php"><img alt="Logo" src=
                "images/logo.png" style="width:150px"> 
                <!-- <h2>Crow Eye</h2> -->
                 <!-- This is website logo --></a> 
                <!-- Navigation button, visible on small resolution -->
                 <button class="btn btn-navbar" data-target=".nav-collapse"
                data-toggle="collapse" type="button"><i class=
                "icon-menu"></i></button> <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active">
                            <a href="#home">Home</a>
                        </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                            <a href="#service">Services</a>
                        </li>
<!--                         <li>
                            <a href="newspaper.php">Book Advertising</a>
                        </li> -->
                        <!-- <li><a href="#portfolio">Portfolio</a></li> -->
                        <li>
                            <a data-target="#login-modal1" data-toggle="modal"
                            style="cursor: pointer;">Login</a>
                        </li>
                        <!-- <li><a style="cursor: pointer;" data-toggle="modal" data-target="#login-modal2">Client</a></li> -->
                        <!-- <li><a href="#price">Price</a></li> -->
                        <li>
                            <a id='clickme' style="cursor: pointer;">Free Trial</a>
                        </li><!-- <li><a href="#contact">Contact</a></li> -->
                    </ul>
                </div><!-- End main navigation -->
            </div>
        </div>
    </div><!-- Start home section -->

    


    


    <div id="home">
        <!-- Start cSlider -->
        <div class="da-slider" id="da-slider">
            <div class="triangle"></div>
            <!-- mask elemet use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">
                <!-- Start first slide -->
                <div class="da-slide">
                    <div style="background: rgba(2, 2, 2, 0.45);padding: 220px;">
                    <h2 class="fittext2">Welcome To................!!!</h2>

                            <h4 style="font-size: 30px;">CROWEYE</h4>
                            <p>The Bird Keep EYE On The Word</p>
                            <a href="#" class="da-link button">Read more</a>
                    </div>
                    <div class="da-img">
                    </div>
                </div>

                <div class="da-slide">
                      <h2>I am a “BIRD” to lead your brand Success....!</h2>
                        <!-- <h4>Customizable</h4> -->
                        <p>“CROWEYE” have latest best advanced search engine and media monitoring software tracking technology services and best clients login</p>
<!--                          we cover all media sector across 29 states and 7 union territories from India we take care that you have right information when making decisions -->
                        <a href="#" class="da-link button">Read more</a>
                        <div class="da-img">
                </div>
            </div>

            <div class="da-slide">
                      <h2>Don’t go by my look go ahead with my WEBSITE....!</h2>
                        <p>There is more things that we can make to learn from you. Do you have any “Q” ? we like to hear from you. Your advice is more important to us. </p>
                        <a href="#" class="da-link button">Read more</a>
                        <div class="da-img">
                </div>
            </div>


            <div class="da-slide">

                <!-- <h2>Messaging</h2>
                        <h4>Easy to use</h4>
                        <p>Messaging is the process of creating a consistent story around a product, person, company or service. Messaging aims to avoid having readers receive contradictory .</p>
                        <a href="#" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="images/tree.png" width="320" alt="image03"> -->

            </div>
        </div>

        <div class="da-arrows">
            <span class="da-arrows-prev"></span> <span class="da-arrows-next"></span>
        </div>
    </div>



    <!-- About us section start -->
    <div class="section primary-section" id="about">
        <div class="container">
            <div class="title">
                <h1 class="come-from-left">THE CONSPIRE ON THE WORD FOR
                SUCCESS</h1><!-- <p>Public relations specialists establish and maintain relationships with an organization's target audience, the media, and other[citation needed] opinion leaders. Common activities include designing communications campaigns, writing news releases and other content for news and feature articles, working with the press, arranging interviews for company spokespeople, writing speeches for company leaders, acting as organization's spokesperson by speaking in public and public officials, preparing clients for press conferences, media interviews, and speeches, writing website and social media content, facilitating internal/employee communications, and managing company reputation and marketing activities like brand awareness and event management .</p> -->
            </div>
            <div class="row-fluid team">
                <div class="span4" id="first-person">
                    <div class="thumbnail">
                        <img alt="team 1" src="images/wedo/img2.jpg">
                        <h3>WHO ARE WE ?</h3>
                        <ul class="social">
                            <li>
                                <a href=""><span class=
                                "icon-facebook-circled"></span></a>
                            </li>
                            <li>
                                <a href=""><span class=
                                "icon-twitter-circled"></span></a>
                            </li>
                            <li>
                                <a href=""><span class=
                                "icon-linkedin-circled"></span></a>
                            </li>
                        </ul>
                        <div class="mask">
                            <!-- <h2></h2> -->
                            <p class="tag">WE ARE THE VALUE ADDING PARTNERS TO
                            ANALYIS AND TO BRING OUT GREAT IDEAS TO BUSINESS
                            SOLUTIONS, WHICH DRIVE PROGRESS TO OUR CLIENTS</p>
                        </div>
                    </div>
                </div>
                <div class="span4" id="second-person">
                    <div class="thumbnail">
                        <img alt="team 1" src="images/wedo/img2.jpg">
                        <h3>WHAT WE DO ?</h3>
                        <ul class="social">
                            <li>
                                <a href=""><span class=
                                "icon-facebook-circled"></span></a>
                            </li>
                            <li>
                                <a href=""><span class=
                                "icon-twitter-circled"></span></a>
                            </li>
                            <li>
                                <a href=""><span class=
                                "icon-linkedin-circled"></span></a>
                            </li>
                        </ul>
                        <div class="mask">
                            <!-- <h2></h2> -->
                            <p class="tag">WE TRY TO CHANGE THE MEDIA IN SOCIAL
                            MEDIA MONITORING, WEB SITE, PRESS CLIPINGS, RADIO,
                            NEWS, WEB SITE FOR ONLINE, AND BRANDING</p>
                        </div>
                    </div>
                </div>
                <div class="span4" id="third-person">
                    <div class="thumbnail">
                        <img alt="team 1" src="images/wedo/img2.jpg">
                        <h3>WHY US ?</h3>
                        <ul class="social">
                            <li>
                                <a href=""><span class=
                                "icon-facebook-circled"></span></a>
                            </li>
                            <li>
                                <a href=""><span class=
                                "icon-twitter-circled"></span></a>
                            </li>
                            <li>
                                <a href=""><span class=
                                "icon-linkedin-circled"></span></a>
                            </li>
                        </ul>
                        <div class="mask">
                            <!-- <h2></h2> -->
                            <p class="tag">WE ASSIMILATE YOUR REQUIREMENTS AND
                            APPROACHES TILL THE LAST BIT. TO MAKE YOU STAY
                            AHEAD.</p>
                        </div>
                    </div>
                </div>
            </div><!-- <div class="about-text centered">
                    <h3>About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                </div> -->
            <!-- <h3>Skills</h3>
                <div class="row-fluid">
                    <div class="span6">
                        <ul class="skills">
                            <li>
                                <span class="bar" data-width="80%"></span>
                                <h3>Tactics</h3>
                            </li>
                            <li>
                                <span class="bar" data-width="95%"></span>
                                <h3>Ethics</h3>
                            </li>
                            <li>
                                <span class="bar" data-width="68%"></span>
                                <h3>Politics and civil society</h3>
                            </li>
                            <li>
                                <span class="bar" data-width="70%"></span>
                                <h3>Other techniques</h3>
                            </li>
                        </ul>
                    </div>
                    <div class="span6">
                        <div class="highlighted-box center">
                            <h1>We're Hiring</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, ullamcorper suscipit lobortis nisl ut aliquip consequat. I learned that we can do anything, but we can't do everything...</p>
                            <button class="button button-sp">Join Us</button>
                        </div>
                    </div>
                </div> -->
        </div>
    </div><!-- Service section start -->



    <div class="section primary-section">
        <div class="container">
            <!-- Start title section -->
            <div class="title">
                <!-- <h1>What We Do?</h1> -->
                <!-- Section's title goes here -->
                <ul style="text-align: left;">
                    <li><p>Intelligence Unit and Business Starts “The Word CROWEYE” It Sounds Simple But It Tackles the Whole Unit and Processing its a Part and Team Work Of Each and Every Contribution and Hard Work.</p></li>
                    <li style="list-style: none"><br></li>
                    <li><p>The Regular Manual Interventions Enable “The Bird Keep EYE On The Word” This Significant to Deliver News and Business Critical Information To the Sports, Entertainment, Lifestyle, Corporate and Leading Industries.</p></li>
                    <li style="list-style: none"><br></li>
                    <li><p>We Research on Professional and Analysis them and reach out to Clients to make it more easy for them to know about the Media Monitoring IN and Outs.</p></li>
                    <li style="list-style: none"><br></li>
                    <li><p>We cover all media sector across 29 states and 7 union territories from India we take care that you have right information when making decisions.</p></li>
                    <li style="list-style: none"><br></li>






                </ul>
                <p></p><!--Simple description for section goes here. -->
            </div>



            <div class="title">
                    <h1 class="come-from-left">OUR SERVICES</h1><!--  <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p> -->
                </div>


            <div class="row-fluid">
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in"><img alt="service 1"
                        class="img-circle" src="images/Service1.png"></div>
                        <h3>Analysis</h3>
                        <p>The word analysis is a technique for systematically describing written, spoken or visual communication, many analysis involve  media – print (newspaper, magazines), television, movies, radio, the internet.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in"><img alt="service 2"
                        class="img-circle" src="images/Service2.png"></div>
                        <h3>Translation</h3>
                        <p>Translation of media is a complicated process and involves alots of factors, if there are multiple media it need to maintain a level. multimedia presentations, documentaries, digital content, news papers and magazines.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in"><img alt="service 3"
                        class="img-circle" src="images/Service3.png"></div>
                        <h3>Press Clippings</h3>
                        <p>A Media Monitoring Service to provide clients a copies of the content, which is a specific interest, to the subject to change the demand.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Service section end -->



    <!-- Portfolio section start -->
    <!-- <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Have You Seen our Works?</h1>
                    
                </div>
                <ul class="nav nav-pills">
                    <li class="filter" data-filter="all">
                        <a href="#noAction">All</a>
                    </li>
                    <li class="filter" data-filter="web">
                        <a href="#noAction">Chemical Industries</a>
                    </li>
                    <li class="filter" data-filter="photo">
                        <a href="#noAction">Pharma Industries</a>
                    </li>
                    <li class="filter" data-filter="identity">
                        <a href="#noAction">Cement Industries</a>
                    </li>
                </ul>
                
                <div id="single-project">
                    <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/1.jpg" alt="project 1" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv1" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/2.png" alt="project 2">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>Life is a song - sing it. Life is a game - play it. Life is a challenge - meet it. Life is a dream - realize it. Life is a sacrifice - offer it. Life is love - enjoy it.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv2" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/3.png" alt="project 3">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>How far you go in life depends on your being tender with the young, compassionate with the aged, sympathetic with the striving and tolerant of the weak and strong. Because someday in your life you will have been all of these.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv3" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/4.jpg" alt="project 4">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Project for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>Life's but a walking shadow, a poor player, that struts and frets his hour upon the stage, and then is heard no more; it is a tale told by an idiot, full of sound and fury, signifying nothing.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv4" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/5.jpg" alt="project 5">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>We need to give each other the space to grow, to be ourselves, to exercise our diversity. We need to give each other space so that we may both give and receive such beautiful things as ideas, openness, dignity, joy, healing, and inclusion.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv5" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/6.jpg" alt="project 6">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>I went to the woods because I wished to live deliberately, to front only the essential facts of life, and see if I could not learn what it had to teach, and not, when I came to die, discover that I had not lived.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv6" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/7.jpg" alt="project 7">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>Always continue the climb. It is possible for you to do whatever you choose, if you first get to know who you are and are willing to work with a power that is greater than ourselves to do it.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv7" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/8.jpg" alt="project 8">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>What if you gave someone a gift, and they neglected to thank you for it - would you be likely to give them another? Life is the same way. In order to attract more of the blessings that life has to offer, you must truly appreciate what you already have.</p>
                            </div>
                        </div>
                    </div>
                    <div id="slidingDiv8" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/service/9.jpg" alt="project 9">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>I learned that we can do anything, but we can't do everything... at least not at the same time. So think of your priorities not in terms of what activities you do, but when you do them. Timing is everything.</p>
                            </div>
                        </div>
                    </div>
                   
                    <ul id="portfolio-grid" class="thumbnails row">
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/service/1.jpg" alt="project 1">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/service/2.png" alt="project 2">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv1">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/service/3.png" alt="project 3">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv2">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/service/4.jpg" alt="project 4">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv3">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/service/5.jpg" alt="project 5">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv4">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/service/6.jpg" alt="project 6">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv5">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/service/7.jpg" alt="project 7" />
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv6">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/service/8.jpg" alt="project 8">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv7">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/service/9.jpg" alt="project 9">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv8">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
    <!-- Portfolio section end -->
    <!-- About us section end -->

    <div class="section secondary-section">
        <div class="triangle"></div>
        <div class="container centered">
            <!--  <p class="large-text">Elegance is not the abundance of simplicity. It is the absence of complexity.</p>
                <a href="#" class="button">Purshase now</a> -->
        </div>
    </div><!-- Client section start -->

    <!-- Client section start -->
        <div class="section primary-section">
            <div class="triangle"></div>
            <div class="container" id="service">
                <div class="title">
                    <h1 class="come-from-left">WE ARE INTO INDOOR &
                    OUTDOOR</h1><!--  <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p> -->
                </div>
                <div class="row">
                    <div class="span4">
                        <div class="testimonial">
                            <p>Newspapers, Magazine, Electronic Media (Wires), Online Media (Website), Radio, Social Media</p>
                            <div class="whopic">
                                <div class="arrow"></div><img alt="client 1"
                                class="centered" src="images/Client1.png">
                                <strong>News Monitoring 
                                <!-- <small>Client</small> --></strong>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="testimonial">
                            <p>Newspapers, Magazine, Radio, Multiplex, Television, Airport, Airline, Digital and Non Traditional Outdoor</p>
                            <div class="whopic">
                                <div class="arrow"></div><img alt="client 2"
                                class="centered" src="images/Client2.png">
                                <strong>Advertising 
                                <!-- <small>Client</small> --></strong>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="testimonial">
                            <p>Content, Website Designing, Website Builders, Software Developers, Android Mobile App</p>
                            <div class="whopic">
                                <div class="arrow"></div><img alt="client 3"
                                class="centered" src="images/Client3.png">
                                <strong>Technology 
                                <!-- <small>Client</small> --></strong>
                            </div>
                        </div>
                    </div>
                </div><!-- <p class="testimonial-text">
                        "Perfection is Achieved Not When There Is Nothing More to Add, But When There Is Nothing Left to Take Away"
                    </p> -->
            </div>
        </div>


   

    <!-- <div id="price" class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1>Price</h1>
                </div>
                <div class="price-table row-fluid">
                    <div class="span4 price-column">
                        <h3>Basic</h3>
                        <ul class="list">
                            <li class="price">$19,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>5 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Pro</h3>
                        <ul class="list">
                            <li class="price">$39,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>25 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Premium</h3>
                        <ul class="list">
                            <li class="price">$79,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>50 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                </div>
                <div class="centered">
                    <p class="price-text">We Offer Custom Plans. Contact Us For More Info.</p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>
        </div> -->
    <!-- Price section end -->
    <!-- Newsletter section start -->




    <div class="section third-section">
            <div class="container centered">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Our Clients</h3>
                        </div>
                       <!--  <ul class="client-nav pull-right">
                            <li id="client-prev"><a class="bx-prev" href=""><i class="icon-left-open"></i></a></li>
                            <li id="client-next"><a class="bx-next" href=""><i class="icon-right-open"></i></a></li>
                        </ul> -->
                    </div>
                    <marquee scrollamount="10" direction="right" onmouseover="this.stop();" onmouseout="this.start();">
                    
                    <div class="bx-wrapper" style="max-width: 1150px; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 102px;"><ul class="row client-slider" id="clint-slider" style="width: 915%; position: relative; transition-duration: 0s; transform: translate3d(-1175px, 0px, 0px);"><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/3.jpg?timestamp=1466869429305" alt="client logo 3">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/8.jpg?timestamp=1466869429305" alt="client logo 4">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/9.jpg?timestamp=1466869429306" alt="client logo 5">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/6.jpg?timestamp=1466869429306" alt="client logo 6">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/7.jpg?timestamp=1466869429307" alt="client logo 7">
                            </a>
                        </li>
                        <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;">
                            <a href="">
                                <img src="images/logo/8.jpg?timestamp=1466869429304" alt="client logo 1">
                            </a>
                        </li>
                        <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;">
                            <a href="">
                                <img src="images/logo/9.jpg?timestamp=1466869429305" alt="client logo 2">
                            </a>
                        </li>
                        <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;">
                            <a href="">
                                <img src="images/logo/3.jpg?timestamp=1466869429305" alt="client logo 3">
                            </a>
                        </li>
                        <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;">
                            <a href="">
                                <img src="images/logo/8.jpg?timestamp=1466869429305" alt="client logo 4">
                            </a>
                        </li>
                        <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;">
                            <a href="">
                                <img src="images/logo/9.jpg?timestamp=1466869429306" alt="client logo 5">
                            </a>
                        </li>
                        <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;">
                            <a href="">
                                <img src="images/logo/6.jpg?timestamp=1466869429306" alt="client logo 6">
                            </a>
                        </li>
                        <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;">
                            <a href="">
                                <img src="images/logo/7.jpg?timestamp=1466869429307" alt="client logo 7">
                            </a>
                        </li>


                    <li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/8.jpg?timestamp=1466869429304" alt="client logo 1">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/9.jpg?timestamp=1466869429305" alt="client logo 2">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/3.jpg?timestamp=1466869429305" alt="client logo 3">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/8.jpg?timestamp=1466869429305" alt="client logo 4">
                            </a>
                        </li><li style="float: left; list-style: none; position: relative; width: 210px; margin-right: 25px;" class="bx-clone">
                            <a href="">
                                <img src="images/logo/9.jpg?timestamp=1466869429306" alt="client logo 5">
                            </a>
                        </li></ul></div><div class="bx-controls"></div></div>
                    
                    </marquee>
                </div>
            </div>
        </div>

    <!-- Newsletter section end -->



    <!-- Contact section start -->
    <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Contact Us</h1>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span5 contact-form centered">
                                <h3>Say Hello</h3>
                                <div id="successSend" class="alert alert-success invisible">
                                    <strong>Well done!</strong>Your message has been sent.</div>
                                <div id="errorSend" class="alert alert-error invisible">There was an error.</div>
                                <form id="contact-form" action="php/mail.php">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" id="name" name="name" placeholder="* Your name..." />
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="email" name="email" id="email" placeholder="* Your email..." />
                                            <div class="error left-align" id="err-email">Please enter valid email adress.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea class="span12" name="comment" id="comment" placeholder="* Comments..."></textarea>
                                            <div class="error left-align" id="err-comment">Please enter your comment.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button id="send-mail" class="message-btn">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="span9 center contact-info">
                        <!-- <p style="color:black">123 Fifth Avenue, 12th,Belgrade,SRB 11000</p> -->
                        <p style="color:black" class="info-mail">umangpawar7@gmail.com</p>
                        <p style="color:black">+91-8767708703</p>
                        <p></p>
                       <!--  <div class="title">
                            <h3>We Are Social</h3>
                        </div> -->
                    </div>
                    <div class="row-fluid centered">
                        <ul class="social">
                            <li>
                                <a href="">
                                    <span class="icon-facebook-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-twitter-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-linkedin-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-pinterest-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-dribbble-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-gplus-circled"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- Contact section edn -->
    <!-- login modal -->




    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade"
    id="login-modal1" role="dialog" style="display: none;" tabindex="-1">
        <div class="modal-dialog">
            <!-- <div class="loginmodal-container"> -->
            <div class="logmod">
                <div class="logmod__wrapper">
                    <!-- <span class="logmod__close">Close</span> -->
                    <div class="logmod__container">
                        <ul class="logmod__tabs">
                            <li data-tabtar="lgm-2">
                                <a href="#">Client Login</a>
                            </li>
                            <li data-tabtar="lgm-1">
                                <a href="#">User Login</a>
                            </li>
                        </ul>
                        <div class="logmod__tab-wrapper">
                            <div class="logmod__tab lgm-1">
                                <!-- user login -->
                                <div class="logmod__heading">
                                    <span class=
                                    "logmod__heading-subtitle">Enter User Email
                                    and Password <strong>To Sign
                                    In</strong></span>
                                </div>
                                <div class="logmod__form">
                                    <form accept-charset="utf-8" action="#"
                                    class="simform" id="user_form" name=
                                    "user_form">
                                        <div class="sminputs">
                                            <div class="input full">
                                                <label class="string optional"
                                                for="user-name">Email*</label>
                                                <input class="string optional"
                                                id="user-email" maxlength="255"
                                                name="email" placeholder=
                                                "Email" size="50" type="email">
                                            </div>
                                        </div>
                                        <div class="sminputs">
                                            <div class="input full">
                                                <label class="string optional"
                                                for="user-pw">Password*</label>
                                                <input class="string optional"
                                                id="user-pw" maxlength="255"
                                                name="password" placeholder=
                                                "Password" size="50" type=
                                                "password"> 
                                                <!-- <span class="hide-password">Show</span> -->
                                            </div>
                                        </div>
                                        <ul class="error-box" id=
                                        "user_error_footer">
                                            <!-- <li>Failed</li> -->
                                        </ul>
                                        <div class="simform__actions">
                                            <button class="sumbit" id=
                                            "user_login">Login</button> 
                                            <!-- <a href="index.php"><input class="sumbit" name="commit" type="sumbit" value="Cancel"> </a> -->
                                             
                                            <!-- <span class="simform__actions-sidetext">
                                            <a class="special" href="#" role="link">Forgot your password?
                                            </a>
                                         </span> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="logmod__tab lgm-2">
                                <!-- client login -->
                                <div class="logmod__heading">
                                    <span class=
                                    "logmod__heading-subtitle">Enter Client
                                    Email and Password <strong>To Sign
                                    In</strong></span>
                                </div>
                                <div class="logmod__form">
                                    <form accept-charset="utf-8" action="#"
                                    class="simform" id="client_form" name=
                                    "client_form">
                                        <div class="sminputs">
                                            <div class="input full">
                                                <label class="string optional"
                                                for="user-name">Email*</label>
                                                <input class="string optional"
                                                id="user-email" maxlength="255"
                                                name="email" placeholder=
                                                "Email" size="50" type="email">
                                            </div>
                                        </div>
                                        <div class="sminputs">
                                            <div class="input full">
                                                <label class="string optional"
                                                for="user-pw">Password*</label>
                                                <input class="string optional"
                                                id="user-pw" maxlength="255"
                                                name="password" placeholder=
                                                "Password" size="50" type=
                                                "password"> 
                                                <!-- <span class="hide-password">Show</span> -->
                                            </div>
                                        </div>
                                        <ul class="error-box" id=
                                        "client_error_footer">
                                            <!-- <li>Failed</li> -->
                                        </ul>
                                        <div class="simform__actions">
                                            <button class="sumbit" id=
                                            "client_login">Login</button> 
                                            <!-- <a href="index.php"><input class="sumbit" name="commit" type="sumbit" value="Cancel"> </a> -->
                                             
                                            <!--  <span class="simform__actions-sidetext">
                                            <a class="special" href="#" role="link">Forgot your password?
                                            </a>
                                         </span> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- </div> -->
        </div>
    </div>

    <!-- modal for free trial -->

    <!-- Modal -->
    <!-- <h4 class="title">Modal title</h4> -->
    <div id="cust_modal" class="modal-demo">

                
        <div class="text">

            

            <!-- <img src="images/trial.png" style="width:50%"> -->
        
        <form accept-charset="utf-8" action="#" class="simform" id="trial_form">
                <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span>
            </button>
                <div class="sminputs">
                    <div class="input full">
                        <label class="string optional" for="user-name">Industry</label>
                        <input class="string optional" name="industry" placeholder="Industry" type="text">

                        <!-- <select name="industry" data-live-search="true" class="selectpicker show-menu-arrow form-control ">
                        <option value="">Select Industry</option>
                            <?php # print_r(get_industry()); ?>
                        </select> -->


                    </div>
                </div>
                <div class="sminputs">
                    <div class="input full">
                        <label class="string optional" for="user-pw">Company Name</label>
                        <input class="string optional" name="company_name" placeholder="Company Name" type="text"> 
                        <!-- <span class="hide-password">Show</span> -->
                    </div>
                </div>

                <div class="sminputs">
                    <div class="input full">
                        <label class="string optional" for="user-pw">Email</label>
                        <input class="string optional" name="email" placeholder="Email" type="email"> 
                        <!-- <span class="hide-password">Show</span> -->
                    </div>
                </div>

                
                <div class="sminputs">
                    <div class="input full">
                        <label class="string optional" for="user-pw">Contact No</label>
                        <input class="string optional" name="contact_no" placeholder="Contact No" type="text"> 
                        <!-- <span class="hide-password">Show</span> -->
                    </div>
                </div>

                <ul class="error-box" id="trial_error_footer">
                    <!-- <li>Failed</li> -->
                </ul>
                <div class="simform__actions">
                    <button class="sumbit" id="trial_submit">Submit</button> 
                    <!-- <a href="index.php"><input class="sumbit" name="commit" type="sumbit" value="Cancel"> </a> -->
                     
                    <!--  <span class="simform__actions-sidetext">
                    <a class="special" href="#" role="link">Forgot your password?
                    </a>
                 </span> -->
                </div>
            </form>
        </div>
    </div>
    <!-- 
            <div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                      <h1>Welcome. Please login.</h1>
                      
                     
                      <form id="login_form">
                          
                        <input id="username" type="text" name="username" placeholder="Username">
                        <input id="password" type="password" name="password" placeholder="Password">
                        
                        <input id="login" type="submit" name="login" class="login loginmodal-submit" value="Login">

                        <div id="error-box">
                            
                        </div>
                        
                      </form>
                    </div>
                </div>
            </div> -->
    <!--        <div style="clear:both"></div>
        <div style='text-align: center'>
           <p class="bg-success" style="padding:10px;margin-top:20px"><small>Copyright © 2016 Design Croweye.in</small></p>
        </div>-->
    <!-- Footer section start -->
    <br>
    <br>
    <div class="footer">
        <p><span>Copyright © 2016 Design Croweye.in</span></p>
    </div><!-- Footer section end -->
    <!-- ScrollUp button start -->
    <div class="scrollup">
        <a href="#"><i class="icon-up-open"></i></a>
    </div><!-- ScrollUp button end -->
    <!-- Include javascript -->
    <script src="assets/js/jquery.js">
    </script> 
    <script src="assets/js/jquery.mixitup.js" type="text/javascript">
    </script> 
    <script src="assets/js/bootstrap.js" type="text/javascript">
    </script> 
    <script src="assets/js/modernizr.custom.js" type="text/javascript">
    </script> 
    <script src="assets/js/jquery.bxslider.js" type="text/javascript">
    </script> 
    <script src="assets/js/jquery.cslider.js" type="text/javascript">
    </script> 
    <script src="assets/js/jquery.placeholder.js" type="text/javascript">
    </script> 
    <script src="assets/js/jquery.inview.js" type="text/javascript">
    </script> 
    <script src="assets/js/app.js" type="text/javascript">
    </script> 

    <script src="assets/js/bootstrap-select.min.js" type="text/javascript">
    </script> 

    <script src="assets/js/custombox.js" type="text/javascript">
    </script> 

    <script>
        $(function() {
            $('#clickme').on('click', function( e ) {
                Custombox.open({
                    target: '#cust_modal',
                    effect: 'fadein'
                });
                e.preventDefault();
            });
        });
    </script>


    <script src="assets/js/cust_script.js" type="text/javascript">
    </script>
    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.4/scrollreveal.min.js">
    </script> 



    <script type="text/javascript">
            
            window.sr = ScrollReveal({ reset: true });
            sr.reveal('.come-from-left', {delay: 500, duration: 1000, origin:'left',distance : '500px'});
            sr.reveal('.img-circle', {delay:500, duration:1000, origin:'bottom', distance: '500px'});
            // sr.reveal('.bar', { duration: 1000 });

            // $('.selectpicker').selectpicker({
            //   style: 'btn-info',
            //   size: 4
            // });

    </script>
</body>
</html>