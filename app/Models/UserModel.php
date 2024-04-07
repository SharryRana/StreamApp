<?php
require_once("../config/database.php");

class UserModel
{
    public static function getAllUsers()
    {
        global $conn; // Make the database connection available inside the method

        // SQL query to select all users
        $sql = "SELECT * FROM `users`"; // Modify this query according to your database schema

        // Execute the query
        $result = $conn->query($sql);

        $users = array();

        // Check if the query was successful
        if ($result && $result->num_rows > 0) {
            // Fetch data from the result set
            while ($row = $result->fetch_assoc()) {
                // Append each user to the $users array
                $users[] = $row;
            }
        }

        return $users;
    }

    public static function getUser($id)
    {
        global $conn;

        // Prepare and bind the ID parameter
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        $users = array();

        // Fetch data from the result set
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        $stmt->close();

        return $users;
    }

    public static function updateUser($id, $role, $email, $password)
    {
        global $conn;

        // Prepare and bind parameters
        if ($password === null) {
            // If password is not provided, update without changing the password
            $stmt = $conn->prepare("UPDATE users SET role = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssi", $role, $email, $id);
        } else {
            // If password is provided, update including the password
            $stmt = $conn->prepare("UPDATE users SET role = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bind_param("sssi", $role, $email, $password, $id);
        }

        // Execute the statement
        $stmt->execute();

        // Close the statement
        $stmt->close();
    }




    public static function insertUser($role, $email, $password)
    {
        global $conn; // Make the database connection available inside the method

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (email, role, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $role, $email, $password);

        // Execute the statement
        $stmt->execute();

        // Close the statement
        $stmt->close();
    }

    public static function deleteUser($id)
    {
        global $conn;

        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $stmt->close();
    }
}
