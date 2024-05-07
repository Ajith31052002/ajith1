<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Validation Example</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
   jQuery.validator.addMethod("strongPassword", function(value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/.test(value);
  }, "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.");

  jQuery.validator.addMethod("letterswithbasicpunc", function(value, element) {
    return this.optional(element) || /^[a-zA-Z.,!?'\s]+$/.test(value);
  }, "Please enter letters and basic punctuation only.");

  jQuery.validator.addMethod("indianMobile", function(value, element) {
    return this.optional(element) || /^[6-9]\d{9}$/.test(value);
  }, "Please enter a valid Indian mobile number.");


  jQuery(document).ready(function() {
     jQuery("#myForm").validate({
        rules: {
           firstname: {
              required: true,
              minlength: 2,
              maxlength: 50,
              letterswithbasicpunc: true
              
           },
           lastname: {
              required: true,
              minlength: 2,
              maxlength: 50,
             
           },
           u_email: {
              required: true,
              email: true,
              maxlength: 255
           },
           password: {
              required: true,
              minlength: 8,
              maxlength: 50,
              strongPassword: true
           },
           confirm_password: {
              required: true,
              equalTo: "#password"
           },
           age: {
              required: true,
              digits: true,
              range: [18, 100]
           },
            mobile_number: {
              required: true,
              indianMobile: true
           }
        },
        messages: {
           firstname: {
              required: "Please enter your first name.",
              minlength: "First name must be at least 2 characters long.",
              maxlength: "First name cannot exceed 50 characters.",
              letterswithbasicpunc: "Please enter a valid first name."
             
           },
           lastname: {
              required: "Please enter your last name.",
              minlength: "Last name must be at least 2 characters long.",
              maxlength: "Last name cannot exceed 50 characters.",
              
           },
           u_email: {
              required: "Please enter your email address.",
              email: "Please enter a valid email address.",
              maxlength: "Email address cannot exceed 255 characters."
           },
           password: {
              required: "Please enter a password.",
              minlength: "Password must be at least 8 characters long.",
              maxlength: "Password cannot exceed 50 characters.",
              strongPassword: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character."
           },
           confirm_password: {
              required: "Please confirm your password.",
              equalTo: "Passwords do not match."
           },
           age: {
              required: "Please enter your age.",
              digits: "Please enter a valid age.",
              range: "Age must be between 18 and 100."
           },
           mobile_number: {
              required: "Please enter your mobile number.",
              indianMobile: "Please enter a valid Indian mobile number."
           }
        }
     });
  });
</script>
<style>
  label.error {
    color: red;
    font-style: italic;
  }
</style>
</head>
<body>

<form id="myForm" action="#" method="post">
  <label for="firstname">First Name:</label><br>
  <input type="text" id="firstname" name="firstname"><br>
  
  <label for="lastname">Last Name:</label><br>
  <input type="text" id="lastname" name="lastname"><br>

  <label for="mobile_number">Mobile Number:</label><br>
  <input type="text" id="mobile_number" name="mobile_number"><br>
  
  <label for="u_email">Email:</label><br>
  <input type="text" id="u_email" name="u_email"><br>
  
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>
  
  <label for="confirm_password">Confirm Password:</label><br>
  <input type="password" id="confirm_password" name="confirm_password"><br>
  
  <label for="age">Age:</label><br>
  <input type="text" id="age" name="age"><br>
  
  <input type="submit" value="Submit">
</form>

</body>
</html>
