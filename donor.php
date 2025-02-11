<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "organdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"] ?? "");
    $email = filter_var($_POST["email"] ?? "", FILTER_SANITIZE_EMAIL);
    $age = isset($_POST["age"]) ? (int)$_POST["age"] : 0;
    $blood_type = $_POST["blood_type"] ?? "";
    $contact = htmlspecialchars($_POST["contact"] ?? "");
    $address = htmlspecialchars($_POST["address"] ?? "");
    $organ_type = $_POST["organ_type"] ?? "";
    $medical_history = htmlspecialchars($_POST["medical_history"] ?? "");
    $location = htmlspecialchars($_POST["location"] ?? "Unknown");
    $gender = $_POST["gender"] ?? "Not specified";

    if (empty($name) || empty($email) || empty($age) || empty($blood_type) || empty($contact) || empty($address) || empty($organ_type)) {
        $message = "All fields are required!";
    } else {
        $stmt = $conn->prepare("INSERT INTO donors (name, email, age, blood_type, contact, address, organ_type, medical_history, location, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisssssss", $name, $email, $age, $blood_type, $contact, $address, $organ_type, $medical_history, $location, $gender);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Thank you for registering as an organ donor!";
            header("Location: home.php");
            exit();
        } else {
            $message = "Error: " . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organ Donor Registration</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(to right, #0099F7, #F11712);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 450px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 2px solid #ddd;
            border-radius: 6px;
            transition: 0.3s;
            font-size: 14px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        input[type="submit"] {
            background: #28A745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            padding: 12px;
            margin-top: 15px;
            transition: 0.3s;
            font-size: 16px;
            border-radius: 6px;
        }

        input[type="submit"]:hover {
            background: #218838;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Organ Donor Registration</h2>

    <?php if (!empty($message)) : ?>
        <p class="error"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="donor.php">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="blood_type">Blood Type:</label>
        <select id="blood_type" name="blood_type" required>
            <option value="">Select Blood Type</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>

        <label for="organ_type">Organ Type:</label>
        <select id="organ_type" name="organ_type" required>
            <option value="">Select an Organ</option>
            <option value="Kidney">Kidney</option>
            <option value="Liver">Liver</option>
            <option value="Heart">Heart</option>
            <option value="Lungs">Lungs</option>
            <option value="Pancreas">Pancreas</option>
            <option value="Cornea">Cornea</option>
        </select>

        <label for="medical_history">Medical History:</label>
        <textarea id="medical_history" name="medical_history" required></textarea>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
