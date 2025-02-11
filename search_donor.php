<?php
$servername = "localhost";
$username = "root";
$password = "root123";
$database = "organdb"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging: Check if POST data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<strong>Received POST Data:</strong><br>";
    print_r($_POST);
    echo "<br><br>";
}

// Get user input and sanitize
$organ = isset($_POST['organ']) ? trim($_POST['organ']) : '';
$blood_group = isset($_POST['blood_group']) ? trim($_POST['blood_group']) : '';
$location = isset($_POST['location']) ? trim($_POST['location']) : '';
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

// Debugging: Check if sanitized values exist
echo "<strong>Sanitized Input Values:</strong><br>";
echo "Organ: $organ<br>";
echo "Blood Group: $blood_group<br>";
echo "Location: $location<br>";
echo "Gender: $gender<br><br>";

// If all fields are empty, return an error
if (empty($organ) || empty($blood_group) || empty($location) || empty($gender)) {
    die("Error: Please fill all fields.");
}

// SQL query
$sql = "SELECT * FROM donors WHERE 
        LOWER(organ_type) = LOWER(?) AND 
        LOWER(blood_type) = LOWER(?) AND 
        LOWER(location) = LOWER(?) AND 
        LOWER(gender) = LOWER(?)";

// Debugging: Display Query Structure
echo "<strong>SQL Query:</strong><br>";
echo "SELECT * FROM donors WHERE 
        LOWER(organ_type) = LOWER('$organ') AND 
        LOWER(blood_type) = LOWER('$blood_group') AND 
        LOWER(location) = LOWER('$location') AND 
        LOWER(gender) = LOWER('$gender')<br><br>";

// Prepare and bind
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL Preparation Error: " . $conn->error);
}
$stmt->bind_param("ssss", $organ, $blood_group, $location, $gender);
$stmt->execute();
$result = $stmt->get_result();

// Debugging: Check if query executed
if (!$result) {
    die("SQL Execution Error: " . $stmt->error);
}

// Fetch results
if ($result->num_rows > 0) {
    echo "<strong>Results Found:</strong><br>";
    echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Age</th><th>Blood Type</th><th>Contact</th><th>Address</th><th>Organ Type</th><th>Medical History</th><th>Location</th><th>Gender</th></tr>";
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
    echo "No donors found matching the criteria.";
}

// Close connection
$stmt->close();
$conn->close();
?>
