<?php

class Model {
    protected $db;
    protected $table;

    public function __construct($table) {
        // Initialize the Database connection
        $this->db = new Database();  // Assuming there's a Database class for connection
        $this->table = $table;       // The table name to perform operations on
    }

    // CREATE: Insert a new record
    public function create($data) {
        // Extract the keys from the data array
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $this->db->query($sql);

        // Bind the data
        foreach ($data as $key => $value) {
            $this->db->bind(":$key", $value);
        }

        // Execute the query
        return $this->db->execute();
    }

    // READ: Fetch all records or a specific record by ID
    public function get($id = null) {
        if ($id) {
            $this->db->query("SELECT * FROM $this->table WHERE id = :id");
            $this->db->bind(':id', $id);
            return $this->db->single();  // Fetch a single record
        } else {
            $this->db->query("SELECT * FROM $this->table");
            return $this->db->resultSet();  // Fetch all records
        }
    }

    // UPDATE: Update a record by ID
    public function update($id, $data) {
        // Prepare SQL with column placeholders for each field
        $setString = '';
        foreach ($data as $key => $value) {
            $setString .= "$key = :$key, ";
        }
        $setString = rtrim($setString, ', ');

        $sql = "UPDATE $this->table SET $setString WHERE id = :id";
        $this->db->query($sql);

        // Bind data
        foreach ($data as $key => $value) {
            $this->db->bind(":$key", $value);
        }
        $this->db->bind(':id', $id);

        // Execute query
        return $this->db->execute();
    }

    // DELETE: Delete a record by ID
    public function delete($id) {
        $this->db->query("DELETE FROM $this->table WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Optional: Search by a specific field
    public function findBy($column, $value) {
        $this->db->query("SELECT * FROM $this->table WHERE $column = :value");
        $this->db->bind(':value', $value);
        return $this->db->resultSet();
    }
}