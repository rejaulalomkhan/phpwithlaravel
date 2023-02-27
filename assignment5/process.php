<?php 
// Check if the form has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if the form have name and email
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email'])){
        // Retrieve the user's name and email from the form data
        $name = $_POST['name'];
        $email = $_POST['email'];

        // set the name and email properties
        require_once 'person.php';
        $person1->setName($name);
        $person1->setEmail($email);

        // Use the getName() and getEmail() methods to display the properties on the webpage
        echo "Name: " . $person1->getName() . "<br>";
        echo "Email: " . $person1->getEmail() . "<br>";
    }else{
        echo "Please provide all information";
    }
}