<?php

/* 
 *  Date       User          Description
 * -----  ------------ ------------------------------------
 * 2/11/2022  Kyle Jones    INITIAL creation of employee.php
 */


function addVisit($email_address, $phone, $country, $contact, $terms, $comments) {
 $db = Database::getDB();
 $query = 'INSERT INTO visit
	(email_address, cell_phone, country, contact_me, terms_service, visit_msg, visit_date, employee_id)
    VALUES (:email_address, :phone, :country, :contact, :terms, :comments, NOW(), 1)';
   $statement = $db->prepare($query);
   $statement->bindValue(':email_address', $email_address);
   $statement->bindValue(':phone', $phone);
   $statement->bindValue(':country', $country);
   $statement->bindValue(':contact', $contact);
   $statement->bindValue(':terms', $terms);
   $statement->bindValue(':comments', $comments);
   $statement->execute();
   $statement->closeCursor();
}

function getVisitByEmp($employee_id) {
    $db = Database::getDB();
    $queryVisit = 'SELECT * 
        FROM visit
        JOIN employee
        ON visit.employee_id = employee.employee_id
        WHERE employee.employee_id =  :employee_id
        ORDER BY visit_date';
    $statement2 = $db->prepare($queryVisit);
    $statement2->bindValue(":employee_id", $employee_id);
    $statement2->execute();
    $visits = $statement2;
    return $visits;
}

function delVisit($visit_id) {
    $db = Database::getDB();
    $queryDelete = 'Delete FROM visit Where visit_id = :visit_id';
    $statement3 = $db->prepare($queryDelete);
    $statement3->bindValue(":visit_id", $visit_id);
    $statement3->execute();
    $statement3->closeCursor();
}
?>