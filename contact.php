<?php
session_start();
include "connection.php"; // Ensure this file correctly establishes the database connection

$message = '';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input to prevent SQL injection or XSS
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message_text = htmlspecialchars($_POST['message'] ?? '');

    // Verify that the email is provided
    if (!empty($email)) {
        // Check if the customer exists
        $stmt = $conn->prepare("SELECT customer_ID FROM customers WHERE customer_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $customer_ID = $row['customer_ID'];

            // Insert the message into the database
            $stmt = $conn->prepare("INSERT INTO messages (customer_ID, subject, message_text) VALUES (:customer_ID, :subject, :message_text)");
            $stmt->bindParam(':customer_ID', $customer_ID);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message_text', $message_text);

            // Execute the insert statement and check the result
            if ($stmt->execute()) {
                $message = "<div class='message success'>Message sent successfully ✨</div>";
                
            } else {
                $message = "<div class='message error'>Message sending failed 😔</div>";
            }
        } else {
            $message = "<div class='message error'>Customer not found. Please register first.</div>";
        }
    } else {
        $message = "<div class='message error'>Email is required.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Response</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="container">
        <div class="form-box box">
            <h2>Contact Response</h2>
            <!-- Display messages here -->
            <?php if ($message != '') { echo $message; } ?>
            <a href="index.php"><button class="btn">Go Back</button></a>
        </div>
    </div>
</body>
</html>
