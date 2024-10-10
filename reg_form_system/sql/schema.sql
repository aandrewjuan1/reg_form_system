CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone_number VARCHAR(20), -- Optional phone number for contact
    birthdate DATE, -- Storing birthdate rather than age for flexibility
    gender ENUM('Male', 'Female', 'Other', 'Prefer not to say'), -- Optional gender field
    location VARCHAR(100), -- City or country for remote or onsite work preferences
    years_of_experience INT NOT NULL, -- Total years of work experience
    education_level ENUM('High School', 'Bachelor', 'Master', 'PhD', 'Other'), -- Highest educational qualification
    field_of_study VARCHAR(100), -- Degree specialization (e.g., Computer Science)
    job_title VARCHAR(100), -- Current or desired job title (e.g., Software Engineer)
    tech_stack TEXT, -- List of technical skills, languages, frameworks, etc.
    portfolio_url VARCHAR(255), -- URL to personal portfolio or website
    bio TEXT, -- A short summary or bio of the user
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);