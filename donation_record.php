<?php
session_start();

// Database Connection
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "organdb";

// Secure Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Securely Get Form Data
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $national_id = $conn->real_escape_string($_POST['national_id']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $blood_type = $conn->real_escape_string($_POST['blood_type']);
    $rh_factor = $conn->real_escape_string($_POST['rh_factor']);
    $height = (int)$_POST['height'];
    $weight = (int)$_POST['weight'];
    $chronic_diseases = $conn->real_escape_string($_POST['chronic_diseases']);
    $infectious_diseases = $conn->real_escape_string($_POST['infectious_diseases']);
    $cancer_history = $conn->real_escape_string($_POST['cancer_history']);
    $surgical_history = $conn->real_escape_string($_POST['surgical_history']);
    $current_medications = $conn->real_escape_string($_POST['current_medications']);
    $allergies = $conn->real_escape_string($_POST['allergies']);
    $smoking_history = $conn->real_escape_string($_POST['smoking_history']);
    $alcohol_consumption = $conn->real_escape_string($_POST['alcohol_consumption']);
    $drug_use = $conn->real_escape_string($_POST['drug_use']);
    $exercise_habits = $conn->real_escape_string($_POST['exercise_habits']);
    $organs_to_donate = implode(", ", $_POST['organs_to_donate']);
    $research_consent = $conn->real_escape_string($_POST['research_consent']);
    $next_of_kin = $conn->real_escape_string($_POST['next_of_kin']);
    $emergency_contact = $conn->real_escape_string($_POST['emergency_contact']);
    $legal_witness = $conn->real_escape_string($_POST['legal_witness']);
    $ethnicity = $conn->real_escape_string($_POST['ethnicity']);
    $religious_preferences = $conn->real_escape_string($_POST['religious_preferences']);
    $gender_specific_info = $conn->real_escape_string($_POST['gender_specific_info']);
    $travel_history = $conn->real_escape_string($_POST['travel_history']);
    $tattoos_piercings = $conn->real_escape_string($_POST['tattoos_piercings']);

    // Secure SQL Query Using Prepared Statements
    $stmt = $conn->prepare("INSERT INTO donor (full_name, dob, gender, national_id, phone, email, address, blood_type, rh_factor, height, weight, chronic_diseases, infectious_diseases, cancer_history, surgical_history, current_medications, allergies, smoking_history, alcohol_consumption, drug_use, exercise_habits, organs_to_donate, research_consent, next_of_kin, emergency_contact, legal_witness, ethnicity, religious_preferences, gender_specific_info, travel_history, tattoos_piercings) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssiissssssssssssssssssss", $full_name, $dob, $gender, $national_id, $phone, $email, $address, $blood_type, $rh_factor, $height, $weight, $chronic_diseases, $infectious_diseases, $cancer_history, $surgical_history, $current_medications, $allergies, $smoking_history, $alcohol_consumption, $drug_use, $exercise_habits, $organs_to_donate, $research_consent, $next_of_kin, $emergency_contact, $legal_witness, $ethnicity, $religious_preferences, $gender_specific_info, $travel_history, $tattoos_piercings);

    if ($stmt->execute()) {
        echo "<script>alert('Donor Registered Successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donor Registration</title>
    <style>
        <style>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* General Styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

/* Scrollable Page */
body {
    background: linear-gradient(135deg, #74ebd5, #acb6e5);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow-y: auto;
    padding: 40px 10px;
}

/* Form Container */
.container {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 500px;
    animation: fadeIn 0.5s ease-in-out;
    overflow-y: auto;
}

/* Form Title */
h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Form Groups */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #444;
}

/* Input Fields */
input, select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    transition: all 0.3s ease;
}

input:focus, select:focus, textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
}

/* Textarea */
textarea {
    resize: vertical;
    min-height: 80px;
}

/* Submit Button */
button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background: linear-gradient(135deg, #0056b3, #003b8b);
}

/* Responsive Design */
@media (max-width: 600px) {
    .container {
        width: 100%;
        padding: 20px;
    }
}

