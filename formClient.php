<!DOCTYPE html>
<?php
session_start();
require('db.php');
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
   }
$userr=$_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM users  WHERE type_user = 'client' AND username='$userr'");
if(mysqli_num_rows($result) == 0) {
    redirect('signin.php');
} else {
    

    
    
    



?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Step By Step Form</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
  <link rel="stylesheet" href="css/formClient.css">
    
  
  
</head>

<body>
<form id="resume" method="POST" action="adduser.php"> 
<div class="modal-wrap">
  <div class="modal-header"><span class="is-active"></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>
  <div class="modal-bodies">


    <div class="modal-body modal-body-step-1 is-showing">
      <div class="title">Step 1</div>
      <div class="description logo"><img src="images\logo-dark.svg" alt="" srcset="" class="img"></div>
        <div class="text-center">We'll ask you the right questions so we can introduce you to the right agencies.</div>
        <br>
        <div class="text-center">
          <div class="button">Start</div>
        </div>
    </div>


    <div class="modal-body modal-body-step-2">
      <div class="title">Step 2</div>
      <div class="description">What service do you need ?</div>
      <fieldset>
            <div class="wrapper">
              <div class="box">
               
                <div class="upload-options">
                  <label>
                    <input type="radio"  name="a" class="image-upload" value="Digital Strategy"  />
                    Digital Strategy
                  </label>
                  <label>
                    <input type="radio" name="a" class="image-upload" value="Branding & Positioning"  />
                    Branding & Positioning
                  </label>
                  <label>
                    <input type="radio" name="a" class="image-upload" value="SEO" />
                    SEO
                  </label>
                  <!-- <label>
                    <input type="radio" name="a" class="image-upload" value="Content Strategy" />
                    Content Strategy
                  </label> -->
                  <label>
                    <input type="radio" name="a" class="image-upload" value="E-commerce"  />
                    E-commerce
                  </label>
                  <label>
                    <input type="radio" name="a" class="image-upload" value="Copywriting"  />
                    Copywriting
                  </label>
                  <label>
                    <input type="radio" name="a" class="image-upload" value="Website Creation" />
                    Website Creation
                  </label>
                  <label>
                    <input type="radio" name="a" class="image-upload" value="Graphic Design" />
                    Graphic Design
                  </label>
                </div>
              </div>

              
            </div>      
      </fieldset>  
        <br>
      
        <div class="text-center fade-in">
          <div class="button2">Back</div>
          <div class="button">Next</div>
        </div>
      
    </div>

    <div class="modal-body modal-body-step-3">
      <div class="title">Step 3</div>
      <div class="description">What is your job ?</div>
      <fieldset id="personal" >
            <div class="wrapper">
              <div class="box">
               
                <div class="upload-options">
                  <label>
                    <input type="radio"  name="b" class="image-upload" value="Business Owner / CEO"  />
                    Business Owner / CEO
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value="Marketing Director / CMO" />
                    Marketing Director / CMO
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value=" Marketing Manager or Brand Manager" />
                    Marketing Manager or Brand Manager
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value="Consultant" />
                    Consultant
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value="Procurement or Purchasing Manager" />
                    Procurement or Purchasing Manager
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value="Marketing Agency" />
                    Marketing Agency
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value="Sales Representative or Business Developer" />
                    Sales Representative or Business Developer
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value="Student" />
                    Student
                  </label>
                  <label>
                    <input type="radio" name="b" class="image-upload" value="Other" />
                    Other
                  </label>
                </div>
              </div>

              
            </div>      
      </fieldset>  
      <br>
      
        <div class="text-center fade-in">
          <div class="button2">Back</div>
          <div class="button">Next</div>
        </div>
      
    </div>
    

    <div class="modal-body modal-body-step-4">
      <div class="title">Step 4</div>
      <div class="description">What budget range would be comfortable for you?</div>
      <fieldset id="educational">
      
            <div class="wrapper">
              <div class="box">
               
                <div class="upload-options">
                  <label>
                    <input type="radio"  name="c" class="image-upload" value="From €1,000 to €5,000"  />
                    From €1,000 to €5,000
                  </label>
                  <label>
                    <input type="radio" name="c" class="image-upload" value=" Between €5,000 and €15,000" />
                    Between €5,000 and €15,000
                  </label>
                  <label>
                    <input type="radio" name="c" class="image-upload" value="Marketing Manager or Brand Manager"  />
                   Between €10,000 and €20,000
                  </label>
                  <label>
                    <input type="radio" name="c" class="image-upload" value="Between €30,000 and €50,000"  />
                    Between €30,000 and €50,000
                  </label>
                  <label>
                    <input type="radio" name="c" class="image-upload" value="Between €50,000 and €100,000"  />
                    Between €50,000 and €100,000
                  </label>
                  <label>
                    <input type="radio" name="c" class="image-upload" value="More than €100,000"  />
                    More than €100,000
                  </label>
                  <label>
                    <input type="radio" name="c" class="image-upload" value="We have not set the budget yet" />
                    We have not set the budget yet
                  </label>
                  <label>
                    <input type="radio" name="c" class="image-upload" value="Other" />
                      <input type="number" placeholder="Other ( Please Specify )">
                  </label>
                  
                </div>
              </div>

              
            </div>      
        
        <br>
        <br>
        <div class="text-center fade-in">
          <div class="button2">Back</div>
          <div class="button">Next</div>
        </div>
      </fieldset>
    </div>



    <div class="modal-body modal-body-step-5">
      <div class="title">Step 5</div>
      <div class="description">Where the agency should be working ?</div>
      <fieldset id="experience">
        <input type="text" name="place" placeholder="Precise the City,Country">
        <div class="text-center fade-in">
          <div class="button2">Back</div>
          <div class="button">Next</div>
        </div>
      </fieldset>
    </div>


    <div class="modal-body modal-body-step-6">
      <div class="title">Step 6</div>
      <div class="description">Which size of agency would you prefer?</div>
      <fieldset id="skill">
      <label>
                    <input type="radio"  name="d" class="image-upload" value="From €1,000 to €5,000"  />
                    From €1,000 to €5,000
                  </label>
                  <label>
                    <input type="radio" name="d" class="image-upload" value="Between €5,000 and €15,000" />
                    Between €5,000 and €15,000
                  </label>
                  <label>
                    <input type="radio" name="d" class="image-upload" value="Marketing Manager or Brand Manager" />
                    Marketing Manager or Brand Manager
                  </label>
                  <label>
                    <input type="radio" name="d" class="image-upload"value=" Between €30,000 and €50,000"  />
                    Between €30,000 and €50,000
                  </label>
        
        <div class="text-center fade-in">
          <div class="button2">Back</div>
          <div class="button">Next</div>
        </div>
      </fieldset>
    </div>


    <div class="modal-body modal-body-step-7">
      <div class="title">Step 7</div>
      <div class="description">Which language(s) should the agency speak?</div>
      <fieldset id="awards">
      <label>
                    <input type="radio"  name="e" class="image-upload" value="English"  />
                   English
                  </label>
                  <label>
                    <input type="radio" name="e" class="image-upload" value="French" />
                    French
                  </label>
                  <label>
                    <input type="radio" name="e" class="image-upload" value="Dutch,Netherland"  />
                    Dutch,Netherland
                  </label>
                  <label>
                    <input type="radio" name="e" class="image-upload" value="Dutch,Belgium" />
                    Dutch,Belgium
                  </label>
                  <label>
                    <input type="radio" name="e" class="image-upload" value="Spanish" />
                    Spanish 
                  </label>
                  <label>
                    <input type="radio" name="e" class="image-upload" value="German"  />
                    German
                  </label>
                  <label>
                    <input type="radio" name="e" class="image-upload" value="Italian"  />
                    Italian
                  </label>
                  <label>
                    <input type="radio" name="e" class="image-upload" value="Other" />
                    Other <input type="text" placeholder="Precise Please">
                  </label>
        <div class="text-center fade-in">
          <div class="button2">Back</div>
          <div class="button">Next<div>
        </div>
      </fieldset>
    </div>

     <div class="modal-body modal-body-step-8">
      <div class="title">Step 8</div>
      <div class="description">In Which Industry do you work ?</div>
      <fieldset id="accounts">
      <label>
                    <input type="radio"  name="f" class="image-upload" value="Automative" />
                    Automative
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Beverage"  />
                    Beverage
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Clothing & Accessories"  />
                    Clothing & Accessories
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Consumer Electronics"  />
                    Consumer Electronics
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Energy & Oil"  />
                    Energy & Oil
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Banking & Financials"  />
                    Banking & Financials
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Government & Administration"  />
                    Government & Administration
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Hospitals & Healthcare"  />
                     Hospitals & Healthcare
                  </label>
                  <label>
                    <input type="radio" name="f" class="image-upload" value="Other" />
                    Other <input type="text" placeholder="Please Precise">
                  </label>
                  <div class="text-center fade-in">
          <div class="button2">Back</div>
          <div class="button">Next<div>
        </div>
      </fieldset>
    </div>
    <div class="modal-body modal-body-step-8">
      <div class="title">Step 9</div>
      
      <fieldset id="skills">
      <div class="description">What's your first name</div>
      <input type="text" name=fname placeholder="Please precise your first name here">
      <div class="description">What's your last name</div>
      <input type="text" name=lname placeholder="Please precise your first name here">
      <div class="description">What's your company's name</div>
      <input type="text" name="cname" placeholder="Please precise your company's name">
      <div class="description">What's your project</div>
      <input type="text" name="project" placeholder="Please precise your project">
                  <div class="text-center fade-in">
          <div class="button2">Back</div>
          <input class="button" type="submit" name="submit"/><div>
          
        </div>
      </fieldset>
    </div>
    <!-- <div class="modal-body modal-body-step-8">
      <div class="title">Step 10</div>
      
      <fieldset id="submission">
      <div class="description">Please Write down below your username to validate</div>
      <input type="text" name=username placeholder="Please precise your first name here">
     
          <div class="text-center fade-in">
          <div class="button2">Back</div>
          <input class="button" type="submit" name="submit"/><div>
            
        </div>
      </fieldset>
    </div> -->
    
    <div class="modal-body modal-body-step-9">
      <div class="title"></div>
      <div class="circles">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                </div>
      <div class="description">Processing ...</div>
      <div class="text-center">
       
       
      </div>
    </div>


  </div>
</div>
<div class="text-center">
  <div class="rerun-button">ReRun</div>
</div>
</form>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js'></script>
    <script src="js/index.js"></script>
    <script src="js/add_entry.js"></script>
    

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 

    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
	  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
      <script src="formClient.Js"></script>
     
<?php

    } 

  

?>
</body>
</html>
