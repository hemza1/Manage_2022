<!DOCTYPE html>
<?php 
session_start();
require('db.php');
// require('redirect.php');
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
$userr=$_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM users  WHERE type_user = 'Agency' AND username='$userr'");
if(mysqli_num_rows($result) == 0) {
    //redirect('signin.php');
} else {
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <link rel="stylesheet" href="css/formAgency.css">
    <title>Document</title>
</head>
<body>
    
 <!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="POST" name="agencyform" action="addagency.php" onsubmit="return validateform()">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Agency Name</li>
                <li>Agreement</li>
                <li>Agency Details</li>
                <li>Confirmation</li>
                
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">What is the name of your Agency</h2>
                <h3 class="fs-subtitle">Select your agency to start listing it on Sortlist</h3>
                <input type="text" name="fname" placeholder="Agency Name" id="fname" class="width"/>
                
                
                <small><b><div class="error" style="color: red;"></div></b></small>
                
                <input type="button" name="next" id="next" class="next action-button" value="Next" onclick="card()" disabled/>
               
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Social Profiles</h2>
                <h3 class="fs-subtitle">Your presence on the social network</h3>
                <div class="containerr">
    <div class="card">
        <div class="banner">
            <svg viewBox="0 0 320 320" width="320px" height="320px" fill="none">
                
                <g opacity="0.15">
                <path d="M87.7266 222.4L99.5826 204.112C112.127 213.248 126.959 218.512 139.967 218.512C152.511 218.512 160.047 213.264 160.047 205.024C160.047 195.664 149.103 192.464 134.959 188.8C109.407 181.936 93.2146 174.864 93.2146 153.376C93.2146 131.44 111.231 116.352 137.695 116.352C153.663 116.352 169.855 122.064 182.639 130.528L171.919 149.264C160.735 142.176 148.415 137.6 137.695 137.6C127.199 137.6 118.991 142.4 118.991 150.624C118.991 158.4 126.287 160.448 144.319 165.936C164.159 171.424 185.839 178.048 185.839 202.512C185.839 225.36 166.911 240 139.535 240C121.263 240 101.871 233.6 87.7266 222.4Z" fill="black"></path>
                <path d="M233.615 80H206.223V240H233.615V80Z" fill="black"></path>
               
                </g>   
            </svg></div>
        <div class="menu">
            <div class="opener"><span></span><span></span><span></span></div>
        </div>
        <h2 class="name" id="spanResult"></h2>
        <div class="title">Agency</div>
        <div class="actions">
            <div class="follow-info">
                <h2><a href="#"><small><input type="checkbox" name="confirm" id="check" />I confirm that I have the authority to create this agency profile</small></a></h2>
                <small><b><div class="error" style="color: red;"></div></b></small>
               
            </div>
            
        </div>
        <div class="desc"></div>
    </div>
</div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                <input type="button" name="next" id="terms" class="next action-button" style="padding-right :100px" value="Create Agency" onclick="idkk();" />
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Welcome ! Let's Configure your account</h2>
                <h3 class="fs-subtitle">Define how your agency will be seen on Sortlist.</h3>
                <?php echo $_SESSION['username'];?>
                <div>
                <br><br>
                <Label class="h1">Agency Name :</Label> <br> <br>
                <label for="">Clients will see this name on your profile and in our listings</label> <br> <br>
                <input type="text" name="aname" id="aname" placeholder="Enter your agency name..." class="width"/><br>
                <small><b><div class="error" style="color: red;"></div></b></small>
                </div>
                <br><br>
                <div>
                <Label class="h1" >Agency Adress :</Label> <br><br>
                <label for="">This address will be used to provide you with online visibility in your area and suggest you to relevant opportunities close by. You'll be able to add more areas later on.</label><br><br>
                <input type="text" name="adress" placeholder="Enter your agency adress..." class="width"/><br>
                </div>
                <br><br>
                <div>
                <Label class="h1" >Agency Languages :</Label> <br><br>
                <label for="">Indicate in which language(s) you are used to working with clients.</label> <br><br>
                <select name="lang" id="select2" class="input width">
                <option disabled selected value> -- select an option -- </option>
                <option value="French">French</option>
                <option value="English">English</option>
                <option value="Dutch">Dutch</option>
                <option value="Chinese">Chinese</option>
                <option value="Arabic">Arabic</option>
                <option value="German">German</option>

                </select>
                <small><b><div class="error" style="color: red;"></div></b></small><br><br>
               
                </div>
                <br><br>
                <div>
                <Label class="h1" >Number of people in the team : </Label> <br><br>
              
                <input type="number" name="team" class="width"/><br>
                <small><b><div class="error" style="color: red;"></div></b></small>
                </div>
                <br><br>
                <h2 class="fs-title">Contact</h2>
                <h3 class="fs-subtitle">Help Clients get in touch</h3>
                <div>
                <br><br>
                <Label class="h1">Agency phone number</Label> <br> <br>
                <label for="">Agency phone number</label> <br> <br>
                <input type="tel" name="tel" placeholder="7712 34 56 78" class="width" /><br>
                <small><b><div class="error" style="color: red;"></div></b></small>
                </div>
                <br><br>
                <div>
                <br><br>
                <Label class="h1">Agency Website :</Label> <br> <br>
                
                <input type="text" name="site" placeholder="Enter your website..." class="width" /><br>
                <small><b><div class="error" style="color: red;"></div></b></small>
                </div>
                <br><br>
                <div>
                <br><br>
                <Label class="h1">Agency email address :</Label> <br> <br>
                <label for="">This address will be used for business-related communications.</label> <br> <br>
                <input type="email" name="email" placeholder="Enter your contact email..." class="width"/><br>
                <small><b><div class="error" style="color: red;"></div></b></small>
                </div>
                <br><br>
                <h2 class="fs-title">Services</h2>
                <h3 class="fs-subtitle">Add and describe your areas of expertise. You'll be able to edit them or add more later on.</h3>

                <div id="cont">
                <div id="text" class="services" style="display: none;"></div>
                <div id="texts" class="services" style="display: none;"></div>
                <div id="text3" class="services" style="display: none;"></div>
                <div id="text4" class="services" style="display: none;"></div>
                </div>
              
                <input  type="button" onclick="myFunction()" value="Add Service" class="btn-1" />   <br>
                 
                
                <div id="myDIV" style="display:none">
                <div>
                <br><br>
                <Label class="h1">Choose Service :</Label> <br> <br>
                    
               <select name="sel" id="select" class="width form_data" onchange="skill()">
                   <option disabled selected value> -- select an option -- </option>
                   <option value="E-commerce">E-commerce</option>
                   <option value="Copywriting">Copywriting</option>
                   <option value="SEO">SEO</option>
                   <option value="Social Media">Social Media</option>
                   <option value="Innovation">Content Strategy</option>
                   <option value="Branding And Positioning">Branding And Positioning</option> 
                   <option value="Digital Strategy">Digital Strategy</option>  
                   <option value="Graphic Design">Graphic Design</option>    
               </select>    
               <small><b><div class="error" style="color: red;"></div></b></small>
                </div>
                <br><br>
                 
                <Label class="h1">Starting Price :</Label> 
                <div class="radio">
                <br>
               
                <label for="">
                <input type="radio" name="price" value="£1000" />
                 £1000
                </label>
                <label for="">
                <input type="radio" name="price"value="£3000"/>
                £3000
                </label>
                <label for="">
                <input type="radio" name="price"value="£5000"/>
                £5000
                </label>
                <label for="">
                <input type="radio" name="price"value="£10000"/>
                £10000
                </label>
                <label for="">
                <input type="radio" name="price" />£
                <input type="number" name="Price" class="inputfield">
                </label>
                <small><b><div class="error" style="color: red;"></div></b></small>


                </div>
                <br><br>
                <div>
                <Label class="h1" >Skills: </Label> <br> <br>
                <h3 class="fs-subtitle">Select the required skills from the following .</h3>
                
                <div class="container">
                <div class="pr-price d1" id="hideme1"style="display: none;">
                <ul class="ks-cboxtags ">
                    <li><input type="checkbox" id="checkboxOne1" value="Local SEO" name="s[]" class="z" ><label for="checkboxOne1">Local SEO</label></li>
                    <li><input type="checkbox" id="checkboxTwo1" value="Online SEO" checked name="s[]"class="z"><label for="checkboxTwo1">Online SEO</label></li>
                    <li><input type="checkbox" id="checkboxThree1" value="Mobile SEO" checked name="s[]"class="z"><label for="checkboxThree1">Mobile SEO</label></li>
                    <li><input type="checkbox" id="checkboxFour1" value="Audit SEO" name="s[]"class="z"><label for="checkboxFour1">Audit SEO</label></li>
                    <li><input type="checkbox" id="checkboxFive1" value="Video SEO" name="s[]"class="z"><label for="checkboxFive1">Video SEO</label></li>
                    <li><input type="checkbox" id="checkboxSix1" value="On Page SEO" checked name="s[]"class="z"><label for="checkboxSix1">
                                    On Page SEO</label></li>
                    <li><input type="checkbox" id="checkboxSeven1" value="SEO Marketing" name="s[]"class="z"><label for="checkboxSeven1">SEO Marketing</label></li>
                    <li><input type="checkbox" id="checkboxEight1" value="Google SEO" name="s[]"class="z"><label for="checkboxEight1">Google SEO</label></li>
                    <li><input type="checkbox" id="checkboxNine1" value="Google ADS" name="s[]"class="z"><label for="checkboxNine1">Google ADS
                                    </label></li>
                    <li><input type="checkbox" id="checkboxTen1" value="Marketing" name="s[]"class="z"><label for="checkboxTen1">Marketing</label></li>
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven1" value="Social Media" name="s[]"class="z"><label for="checkboxEleven1">Social Media</label></li>
                    <li><input type="checkbox" id="checkboxTwelve1" value="Marketing Benchmark"name="s[]"class="z"><label for="checkboxTwelve1">Marketing Benchmark</label></li>
                   
                </ul>
                </div>
                <div class="pr-price d2" id="hideme2"style="display: none;">
                <ul class="ks-cboxtags">
                    <li><input type="checkbox" id="checkboxOne2" value="Copy" name="s[]"class="z1"><label for="checkboxOne2">Copy</label></li>
                    <li><input type="checkbox" id="checkboxTwo2" value="Copywriting" name="s[]"class="z1"><label for="checkboxTwo2">Copywriting</label></li>
                    <li><input type="checkbox" id="checkboxThree2" value="AD Copy"  name="s[]"class="z1"><label for="checkboxThree2">AD Copy</label></li>
                    <li><input type="checkbox" id="checkboxFour2" value="SEO Copy" name="s[]"class="z1"><label for="checkboxFour2">SEO Copy</label></li>
                    <li><input type="checkbox" id="checkboxFive2" value="Digital Copywriting" name="s[]"class="z1"><label for="checkboxFive2">Digital Copywriting</label></li>
                    <li><input type="checkbox" id="checkboxSix2" value="Website copywriting" name="s[]"class="z1"><label for="checkboxSix2">
                                    Website copywriting</label></li>
                    <li><input type="checkbox" id="checkboxSeven2" value="Digital Strategy" name="s[]"class="z1"><label for="checkboxSeven2">Digital Strategy</label></li>
                    <li><input type="checkbox" id="checkboxEight2" value="opywriting advertising" name="s[]"class="z1"><label for="checkboxEight2">Copywriting advertising</label></li>
                   
                    <li><input type="checkbox" id="checkboxTen2" value="Branding" name="s[]"class="z1"><label for="checkboxTen2">Branding</label></li>
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven2" value="Marketing" name="s[]"class="z1"><label for="checkboxEleven2">Marketing</label></li>
                   
                </ul>
                </div>
                <div class="pr-price" id="hideme3"style="display: none;">
                <ul class="ks-cboxtags">
                    <li><input type="checkbox" id="checkboxOne3" value="Social" name="s[]"class="z2"><label for="checkboxOne3">Social </label></li>
                    <li><input type="checkbox" id="checkboxTwo3" value="Social Media Management" checked name="s[]"class="z2"><label for="checkboxTwo3">Social Media Management</label></li>
                    <li><input type="checkbox" id="checkboxThree3" value="Social Media Strategy" checked name="s[]"class="z2"><label for="checkboxThree3">Social Media Strategy</label></li>
                    <li><input type="checkbox" id="checkboxFour3" value="Social Networking" name="s[]"class="z2"><label for="checkboxFour3">Social Networking</label></li>
                    <li><input type="checkbox" id="checkboxFive3" value="Social selling" name="s[]"class="z2"><label for="checkboxFive3">Social selling</label></li>
                    <li><input type="checkbox" id="checkboxSix3" value=" Social sharing optimization" checked name="s[]"class="z2"><label for="checkboxSix3">
                                    Social sharing optimization</label></li>
                    <li><input type="checkbox" id="checkboxSeven3" value="Digital Strategy" name="s[]"class="z2"><label for="checkboxSeven3">Digital Strategy</label></li>
                    <li><input type="checkbox" id="checkboxEight3" value="B2B Social Media" name="s[]"class="z2"><label for="checkboxEight3">B2B Social Media</label></li>
                    <li><input type="checkbox" id="checkboxNine3" value="Social marketing" name="s[]"class="z2"><label for="checkboxNine3">Social marketing
                                    </label></li>
                    <li><input type="checkbox" id="checkboxTen3" value="Social Advertising" name="s[]"class="z2"><label for="checkboxTen3">Social Advertising</label></li>
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven3" value="Social media contest" name="s[]"class="z2"><label for="checkboxEleven3">Social media contest</label></li>
                    <li><input type="checkbox" id="checkboxTwelve3" value="Marketing" name="s[]"class="z2"><label for="checkboxTwelve3">Marketing</label></li>
                    <li><input type="checkbox" id="checkboxThirteen3" value=" Social Media compaign" name="s[]"class="z2"><label for="checkboxThirteen3">
                                    Social Media compaign</label></li>
                    
                </ul>
                </div>
                <div class="pr-price" id="hideme4"style="display: none;">
                <ul class="ks-cboxtags">
                    <li><input type="checkbox" id="checkboxOne4" value=">B2B E-commerce" name="s[]"class="z3"><label for="checkboxOne4">B2B E-commerce</label></li>
                    <li><input type="checkbox" id="checkboxTwo4" value="Economy Scale" checked name="s[]"class="z3"><label for="checkboxTwo4">Economy Scale</label></li>
                    <li><input type="checkbox" id="checkboxThree4" value="E-commerce Website" checked name="s[]"class="z3"><label for="checkboxThree4">E-commerce Website</label></li>
                    <li><input type="checkbox" id="checkboxFour4" value="Eco friendly" name="s[]"class="z3"><label for="checkboxFour4">Eco friendly</label></li>
                    <li><input type="checkbox" id="checkboxFive4" value="Online store" name="s[]"class="z3"><label for="checkboxFive4">Online store</label></li>
                    <li><input type="checkbox" id="checkboxSix4" value="Mobile marketing" checked name="s[]"class="z3"><label for="checkboxSix4">
                                    Mobile marketing</label></li>
                    <li><input type="checkbox" id="checkboxSeven4" value="E-company" name="s[]"class="z3"><label for="checkboxSeven4">E-company</label></li>
                    <li><input type="checkbox" id="checkboxEight4" value="E-commerce Marketing" name="s[]"class="z3"><label for="checkboxEight4">E-commerce Marketing</label></li>
                    <li><input type="checkbox" id="checkboxNine4" value="E-commerce SEO "name="s[]"class="z3"><label for="checkboxNine4">E-commerce SEO</label></li>
                    <li><input type="checkbox" id="checkboxTen4" value="E-commerce Hosting"name="s[]"class="z3"><label for="checkboxTen4">E-commerce Hosting</label></li>
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven4" value="E-commerce Design" name="s[]"class="z3"><label for="checkboxEleven4">E-commerce Design</label></li>
                    <li><input type="checkbox" id="checkboxTwelve4" value="E-commerce Web Design" name="s[]"class="z3"><label for="checkboxTwelve4">E-commerce Web Design</label></li>
                    <li><input type="checkbox" id="checkboxThirteen4" value="Wordpress"name="s[]"class="z3"><label for="checkboxThirteen4">
                                    Wordpress</label></li>
                    <li><input type="checkbox" id="checkboxFourteen4" value="Prestashop"name="s[]"class="z3"><label for="checkboxFourteen4">Prestashop</label></li>
                    <li><input type="checkbox" id="checkboxFifteen4" value="Woocommerce"name="s[]"class="z3"><label for="checkboxFifteen4">Woocommerce</label></li>
                </ul>
                </div>
                <div class="pr-price" id="hideme5" style="display: none;">
                <ul class="ks-cboxtags">
                    <li><input type="checkbox" id="checkboxOne5" value="IDKer" name="s[]"class="z4"><label for="checkboxOne5">omw</label></li>
                    <li><input type="checkbox" id="checkboxTwo5" value="Copywriting" checked name="s[]"class="z"><label for="checkboxTwo5">Copywriting</label></li>
                    <li><input type="checkbox" id="checkboxThree5" value="SEO" checked name="s[]"class="z4"><label for="checkboxThree5">SEO</label></li>
                    <li><input type="checkbox" id="checkboxFour5" value="Social Media" name="s[]"class="z4"><label for="checkboxFour5">Social Media</label></li>
                    <li><input type="checkbox" id="checkboxFive5" value="Innovation" name="s[]"class="z4"><label for="checkboxFive5">Innovation</label></li>
                    <li><input type="checkbox" id="checkboxSix5" value="Branding And Positioning" checked name="s[]"class="z4"><label for="checkboxSix5">Branding
                                    And Positionning</label></li>
                    <li><input type="checkbox" id="checkboxSeven5" value="Digital Strategy" name="s[]"class="z4"><label for="checkboxSeven5">Digital Strategy</label></li>
                    <li><input type="checkbox" id="checkboxEight5" value="Graphic Design" name="s[]"class="z4"><label for="checkboxEight5">Graphic Design</label></li>
                    <li><input type="checkbox" id="checkboxNine5" value="Princess Celestia "name="s[]"class="z4"><label for="checkboxNine5">Princess
                                    Celestia</label></li>
                    <li><input type="checkbox" id="checkboxTen5" value="Gusty"name="s[]"class="z4"><label for="checkboxTen5">Gusty</label></li>
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven5" value="Discord"name="s[]"class="z4"><label for="checkboxEleven5">Discord</label></li>
                    <li><input type="checkbox" id="checkboxTwelve5" value="Clover"name="s[]"class="z4"><label for="checkboxTwelve5">Clover</label></li>
                    <li><input type="checkbox" id="checkboxThirteen5" value="Baby Moondancer"name="s[]"class="z4"><label for="checkboxThirteen5">Baby
                                    Moondancer</label></li>
                    <li><input type="checkbox" id="checkboxFourteen5" value="Medley"name="s[]"class="z4"><label for="checkboxFourteen5">Medley</label></li>
                    <li><input type="checkbox" id="checkboxFifteen5" value="Firefly"name="s[]"class="z4"><label for="checkboxFifteen5">Firefly</label></li>
                </ul>
                </div>
                <div class="pr-price" id="hideme6"style="display: none;">
                <ul class="ks-cboxtags">
                    <li><input type="checkbox" id="checkboxOne6" value="b2b Branding" name="s[]"class="z5"><label for="checkboxOne6">b2b Branding</label></li>
                    <li><input type="checkbox" id="checkboxTwo6" value="Company branding" checked name="s[]"class="z5"><label for="checkboxTwo6">Company branding</label></li>
                    <li><input type="checkbox" id="checkboxThree6" value="international branding" checked name="s[]"class="z5"><label for="checkboxThree6">international branding</label></li>
                    <li><input type="checkbox" id="checkboxFour6" value="Brand creation" name="s[]"class="z5"><label for="checkboxFour6">Brand creation</label></li>
                    <li><input type="checkbox" id="checkboxFive6" value="City Branding" name="s[]"class="z5"><label for="checkboxFive6">City Branding</label></li>
                    <li><input type="checkbox" id="checkboxSix6" value="International Branding" checked name="s[]"class="z5"><label for="checkboxSix6">International Branding
                                    </label></li>
                    <li><input type="checkbox" id="checkboxSeven6" value="Brand design" name="s[]"class="z5"><label for="checkboxSeven6">Brand design</label></li>
                    <li><input type="checkbox" id="checkboxEight6" value="Brand Advertising" name="s[]"class="z5"><label for="checkboxEight6">Brand Advertising</label></li>
                    <li><input type="checkbox" id="checkboxNine6" value="Sound Branding" name="s[]"class="z5"><label for="checkboxNine6">Sound Branding
                                    </label></li>
                    <li><input type="checkbox" id="checkboxTen6" value="Brand Stylist"name="s[]"class="z5"><label for="checkboxTen6">Brand Stylist</label></li>
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven6" value="Event Branding"name="s[]"class="z5"><label for="checkboxEleven6">Event Branding</label></li>
                    <li><input type="checkbox" id="checkboxTwelve6" value="Brand guidelines"name="s[]"class="z5"><label for="checkboxTwelve6">Brand guidelines</label></li>
                    <li><input type="checkbox" id="checkboxThirteen6" value="Marketing"name="s[]"class="z5"><label for="checkboxThirteen6">Marketing
                                    </label></li>
                    <li><input type="checkbox" id="checkboxFourteen6" value="Design"name="s[]"class="z5"><label for="checkboxFourteen6">Design</label></li>
                    <li><input type="checkbox" id="checkboxFifteen6" value="Social Media"name="s[]"class="z5"><label for="checkboxFifteen6">Social Media</label></li>
                </ul>
                </div>
                <div class="pr-price d1" id="hideme7" style="display:none;">
                <ul class="ks-cboxtags ">
                    <li><input type="checkbox" id="checkboxOne7" value="Digital Ad" name="s[]"class="z6"><label for="checkboxOne7">Digital Ad</label></li>
                    <li><input type="checkbox" id="checkboxTwo7" value="Digitalization" checked name="s[]"class="z6"><label for="checkboxTwo7">Digitalization</label></li>
                    <li><input type="checkbox" id="checkboxThree7" value="Digital Commerce" checked name="s[]"class="z6"><label for="checkboxThree7">Digital Commerce</label></li>
                    <li><input type="checkbox" id="checkboxFour7" value="Digital Artwork" name="s[]"class="z6"><label for="checkboxFour7">Digital Artwork</label></li>
                    <li><input type="checkbox" id="checkboxFive7" value="Digital guru" name="s[]"class="z6"><label for="checkboxFive7">Digital guru</label></li>
                    <li><input type="checkbox" id="checkboxSix7" value="Branding And Positioning" checked name="s[]"class="z6"><label for="checkboxSix7">Marketing
                                    </label></li>
                    <li><input type="checkbox" id="checkboxSeven7" value="Digital Strategy" name="s[]"class="z6"><label for="checkboxSeven7">Digital Strategy</label></li>
                    <li><input type="checkbox" id="checkboxEight7" value="Digital commerce" name="s[]"class="z6"><label for="checkboxEight7">Digital commerce</label></li>
                    <li><input type="checkbox" id="checkboxNine7" value=" Digital Enquiry" name="s[]"class="z6"><label for="checkboxNine7">
                                    Digital Enquiry</label></li>
                    <li><input type="checkbox" id="checkboxTen7" value="Digital Ecosystem"name="s[]"class="z6"><label for="checkboxTen7">Digital Ecosystem</label></li>
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven7" value="Digital Compaign" name="s[]"class="z6"><label for="checkboxEleven7">Digital Compaign</label></li>
                    <li><input type="checkbox" id="checkboxTwelve7" value="Digital Agenda"name="s[]"class="z6"><label for="checkboxTwelve7">Digital Agenda</label></li>
                   
                </ul>
                </div>
                <div class="pr-price" id="hideme8"style="display: none;">
                <ul class="ks-cboxtags">
                    <li><input type="checkbox" id="checkboxOne8" value="Logo Design" name="s[]"class="z7"><label for="checkboxOne8">Logo Dseign</label></li>
                    <li><input type="checkbox" id="checkboxTwo8" value="Motion Graphic" checked name="s[]"class="z7"><label for="checkboxTwo8">Motion Graphic</label></li>
                    <li><input type="checkbox" id="checkboxThree8" value="Graphic Art" checked name="s[]"class="z7"><label for="checkboxThree8">Graphic Art</label></li>
                    <li><input type="checkbox" id="checkboxFour8" value="NFT Art" name="s[]"class="z7"><label for="checkboxFour8">NFT Art</label></li>
                    <li><input type="checkbox" id="checkboxFive8" value="3D graphic Design" name="s[]"class="z7"><label for="checkboxFive8">3D graphic Design</label></li>
                    <li><input type="checkbox" id="checkboxSix8" value="Graph Visualization" checked name="s[]"class="z7"><label for="checkboxSix8">Graph Visualization
                                    </label></li>
                    <li><input type="checkbox" id="checkboxSeven8" value="Web Graphic Design" name="s[]"class="z7"><label for="checkboxSeven8">Web Graphic Design</label></li>
                    <li><input type="checkbox" id="checkboxEight8" value="Graphic Packaging" name="s[]"class="z7"><label for="checkboxEight8">Graphic Packaging</label></li>
                    <li><input type="checkbox" id="checkboxNine8" value="Web Design"name="s[]"class="z7"><label for="checkboxNine8">Web Design
                                    </label></li>
 
                    <li class="ks-selected"><input type="checkbox" id="checkboxEleven8" value="2D design"name="s[]"class="z7"><label for="checkboxEleven8">2D design</label></li>
                    
                </ul>
                </div>
                </div>   
                </div>
                <br><br>
                <div>
                <Label class="h1" >Description (Optional) </Label> <br><br>

                <input type="text" name="desc" id="desc" class="width" class="form_data" placeholder="Describe this service: your methodology , and what clients can expect"/><br>
                </div>
               <!-- <input value="Save" onclick="save_data()" type="button" name="save" id="submit" /> --> 
               <button type="button" name="save" id="butsave" class="addservice" onclick="savedata()"><i class="fas fa-save"></i> Save service</button>
                    <br>
               
               <b id="mesg"></b>
                

                <?php /*
                if(isset($_POST['save'])){
                 if(array_key_exists('save', $_POST)) {
                    service();
                }
                function service(){
                require('db.php');
                
               
                $user=$_SESSION['username'];
                $name=$_POST['sel'];
                $price=$_POST['price'];
                $skills=$_POST['s'];
                $desc=$_POST['desc'];
                $sql = "INSERT INTO service (name, price, skills, description , username)
                VALUES ('$name', '$price', '$skills','$desc','$user')";
                
                if (mysqli_query($con, $sql)) {
                   
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
                 }
                }
                */?>
                <br><br>
                </div>
               
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next" onclick="testVariable()"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Confirmation and Submission</h2>
                <h3 class="fs-subtitle">Re-write here your email to submit</h3>
                <div id="status"></div>
                <input type="text" name="rename" placeholder="Email" id="fname" class="width" />
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type='submit' name='submit' value='submit' class="action-button ">
            </fieldset>
           
            
        </form>
    </div>
</div>
<!-- /.MultiStep Form -->

<script src="formAgency.js"></script>

<?php 
}
}
?>
<script>
    var checker = document.getElementById('check');
    var sendbtn = document.getElementById('terms');
    checker.onchange = function() {
    sendbtn.disabled = !this.checked;
};
</script>
<script>
    function idkk(){
        var name=document.getElementById('fname').value;   
        document.getElementById('aname').value= name;
    }
