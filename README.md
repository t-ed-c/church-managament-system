# Church Management System

A web-based application designed to help churches efficiently manage members, donations, events, resources, and prayer requests.

---

## Project Contributors

- **Chomba Gitari** &nbsp;|&nbsp; C026-01-0726/2023  
- **Ted Cornelius** &nbsp;|&nbsp; C026-01-0722/2023  
- **Rogders Muriuki** &nbsp;|&nbsp; C026-01-0767/2023  

---

## Features

- Member Registration & Authentication
- Donations & Offerings Tracking
- Event Scheduling & Management
- Prayer Request Handling
- Church Resource Reservations
- Financial Reports & Analytics
- Memory Verse of the Day

---

## Technologies Used

- **Backend:** PHP, MySQL
- **Frontend:** HTML, CSS, JavaScript, Tailwind CSS
- **Database:** MySQL
- **Server:** Apache (XAMPP recommended for local development)

---

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/download.html) (includes Apache & MySQL)
- [Visual Studio Code](https://code.visualstudio.com) (optional, for code editing)

### Installation & Setup

1. **Set up Environment**
   - Install XAMPP and start Apache & MySQL from the XAMPP Control Panel.
   - Optionally, install VS Code for editing.

2. **Database Setup**
   - Open [phpMyAdmin](http://localhost/phpmyadmin/)
   - Create a new database named `church_management`
   - Run the following SQL queries to create the required tables:

<details>
<summary><strong>SQL Setup</strong> (click to expand)</summary>

```sql
-- Create Database & Use It
CREATE DATABASE church_management;
USE church_management;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Memory Verses Table
CREATE TABLE memory_verses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    verse TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Memory Verses
INSERT INTO memory_verses (verse) VALUES
('For I know the plans I have for you, declares the Lord - Jeremiah 29:11'),
('The Lord is my shepherd, I lack nothing - Psalm 23:1'),
('Trust in the Lord with all your heart - Proverbs 3:5'),
('I can do all things through Christ who strengthens me - Philippians 4:13');

-- Donations Table
CREATE TABLE donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    amount DECIMAL(10,2) NOT NULL,
    donation_date DATE NOT NULL,
    FOREIGN KEY (member_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Events Table
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    event_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Prayer Requests Table
CREATE TABLE prayer_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    request TEXT NOT NULL,
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Church Resources Table
CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resource_name VARCHAR(255) NOT NULL,
    status ENUM('Available', 'Booked') DEFAULT 'Available',
    booked_by INT NULL,
    booking_date TIMESTAMP NULL,
    FOREIGN KEY (booked_by) REFERENCES users(id) ON DELETE SET NULL
);
```
</details>

3. **Deploy Project**

   Move the project folder to your XAMPP server directory:

   ```bash
   mv church-managament-system C:/xampp/htdocs/
   ```

   Start Apache and MySQL via the XAMPP Control Panel.

4. **Run the Project**

   - Open your browser and navigate to:  
     [http://localhost/church-managament-system/](http://localhost/church-managament-system/)
   - Register a new account and log in to begin using the system.

---

## License

This project is open-source and available under the [MIT License](LICENSE).

---

## Contact

For questions or support, contact us via email:

- ted.kimemia23@students.dkut.ac.ke
- gitari.chomba23@students.dkut.ac.ke
- mwenda.muriuki23@students.dkut.ac.ke

---

**Website:** [Church Management System](http://localhost/church-managament-system/)