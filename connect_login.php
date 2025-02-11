<?php
$EMAIL = $_POST['EMAIL'];
$x = $_POST['PASS_WORD'];

// Connection to database server
$con = new mysqli('localhost', 'root', 'root', 'organdb');

if ($EMAIL == "admin@gmail" && $x == "admin") {
    header("location:dashboard.php");
} 
else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM registration WHERE EMAIL = '$EMAIL' AND PASS_WORD = '$x'")) > 0) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organ Donation System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <style>
        body {
            background-image: url("https://www.example.com/path/to/your/background-image.jpg"); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: #333;
        }

        header {
            background-color: rgba(0, 51, 102, 0.8);
            color: white;
            padding: 15px;
            text-align: center;
        }

        .navigation a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        .home {
            position: relative;
        }

        .video-slide {
            width: 100%;
            height: auto; /* Adjust to maintain aspect ratio */
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .content h1 {
            color: black; /* Title color */
        }

        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
        }

        .btn-1 {
            width: 132px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-1 a {
            text-decoration: none;
            border: 2px solid #010100;
            padding: 15px;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        /* Card Styles */
        .container {
            display : flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px; /* Spacing above cards */
        }

        .card {
            background-color:white ;
            height:460px ;
            width :270px ;
            margin :10px ;
            border-radius :15px ;
            box-shadow :0 4px 8px rgba(0,0,0,0.2); /* Shadow effect for depth */
        }
        
        .card-image{
            height :220px ;
            margin-bottom :15px ;
            background-size :cover ; 
            border-radius :10px 12px 0 0; 
        }
        
        .card-text {
          text-align:center ; 
          padding :10px ; 
        }
        
        .card-text h2 {
          margin-top :0px ; 
          font-size :28px ; 
          padding :10px; 
          color:#007BFF; /* Highlight color for headings */
        }
        
        /* Specific Card Background Images */
        .card-1 { background-image:url("https://www.example.com/path/to/request-image.jpg"); } /* Replace with actual image URL */
        .card-2 { background-image:url("https://www.example.com/path/to/donation-image.jpg"); } /* Replace with actual image URL */
        .card-3 { background-image:url("https://www.example.com/path/to/record-image.jpg"); } /* Replace with actual image URL */

    </style>
</head>

<body>

<header>
   <a href="#" class="brand">Organ Donation</a>
   <div class="navigation">              
      <div class="navigation-items">
         <a href="#">Home</a>
         <a href="#">Our Vision</a>
         <a href="available_to_donate.php?EMAIL=<?php echo $EMAIL?>">Donate Organ</a>
         <a href="FAQ.php">FAQ's</a>
         <a href="#">Contact</a>
      </div>
   </div>
</header>

<section class="home">
    <video class="video-slide active" src="Organ Main.mp4" autoplay muted loop></video>

    <div class="content active">
       <h1>Welcome! <br>Feel Free to Donate</h1>
       <div class="center">
          <div class="btn-1">
              <a href="index.php"><span>Log Out</span></a>
          </div>
       </div>
    </div>

    <div class="media-icons">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>

</section>

<section class="container">
    <!-- Card for Requesting Organ -->
    <div class="card">
       <div class="card-image card-1"></div>  
       <div class="card-text card_1">
          <h2>Request for Organ</h2>
          <div class="value"><a href="organ_requests.php?EMAIL=<?php echo $EMAIL?> ">Request</a></div>
       </div>
    </div>

    <!-- Card for Donating Organ -->
    <div class="card">
       <div class="card-image card-2"></div>
       <div class="card-text card_2">
          <h2>Donate An Organ</h2>
          <div class="value"><a href="available_to_donate.php?EMAIL=<?php echo $EMAIL?> ">Donate</a></div>
       </div>
    </div>

    <!-- Card for Donation Record -->
    <div class="card">
       <div class="card-image card-3"></div>
       <div class="card-text card_3">
          <h2>Donation Record</h2>
          <div class="value"><a href="donation_record.php?EMAIL=<?php echo $EMAIL?> ">Record</a></div>
       </div>
    </div>

</section>

<?php
} else {
   echo "Email or Password Is Not Found";
}
?>

<footer style="text-align:center; padding:20px; background-color:#003366; color:white;">
   &copy; 2024 Gift of Life | All Rights Reserved
</footer>

</body>

</html>





