<?php

 /*Date       User          Description
 * -----  ------------ ------------------------------------
 * 2/11/2022  Kyle Jones    INITIAL creation of listemployees.php
*/
require_once ('./model/database.php');
require_once ('./model/employee.php');


$employees = EmployeeDB::getEmployees();
?>
<!DOCTYPE html>
<!--Name: Kyle Jones
Date: 9/1/2021-->
<!----------------------------------------------------------------------------------------------------------------
--
#Original Author: Kyle Jones                                      #
#Date Created: 9/1/2021                                        #
#Version:1                                                 #
#Date Last Modified:                                #
#Modified by:                                           #
#Modification log:                                    #
 --
 #Original Author: Kyle Jones                                      #
#Date Created: 9/13/2021                                        #
#Version:1                                                 #
#Date Last Modified: 9/13/2021                                #
#Modified by: Kyle Jones                                          #
#Modification log: version #3 

Added a favicon to my HTML 
source: http://tdcdecals.com/Order-of-the-White-Lotus-Symbol-Avatar-the-Last-Airbender-Vinyl-Die-Cut-Decal-Sticker-P3386332.aspx
https://favicon.io/favicon-converter/
------------------------------------------------------------------------------------------------------------------>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="description" content="Project 2">
    <meta name="author" content="Kyle Jones">
    <meta name="keywords" content="contact, number, email ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!--Bootstrap links-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--Favicon links-->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" sizes="192x192" href="images/android-chrome-192x192.png">

    <link href="css/stylesheet.css" type="text/css" rel="stylesheet">
    <title>Contact the Avatar</title>

</head>
<header>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Order of the White Lotus</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.html"> <img src="images/favicon-32x32.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="newsletter.html">Newsletter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="FAQs.html">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order.html">Order</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="admin.php">Admin</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="listemployees.php">Emp List</a>
          </li>
            </ul>
            
        </div>
    </nav>
</header>
<body>
    <main class="page">
        <h1>Employee list</h1>
        <p>
        <ul>
            <?php foreach ($employees as $employee) : ?>
            <li> <?php echo $employee->getLastName() . ',' 
                    . $employee->getFirstName(); ?></li>
            <?php endforeach; ?>
        </ul>  
        </p>
        <br>
    </main>
    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js%22%3E"></script>-->
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script> 
    <script src="./js/contact.js"></script>
    <footer>
        <p>&copy; Copy rights reserved</p>
        <p>Order from the White Lotus</p>
    </footer> 
</body>
</html>