/* Fade In Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    </style>
</head>
<body>
<div class="container">
<h2>Donor Registration Form</h2>

<form action="donation_record.php" method="post">
<div class="form-group">
    <label>Full Name:</label>
    <input type="text" name="full_name" required>
</div>
<div class="form-group">
    <label>Date of Birth:</label>
    <input type="date" name="dob" required>
</div>
<div class="form-group">
    <label>Gender:</label>
    <select name="gender" required>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
    </select>
</div>
<div class="form-group">
    <label>National ID:</label>
    <input type="text" name="national_id" required>
</div>
<div class="form-group">
    <label>Phone:</label>
    <input type="text" name="phone" required>
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="email" name="email" required>
</div>
<div class="form-group">
    <label>Address:</label>
    <textarea name="address" required></textarea>
</div>
<div class="form-group">
    <label>Blood Type:</label>
    <select name="blood_type" required>
        <option>A</option>
        <option>B</option>
        <option>AB</option>
        <option>O</option>
    </select>
</div>
<div class="form-group">
    <label>Rh Factor:</label>
    <select name="rh_factor" required>
        <option>Positive</option>
        <option>Negative</option>
    </select>
</div>
<div class="form-group">
    <label>Height (cm):</label>
    <input type="number" name="height" required>
</div>
<div class="form-group">
    <label>Weight (kg):</label>
    <input type="number" name="weight" required>
</div>
<div class="form-group">
    <label>Chronic Diseases:</label>
    <input type="text" name="chronic_diseases"><br>
</div>
<div class="form-group">
    <label>Infectious Diseases:</label>
    <input type="text" name="infectious_diseases"><br>
</div>
<div class="form-group">
    <label>Cancer History:</label>
    <input type="text" name="cancer_history"><br>
</div>
<div class="form-group">
    <label>Surgical History:</label>
    <input type="text" name="surgical_history"><br>
</div>
<div class="form-group">
    <label>Current Medications:</label>
    <input type="text" name="current_medications"><br>
</div>
<div class="form-group">
    <label>Allergies:</label>
    <input type="text" name="allergies"><br>
</div>
<div class="form-group">
    <label>Smoking History:</label>
    <input type="text" name="smoking_history"><br>
</div>
<div class="form-group">
    <label>Alcohol Consumption:</label>
    <input type="text" name="alcohol_consumption"><br>
</div>
<div class="form-group">
    <label>Drug Use:</label>
    <input type="text" name="drug_use"><br>
</div>
<div class="form-group">
    <label>Exercise Habits:</label>
    <input type="text" name="exercise_habits"><br>
</div>
<div class="form-group">
    <label>Organs to Donate:</label>
    <select name="organs_to_donate[]" required>
        <option value="">Select an Organ</option>
        <option value="Eye">Eye</option>
        <option value="Heart">Heart</option>
        <option value="Liver">Liver</option>
        <option value="Kidney">Kidney</option>
    </select>
</div>
<div class="form-group">
    <label>Research Consent:</label>
    <select name="research_consent" required>
        <option>Yes</option>
        <option>No</option>
    </select>
</div>
<div class="form-group">
    <label>Next of Kin:</label>
    <input type="text" name="next_of_kin" required>
</div>
<div class="form-group">
    <label>Emergency Contact:</label>
    <input type="text" name="emergency_contact" required>
</div>
<div class="form-group">
    <label>Legal Witness:</label>
    <input type="text" name="legal_witness">
</div>
<div class="form-group">
    <label>Ethnicity:</label>
    <input type="text" name="ethnicity">
</div>
<div class="form-group">
    <label>Religious Preferences:</label>
    <select name="religious_preferences" required>
        <option value="">Select your Religion</option>
        <option value="Christianity">Christianity</option>
        <option value="Islam">Islam</option>
        <option value="Hinduism">Hinduism</option>
        <option value="Buddhism">Buddhism</option>
        <option value="Atheism">Atheism</option>
        <option value="Other">Other</option>
    </select>
</div>
<div class="form-group">
    <label>Gender-Specific Info:</label>
    <select name="gender_specific_info" required>
        <option value="None">None</option>
        <option value="Pregnant">Pregnant</option>
        <option value="Undergoing Hormone Therapy">Undergoing Hormone Therapy</option>
        <option value="Other">Other</option>
    </select>
</div>
<div class="form-group">
    <label>Travel History:</label>
    <textarea name="travel_history"></textarea>
</div>
<div class="form-group">
    <label>Tattoos/Piercings:</label>
    <textarea name="tattoos_piercings"></textarea>
</div>
    <button type="submit">Register</button>
</form>
</div>
</body>
</html>
