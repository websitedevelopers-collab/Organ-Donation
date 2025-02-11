<?php
// Database connection
$servername = "localhost";
$username = "root";  // Update if needed
$password = "root123";      // Update if needed
$dbname = "organdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to find matching donors
$sql = "SELECT 
            o.REQUEST_ID, 
            o.ORGAN_TYPE, 
            o.BLOOD_GROUPn, 
            d.id AS DONOR_ID, 
            d.name AS DONOR_NAME, 
            d.contact AS DONOR_CONTACT, 
            d.address AS DONOR_ADDRESS 
        FROM organ_requests o
        JOIN donors d 
        ON o.ORGAN_TYPE = d.organ_type 
        AND o.BLOOD_GROUPn = d.blood_type";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Matching Donors for Organ Requests</h2>";
    echo "<table border='1'>
            <tr>
                <th>Request ID</th>
                <th>Organ Type</th>
                <th>Blood Group</th>
                <th>Donor ID</th>
                <th>Donor Name</th>
                <th>Contact</th>
                <th>Address</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['REQUEST_ID']}</td>
                <td>{$row['ORGAN_TYPE']}</td>
                <td>{$row['BLOOD_GROUPn']}</td>
                <td>{$row['DONOR_ID']}</td>
                <td>{$row['DONOR_NAME']}</td>
                <td>{$row['DONOR_CONTACT']}</td>
                <td>{$row['DONOR_ADDRESS']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No matching donors found.";
}

// Close connection
$conn->close();
?>
