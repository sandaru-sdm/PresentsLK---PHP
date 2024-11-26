# PresentsLK - PHP E-Commerce Platform

## Overview
PresentsLK is a robust PHP-based e-commerce platform designed to provide a seamless online shopping experience. The project offers comprehensive features for both customers and administrators, with a focus on user-friendly product management and order processing.

## Features

### User-Facing Capabilities
- 🔐 Secure user registration and authentication
- 🛍️ Intuitive product browsing, advanced search, and filtering
- 🛒 Streamlined cart and order management system

### Administrative Functionalities
- 📦 Product management (add, update, delete)
- 🏷️ Category and brand management
- 👥 User account administration
- 📋 Comprehensive order tracking and management

## Prerequisites

### Software Requirements
- **Web Server**: XAMPP (Apache)
- **Programming Language**: PHP 7.4+
- **Database**: MySQL 8.0
- **Web Browser**: Modern browser (Chrome, Firefox, Safari, Edge)

### Recommended Setup
1. [XAMPP Download](https://www.apachefriends.org/download.html)
2. [MySQL Download](https://dev.mysql.com/downloads/mysql/)

## Installation Guide

### Step 1: Environment Setup
1. Download and install XAMPP
2. Launch XAMPP Control Panel
3. Start Apache and MySQL modules

### Step 2: Database Configuration
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Create new database: `presentslk`
3. Import database schema:
   - File: `presentlk.sql`
   - Location: `PresentsLK---PHP-main/presentlk.sql`

### Step 3: Project Configuration
1. Extract project to XAMPP's `htdocs` directory
2. Configure database connection in `config.php`:
```php
<?php
$servername = "localhost";
$username = "root";     // Default MySQL username
$password = "";         // Default MySQL password
$dbname = "presentslk"; // Database name
?>
```

### Step 4: Launch Application
- Access via browser: http://localhost/PresentsLK
- Use provided admin credentials or create new admin user

## Project Structure
```
PresentsLK/
│
├── php/               # Backend logic files
│   ├── addProductProcess.php
│   ├── cart.php
│   └── index.php
│
├── sql/               # Database schema
│   └── presentlk.sql
│
├── css/               # Styling files
├── js/                # JavaScript files
├── config.php         # Database configuration
└── README.md          # Project documentation
```

## Troubleshooting

### Common Issues
- **Port Conflicts**: 
  - Ensure ports 80 (Apache) and 3306 (MySQL) are available
  - Close conflicting applications or services

- **PHP Compatibility**:
  - Verify PHP version in `php.ini`
  - Check extension and module configurations

## Roadmap & Improvements
- [ ] Implement comprehensive automated testing
- [ ] Enhance security measures
  - Prepared SQL statements
  - CSRF protection
- [ ] Optimize database query performance
- [ ] Improve responsive design
- [ ] Add advanced reporting features

## Security Considerations
- Regular security audits
- Keep dependencies updated
- Implement input validation
- Use prepared statements
- Enable HTTPS

## Contributing
1. Fork the repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create pull request

## License
This project is licensed under the MIT License.

## Contact
For any inquiries, please contact maduhansadilshan@gmail.com
