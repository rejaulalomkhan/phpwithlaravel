<?php 
class Person {
    // Properties
    public $name;
    public $email;

    // Methods
    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

// Create an instance of the Person class 
$person1 = new Person();