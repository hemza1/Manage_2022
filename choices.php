
<!DOCTYPE html>
<html lang="en">
    <?php
     session_start();
     require('db.php');
     require('redirect.php');
     if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        
   
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.4.1/shuffle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cards.css">
</head>
<style type="text/css">
    .dropdown-large{ padding:1rem; }

    /* ============ desktop view ============ */
    @media all and (min-width: 992px) {
        .dropdown-large{min-width:500px;}
    }	
    /* ============ desktop view .end// ============ */
</style>
<!-- navbar dropdown megamenu button-->
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function(element){
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })
    }); 
    // DOMContentLoaded  end
</script>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="logosl.png" alt="" srcset="" class="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> About  </a>
                        <div class="dropdown-menu dropdown-large">
                            <div class="row g-3">
                                <div class="col-6">
                                    <h6 class="title"><b> <i class="fas fa-user-friends"></i>For Clients </b></h6>
                                    <ul class="list-unstyled">
                                        <li><a href="#">How it works  </a></li>
                                        <li><a href="#">Clients Stories </a></li>
                                        <li><a href="#">Explore agencies </a></li>
                                        <li><a href="#">Blog </a></li>
                                        
                                        
                                    </ul>
                                </div><!-- end col-3 -->
                                <div class="col-6">
                                    <h6 class="title"><b><i class="fas fa-store-alt"></i>For Agencies</b></h6>
                                    <ul class="list-unstyled">
                                        <li><a href="#">How it works </a></li>
                                        <li><a href="#">Agencies Stories </a></li>
                                        <li><a href="#">Pricing </a></li>
                                        <li><a href="#">Get listed </a></li>
                                        
                                    </ul>
                                </div><!-- end col-3 -->
                            </div><!-- end row -->
                        </div> <!-- dropdown-large.// -->
                    </li>
                    
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-search" onclick="afficher()"></i> <input type="text" placeholder="Search in Sortlist" id="search2" style="display: none;"> </a></li>
                    <li class="nav-item"><a class="nav-link btn btn-light" href=""><?php echo $_SESSION['username']?> </a></li>
                    <li class="nav-item"><a class="nav-link btn btn-info" href="logout.php">Logout </a></li>
                    
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div> <!-- container-fluid.// -->
    </nav>
<form action="" method="post">
<main class="page-content">
    
    <div class="card">
        <div class="content">
            <h2 class="title">Find the best agency </h2>
            <p class="copy">Answer some questions to find easily the most relevant agencies for your project.</p><a href="formAgency.php"><button class="bouton" name="btn2">Explore</button></a>
        </div>
    </div>
    <div class="card">
        <div class="content">
            <h2 class="title">Register / Claim your agency</h2>
            <p class="copy">Register your agency to increase its online visibility and get relevant opportunities.</p><a href="formClient.php"><button class="bouton"name="btn1">Explore</button></a>
        </div>
    </div>
    <?php
            function btn1(){
                require('db.php');
               
                $user=$_SESSION['username'];
                $sql = "UPDATE  users SET type_user='Agency' WHERE username='$user'";
    
                    if (mysqli_query($con, $sql)) {
                        redirect('formAgency.php');
                     } else {
                     echo "Error updating record: " . mysqli_error($con);
                    }
            function button1(){
                require('db.php');
               
                $result = mysqli_query($con,"SELECT * FROM users  WHERE type_user = 'Agency'");
                if(mysqli_num_rows($result) == 0) {
                    redirect('signin.php');
                }
            }
               
    
            }
            function btn2(){
                require('db.php');
                
                $user=$_SESSION['username'];
                $sql = "UPDATE users SET type_user='Client' WHERE username='$user'";
    
                    if (mysqli_query($con, $sql)) {
                       redirect('formClient.php');
                     } else {
                     echo "Error updating record: " . mysqli_error($con);
                    }
            }
            function button2(){
                require('db.php');
                
                $result = mysqli_query($con,"SELECT * FROM users  WHERE type_user = 'Client'");
                if(mysqli_num_rows($result) == 0) {
                redirect('signin.php');
                }
            }
            
    
        if(array_key_exists('btn1', $_POST)) { 
            btn1();
            button1();
        } 
        else if(array_key_exists('btn2', $_POST)) { 
            btn2();
            button2();
        } 
        

     
    ?>
    
</main>
</form>
<footer>
    <!-- a little presentation about sortlist-->
    <div class="presentation">
        <img src="images\logo-dark.svg" alt="">
        <p>We are an independent partner who knows Marketing & <br> Advertising agencies' competitive landscape. <br> Tell us your needs and we'll tell you the agencies you must meet.</p>
        <div class="social-medias">
            <!-- social media images-->
            <a href=""><img src="images\twitter.svg" alt=""></a>
            <a href=""><img src="images\facebook.svg" alt=""></a>
            <a href=""><img src="images\linkedin (1).svg" alt=""></a>
            <a href=""><img src="images\instagram.svg" alt=""></a>
            <a href=""><img src="images\youtube.svg" alt=""></a>
        </div>

    </div>
    <div class="contact">
        <h6>Sortlist</h6>
        <a href="">About</a>
        <a href="">Jobs</a>
        <a href="">Blog</a>
        <a href="">Contact</a>
    </div>
    <div class="for-clients">
        <h6>For clients</h6>
        <a href="">How it works</a>
        <a href="">Testimonials</a>
        <a href="">Explore</a>
        <a href="" class="colored-link">I need an Agency</a>
    </div>
    <div class="for-agencies">
        <h6>For Agencies</h6>
        <a href="">How it works</a>
        <a href="">Testimonials</a>
        <a href="">Pricing</a>
        <a href=""class="colored-link">I'm an agency</a>
    </div>
</footer>
<div class="terms">
    <small>2021 © Sortlist | All right reserved
        - <a href="">Terms</a>
        -  <a href="">Privacy</a>
        -  <a href="">Help Center</a>
        -  <a href="">Countries</a>
        - Languages
        - Country
        </small>
</div>
<?php
  }
?>
</body>
</html>