

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request For Organ</title>
    

</head>

<body>

 <div class="header ">

<img  class="img-log" src="images/request.jpg" alt="new user icon">
<div class="h2">
<h3 CLASS="h3">Request For Organ</h3>
</div>
</div>

<form action = "process_request.php" method = "POST" name = "myform" class = "form-group">
            <!-- Imported from -->
    
 <div class="wrapper">
    <div class="title">
    Request Now
    </div>
    <div class="form">
      <div class="inputfield">
          <label for="full_name">Full Name</label>
          <input type="text" class="input" id="full_name" name="full_name" required>
        </div>
        <div class="inputfield">
          <label for="dob">Date of Birth</label>
          <input type="date" class="input" id="dob" name="dob" required>
        </div>
        <div class="inputfield">
          <label for="gender">Gender</label>
          <div class="custom_select">
            <select name="gender">
              <option value="">Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>
        <div class="inputfield">
          <label for="phone">Phone Number</label>
          <input type="text" class="input" id="phone" name="phone" required>
        </div>
        <div class="inputfield">
          <label for="email">Email Address</label>
          <input type="email" class="input" id="email" name="email" required>
        </div>
        <div class="inputfield">
          <label for="address">City</label>
          <input class="input" id="address" name="address" required></input>
        </div>
        <div class="inputfield">
          <label for="blood-select" >Blood Type</label>
          <div class="custom_select">
            <select name="blood_type" id="blood-select" required>
              <option value="">Select</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="AB">AB</option>
              <option value="O">O</option>
            </select>
          </div>
       </div>
       <div class="inputfield">
          <label for="rh-select">RH Factor</label>
          <div class="custom_select">
            <select name="rh_factor" id="rh-select" required>
              <option value="">Select</option>
              <option value="Positive">Positive</option>
              <option value="Negative">Negative</option>
            </select>
          </div>
        </div>
       <div class="inputfield">
          <label for="organ_needed" >Organ Type</label>
          <div class="custom_select">
            <select name="organ_needed" id="request-select" required>
              <option value="">Select</option>
              <option value="Heart">Heart</option>
              <option value="Kidney">Kidney</option>
              <option value="Liver">Liver</option>
              <option value="Eye">Eye</option>
            </select>
          </div>
       </div> 
       

        

       <!-- <div class="inputfield">
          <label for="situation-select">Request Type</label>
          <div class="custom_select" required> 
            <select name="REQUEST_TYPE" id="situation-select" required>
              <option value="">Select</option>
              <option value="Emergency">Emergency</option>
              <option value="Not Emergency"> Not Emergency</option>
              
            </select>
          </div>
       </div> 

     

       <div class="inputfield">
          <label for="ADD_RESSn">Address</label>
          <input type="text" class="input" id ="ADD_RESSn" name="ADD_RESSn"  required>
       </div> 
      <div class="inputfield">
          <label for="zipcode">Zip Code</label>
          <input type="text" class="input" id= "zipcode"  name="ZIP_CODE" required>
       </div> 

       <div class="inputfield">
          <label  for="phoneN">Phone Number</label>
          <input type="text" class="input" id ="phoneN"  name="phoneN" required>
       </div>  -->

      <div class="inputfield terms">
          <label  for="checkbox" class="check">
            <input type="checkbox"  id= "checkbox"  required>
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> 
      <div class="inputfield">
        <input type="submit" name="submit" value="Submit" class="btn">
      </div>
      <p class="alter" > Go BACK TO HOME? <a class= "home"  href="index.php?EMAIL=<?php echo $user ?>">Home</a></p>
      
    </div> <!--class= alter-login -->
    
</div>


</form>


    
</body>
</html>

<style>


@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}
.header {
  
  padding: 25px;
  text-align: center;
  background: #fcc358;
  color: white;
  font-size: 30px;
}
body{
  background: #fff; 
  padding: 0 0px;
}
.header .h3 {
  color: #fff;
  font-size: 30px
}

.header .img-log{
  position: relative;
  left: 20px;
  width:180px;
  height:180px;
}

.wrapper{
  max-width: 700px;
  width: 100%;
  background: #FFF5EE;
  margin: 50px auto;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.125);
  padding: 30px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: #fcc358;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{

  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: #757575;
   margin-right: 10px;
  font-size: 14px;
}

.wrapper .form .inputfield .input {
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}



.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #fcc358;
  border-radius: 3px;
}


.wrapper .form .inputfield .input:focus,
.wrapper .form .inputfield .textarea:focus,
.wrapper .form .inputfield .custom_select select:focus{
  border: 1px solid #39ace7;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: #757575;
}
.wrapper .form .inputfield .check{
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  cursor: pointer;
}
.wrapper .form .inputfield .check input[type="checkbox"]{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.wrapper .form .inputfield .check .checkmark{
  width: 15px;
  height: 15px;
  border: 1px solid #fcc358;
  display: block;
  position: relative;
}
.wrapper .form .inputfield .check .checkmark:before{
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 5px;
  height: 2px;
  border: 2px solid;
  border-color: transparent transparent #fff #fff;
  transform: rotate(-45deg);
  display: none;
}
.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark{
  background: #fcc358;
}

.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper .form .inputfield .btn{
  width: 100%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background: #fcc358;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}

.wrapper .form .inputfield .btn:hover{
  background: #ffbb00;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
}

.wrapper .form .alter{
    text-align: center;
}
.wrapper .form .alter .register, .wrapper .form .alter .home{
    text-decoration: none;
    padding: 10px;
    margin: 10px;
    color:#ffbb00;
}


@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}
</style>





