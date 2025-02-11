<?php
// Start the session
session_start();

// Get the user email from the URL
$user = $_GET['EMAIL'];

// Database connection
$con = new mysqli('localhost', 'root', 'root123', 'organdb');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch user details
$qu1 = "SELECT * FROM registration WHERE EMAIL = '$user'";
$values = mysqli_query($con, $qu1);
$user_details = mysqli_fetch_assoc($values);

// Handle form submission for requesting an organ
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $organ_id = $_POST['organ_id'];
    $receiver_id = $user_details['REGISTRATION_ID'];
    $request_date = date('Y-m-d H:i:s');

    // Insert request into the database
    $qu2 = "INSERT INTO organ_requests (REGISTRATION_ID, ORGAN_TYPE, BLOOD_GROUPn, QUANTITY, REQUEST_TYPE, ADD_RESSn, REQUEST_TIME) 
            SELECT '$receiver_id', ORGAN_TYPE, BLOOD_GROUP, QUANTITY, 'Receiver', ADD_RESS, '$request_date' 
            FROM available_organs 
            WHERE ORGAN_ID = '$organ_id'";
    if (mysqli_query($con, $qu2)) {
        echo "<script>alert('Organ request submitted successfully!');</script>";
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
    <title>Organ Receiver</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Available Organs for Receiving</h1>
        <table class="table my-3 table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Organ Type</th>
                    <th>Blood Group</th>
                    <th>Quantity</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch available organs from the database
                $qu3 = "SELECT * FROM available_organs";
                $result = mysqli_query($con, $qu3);

                while ($row = mysqli_fetch_assoc($result)) {
                    $organ_id = $row['ORGAN_ID'];
                    $organ_type = $row['ORGAN_TYPE'];
                    $blood_group = $row['BLOOD_GROUP'];
                    $quantity = $row['QUANTITY'];
                    $address = $row['ADD_RESS'];
                ?>
                    <tr>
                        <td><?php echo $organ_type; ?></td>
                        <td><?php echo $blood_group; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $address; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="organ_id" value="<?php echo $organ_id; ?>">
                                <button type="submit" class="btn btn-primary">Request Organ</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>