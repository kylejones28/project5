"use strict";

$( document ).ready( () => {

    $( "#join_list" ).click( () => {
        $("span").text("");   // clear any previous error messages
        
        // get values entered by user
        const email1 = $("#email_1").val();
	    const email2 = $("#email_2").val();
        const firstName = $("#first_name").val();
        const lastName = $("#last_name").val();
        var message = $("span").val();
        // regular expressions for validity testing
        const emailPattern = /^[\w\.\-]+@[\w\.\-]+\.[a-zA-Z]+$/;
        
     
        // check user entries for validity
        let isValid = true;
        const success = "Thank you for subscribing to our news letter";

        if ( email1 === "" || !emailPattern.test(email1) ) {
            isValid = false;
            $("#email_1").next().text("Please enter a valid email.");
        }
        if ( email2 === "" || !emailPattern.test(email2) ) {
            isValid = false;
            $("#email_2").next().text("Please enter a valid email.");
        }
	    if (email1.value != email2.value) { 
            email2.nextElementSibling.textContent = "Both emails must match.\n";
            isValid = false;
        }
       
	    if (firstName.value == "") {
            firstName.nextElementSibling.textContent= "First name is required.\n";
            isValid = false;
        }
        else{
            message = "*";
        }

        if (lastName.value == "") {
            lastName.nextElementSibling.textContent= "Last name is required.\n";
            isValid = false;
        }
        else{
            message = "*";
        }
        if ( isValid ) { 
            alert(success);
            // code that saves profile info goes here
        }
        
        $("#email_address").focus(); 
    });

$( "#clear_form" ).click( () => {
    $("#email_form").trigger("reset");
    // remove error messages
    //$("ul").remove();
    
    $("#email_1").focus();
});
    
    // set focus on initial load
    $("#email_1").focus(); 
});























































/*const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    
    $("#join_list").addEventListener("click", () => {
        // get values user entered in textboxes
        const email1 = $("#email_1");
        const email2 = $("#email_2");
        const firstName = $("#first_name");
        const lastName = $("#last_name");

        // create an error message and set it to an empty string
        let isValid = true;
        const success = "Thank you for subscribing to our news letter";
        // check user entries - add text to error message if invalid
        if (email1.value == "") { 
            email1.nextElementSibling.textContent = "First email is required.\n";
            isValid = false
        }
        else{
            email1.nextElementSibling.textContent = "";
        }
    
        if (email2.value == "") { 
            email2.nextElementSibling.textContent = "Second email is required.\n";
            isValid = false;
        }
        else{
            email2.nextElementSibling.textContent = "";
        }
    
        if (email1.value != email2.value) { 
            email2.nextElementSibling.textContent = "Both emails must match.\n";
            isValid = false;
        }
    
        if (firstName.value == "") {
            firstName.nextElementSibling.textContent= "First name is required.\n";
            isValid = false;
        }
        else{
            firstName.nextElementSibling.textContent = "";
        }

        if (lastName.value == "") {
            lastName.nextElementSibling.textContent= "Last name is required.\n";
            isValid = false;
        }
        else{
            lastName.nextElementSibling.textContent = "";
        }
        
    
        // submit the form if error message is an empty string
        if (isValid) {
            alert(success);
        } 
    });

    $("#clear_form").addEventListener("click", () => {
        $("#email_1").value = "";
        $("#email_2").value = "";
        $("#first_name").value = "";
        $("#last_name").value = "";

        $("#email_1").focus();
    });
    
    $("#email_1").focus();
});*/







































/*const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    
    $("#join_list").addEventListener("click", () => {
        // get values user entered in textboxes
        const email1 = $("#email_1").value;
        const email2 = $("#email_2").value;
        const firstName = $("#first_name").value;
        
        // create an error message and set it to an empty string
        let errorMessage = "";

        // check user entries - add text to error message if invalid
        if (email1 == "") { 
            errorMessage += "First email is required.\n";
        }
    
        if (email2 == "") { 
            errorMessage += "Second email is required.\n";
        }
    
        if (email1 != email2) { 
            errorMessage += "Both emails must match.\n";
        }
    
        if (firstName == "") {
            errorMessage += "First name is required.\n";
        }
        if (lastName == "") {
            errorMessage += "Last name is required.\n";
        }
    
        // submit the form if error message is an empty string
        if (errorMessage == "") {
            $("#email_form").submit();
        } else {
            alert(errorMessage);            
        }
    });

    $("#clear_form").addEventListener("click", () => {
        $("#email_1").value = "";
        $("#email_2").value = "";
        $("#first_name").value = "";
        $("#last_name").value = "";
        
        $("#email_1").focus();
    });
    
    $("#email_1").focus();
});*/