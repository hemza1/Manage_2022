<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
          Soft UI Dashboard by Creative Tim
        </title>
        <!--     Fonts and icons     -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
      
        <style>
      
                      /* POPUP EDITER  */
                      #fvpp-blackout {
                  display: none;
                  z-index: 499;
                  position: fixed;
                  width: 100%;
                  height: 100%;
                  top: 0;
                  left: 0;
                  background: #000;
                  opacity: 0.5;
                  }
      
                  #pop-up-content {
                  /* display: none;
                  z-index: 999;
                  position:fixed;
                  width: 36%; 
                  left: 32%;
                  top: 0%;
                  padding-top: 50px;
                  /* padding: 20px 2%; 
                  font-family: Calibri, Arial, sans-serif;
                  overflow: auto; 
                  background-color: rgb(0,0,0) 100%; 
                  background-color: rgba(0,0,0,0.4) 100%; */
          
      
                  width: 36%; 
                  display: none; /* Hidden by default */
                  position: fixed; /* Stay in place */
                  z-index: 999; /* Sit on top */
                  padding-top: 100px; /* Location of the box */
                  /* left: 0;  */
                  top: 0;
                  width:100%;
                  
                  overflow: auto; /* Enable scroll if needed */
                  background-color: rgb(0,0,0); /* Fallback color */
                  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                          
      
                  }
                  .close {
                  color: rgb(226, 122, 122);
                  float: right;
                  font-size: 21px;
                  position: absolute;
                  right: 5px;
                  top: 2px;
                  font-family: arial;
                  }
      
                  #fvpp-close {
                      position: absolute;
                      top: -16px;
                      right: -10px;
                      font-size: 23px;
                      cursor: pointer;
                      font-weight: bold;
                      color: #8BDB9F;
                      padding: 1px 9px;
                  }
      
      
               
                      .profile-card-2 {
                      background-color: #FFF;
                      box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
                      background-position: center;
                      overflow: hidden;
                      position: relative;
                      margin: 10px auto;
                      cursor: pointer;
                      border-radius: 10px;
                  }
      
                  .profile-card-2 img {
                      transition: all linear 0.25s;
                      height: 100%;
                  }
      
                  .profile-card-2 .profile-name {
                      position: absolute;
                      left: 30px;
                      bottom: 70px;
                      font-size: 30px;
                      color: #FFF;
                      text-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
                      font-weight: bold;
                      transition: all linear 0.25s;
                  }
      
                  .profile-card-2 .profile-icons {
                      position: absolute;
                      bottom: 30px;
                      right: 30px;
                      color: #FFF;
                      transition: all linear 0.25s;
            }

            .profile-card-2 .profile-username {
                position: absolute;
                bottom: 50px;
                left: 30px;
                color: #FFF;
                font-size: 13px;
                transition: all linear 0.25s;
            }

            .profile-card-2 .profile-icons .fa {
                margin: 5px;
            }

            .profile-card-2:hover img {
                filter: grayscale(100%);
            }

            .profile-card-2:hover .profile-name {
                bottom: 80px;
            }

            .profile-card-2:hover .profile-username {
                bottom: 60px;
            }

            .profile-card-2:hover .profile-icons {
                right: 40px;
            }

  </style>
</head>
<body>
    <div class="container-fluid">
      
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/banner.jpg'); background-position-y: 50%;">
          <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
          <div class="row gx-4">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
              <?php echo "<img src='data:image/jpg;charset=utf8;base64,".base64_encode($row->user_image)."' alt='profile_image' class='w-100 border-radius-lg shadow-sm'>"?>
                <!-- <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class='w-100 border-radius-lg shadow-sm"> -->
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1"></h5>
                <p class="mb-0 font-weight-bold text-sm">
                  CEO / Co-Founder
                </p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" href="Home.php" role="tab" aria-selected="false">
                      <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                         <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero"> -->
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(603.000000, 0.000000)">
                                <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                </path>
                                <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                      <span class="ms-1">Home</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" href="orders.php" role="tab" aria-selected="true">
                      <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(603.000000, 0.000000)">
                                <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                </path>
                                <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                      <span class="ms-1">My Orders</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 " href="profile.php" role="tab" aria-selected="false">
                      <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>document</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(154.000000, 300.000000)">
                                <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                </path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                      <span class="ms-1">About</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" href="settings.php" role="tab" aria-selected="false" >
                      <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>settings</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(304.000000, 151.000000)">
                                <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                </polygon>
                                <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                </path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                      <span class="ms-1">Settings</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
  
          </div>
        </div>
      </div>
</body>
</html>