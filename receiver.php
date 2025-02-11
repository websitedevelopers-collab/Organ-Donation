<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Donor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #007bff;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        select, input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h2>Find a Donor</h2>

    <form method="POST">
        <label>Select Organ:</label>
        <select name="organ" required>
            <option value="liver">Liver</option>
            <option value="kidney">Kidney</option>
            <option value="heart">Heart</option>
            <option value="lungs">Lungs</option>
        </select>

        <label>Select Blood Group:</label>
        <select name="blood_group" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label>Enter Location:</label>
        <input type="text" name="location" placeholder="Enter City" required>

        <label>Select Gender:</label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <button type="submit" name="search">Search Donor</button>
    </form>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "root123";
    $database = "organdb";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $organ = strtolower(trim($_POST['organ']));
        $blood_group = strtoupper(trim($_POST['blood_group']));
        $location = strtolower(trim($_POST['location']));
        $gender = strtolower(trim($_POST['gender']));

        // Debugging Output
        echo "<h3>Sanitized Input Values:</h3>";
        echo "Organ: $organ<br>";
        echo "Blood Group: $blood_group<br>";
        echo "Location: $location<br>";
        echo "Gender: $gender<br><br>";

        // SQL Query
        $sql = "SELECT * FROM donors WHERE LOWER(organ_type) = LOWER('$organ') 
                AND LOWER(blood_type) = LOWER('$blood_group') 
                AND LOWER(location) = LOWER('$location') 
                AND LOWER(gender) = LOWER('$gender')";

        // echo "<h3>SQL Query:</h3>";
        // echo "<pre>$sql</pre>";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Results Found:</h3>";
            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Blood Type</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Organ Type</th>
                        <th>Medical History</th>
                        <th>Location</th>
                        <th>Gender</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['blood_type']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['organ_type']}</td>
                        <td>{$row['medical_history']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['gender']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<h3>No donors found matching the criteria.</h3>";
        }
    }

    $conn->close();
    ?>

</body>
</html>
