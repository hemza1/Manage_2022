<!DOCTYPE html>
<?php
session_start();
require('db.php');

  // output data of each row
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Starter Dashboard Layout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.css" />
    <link rel="stylesheet" href="css/tailwind.css" />
    <link rel="stylesheet" href="css/proto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.2/dist/flowbite.min.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="contact.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <style>
      input{
        width: 450px;
      }
    </style>
  </head>
  <body class="antialiased text-gray-900 bg-white">
  
    <div
      class="flex h-screen overflow-y-hidden bg-white"
      x-data="setup()"
      x-init="$refs.loading.classList.add('hidden')"
    >
      <!-- Loading screen -->
      <div
        x-ref="loading"
        class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        Loading.....
      </div>
      <!-- Sidebar backdrop -->
      <div
        x-show.in.out.opacity="isSidebarOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      ></div>
      <!-- Sidebar -->
      <aside
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="-translate-x-full opacity-0 ease-in"
        class="
          fixed
          inset-y-0
          z-10
          flex flex-col flex-shrink-0
          w-64
          max-h-screen
          overflow-hidden
          transition-all
          transform
          bg-white
          border-r
          shadow-lg
          lg:z-auto lg:static lg:shadow-none
        "
        :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
      >
        <!-- sidebar header -->
        <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
          <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
            <span :class="{'lg:hidden': !isSidebarOpen}">-WD</span>
          </span>
          <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg
              class="w-6 h-6 text-gray-600"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <!-- Sidebar links -->
        <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
          <ul class="p-2 overflow-hidden">
            <li>
              <a
                href="#"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                :class="{'justify-center': !isSidebarOpen}"
              >
                <span>
                  <svg
                    class="w-6 h-6 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                  </svg>
                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }"></span>
              </a>
            </li>
            <!-- Sidebar Links... -->
          </ul>
        </nav>
        <!-- Sidebar footer -->
        
        <div class="flex-shrink-0 p-2 border-t max-h-14">
          <button
            class="
              flex
              items-center
              justify-center
              w-full
              px-4
              py-2
              space-x-1
              font-medium
              tracking-wider
              uppercase
              bg-gray-100
              border
              rounded-md
              focus:outline-none focus:ring
            "
          >
            <span>
              <svg
                class="w-6 h-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
              </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
          </button>
        </div>
        
      </aside>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <header class="flex-shrink-0 border-b">
          <div class="flex items-center justify-between p-2">
            <!-- Navbar left -->
            <div class="flex items-center space-x-3">
              <span class="p-2 text-xl font-semibold tracking-wider uppercase">
              <img src="assets/img/logo-dark.svg" alt="" srcset="" style="
              height: 30px;
              padding-bottom :3px;
              margin: auto;
             ">
              </span>
              <!-- Toggle sidebar button -->
             
            </div>

            <!-- Mobile search box -->
            

            <!-- Desktop search box -->
            

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">
              <!-- Search button -->
              

              

              <!-- User Menu -->
              <div class="relative " x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring mr-5 btn">
                <i class="fa fa-bars"></i>
                </button>
                <!-- green dot -->
                

                <div
                  @click.away="isOpen = false"
                  x-show.transition.opacity="isOpen"
                  class="
                    absolute
                    z-50
                    w-48
                    max-w-md
                    mt-3
                    transform
                    bg-white
                    rounded-md
                    shadow-lg
                    -translate-x-3/4
                    min-w-max
                  "
                >
                  <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                    <span class="text-gray-800"><?php 
                    $user=$_SESSION['username'];
                    $sql = "SELECT * FROM  client WHERE username='$user'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        echo 'Hello , '.$row['firstname']. ' ' .$row['lastname'];
                      }
                    } else {
                      echo "0 results";
                    }
                    ?></span>
                    <span class="text-sm text-gray-400"></span>
                  </div>
                  <ul class="flex flex-col p-2 my-2 space-y-1">
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                    </li>
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                    </li>
                  </ul>
                  <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                    <a href="logout.php">Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>

        <!-- Main content -->
        <?php 
  require('db.php');
  require('redirect.php');
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; 
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div
            class="
              flex flex-col
              items-start
              justify-between
              pb-6
              space-y-4
              border-b
              lg:items-center lg:space-y-0 lg:flex-row
            "
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">My Dashboard</h1>
            
            
            
          </div>
          <h2 class="text-center text-xl m-4">Enrich your project details</h2>
          <h6 class="text-center "> Make your project stand out by providing additional details. Detailed projects are validated more quickly and increase your chances of attracting the best agencies.</h6>

          <!-- Start Content -->

          <!-- Chart cards (Four columns grid) -->
          <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2 lg:grid-cols-2">
            <!-- Users chart card --><div
              href="#"
              class="p-4 transition-shadow border rounded-lg shadow-sm "
            >
              <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                  <span class="text-gray-400">Agencies with the same services</span>
                  <span class="text-lg font-semibold"><?php
                  $user=$_SESSION['username']; 
                  $result = mysqli_query($con, "SELECT COUNT(agency_name) AS `count` FROM `agency` WHERE service=(SELECT service From client WHERE username='$user')");
                  $row = mysqli_fetch_array($result);
                  $count = $row['count'];
                  echo $count;
                
                  ?>
                  </span>
                </div>
                
              </div>
              
                  </div>

            <!-- Sessions chart card --><div
              href="#"
              class="p-4 transition-shadow border rounded-lg shadow-sm"
            >
              <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                  <span class="text-gray-400">Agencies with the same Languages</span>
                  <span class="text-lg font-semibold"><?php

                    $user=$_SESSION['username']; 
                    $result = mysqli_query($con, "SELECT COUNT(language) AS `count` FROM `agency` WHERE language=(SELECT lang From client WHERE username='$user')");
                    $row = mysqli_fetch_array($result);
                    $count = $row['count'];
                    echo $count;


                  ?>
                  </span>
                </div>
                <div class="relative min-w-0 ml-auto h-14">
                  <canvas id="sessionsChart"></canvas>
                </div>
              </div>
              
                  </div>

            <!-- Vists chart card --><div
              href="#"
              class="p-4 transition-shadow border rounded-lg shadow-sm "
            >
              <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                  <span class="text-gray-400">Agencies in the same location</span>
                  <span class="text-lg font-semibold"><?php
                  $user=$_SESSION['username']; 
                  $result = mysqli_query($con, "SELECT COUNT(adress) AS `count` FROM `agency` WHERE adress=(SELECT place From client WHERE username='$user')");
                  $row = mysqli_fetch_array($result);
                  $count = $row['count'];
                  echo $count;
                
                  ?></span>
                </div>
                <div class="relative min-w-0 ml-auto h-14">
                  <canvas id="vistsChart"></canvas>
                </div>
              </div>
              
                  </div>

            <!-- Articles chart card --><div
              href="#"
              class="p-4 transition-shadow border rounded-lg shadow-sm "
            >
              <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                  <span class="text-gray-400">Total SortList Agencies</span>
                  <span class="text-lg font-semibold"><?php
                  $user=$_SESSION['username']; 
                  $result = mysqli_query($con, "SELECT COUNT(agency_name) AS `count` FROM `agency`");
                  $row = mysqli_fetch_array($result);
                  $count = $row['count'];
                  echo $count;
                
                  ?></span>
                </div>
                <div class="relative min-w-0 ml-auto h-14">
                  <canvas id="articlesChart"></canvas>
                </div>
              </div>
              
             
            
            </div>
          </div>

          <!-- Two columns grid -->
          <div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-2 xl:grid-cols-4">
            <!-- Import data card -->
            

            <!-- Monthly chart card -->
            <div class="border rounded-lg shadow-sm xl:col-span-4">
              <!-- Card header -->
              <div class="flex items-center justify-between px-4 py-2 border-b">
                <h5 class="font-semibold">Next Steps</h5>
                <!-- Dots button -->
                <button class="p-2 rounded-full">
                  <svg
                    class="w-6 h-6 text-gray-600"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                    />
                  </svg>
                </button>
              </div>
              <!-- Card content -->
              <div class="flex items-center p-4 space-x-4">
                
              <ol class="relative border-l border-gray-200 dark:border-gray-700">
    <li class="mb-10 ml-4">
    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
   
    <h3 class="text-lg font-semibold text-gray-900 dark:text-dark">Post a project</h3>
    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Outline your project details and receive early suggestions of agencies by email within a few minutes.</p>
    
    </li>
    <li class="mb-10 ml-4">
    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
   
    <h3 class="text-lg font-semibold text-gray-900 dark:text-dark">Receive your shortlist</h3>
    <p class="text-base font-normal text-gray-500 dark:text-gray-400">After validation of your project, you'll receive a list of matching agencies by email.</p>
    </li>
    <li class="ml-4">
    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
    
    <h3 class="text-lg font-semibold text-gray-900 dark:text-dark">Connect with agencies</h3>
    <p class="text-base font-normal text-gray-500 dark:text-gray-400">When you're ready, we'll help you get in touch with the agencies you want to meet.</p>
    <a href="#" class="inline-flex items-center py-2 px-4 my-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn more <svg class="ml-2 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
    </li>
    </ol>

     
                  
                
              
              </div>
              <!-- Chart -->
             
            </div>
          </div>

          <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
          <form action="" method="post">
          <h3 class="mt-6 text-xl text-center">Questions and Answers</h3>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs text font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          About your project
                        </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">What is your project ?

                                </div>
                               
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            
                            <div class="text-sm text-gray-500">
                              <div class="formLine">
                              <?php
                              $user=$_SESSION['username'];
                              $sql = "SELECT project FROM client WHERE username='$user' ";
                              $result = mysqli_query($con, $sql);

                              if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                               ?>

                            <input type="text" name="project" class="still" value="<?php echo $row["project"]; } } ?>"/>
                            
                              
                            
                             </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                          <button type="" name="button1" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                          <?php
                            if(array_key_exists('button1', $_POST)) {
                            button1();
                            }
            
                              function button1() {
                                require('db.php');
                                
                                $proj=$_POST['project'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET project='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                            
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                              
                                <div class="text-sm font-medium text-gray-900">What service do you need?
                                <?php   
                                $user=$_SESSION['username'];
                                $sql = "SELECT service FROM client WHERE username='$user'";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>

                                </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            
                          <div class="text-sm text-gray-500">
                          <?php 
                          $selected3 =$row['service'];
                          $options=array('Copywriting',' Digital Strategy','Branding & Positioning','SEO',' E-commerce','Copywriting',' Website Creation','Graphic Design');
                          echo'<select>';
                          foreach($options as $option){
                            if($selected3 == $option){
                              echo"<option selected='selected' value='$option'>$option</option>";
                            }
                            else{
                              echo"<option value='$option'>$option</option>";
                            }
                          }

                          
                          ?> 
                          <!-- <input type="text" name="service" value="<?php }}?> ">  -->
                          </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button  class="text-indigo-600 hover:text-indigo-900" name="button2">Edit</button>
                            <?php
                            if(array_key_exists('button2', $_POST)) {
                            button2();
                            }
            
                              function button2() {
                                require('db.php');
                                
                                $proj=$_POST['service'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET service='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                            ?>
                          </td>
                        </tr>
                        
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">What budget range would be comfortable for you?

                                </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php  
                            $user=$_SESSION['username'];
                            $sql = "SELECT budget FROM client WHERE username='$user'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            
                           
                            ?>
                            <div class="text-sm text-gray-500">  
                            <?php 
                          $selected =$row['budget'];
                          $options=array('From €1,000 to €5,000','Between €5,000 and €15,000',' Between €10,000 and €20,000','Between €30,000 and €50,000','Between €50,000 and €100,000',' More than €100,000','We have not set the budget yet');
                          echo'<select>';
                          foreach($options as $option){
                            if($selected == $option){
                              echo"<option selected='selected' value='$option'>$option</option>";
                            }
                            else{
                              echo"<option value='$option'>$option</option>";
                            }
                          }

                          
                          ?> 
                              <!-- <input type="text" name="budget" value="<?php   }} ?>"> </div> -->
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button3">Edit</button>
                            <?php
                          if(array_key_exists('button3', $_POST)) {
                            button3();
                            }
            
                              function button3() {
                                require('db.php');
                                
                                $proj=$_POST['budget'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET budget='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          </form>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs text font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Conditions
                        </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Where should the agency be active?



                                </div>
                               
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                            $user=$_SESSION['username'];
                            $sql = "SELECT place FROM client WHERE username='$user'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            
                            ?>
                          <div class="text-sm text-gray-500"> 
                            <input type="text" name="place" value="<?php echo $row["place"];}} ?>">  </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button4">Edit</button>
                            <?php
                           if(array_key_exists('button4', $_POST)) {
                            button4();
                            }
            
                              function button4() {
                                require('db.php');
                                
                                $proj=$_POST['place'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET place='$proj' WHERE username='$user'";
                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Which size of agency would you prefer?
                                    


                                </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php     
                             $user=$_SESSION['username'];
                             $sql = "SELECT size FROM client WHERE username='$user'";
                             $result = mysqli_query($con, $sql);
                             if (mysqli_num_rows($result) > 0) {
                             // output data of each row
                             while($row = mysqli_fetch_assoc($result)) { ?>
                             <div class="text-sm text-gray-500">
                             <?php 
                          $selected =$row['size'];
                          $options=array('Small Agency (Less than 1000€)','Medium Agency (Between €5,000 and €15,000)','Big Agency (Superior than €15,000)');
                          echo'<select>';
                          foreach($options as $option){
                            if($selected == $option){
                              echo"<option selected='selected' value='$option'>$option</option>";
                            }
                            else{
                              echo"<option value='$option'>$option</option>";
                            }
                          }
                          
                          ?> 
                          <?php 
                            }
                            } 
                            ?>

                           </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900"name="button5">Edit</button>
                            <?php
                          if(array_key_exists('button5', $_POST)) {
                            button5();
                            }
            
                              function button5() {
                                require('db.php');
                                
                                $proj=$_POST['size'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET size='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Which language(s) should the agency speak? </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                            $user=$_SESSION['username'];
                            $sql = "SELECT lang FROM client WHERE username='$user'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="text-sm text-gray-500">
                            <?php 
                          $selected =$row['lang'];
                          $options=array('French','English','Spanish','Chinese','Dutch,Netherland','Dutch,Belgium','German',' Italian','Other');
                          echo'<select>';
                          foreach($options as $option){
                            if($selected == $option){
                              echo"<option selected='selected' value='$option'>$option</option>";
                            }
                            else{
                              echo"<option value='$option'>$option</option>";
                            }
                          }
                          
                          ?> 
                              <?php 
                            }
                            } 
                            ?>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button6">Edit</button>
                            <?php
                            if(array_key_exists('button6', $_POST)) {
                            button6();
                            }
            
                              function button6() {
                                require('db.php');
                                
                                $proj=$_POST['lang'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET lang='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                            ?>
                          </td>
                        </tr>
                        
                      
                    </tbody>
                     
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs text font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          About you
                        </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">What is your firstname?



                                </div>
                               
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                          $user=$_SESSION['username'];
                          $sql = "SELECT firstname FROM client WHERE username='$user'";
                          $result = mysqli_query($con, $sql);
                          if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($result)) {
                          
                          ?>
                          <div class="text-sm text-gray-500"> <input type="text" name="fname" value="<?php echo  $row["firstname"];
                          }
                          } ?>"> </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button7">Edit</button>
                            <?php
                          if(array_key_exists('button7', $_POST)) {
                            button7();
                            }
            
                              function button7() {
                                require('db.php');
                                
                                $proj=$_POST['fname'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET firstname='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">What is your last name ?



                                </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                            $user=$_SESSION['username'];
                            $sql = "SELECT lastname FROM client WHERE username='$user'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            
                            ?>
                            <div class="text-sm text-gray-500"> <input type="text" name="lname" value="<?php echo  $row["lastname"];
                            }
                            } ?>" > </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button8">Edit</button>
                            <?php
                          if(array_key_exists('button8', $_POST)) {
                            button8();
                            }
            
                              function button8() {
                                require('db.php');
                                
                                $proj=$_POST['lname'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET lastname='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">What is your job ?  </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                            $user=$_SESSION['username'];
                            $sql = "SELECT job FROM client WHERE username='$user'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            
                            ?>
                            <div class="text-sm text-gray-500"> 
                              <input type="text" name="job" value="<?php echo  $row["job"];
                            }
                            } ?>">
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button9">Edit</button>
                            <?php
                          if(array_key_exists('button9', $_POST)) {
                            button9();
                            }
            
                              function button9() {
                                require('db.php');
                                
                                $proj=$_POST['job'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET job='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">In which industry do you work?

                                </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                            $user=$_SESSION['username'];
                            $sql = "SELECT industry FROM client WHERE username='$user'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                           
                            ?>
                            <div class="text-sm text-gray-500">
                              <input type="text" name="ind" value="<?php echo $row["industry"];
                            }
                            } 
                            ?>"> </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button10">Edit</button>
                            <?php
                          if(array_key_exists('button10', $_POST)) {
                            button10();
                            }
            
                              function button10() {
                                require('db.php');
                                
                                $proj=$_POST['ind'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET industry='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">What is your company name?

                                </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                          $user=$_SESSION['username'];
                          $sql = "SELECT companyname FROM client WHERE username='$user'";
                          $result = mysqli_query($con, $sql);
                          if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($result)) {
                         
                          ?>
                            <div class="text-sm text-gray-500">
                              <input type="text" name="cname" value="<?php echo $row["companyname"];
                          }
                          } ?> "> </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button11">Edit</button>
                            <?php
                          if(array_key_exists('button11', $_POST)) {
                            button11();
                            }
            
                              function button11() {
                                require('db.php');
                                
                                $proj=$_POST['cname'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET companyname='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                             
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">What is your email ?

                                </div>
                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                          <?php    
                            $user=$_SESSION['username'];
                            $sql = "SELECT username FROM client WHERE username='$user'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            
                           
                            ?>
                            <div class="text-sm text-gray-500"> 
                              <input type="text" name="username" value="<?php echo  $row["username"];
                            }
                            } ?>">
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="
                                inline-flex
                                px-2
                                text-xs
                                font-semibold
                                leading-5
                                text-green-800
                                bg-green-100
                                rounded-full
                              "
                            >
                              Answered
                            </span>
                          </td>
                          
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <button class="text-indigo-600 hover:text-indigo-900" name="button12">Edit</button>
                            <?php
                          if(array_key_exists('button12', $_POST)) {
                            button12();
                            }
            
                              function button12() {
                                require('db.php');
                                
                                $proj=$_POST['username'];
                                $user=$_SESSION['username'];
                                $sql = "UPDATE client SET username='$proj' WHERE username='$user'";

                                if (mysqli_query($con, $sql)) {
                                   redirect('dashboardclient1.php');
                                }
                              }
                          ?>
                          </td>
                        </tr>
                        
                      
                    </tbody>
                     
                  </table>
                </div>
              </div>
            </div>
          </div>
         
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                
                <!-- Services Section-->
        <h1 class="text-center text-2xl m-4">Suggested Agencies</h1>                        
       
          <?php
          require('db.php');
          
          $user=$_SESSION['username'];
          $query1 = mysqli_query($con,"SELECT * FROM service WHERE name=(SELECT service From client WHERE username='$user') ");
        while ($row1 = mysqli_fetch_array($query1)) {
?>
 
 <div class="flex flex-col my-12">
	<div
		class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-6xl mx-auto border border-white bg-white" style="width:100%">
		<div class="w-full md:w-1/3 bg-white grid place-items-center">
			<img src="<?php echo 'uploads/'.$row1['file_name'] ?>" alt="agency logo" class="rounded-xl" />
    </div>
			<div class="w-full  justify-center md:w-2/3 bg-white flex flex-col  justify-center	 space-y-2 p-3">
				
				<h3 class="font-black text-gray-800 md:text-3xl text-xl"><?php $serv=$row1['agency_name']; echo $serv ?></h3>
        <div class="flex justify-between item-center">
        <?php 
          $sql = "SELECT * FROM agency WHERE agency_name='$serv'";
          $result = mysqli_query($con, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row12 = mysqli_fetch_assoc($result)) {
              echo '<p class="text-gray-500 font-medium hidden md:block">'.$row12['adress'].'</p>';
            }
          } 
          
					
          ?>
					<div class="flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20"
							fill="currentColor">
							<path
								d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
						</svg>
            <?php 
             $sql = "SELECT * FROM agency WHERE agency_name='$serv'";
             $result = mysqli_query($con, $sql);
             
             if (mysqli_num_rows($result) > 0) {
               // output data of each row
               while($row23 = mysqli_fetch_assoc($result)) {
                if($row23['reviews'] !=""){
                  echo '<p class="text-gray-600 font-bold text-sm ml-1">
                  '.$row23['reviews'].'
                 
                </p> 
                ';
              }
              else{
                echo '<p class="text-gray-600 font-bold text-sm ml-1">
                  0 reviews
                 
                </p> 
              ';
               }
             } 

              
            }
              
            
						
            ?>
					</div> 
         
					<?php 
          $sql = "SELECT  * FROM service WHERE agency_name='$serv'";
          $result = mysqli_query($con, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row6 = mysqli_fetch_assoc($result)) {
              echo '<div class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 md:block">
              '.$row6['name'].'</div>';
            }
          } else {
            echo "0 results";
          }
          ?>
					
				</div>

				<?php 
        if($row1['description'] !="")
        {echo '<p class="md:text-lg text-gray-500 text-base">'.$row1['description'].'</p>';} 
        
        
        ?>
				<p class="text-xl font-black text-gray-800">
					<?php 
          $sql = "SELECT price FROM service WHERE agency_name='$serv' AND name='$selected3'";
          $result = mysqli_query($con, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row22 = mysqli_fetch_assoc($result)) {
              
              echo $row22["price"];
            }
          } 
          ?>£
					<span class="font-normal text-gray-600 text-base">/Project</span>
				</p> <br>
        
        <?php 
           
           $user=$_SESSION['username'];
           $sql ="SELECT * FROM agency WHERE agency_name='$serv' ORDER BY Id DESC";
           $result=mysqli_query($con,$sql);
           if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $link="profile.php?id=$row[Id]";
              echo '<div class="flex justify-end	"><a href=pages/'.$link.'><button>See Agency</button></a></div>';
             
             
              
              
            }
          } 
           ?>  
        
			</div>
     
		</div>
    
	</div>
            
            <?php
            // here 
                }

                ?>

  <?php /*
  $query1 = mysqli_query($con,"SELECT * FROM agency WHERE adress=(SELECT place From client WHERE username='$user')");
        while ($row1 = mysqli_fetch_array($query1)) {
?>
            <article class="card">
                <div class="card-header">
                    <div>
                        <span>
                        <?php 
                        
                        //echo '<img src="uploads/'. $row1['file_name'] .'"/>'
                        
                        echo "<img src='uploads/".$row1['file_name']."'>";
                       

                        ?>
                        </span>
                        <h3><?php echo $row1['agency_name'] ?>
                        
                        
                      </h3> 
                     
                        
                    </div>
                    
                  
                </div>
                <div class="services">
                <h4><?php echo $row1['service'] ?> Agency</h4>
                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row1['adress'] ?></h4>
                
                <h4>Number of people in the team : <?php echo $row1['people'] ?></h4>
                </div>
                <div class="card-body">
                    <p><?php 

                    ?></p>
                </div>
                <div class="card-footer">
                <button type="button"data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-center">Contact Agency</button>
                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Form to Contact Agency</h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">
      <div id="box">
      <form id="form" enctype="multipart/form-data" onsubmit="return validate()" method="post">
        <h4 class="text-center text-red-700"><strong> What you'll mention here will be transmitted Directly to the selected Agency</strong></h4>
        <label>Full Name: <span>*</span></label>
        <input type="text" id="name" name="name" placeholder="Nom" 
        value=" <?php
        require('db.php');
        $user=$_SESSION['username'];
        $sql = "SELECT firstname, lastname FROM client WHERE username='$user'";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo  $row["firstname"]. " " . $row["lastname"];
          }
        } 
        ?>"/>
        <label>Email: <span>*</span></label><span id="info" class="info"></span>
        <input type="text" id="email" name="email" placeholder="Email" value=""/>
        <label>Project: <span>*</span></label>
        <input type="text" id="subject" name="subject" placeholder="Demande de renseignement"
         value="<?php
         require('db.php');
         $user=$_SESSION['username'];
         $sql = "SELECT project FROM client WHERE username='$user'";
         $result = mysqli_query($con, $sql);
         
         if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result)) {
             echo  $row["project"];
           }
         } 
         ?>
         "
        
        />
        <label>More informations :</label>
        <textarea id="message" name="message" placeholder="Message..."></textarea>
        <input type="submit" name="send" value="Send Message" class="bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out"/>
        <div id="statusMessage"> 
            <?php if (! empty($db_msg)) { ?>
              <p class='<?php echo $type_db_msg; ?>Message'><?php echo $db_msg; ?></p>
            <?php } ?>
            <?php if (! empty($mail_msg)) { ?>
              <p class='<?php echo $type_mail_msg; ?>Message'><?php echo $mail_msg; ?></p>
            <?php } ?>
        </div>
      </form>
      <?php
  if(!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $toEmail = "hamzaelyesri6@gmail.com";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";
    if(mail($toEmail, $subject, $message, $mailHeaders)) {
      $mail_msg = "Vos informations de contact ont été reçues avec succés.";
      $type_mail_msg = "success";
    }else{
      $mail_msg = "Erreur lors de l'envoi de l'e-mail.";
      $type_mail_msg = "error";
    }
  }

?>
<?php
  if(!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
   
    $result = mysqli_query($con, "INSERT INTO contact (name, email, subject, message) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $message. "')");
    if($result){
      $db_msg = "Vos informations de contact sont enregistrées avec succés.";
      $type_db_msg = "success";
    }else{
      $db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
      $type_db_msg = "error";
    }
  }
?>
      </div>               
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button type="button" class="px-6
          py-2.5
          bg-purple-600
          text-white
          font-medium
          text-xs
          leading-tight
          uppercase
          rounded
          shadow-md
          hover:bg-purple-700 hover:shadow-lg
          focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0
          active:bg-purple-800 active:shadow-lg
          transition
          duration-150
          ease-in-out" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                </div>
            </article>
            <?php
            // here 
                }

                */?>


  
            
      
              </div>
            </div>
            
          </div>
          
        </main>
                            
        <!-- Main footer -->
        
      </div>
      <!-- Setting panel button -->
     

      <!-- Settings panel -->
      
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.2/dist/flowbite.js"></script>
      <?php
     
      ?>
  </body>
  
</html>