</script>
<script>
    function card()
{
var name=document.getElementById('fname').value;   
document.getElementById('spanResult').innerHTML= name;
}
</script>
<script> 
/*$('agencyform').submit(function(e) 
{
  alert('submit intercepted');
  e.preventDefault(e);
  var u = { 'aname': $('aname').val() };
  $.ajax({
      url: 'test2.php',
      type: 'POST',
      //dataType: 'string',
      data: u,
      success: function (response) {
        //get response from your php page (what you echo or print)
        console.log(response);

        if (response === 'true') {
          $('#status').append('<p>The email is ok to use and the row has been inserted </p><p>' + response);

        } else {
          console.log('Email does exist ');

        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);

      }
    });
}); */
</script>
<script>
    $('document').ready(function(){
    var username_state = false;
    $('#fname').on('blur', function(){
    var username = $('#fname').val();
     if (username == '') {
  	username_state = false;
    	return;
    }
  $.ajax({
    url: 'test2.php',
    type: 'post',
    data: {
    	'username_check' : 1,
    	'username' : username,
    },
    success: function(response){
      if (response == 'taken' ) {
      	username_state = false;
        alert('username already taken');
        document.getElementById('next').disabled = true; 
      	$('#fname').addClass("error_show");
      
        
      }
        else if (response == 'not_taken') {
      	username_state = true;
        document.getElementById('next').disabled = false; 
          
      	$('#fname').removeClass("error_show");
      	
          
      }
    }
  });
 });
});
</script>
<script>
    /*
    function confirmation(){
        if (document.getElementById('check').checked == false ){
            document.getElementById('terms').disabled = true;
        }
        else if(document.getElementById('check').checked == true){
            document.getElementById('terms').disabled = false;
        }
    }
    */
