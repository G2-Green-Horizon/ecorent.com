<?php

    class User{
        public $userID;
        public $firstName;
        public $lastName;
        public $email;
        public $password;
        public $status;
        public $gender;
        public $contactNumber;
        public $address;
        public $accountCreationDate;
        public $accountUpdateDate;
        public $profilePicture;

        public function __construct($firstName, $lastName, $email, $password){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
        }
            
        public function registerUser(){
            global $conn;
            $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

            $insertUserQuery = "INSERT INTO users (firstName, lastName, email, password) 
            VALUES ('$this->firstName', '$this->lastName', '$this->email', '$passwordHash')";
            
            return executeQuery($insertUserQuery); 
    }
}

?>