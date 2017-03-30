<?php
//Reday

//session stuff
session_start();
$email = $_SESSION['email'];
$username = $_SESSION['username'];

// Starting Connection
$mongoClient = new MongoClient();
$db = $mongoClient->Users;
$collection = $db->UserCustomers;

//fetch data intp variables
$pw = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
$firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_GET, 'address', FILTER_SANITIZE_STRING);
$postcode = filter_input(INPUT_GET, 'postcode', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_NUMBER_INT);

//Save query
$query = array('email' => $email);

//cursor operation
$count = $collection -> findOne($query);


//Creating JSON object
$user_upt_info = [
        'Username' => $username,
        "Password" => $pw,
        'email' => $email,
        "age" => $age,
        "Firstname" => $firstname,
        'Lastname' => $lastname,
        "Address" => $address,
        "Postcode" => $postcode
    ];

//Updating
$returnVal = $collection->update($query, $user_upt_info);

// Closing Connection
$mongoClient->close();


//redirect to logout
echo '<script type="text/javascript">
           window.location = "logout.php"
     </script>';

?>


