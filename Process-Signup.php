<?php

include 'db_connection.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $email = $_POST['email'];
        $name = $_POST['username'];  // Mapping username to the name column in your table
        $password = $_POST['password'];

        // Check if the email or name already exists in the database
    $checkStmt = $pdo->prepare("SELECT * FROM signup WHERE email = :email OR name = :name");
    $checkStmt->bindParam(':email', $email);
    $checkStmt->bindParam(':name', $name);
    $checkStmt->execute();

    // Fetch result to see if any record exists
    if ($checkStmt->rowCount() > 0) {
        // If a record is found, either email or name is already taken
        echo 'duplicate';
    } else {
        
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement using placeholders
        $stmt = $pdo->prepare("INSERT INTO signup (email, name, password) VALUES (:email, :name, :password)");

        // Bind the form data to the placeholders
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
?>
