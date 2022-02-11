<?php
//*******************
// Name     Date        Description
//-----------------------------
//Kyle      2/4/2022      Initial Deployment 
//
//Kyle      2/11/2022       Updating admin.php
//
//**********************
   try {
      require_once ('./model/database.php');
      require_once ('./model/visit.php');
      require_once ('./model/employee.php');
       $db = Database::getDB();
   } catch (PDOException $ex) {
       $error_message = $e->getMessage();
       echo 'DB Error: '. $error_message;
   } 
   // check action
   $action = filter_input(INPUT_POST, 'action');
   if ($action == NULL) {
       $action = filter_input(INPUT_GET, 'action');
       if ($action == NULL) {
           $action = 'list_visits';
       }
   }
   
   if ($action == 'list_visits') {
       $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
     if ($employee_id == NULL || $employee_id == FALSE) {
         $employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);
         if ($employee_id == NULL || $employee_id == FALSE) {
             $employee_id = 1; 
         }
       
   }
   try { //set query, prepare, bid if needed execute
       $employees = EmployeeDB::getEmp();
       $visits = getVisitByEmp($employee_id);
       
//       $queryVisit = 'SELECT * 
//        FROM visit
//        JOIN employee
//        ON visit.employee_id = employee.employee_id
//        WHERE employee.employee_id =  :employee_id
//        ORDER BY visit_date';
//       $statement2 = $db->prepare($queryVisit);
//       $statement2->bindValue(":employee_id", $employee_id);
//       $statement2->execute();
//       $visits = $statement2;
       
   } catch (PDOException $ex) {
      $error_message = $e->getMessage();
       echo 'DB Error: '. $error_message; 
   }
} else if ($action == 'delete_visit') {
    //echo ('Starting delete logic.');
    $visit_id = filter_input(INPUT_POST, 'visit_id', FILTER_VALIDATE_INT);
    $employee_id = filter_input($INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
//    $queryDelete = 'Delete FROM visit Where visit_id = :visit_id';
    delVisit($visit_id);    
//    $statement3 = $db->prepare($queryDelete);
//    $statement3->bindValue(":visit_id", $visit_id);
//    $statement3->execute();
//    $statement3->closeCursor();
    header("Location: admin.php?employee_id=$employee_id");

}
   //echo 
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
              <a class="nav-link" href="admin.php"><h4>Admin</h4></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="listemployees.php">Emp List</a>
          </li>
            </ul>
            
        </div>
    </nav>
</header>
<body>
    <main class="customM1 container">
        <section class="container rounded mt-5 p-5">
        <h1>Admin</h1>
        <h3>Select an employee to view the assigned visit information. </h3>
        <aside>
            <ul style="list-style-type: none; ">
                <?php foreach ($employees as $employee) : ?>
                <li>
                    <a href="?employee_id=<?php echo $employee['employee_id'];  ?>">
                        <?php  echo $employee['first_name'] . '' 
                        .$employee['last_name']; ?>
                    </a>
                </li>
                <?php  endforeach; ?>
            </ul>
        </aside>
        <table>
            <tr>
                <th>Email Address</th>
                <th>Cell Phone</th>
                <th>Date</th>
                <th>Country</th>
                <th>Contact</th>
                <th>Terms</th>
                <th>Message</th>
                <th></th> 
                
            </tr>
            <?php foreach ($visits as $visit) : ?>
            <tr>
                <td><?php echo $visit['email_address'] ?></td>
                <td><?php echo $visit['cell_phone'] ?></td>
                <td><?php echo $visit['visit_date'] ?></td>
                <td><?php echo $visit['country'] ?></td>
                <td><?php echo $visit['contact_me'] ?></td>
                <td><?php echo $visit['terms_service'] ?></td>
                <td><?php echo $visit['visit_msg'] ?></td>
                <td>
                    <form action="admin.php" method="post">
                        <input type="hidden" name="employee_id"
                               value="<?php echo $visit['employee_id']; ?>">
                        <input type="hidden" name="action" value="delete_visit"> 
                        <input type="hidden" name="visit_id" 
                               value="<?php echo $visit['visit_id']; ?>">
                        <input type="submit" value="Delete">    
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p>Plan for Project 3: 1. Read employee data 2. Read visit data 3. Add for loop in body to create employee anchor links 
            4. Add for loop in body to display visit info by employee 
            5. Add the correct PHP to showcase data? 6. Add if or else statements if needed to program data 7. Collect data for dates and times of employees
            7. Add correct functions to display data  8. Collect visitor comments by employee
            9. Add a update or delete for visitors comments on the page 10. Fix all errors before final form is posted
            11. Double check for mistakes. /p>
        <br>
        </section>
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
