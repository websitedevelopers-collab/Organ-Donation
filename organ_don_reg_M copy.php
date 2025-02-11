<?php
// Start the session
session_start();

// Get the user email and request ID from the URL
$user = $_GET['EMAIL'];
$request_id = $_GET['blodr'];

// Database connection
$con = new mysqli('localhost', 'root', 'root', 'organdb');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch user details
$qu1 = "SELECT * FROM registration WHERE EMAIL = '$user'";
$values = mysqli_query($con, $qu1);
$user_details = mysqli_fetch_assoc($values);

// Fetch request details
$qu2 = "SELECT * FROM organ_requests WHERE REQUEST_ID = '$request_id'";
$request_values = mysqli_query($con, $qu2);
$request_details = mysqli_fetch_assoc($request_values);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_id = $user_details['REGISTRATION_ID'];
    $request_id = $request_details['REQUEST_ID'];
    $donation_date = date('Y-m-d H:i:s');

    // Insert donation into the database
    $qu3 = "INSERT INTO donations (DONOR_ID, REQUEST_ID, DONATION_DATE) VALUES ('$donor_id', '$request_id', '$donation_date')";
    if (mysqli_query($con, $qu3)) {
        echo "<script>alert('Donation successful!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Organ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Donate Organ</h1>
        <form method="POST">
            <div class="form-group">
                <label for="donor_name">Donor Name</label>
                <input type="text" class="form-control" id="donor_name" value="<?php echo $user_details['FIRST_NAME'] . ' ' . $user_details['LAST_NAME']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="request_details">Request Details</label>
                <textarea class="form-control" id="request_details" readonly><?php echo "Organ Type: " . $request_details['ORGAN_TYPE'] . "\nBlood Group: " . $request_details['BLOOD_GROUPn']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Donation</button>
        </form>
    </div>
</body>
</html>