<?php
class Entry {
	protected $id;
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $phone_number;
    
    function getId() {
        return $this->id;
    }

    function getFirstName() {
        return $this->firstname;
    }

    function getLastName() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhoneNumber() {
        return $this->phone_number;
    }
	
	function __construct($id, $firstname, $lastname, $email, $phone_number) {
		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->phone_number = $phone_number;
	}
}
?>