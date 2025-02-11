<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organ Donation Match</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 20px auto;
        }

        input, select, button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        p {
            font-size: 18px;
            color: red;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "organdb";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $blood_type = $_POST['blood_type'];
    $rh_factor = $_POST['rh_factor'];
    $organ_needed = $_POST['organ_needed'];

    // Insert recipient request into the database
    $sql = "INSERT INTO recipient (full_name, dob, gender, phone, email, address, blood_type, rh_factor, organ_needed) 
            VALUES ('$full_name', '$dob', '$gender', '$phone', '$email', '$address', '$blood_type', '$rh_factor', '$organ_needed')";
    $conn->query($sql);

    // Find matching donors
    $query = "SELECT * FROM donor 
              WHERE blood_type = '$blood_type' 
              AND rh_factor = '$rh_factor' 
              AND FIND_IN_SET('$organ_needed', organs_to_donate)";

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        echo "<h2>Matching Donors</h2>";
        echo "<table>
                <tr>
                    <th>Full Name</th>
                    <th>Blood Type</th>
                    <th>RH Factor</th>
                    <th>Organs Donated</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['full_name']}</td>
                    <td>{$row['blood_type']}</td>
                    <td>{$row['rh_factor']}</td>
                    <td>{$row['organs_to_donate']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['email']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No matching donors found.</p>";
    }
}

$conn->close();
?>

</body>
</html>
