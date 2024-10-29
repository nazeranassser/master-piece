

<?php

// Modified Contact.php
class Contact {
    private $db;
    private $name;
    private $email;
    private $subject;
    private $message;
    private $created_at;
    private $user_id;  // Add user_id property

    public function __construct() {
        $this->db = new Database();
        $this->created_at = date('Y-m-d H:i:s');
    }

    // Modified setData to include user_id
    public function setData($name, $email, $subject, $message, $user_id) {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->user_id = $user_id;
    }

    public function validate() {
        if (empty($this->name) || empty($this->email) || empty($this->subject) || empty($this->message)) {
            return false;
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    // Modified save method to include user_id
    public function save() {
        $this->db->query('INSERT INTO messages (name, email, subject, message, created_at, user_id) 
                         VALUES (:name, :email, :subject, :message, :created_at, :user_id)');
        
        // Bind values
        $this->db->bind(':name', $this->name);
        $this->db->bind(':email', $this->email);
        $this->db->bind(':subject', $this->subject);
        $this->db->bind(':message', $this->message);
        $this->db->bind(':created_at', $this->created_at);
        $this->db->bind(':user_id', $this->user_id);

        // Execute
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }
}