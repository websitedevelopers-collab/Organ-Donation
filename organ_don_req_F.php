<?php
    $user = $_REQUEST['EMAIL'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Donor Registration</title>
</head>

<body>
<div style="font-family: 'Poppins', sans-serif; font-weight:400">
    <header class="sticky-top">
        <nav class="navbar navbar-expand-sm justify-content-between" style="background-color: #212529;">
            <a href="logged_in.php?EMAIL=<?php echo $user?>" class="navbar-brand" style="font-weight:700; color:White;">Home</a>
            <a class="navbar-brand" style="font-weight:700;color:White;">ORGAN DONATION</a>
            <a class="btn btn-warning" href="index.php" role="button">Log out</a>
        </nav>
    </header>

    <section class="container-fluid">
        <section class="row jumbotron justify-content-center">
            <section class="col-l4 col-sm-6">
                <?php
                    $con = new mysqli('localhost', 'root', 'root', 'organdb');
                    $qu1 = "SELECT * FROM registration WHERE EMAIL = '$user'";
                    $values = mysqli_query($con, $qu1);
                    while ($row = mysqli_fetch_assoc($values)) {
                        $REGISTRATION_ID = $row['REGISTRATION_ID'];
                        $AGE = $row['AGE'];
                    }
                    
                    if (isset($_POST['submit'])) {
                        $Weight = $_POST['WEIGHT'];
                        $b = $_POST['feet'];
                        $c = $_POST['inches'];
                        $d = ($b * 12) + $c;
                        $last = $d / 39.3701;
                        $height = number_format($last, 2);
                        $pregnant = $_POST['pregnant'];
                        $menstruation = $_POST['menstruation'];
                        $Bmi = $Weight / ($height * $height);
                        
                        if ($pregnant == 'yes') {
                            echo '<div class="alert alert-danger" role="alert">You can\'t donate Organ during pregnancy period.</div>';
                        } elseif ($menstruation == 'yes') {
                            echo '<div class="alert alert-danger" role="alert">You can\'t donate Organ during menstruation period.</div>';
                        } elseif ($AGE > 17 && $Weight >= 50) {
                            $stmt = $con->prepare("INSERT INTO donor(REGISTRATION_ID, WEIGHT, BMI) VALUES (?, ?, ?)");
                            $stmt->bind_param("iii", $REGISTRATION_ID, $Weight, $Bmi);
                            $stmt->execute();
                            $stmt->close();
                            $con->close();
                            echo '<div class="alert alert-success" role="alert">Organ Donation Apply Successful</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">You must be at least 18 years old and weigh at least 50 kg.</div>';
                        }
                    }
                ?>
                <form action="donor_registration.php" method="post">
                    <div class="mb-4">
                        <label class="form-label">Height</label>
                        <input type="text" class="form-control" placeholder="Feet eg(01)" name="feet" required>
                        <input type="text" class="form-control" placeholder="Inches eg(01)" name="inches" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Weight</label>
                        <input type="text" class="form-control" placeholder="Weight (kg) eg(50)" name="WEIGHT" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Are you Pregnant?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregnant" value="yes"> Yes
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pregnant" value="no"> No
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Are you in Menstruation?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="menstruation" value="yes"> Yes
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="menstruation" value="no"> No
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btnc" type="submit" name="submit">Submit</button>
                </form>
            </section>
        </section>
    </section>
</div>

<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<style>
    .header { background-color: #fcc358; }
    .btnc { background: #fcc358; }
    .btnc:hover { background: #ffbb00; }
</style>