</script>
<script>
    function validateform(){  
var name=document.agencyform.aname.value;  
var adress=document.agencyform.adress.value;  
var lang=document.agencyform.lang.value;
var team=document.agencyform.team.value;
var number = document.agencyform.tel.value;
var website =document.agencyform.site.value;
var email= document.agencyform.email.value;


  
if (name==null || name=="" || adress=="" || lang=="" || team=="" || website=="" || email=="" || number=="" ){  
    
    name.classList.add("error_show");
    lang.classList.add("error_show");
    team.classList.add("error_show");
    adress.classList.add("error_show");
    website.classList.add("error_show");
    email.classList.add("error_show");
    number.classList.add("error_show");

    
    return false;  
}
  
}  
</script>
<script>
  
    
</script>
<script>
    /*
            $(document).ready(function() {
                $('#').click(function() {
                    var inputVal = $("#select").change(function (event) {
                    $(this).val();
                        });
                    $.ajax
                    ({
                        type: "POST",
                        url: 'uploadser.php',
                        contentType: "application/json",
                        data: JSON.stringify({inputVal})
                    })
                    .done(function(data) {
                        console.log(data);
                    });
                });
            });
            */
        </script>



<script>
    /*
$(document).ready(function(){
$('#').click(function(){
	var data=$('#myDIV').serialize()+'&=';
	$.ajax({
		url:'uploadser.php',
		type:'post',
		data:data,
		success:function(response){
		$('#mesg').text(response);
	
		}
	});
});
});
*/

