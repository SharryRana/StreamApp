<?php
require_once(__DIR__ . "/../Models/UserModel.php");

class HomeController
{
    public function index()
    {
        $users = UserModel::getAllUsers();

        $this->view('home', ['users' => $users]);
    }


    public function login()
    {

        $this->view('StreamDashboard/login');
    }

    public function create()
    {
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form data
            $role = $_POST["role"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Insert data into the database
            UserModel::insertUser($role, $email, $password);

            // Redirect to home page
            header("Location: /");
            exit;
        }

        $this->view('create');
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $id = $_GET["id"];

            // Delete the user with the specified ID
            UserModel::deleteUser($id);

            // Redirect to home page
            header("Location: /");
            exit;
        }
    }



    public function edit()
    {
        if (!isset($_GET["id"])) {
            // Handle error: ID not provided
            // For example, redirect to home page or show an error message
            return;
        }

        $id = $_GET["id"];
        $users = UserModel::getUser($id);

        // Pass user data to the view
        $this->view('edit', ['user' => $users[0]]);
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $id = $_POST["id"];
            $role = $_POST["role"];
            $email = $_POST["email"];
            $password = isset($_POST["password"]) ? $_POST["password"] : null;

            // Update the user in the database
            UserModel::updateUser($id, $role, $email, $password);

            // Redirect back to the home page after updating
            header("Location: /");
            exit;
        }
    }




    private function dd($variable)
    {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }

    private function view($view, $data = [])
    {
        // Extract data variables
        extract($data);

        // Include the view file
        include("../resources/Views/{$view}.php");
    }
}
