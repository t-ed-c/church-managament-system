PROJECT BY:
CHOMBA GITARI    C026-01-0726/2023
TED CORNELIUS    C026-01-0722/2023
ROGDERS MURIUKI  C026-01-0767/2023

The Church Management System is a web-based application designed to help churches manage their members, donations, events, resources, and prayer requests efficiently. The system provides a user-friendly interface for administrators and church members, ensuring seamless communication and data tracking.
..FOR VISUALS ACCESS THE IMAGES file
 Member Registration & Authentication
 Donations & Offerings Tracking
 Event Scheduling & Management
 Prayer Requests Handling
 Church Resource Reservations
 Financial Reports & Analytics
 Memory Verse of the Day

Technologies Used
Backend: PHP, MySQL
Frontend: HTML, CSS, JavaScript, Tailwind CSS
Database: MySQL
Server: Apache (XAMPP for local development)

Before running the system, ensure you have the following installed:
1. [Download XAMPP](https://www.apachefriends.org/download.html) and install it.
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Download and install VS Code https://code.visualstudio.com

DATABASE setup
1. Open phpMyAdmin by visiting http://localhost/phpmyadmin/
2. Click Databases, create a new database called church_management
3. Run the following SQL queries to set up the necessary tables:

### Create Database & Use It
```sql
CREATE DATABASE church_management;
USE church_management;
```

### Create Users Table
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Create Memory Verses Table
```sql
CREATE TABLE memory_verses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    verse TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Insert Sample Memory Verses
```sql
INSERT INTO memory_verses (verse) VALUES
('For I know the plans I have for you, declares the Lord - Jeremiah 29:11'),
('The Lord is my shepherd, I lack nothing - Psalm 23:1'),
('Trust in the Lord with all your heart - Proverbs 3:5'),
('I can do all things through Christ who strengthens me - Philippians 4:13');
```

### Create Offerings & Donations Table
```sql
CREATE TABLE donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    amount DECIMAL(10,2) NOT NULL,
    donation_date DATE NOT NULL,
    FOREIGN KEY (member_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Create Events Table
```sql
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    event_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Create Prayer Requests Table
```sql
CREATE TABLE prayer_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    request TEXT NOT NULL,
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Create Church Resources Table
```sql
CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resource_name VARCHAR(255) NOT NULL,
    status ENUM('Available', 'Booked') DEFAULT 'Available',
    booked_by INT NULL,
    booking_date TIMESTAMP NULL,
    FOREIGN KEY (booked_by) REFERENCES users(id) ON DELETE SET NULL
);
```

### Move Project to XAMPP Directory
```bash
mv church-management-system C:/xampp/htdocs/
```

### Start XAMPP
1. Open XAMPP Control Panel
2. Start Apache and MySQL

### Run the Project
1. Open a browser
2. Navigate to `http://localhost/church-management-system/`
3. Sign up and log in to start using the system

## License
This project is open-source and licensed under the MIT License.

For any questions, feel free to reach out:
-Email: ted.kimemia23@students.dkut.ac.ke
        gitari.chomba23@sudents.dkut.ac.ke
        mwenda.muriuki23@students.dkut.ac.ke
        
-Website: [Church Management System](http://localhost/church-management-system/)