/*
function jsp(){
$(document).ready(function(){
$('#').click(function(){
	var data=$('#myDIV').serialize()+'&=';
	$.ajax({
		url:'uploadser.php',
		type:'post',
		data:data,
		success:function(response){
		$('#mesg').text(response);
	    
	    
		}
	});
});
});
}*/
</script>
</script>
<script>

    function skill(){
        var selected = document.getElementById("select");
        document.getElementById("hideme1");
        document.getElementById("hideme2");
        document.getElementById("hideme3");
        if(selected.value === "SEO"){
            document.getElementById("hideme2").style.display="none";
            document.getElementById("hideme3").style.display="none";
            document.getElementById("hideme1").style.display="block"; 
            document.getElementById("hideme4").style.display="none";
            document.getElementById("hideme5").style.display="none";
            document.getElementById("hideme6").style.display="none";
            document.getElementById("hideme7").style.display="none";
            document.getElementById("hideme8").style.display="none";
            
            
           

            console.log(document.getElementById("hideme1"));    

        }
        else if(selected.value === "Copywriting"){
            document.getElementById("hideme1").style.display="none";
            document.getElementById("hideme2").style.display="block"; 
            document.getElementById("hideme3").style.display="none";
            document.getElementById("hideme4").style.display="none";
            document.getElementById("hideme5").style.display="none";
            document.getElementById("hideme6").style.display="none";
            document.getElementById("hideme7").style.display="none";
            document.getElementById("hideme8").style.display="none";
            
            
            console.log(document.getElementById("hideme2"));    
        }
        else if(selected.value==="Social Media"){
            document.getElementById("hideme1").style.display="none";
            document.getElementById("hideme2").style.display="none";
            document.getElementById("hideme3").style.display="block"; 
            document.getElementById("hideme4").style.display="none";
            document.getElementById("hideme5").style.display="none";
            document.getElementById("hideme6").style.display="none";
            document.getElementById("hideme7").style.display="none";
            document.getElementById("hideme8").style.display="none";
            


            console.log(document.getElementById("hideme3"));    
        }
        else if(selected.value ==="E-commerce"){
            document.getElementById("hideme1").style.display="none";
            document.getElementById("hideme2").style.display="none";
            document.getElementById("hideme4").style.display="block";
            document.getElementById("hideme3").style.display="none";
            document.getElementById("hideme5").style.display="none";
            document.getElementById("hideme6").style.display="none";
            document.getElementById("hideme7").style.display="none";
            document.getElementById("hideme8").style.display="none";
            
        }
        else if(selected.value==="Content Strategy"){
            document.getElementById("hideme1").style.display="none";
            document.getElementById("hideme2").style.display="none";
            document.getElementById("hideme5").style.display="block";
            document.getElementById("hideme4").style.display="none";
            document.getElementById("hideme6").style.display="none";
            document.getElementById("hideme7").style.display="none";
            document.getElementById("hideme8").style.display="none";
            document.getElementById("hideme3").style.display="none";
           
            
        }
        else if(selected.value==="Branding And Positioning"){
            document.getElementById("hideme1").style.display="none";
            document.getElementById("hideme2").style.display="none";
            document.getElementById("hideme6").style.display="block";
            document.getElementById("hideme4").style.display="none";
            document.getElementById("hideme7").style.display="none";
            document.getElementById("hideme8").style.display="none";
            document.getElementById("hideme3").style.display="none";
            document.getElementById("hideme5").style.display="none";
          
            

        }
        else if(selected.value === "Digital Strategy"){
            document.getElementById("hideme1").style.display="none";
            document.getElementById("hideme2").style.display="none";
            document.getElementById("hideme7").style.display="block";
            document.getElementById("hideme3").style.display="none";
            document.getElementById("hideme4").style.display="none";
            document.getElementById("hideme5").style.display="none";
            document.getElementById("hideme6").style.display="none";
            document.getElementById("hideme8").style.display="none";
        }
        else if(selected.value==="Graphic Design"){
            document.getElementById("hideme1").style.display="none";
            document.getElementById("hideme2").style.display="none";
            document.getElementById("hideme3").style.display="none";
            document.getElementById("hideme4").style.display="none";
            document.getElementById("hideme5").style.display="none";
            document.getElementById("hideme6").style.display="none";
            document.getElementById("hideme7").style.display="none";
            document.getElementById("hideme8").style.display="block";
        }
    }
    
  
