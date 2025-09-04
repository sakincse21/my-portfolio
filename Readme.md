
# My Portfolio

A responsive portfolio website built with PHP, MySQL, and vanilla JavaScript featuring an admin dashboard for content management.

## Features

- **Responsive Design** - Mobile-friendly layout
- **Admin Dashboard** - Manage projects and messages
- **Contact Form** - Visitors can send messages
- **Project Management** - Add, edit, delete projects with thumbnails

## Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/sakincse21/my-portfolio.git
   cd my-portfolio
   ```

2. **Database Setup**
   - Create a MySQL database
   - Import the required tables:
     ```sql
     CREATE TABLE messages (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL,
         message TEXT NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );

     CREATE TABLE projects (
         id INT AUTO_INCREMENT PRIMARY KEY,
         title VARCHAR(255) NOT NULL,
         description TEXT NOT NULL,
         technologies VARCHAR(500) NOT NULL,
         thumbnail VARCHAR(255) NOT NULL,
         live_url VARCHAR(255),
         github_url VARCHAR(255),
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );

     CREATE TABLE admin_users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(50) UNIQUE NOT NULL,
         password_hash VARCHAR(255) NOT NULL
     );
     ```

3. **Configure Database**
   - Update `db.php` with your database credentials

4. **Create Admin User**
   - Generate password hash using hashpass.php
   - Insert the admin user manually

5. **Set Permissions**
   ```bash
   chmod 755 assets/
   mkdir assets/projects
   chmod 755 assets/projects
   ```

## Usage

- **Portfolio**: Visit `index.php`
- **Dashboard**: Manage projects and messages at `admin/dashboard.php`

## File Structure

```
├── index.php               # Main portfolio page
├── style.css               # Stylesheet
├── index.js                # JavaScript functionality
├── db.php                  # Database connection
├── contact.php             # Contact form handler
├── admin/                  # Admin panel
│   ├── login.php           # Admin login
│   ├── logout.php          # Admin login
│   ├── dashboard.php       # Admin dashboard
│   ├── add_project.php     # Add new project
│   ├── edit_project.php    # Edit project
│   ├── edit_message.php    # Edit project
│   └── delete_project.php  # Delete project
│   └── delete_message.php  # Delete project
│   └── change_password.php # Delete project
└── assets/                 # Images and uploads
    └── projects/           # Project thumbnails
```

## Requirements

- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx web server

## My Details
#### Name: Saleheen Uddin Sakin
###### Roll: 2107103
###### Batch: 2k21