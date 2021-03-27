<?php
    class regex {
        public $emailRegex = '/([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,3}$/';
        public $passwordRegex = "/[a-zA-Z]+[\d]+[\_]{1,16}$/";

        public function emailValidation($email){
            return preg_match($this->emailRegex, $email);
        }

        public function contactValidation($contact){
            if(strlen(strval($contact)) == 10){
                return true;
            }return false;
        }

        public function nameValidation($name){
            if(strlen(trim($name)) > 0){
                return true;
            }return false;
        }

        public function passwordValidation($pass){
            if(preg_match($this->passwordRegex, $pass) && strlen($pass) > 3 && strlen($pass) < 16){
                return true;    
            }return false;
        }
    }

    class donator extends regex{
        private $id;
        public $name;
        public $DOB;
        public $gender;
        private $password;
        public $email;
        public $contact;
        public $address;
        public $city;
        public $state;
        public $pinCode;
        public $directory;

        function __construct($name, $dob, $gender, $pass, $email, $contact, $address, $city, $state, $pincode)
        {
            $this->id = "DON-".$contact;
            $this->name = (String)$name;
            $this->DOB = $dob;
            $this->gender = (String)$gender;
            $this->password = $pass;
            $this->email = strtolower($email);
            $this->contact = (int)$contact;
            $this->address = (String)$address;
            $this->city = (String)$city;
            $this->state = (String)$state;
            $this->pinCode = (int)$pincode;
            $this->directory = (string)("../uploads/donation_photos/" . $this->id);
        }

        function getID(){
            return (string)$this->id;
        }

        function comparePassword($tempPassword){
            return (Boolean)($this->password == $tempPassword);
        }

        function getPassword(){
            return password_hash($this->password, PASSWORD_DEFAULT);
        }

        function inputValidation(){
            if($this->emailValidation($this->email) && $this->contactValidation($this->contact) && $this->passwordValidation($this->password) && $this->nameValidation($this->name)){
                    return true;
                }else{
                    // code for pop-up instruction
                    return false;
                }
            }

            function Autho(){
                require("../php/connection.php");
                $resultNGO = $sqlConnection->query("SELECT count(email) AS email, count(contact) AS contact FROM ngocred WHERE email='$this->email';");
                $result = $sqlConnection->query("SELECT count(email) AS email, count(contact) AS contact FROM donatorcred WHERE email='$this->email';");
                
                $resultNGO=$resultNGO->fetch_object();
                $resultObj = $result->fetch_object();
                if(($resultObj->email > 0 || $resultObj->contact > 0) || ($resultNGO->email > 0 || $resultNGO->contact > 0)){
                    return false;
                }else{
                    return true;
                }
            }
    }

    class ngo extends regex{
        private $id;
        public $orgName;
        public $startupDate;
        private $password;
        public $email;
        public $contact;
        public $city;
        public $state;
        public $pinCode;
        public $address;
        public $registeredOn;

        function __construct($name, $startup, $pass, $email, $contact, $city, $state, $address, $pincode){
            $this->orgName = (string)$name;
            $this->startupDate = $startup;
            $this->password = (string)$pass;
            $this->email = (string)$email;
            $this->contact = (int)$contact;
            $this->address = (String)$address;
            $this->city = (string)$city;
            $this->state = (string)$state;
            $this->pinCode = (int)$pincode;
            $this->id = (String)("SWG-".$this->contact);
        }

        function getID(){
          return $this->id;
        }

        function getPassword(){
          return password_hash($this->password, PASSWORD_DEFAULT);
        }

        function comparePassword($pass){
          return (boolean)($this->password == $pass);
        }

        function inputValidation(){
            if($this->emailValidation($this->email) && $this->contactValidation($this->contact) && $this->passwordValidation($this->password) && $this->nameValidation($this->orgName)){
                    return true;
                }else{
                    // code for pop-up instruction
                    return false;
                }
            }

            function Autho(){
                require("../php/connection.php");
                $result = $sqlConnection->query("SELECT count(email) AS email, count(contact) AS contact FROM ngocred WHERE email LIKE '$this->email';");
                $resultNGO = $sqlConnection->query("SELECT count(email) AS email, count(contact) AS contact FROM donatorcred WHERE email='$this->email';");
                
                $resultNGO=$resultNGO->fetch_object();
                $resultObj = $result->fetch_object();
                if(($resultObj->email > 0 || $resultObj->contact > 0) && ($resultNGO->contact > 0 || $resultNGO->email > 0)){
                    return false;
                }else{
                    return true;
                }
            }
    }
?>