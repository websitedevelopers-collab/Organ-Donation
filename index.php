<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organ Donation System</title>
  
  <!-- Icon needed -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <style>
    /* General Styles */
    body {
      /*background-color: pink; /* Light background for better contrast */
      background-image: url("https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8fGhlYWx0aHxlbnwwfHx8fDE2NjA3MDYxMjQ&ixlib=rb-1.2.1&q=80&w=1080"); /* Example background image */
      background-size: cover; /* Cover the entire area */
      background-position: center; /* Center the image */
      font-family: 'Arial', sans-serif; /* Modern font */
      margin: 0;
      padding: 0;
    }

    header {
      background-color:rgb(36, 108, 180); /* Darker header for contrast */
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .brand {
      font-size: 24px;
      text-decoration: none;
      color: white;
    }

    .navigation a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      transition: color 0.3s ease;
    }

    .navigation a:hover {
      color: #ffcc00; /* Highlight color on hover */
    }

    .home {
      position: relative;
      overflow: hidden;
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

    h1{
            font-family: "Times New Roman", Times, serif; /* Using Google Font */
            font-size: 45px; /* Font size */
            color: red; /* Text color */
            text-align: center; /* Center alignment */
            font-weight: bold;    
            font-style: italic;
    }

    h2{
      font-family: "Times New Roman", Times, serif;
      font-size: 30px;
      color: black ;
      text-align: center;
    }

    /*h1 {
      color: red; /* Emphasizing the message */
    

    .center {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 50vh;
    }

    .btn-1,
    .btn-2 {
      width: 150px; /* Wider buttons */
      height: 60px; /* Taller buttons */
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 10px; /* Margin for spacing */
    }

    .btn-1 a,
    .btn-2 a {
      text-decoration: none;
      background-color: #007BFF; /* Primary button color */
      border-radius: 30px; /* Rounded buttons */
      padding: 15px;
      color: white;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions */
    }

    .btn-1 a:hover,
    .btn-2 a:hover {
      background-color: #0056b3; /* Darken on hover */
      transform: scale(1.05); /* Slightly enlarge on hover */
    }

    .media-icons a {
        margin-right: 15px; /* Spacing between icons */
        color: #003366; /* Icon color */
        font-size: 24px; /* Icon size */
        transition: color 0.3s ease; /* Transition for hover effect */
    }

    .media-icons a:hover {
        color: #ffcc00; /* Highlight on hover */
    }

    /* Card Styles */
    .container {
        display : flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 20px; /* Spacing above cards */
        padding-bottom: 20px; 
    }

    .card {
        background-color:pink ;
        height:460px ;
        width :270px ;
        margin :10px ;
        border-radius :15px ;
        box-shadow :0 4px 8px rgba(0,0,0,0.2); /* Shadow effect for depth */
        transition :transform 0.2s; /* Transition for hover effect */
        overflow:hidden; /* Prevent overflow of images/text */
        position :relative ; 
        display:flex ; 
        flex-direction :column ; 
        align-items:center ; 
        justify-content:center ; 
     }
    
     .card-image{
         height :220px ;
         width :100% ; 
         border-radius :15px ; 
         background-size :cover ; 
         background-position:center ; 
     }
    
     .card-text {
         text-align:center ; 
         padding :10px ; 
     }
    
     .card-text h2 {
         font-size :24px ; 
         margin-bottom :10px ; 
     }
    
     .card-text p {
         color :grey ; 
         font-size :12px ; 
     }
    
     .card a{
         background-color:black ;
         color:white ;
         padding :10px ;
         text-decoration:none ;
         border-radius :5px ; 
         transition :background-color 0.3s ease ; 
     }
    
     .card a:hover{
         background-color:#444 ; 
     }
    
     .card:hover{
         transform :scale(1.05); /* Slightly enlarge on hover */
     }
    
     /* Card Background Images*/
     .card-1 { background-image:url("images/request.jpg"); }
     .card-2 { background-image:url("images/donation.jpg"); }
     .card-3 { background-image:url("images/02.jpg"); }
    
   </style>
</head>

<body>

<header class="sticky-top">
   <a href="donation_record.php" class="brand">Organ Donation</a>
   <div class="navigation">              
       <div class="navigation-items">
           <a href="home.php">Home</a>
           <a href="ourvision.php">Our Vision</a>
           <a href="donation_record.php">Donate Organ</a>
           <a href="FAQ.php">FAQ's</a>
           <a href="#">Contact</a>
       </div>
   </div>
</header>

<section class="home">
   <video class="video-slide active" src="Organ Main.mp4" autoplay muted loop></video>

   <div class="content active">
       <h1>Donate Organ <br>Save a life</h1>
       <h3>Ready to make a difference?</h3>
       <h2>Embrace Generosity Embrace Life</h2>
       <div class="center">
           <div class="btn-1">
               <a href="login.php"><span>Login</span></a>
           </div>
           <div class="btn-2">
               <a href="registration.php"><span>Sign Up</span></a>
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
           <div class="value"><a href="organ_requests.php">Request</a></div>
       </div>
   </div>

   <!-- Card for Donating Organ -->
   <div class="card">
       <div class="card-image card-2"></div>
       <div class="card-text card_2">
           <h2>Donate An Organ</h2>
           <div class="value"><a href="donation_record.php">Donate</a></div>
       </div>
   </div>

   <!-- Card for Donation Record -->
   <div class="card">
       <div class="card-image card-3"></div>
       <div class="card-text card_3">
           <h2>Donation Record</h2>
           <div class="value"><a href="login.php">Record</a></div>
       </div>
   </div>
</section>

</body>

</html>






