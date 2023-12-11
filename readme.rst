Product Dashboard

A Codeigniter 3 MVC application with user management and product administration features.
Technologies

    Codeigniter 3 (MVC framework)
    MySQL (database)

Features

Authentication:

    Signup:
        User registration with email and password.
        Form validation ensures valid data.
        Email uniqueness checked in the database.
        Password securely hashed using BYCRYPT.
    Login:
        Existing users can login via email and password.
        Form validation ensures valid credentials.
        Email existence verified in the database.

User Management:

    Admin Dashboard:
        Manage products by adding, editing, and deleting entries.
        View and update product information and details.
    User/Admin:
        Add comments and reviews to products.
        Reply to existing comments/reviews.
        Update user/admin profile information and password.

Wireframe
.. image:: wireframe.png
    :alt: Wireframe Image
    :width: 500
    :align: center
    
System Requirements

    PHP 7.4 or later
    MySQL 8 or later
    Web server (Apache)

Installation

    Download the project files.
    Import the product_dashboard.sql file into your MySQL database.
    Optional: Populate tables using provided CSV files or create your own data.
    Edit the application/config/database.php file with your database credentials.
    Run composer install to install project dependencies.
    Run php spark migrate -all to create database tables.
    Access the application through your web browser.

Note:

    If you use the provided CSV files, you can login with:
        User: john_doe@email.com, test1234
        Admin: john_wick@email.com, admin1234
    A manual query is needed to create the admin user.

Disclaimer

    Project completion: 80-90%
    Minor bugs present
    Open to contributions and bug reports

Please report any issues or suggestions through the project issue tracker.