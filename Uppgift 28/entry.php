<?php
class Entry {
	protected $id;
	protected $firstname;
	protected $lastname;
	protected $email;
    protected $phone_number;
    protected $timestamp;
    
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

    function getTimestamp() {
        return $this->timestamp;
    }
	
	function __construct($id, $timestamp, $firstname, $lastname, $email, $phone_number) {
        $this->id = $id;
        $this->timestamp = $timestamp;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
        $this->phone_number = $phone_number;
	}
}
?>