</script>
<script>
$(document).ready(function() {

$("#butsave").click(function (e) { 
var content11 = $('#text').html(); 
var content1 = content11.replace(/<\/?[^>]+(>|$)/g, ""); 
var content22 =$('#texts').html();
var content2 = content22.replace(/<\/?[^>]+(>|$)/g, ""); 
var content33 = $('#text3').html();
var content3 = content33.replace(/<\/?[^>]+(>|$)/g, ""); 
var content44 =$('#text4').html();
var content4 =content44.replace(/<\/?[^>]+(>|$)/g, ""); 
var mesg= document.getElementById('mesg');
//var content2 = $('input[type="radio"]:checked').val();

            $.ajax({
                url: 'uploadser.php',
                type: 'POST',
               
                data: {
                content1: content1, content2: content2 , content3: content3 , content4: content4 ,
            },
                success : function (){
                 $('#text').html("");
                
                 $('#texts').html("");
                 
                 $('#text3').html("");
                
                 $('#text4').html("");
                 mesg.innerHTML="Saved Successfully";
                 
                },
        });
        });

   });  
</script>
<script>
    function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }
    var serv =document.getElementById('text');
    
    if (serv.innerHTML =="") {
       // document.getElementById('text').innerHTML= 'No Services Yet';
    }
    
    function savedata() {
        // set attribute method not working 
        const parag = document.createElement("p");
        const paraz =document.createElement("p");
        const paras =document.createElement("p");
        const para = document.createElement("p");
        para.innerHTML = document.getElementById("select").value;
        document.getElementById("text").style.display="block";
        document.getElementById("text").appendChild(para);
        var name= document.getElementById('select').value;
        console.log(name);
        var ele = document.getElementsByName('price');
        var check =document.getElementById("texts");
              
              for(i = 0; i < ele.length; i++) {
                  if(ele[i].checked){
                 
                        console.log(ele[i].value);
                        paras.innerHTML =ele[i].value;
                        
                    }
              }
              document.getElementById("texts").style.display="block";
              check.appendChild(paras);
              
              //document.getElementById("text2").appendChild(para2);
              var selected = document.getElementById("select");
              if(selected.value=="SEO")
           { 
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                   
                     paraz.innerHTML += "- " + inputElements[i].value
                        + "  ";
                   
                    
                    
                }
            }}
            else if (selected.value=="Social Media"){
            
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z2');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                    paraz.innerHTML += "- " + inputElements[i].value
                        + "  ";
                   
                    
                    
                }
            }
            }
            else if (selected.value =="Copywriting"){
                
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z1');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                    paraz.innerHTML += "- " + inputElements[i].value
                        + "  ";
                   
                    
                    
                }
            }
            }
            else if ( selected.value=="E-commerce"){
            
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z3');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                    paraz.innerHTML += "- " + inputElements[i].value
                        + "  ";
                   
                    
                    
                }
            }
            }
            else if( selected.value=="Content Strategy"){
            
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z4');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                    paraz.innerHTML += "- " + inputElements[i].value
                        + "  ";
                   
                    
                    
                }
            }
            }
            else if (selected.value=="Branding And Positioning"){
           
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z5');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                    paraz.innerHTML += "- " + inputElements[i].value 
                        + "  ";
                   
                    
                    
                }
            }
            }
            else if (selected.value=="Digital Strategy"){
           
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z6');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                paraz.innerHTML += "- " + inputElements[i].value
                        + "  ";
                   
                    
                    
                }
            }
            }
            else if (selected.value=="Graphic Design"){
           
            var checkedValue = null; 
            var inputElements = document.getElementsByClassName('z7');
          
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                    paraz.innerHTML += "- " + inputElements[i].value 
                        + "  ";
                       
                   
                    
                    
                }
            }
            }
            console.log(paraz);
            document.getElementById("text3").style.display="block";
            document.getElementById('text3').appendChild(paraz);
            
        
        parag.innerHTML = document.getElementById("desc").value;
        document.getElementById("text4").style.display="block";
        document.getElementById("text4").appendChild(parag);
        
        
        

}

/*function save_data()
{
	var form_element = document.getElementsByClassName('form_data');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	document.getElementById('submit').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'process_data.php');

	ajax_request.send(form_data);

	ajax_request.onreadystatechange = function()
	{
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('submit').disabled = false;

			var response = JSON.parse(ajax_request.responseText);

			if(response.success != '')
			{
				alert("succcess");

			
			}
			else
			{
				//display validation error
				alert("falied");
			}

			
		}
	}
}


;*/

</script>

<script>

</script>
<script>
    
    
</script>

</body>
</html>