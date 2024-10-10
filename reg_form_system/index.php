<?php
require_once('./Model/User.php');
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerButton'])) {
    // Store form data into an array
    $formData = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'phone_number' => $_POST['phone_number'],
        'birthdate' => $_POST['birthdate'],
        'gender' => $_POST['gender'],
        'location' => $_POST['location'],
        'years_of_experience' => $_POST['years_of_experience'],
        'education_level' => $_POST['education_level'],
        'field_of_study' => $_POST['field_of_study'],
        'job_title' => $_POST['job_title'],
        'tech_stack' => $_POST['tech_stack'],
        'portfolio_url' => $_POST['portfolio_url'],
        'bio' => $_POST['bio']
    ];

    // Call the store method to save the data
    $user->store($formData);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineer Registration</title>
</head>
<body>
    <h2>Software Engineer Registration Form</h2>
    <form action="index.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number"><br><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate"><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            <option value="Prefer not to say">Prefer not to say</option>
        </select><br><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location"><br><br>

        <label for="years_of_experience">Years of Experience:</label>
        <input type="number" id="years_of_experience" name="years_of_experience" required><br><br>

        <label for="education_level">Education Level:</label>
        <select id="education_level" name="education_level">
            <option value="High School">High School</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Master">Master</option>
            <option value="PhD">PhD</option>
            <option value="Other">Other</option>
        </select><br><br>

        <label for="field_of_study">Field of Study:</label>
        <input type="text" id="field_of_study" name="field_of_study"><br><br>

        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title" required><br><br>

        <label for="tech_stack">Tech Stack (Comma separated):</label>
        <input type="text" id="tech_stack" name="tech_stack" required><br><br>

        <label for="portfolio_url">Portfolio URL:</label>
        <input type="url" id="portfolio_url" name="portfolio_url"><br><br>

        <label for="bio">Short Bio:</label><br>
        <textarea id="bio" name="bio" rows="5" cols="40"></textarea><br><br>

        <input type="submit" name="registerButton" value="Register">
    </form>
</body>
</html>

<?php
 $user->show();
?>