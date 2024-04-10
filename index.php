<?php
// Include database connection file
include_once 'db_info.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $telephone = $_POST['telephone'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
   
    // Prepare and execute the SQL query to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (email, password, date_of_birth, telephone, number, gender) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $email, $password, $dob, $telephone, $mobile, $gender);
    $stmt->execute();

    // Check if the data is inserted successfully
    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
       
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2, h3 {
    color: #333;
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;
    margin-bottom: 10px;
}

fieldset {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
}

form {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    margin-top: 20px;
}

fieldset {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
}

legend {
    font-weight: bold;
}

label {
   
    margin-bottom: 5px;
    font-weight: bold;
}

.input-group {
    display: flex;
    align-items: center;
}

.input-group label {
    margin-right: 10px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="radio"],
input[type="checkbox"] {
    display: inline-block;
    margin-right: 5px;
    margin-bottom: 5px;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #555;
}
input[type="reset"] {
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="reset"]:hover {
    background-color: #555;
}
</style>
</head>
<body>
    <h2>Registration Form - Northern Pures</h2>
    <form action="" method="post">
        <h3>Personal Information</h3>
        <label for="text_before_email">Text:</label><br>
        <input type="text" id="text_before_email" name="text"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>

        <h3>Contact Information</h3>
        <label for="telephone">Telephone(e.g. +1-xxx-xxx-xxxx):</label><br>
        <input type="tel" id="telephone" name="telephone" required><br><br>

        <label for="mobile">Number:</label><br>
        <input type="tel" id="mobile" name="mobile" required><br><br>

        <h3>Preference</h3>
        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label><br><br>


        <h3>Additional Information</h3>
        <label for="additional_info">Text area:</label><br>
        <textarea id="additional_info" name="additional_info"></textarea><br><br>
       
        <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
       


    </form>
</body>
</html>
