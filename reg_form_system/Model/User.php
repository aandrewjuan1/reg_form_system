<?php

require_once("./core/Database.php");

class User extends Database {
    // Method to fetch and display all user information in a table
    public function show() {
        // Connect to the database
        $db = $this->connect();
    
        // Prepare the SQL query to fetch all user data
        $sql = "SELECT * FROM users";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    
        // Fetch all results
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Display the results in an HTML table
        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Location</th>
                <th>Experience (Years)</th>
                <th>Education</th>
                <th>Field of Study</th>
                <th>Job Title</th>
                <th>Tech Stack</th>
                <th>Portfolio</th>
                <th>Bio</th>
                <th>Actions</th>
              </tr>";
    
        // Loop through each user and display their information
        foreach ($users as $user) {
            echo "<tr>
                    <td>{$user['id']}</td>
                    <td>{$user['first_name']}</td>
                    <td>{$user['last_name']}</td>
                    <td>{$user['email']}</td>
                    <td>{$user['phone_number']}</td>
                    <td>{$user['birthdate']}</td>
                    <td>{$user['gender']}</td>
                    <td>{$user['location']}</td>
                    <td>{$user['years_of_experience']}</td>
                    <td>{$user['education_level']}</td>
                    <td>{$user['field_of_study']}</td>
                    <td>{$user['job_title']}</td>
                    <td>{$user['tech_stack']}</td>
                    <td><a href='{$user['portfolio_url']}'>Portfolio</a></td>
                    <td>{$user['bio']}</td>
                    <td>
                        <form action='index.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='id' value='{$user['id']}'>
                            <input type='submit' name='updateButton' value='Update'>
                        </form>
                        <form action='index.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='id' value='{$user['id']}'>
                            <input type='submit' name='deleteButton' value='Delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                        </form>
                    </td>
                  </tr>";
        }
    
        echo "</table>";
    }
    
    

    // Method to store user data from the registration form
    public function store($data) {
        $db = $this->connect();

        // Prepare the SQL query to insert user data into the users table
        $sql = "INSERT INTO users (first_name, last_name, email, phone_number, birthdate, gender, location, years_of_experience, education_level, field_of_study, job_title, tech_stack, portfolio_url, bio) 
                VALUES (:first_name, :last_name, :email, :phone_number, :birthdate, :gender, :location, :years_of_experience, :education_level, :field_of_study, :job_title, :tech_stack, :portfolio_url, :bio)";

        // Prepare the SQL statement
        $stmt = $db->prepare($sql);
        
        // Bind the parameters from the $data array
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':phone_number', $data['phone_number']);
        $stmt->bindParam(':birthdate', $data['birthdate']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':years_of_experience', $data['years_of_experience']);
        $stmt->bindParam(':education_level', $data['education_level']);
        $stmt->bindParam(':field_of_study', $data['field_of_study']);
        $stmt->bindParam(':job_title', $data['job_title']);
        $stmt->bindParam(':tech_stack', $data['tech_stack']);
        $stmt->bindParam(':portfolio_url', $data['portfolio_url']);
        $stmt->bindParam(':bio', $data['bio']);

        // Execute the query
        if ($stmt->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Failed to register user.";
        }
    }

    public function delete($id) {
        // Connect to the database
        $db = $this->connect();
    
        // Prepare the SQL DELETE statement
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $db->prepare($sql);
    
        // Bind the ID parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "Record with ID $id has been successfully deleted.";
        } else {
            echo "Error: Unable to delete the record.";
        }
    }

    public function getUserById($id) {
        // Connect to the database
        $db = $this->connect();
    
        // Prepare the SQL query to fetch the user data
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $db->prepare($sql);
        
        // Bind the ID parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        // Fetch the user details
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        // Connect to the database
        $db = $this->connect();
    
        // Prepare the SQL UPDATE statement
        $sql = "UPDATE users SET 
                    first_name = :first_name,
                    last_name = :last_name,
                    email = :email,
                    phone_number = :phone_number,
                    birthdate = :birthdate,
                    gender = :gender,
                    location = :location,
                    years_of_experience = :years_of_experience,
                    education_level = :education_level,
                    field_of_study = :field_of_study,
                    job_title = :job_title,
                    tech_stack = :tech_stack,
                    portfolio_url = :portfolio_url,
                    bio = :bio
                WHERE id = :id";
        $stmt = $db->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':phone_number', $data['phone_number']);
        $stmt->bindParam(':birthdate', $data['birthdate']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':years_of_experience', $data['years_of_experience'], PDO::PARAM_INT);
        $stmt->bindParam(':education_level', $data['education_level']);
        $stmt->bindParam(':field_of_study', $data['field_of_study']);
        $stmt->bindParam(':job_title', $data['job_title']);
        $stmt->bindParam(':tech_stack', $data['tech_stack']);
        $stmt->bindParam(':portfolio_url', $data['portfolio_url']);
        $stmt->bindParam(':bio', $data['bio']);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "Record with ID {$data['id']} has been successfully updated.";
        } else {
            echo "Error: Unable to update the record.";
        }
    }
    
    
}
?>