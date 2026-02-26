# E-Shop Portal

A full-featured PHP-based e-commerce website for online shopping with user management, product catalog, shopping cart, and admin panel functionality.

## 📋 Table of Contents

- [E-Shop Portal](#e-shop-portal)
  - [📋 Table of Contents](#-table-of-contents)
  - [🌟 Project Overview](#-project-overview)
  - [✨ Features](#-features)
    - [Customer Features](#customer-features)
    - [Admin Features](#admin-features)
  - [🛠 Technology Stack](#-technology-stack)
  - [📁 Project Structure](#-project-structure)
  - [🗄 Database Setup](#-database-setup)
    - [Database Name: `eshopdb`](#database-name-eshopdb)
    - [Using eshopdb.sql (Recommended)](#using-eshopdbsql-recommended)
  - [⚙️ Installation](#️-installation)
    - [Prerequisites](#prerequisites)
    - [Steps](#steps)
  - [📖 Usage](#-usage)
    - [For Customers](#for-customers)
    - [For Admins](#for-admins)
  - [🔐 Default Credentials](#-default-credentials)
  - [🎨 Design Features](#-design-features)
  - [📝 Notes](#-notes)
  - [🔧 Future Enhancements](#-future-enhancements)
  - [📄 License](#-license)
  - [👨‍💻 Author](#-author)
  - [❓ Support](#-support)

---

## 🌟 Project Overview

E-Shop Portal is a complete e-commerce solution that allows customers to browse products, add items to cart, place orders, and manage their profiles. It also includes an admin panel for managing products, users, and orders.

---

## ✨ Features

### Customer Features
- **User Registration** - Sign up with name, email, password, gender, mobile, and date of birth
- **User Login/Logout** - Secure session-based authentication
- **Product Catalog** - Browse products by category (Mobile, TV, Laptop)
- **Product Details** - View detailed product information
- **Shopping Cart** - Add/remove products, view cart count
- **Order Placement** - Place orders from cart
- **Contact Us** - Submit inquiries and feedback
- **User Profile** - Personalized welcome message

### Admin Features
- **Admin Panel** - Protected access for administrators only
- **User Management** - Add new users, view all users
- **Product Management** - Add new products, view all products
- **Order Management** - View and manage customer orders
- **Query/Feedback Management** - View customer queries and feedback

---

## 🛠 Technology Stack

| Component | Technology |
|-----------|------------|
| Frontend | HTML, CSS |
| Backend | PHP |
| Database | MySQL |
| Server | Apache (XAMPP/WAMP) |
| Development Environment | NetBeans IDE |

---

## 📁 Project Structure

```
E SHOP PORTAL/
├── admin.php              # Admin dashboard (protected)
├── ANP.php               # Add New Product
├── ANU.php               # Add New User
├── bdconnection.php      # Database connection configuration
├── cart.php              # Shopping cart page
├── contact.php           # Contact/Feedback form
├── delete.php            # Delete product from cart
├── deleteproduct.php     # Delete product (admin)
├── deleteuser.php        # Delete user (admin)
├── design.php            # Design settings
├── eshopdb.sql           # MySQL database schema with sample data
├── homepage.php          # Home/Main page
├── laptop.php            # Laptop products
├── logout.php            # Logout handler
├── mobile.php            # Mobile products
├── mobiledesc.php        # Mobile product details
├── mycart.php            # My cart page
├── O.php                 # Orders management
├── productmain.php       # Product main/details page
├── QF.php                # Query/Feedback management
├── README.md             # Project documentation
├── shipping.php          # Shipping information
├── signin.php            # User login
├── signup.php            # User registration
├── stylesheet.css        # Main CSS stylesheet
├── tvdesc.php            # TV product details
├── VAL.php               # View All Products (admin)
├── VAU.php               # View All Users (admin)
├── logo.jpg              # Website logo
├── .gitignore            # Git ignore file
├── PRODUCT/              # Product images directory
│   ├── mobile1.jpg
│   ├── mobile2.jpg
│   ├── mobile3.jpg
│   ├── mobile4.jpg
│   ├── mobile5.jpg
│   ├── poco.jpg
│   ├── tv1.jpg
│   ├── tv2.jpg
│   ├── tv3.jpg
│   ├── tv5.jpg
│   └── tv6.jpg
└── nbproject/            # NetBeans project files
```

---

## 🗄 Database Setup

### Database Name: `eshopdb`

###  Using eshopdb.sql (Recommended)

The project includes a ready-to-use SQL file `eshopdb.sql` that contains:
- Complete database schema with all tables
- Sample users (1 admin + 3 clients)
- Sample products (mobiles & TVs)
- Sample orders
- Sample queries/feedback

**To import the database:**
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Click "Import" tab
3. Select the `eshopdb.sql` file from your project folder
4. Click "Go" to execute


## ⚙️ Installation

### Prerequisites
- XAMPP/WAMP server
- PHP 7.0 or higher
- MySQL 5.0 or higher
- Web browser (Chrome, Firefox, Edge)

### Steps

1. **Install XAMPP/WAMP**
   - Download and install XAMPP from [apachefriends.org](https://www.apachefriends.org/)
   - Start Apache and MySQL services

2. **Setup Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Import the `eshopdb.sql` file (recommended)

3. **Configure Database Connection**
   - Edit `bdconnection.php` if needed:
   
```
php
<?php
    const hostname="localhost";
    const username="root";
    const password="";
    const database="eshopdb";
?>
```

4. **Deploy Project**
   - Copy the project folder to `htdocs` (XAMPP) or `www` (WAMP)
   - Or use the project directly from your development folder

5. **Access the Website**
   - Open your browser and navigate to:
   - `http://localhost/your-project-folder/`

---

## 📖 Usage

### For Customers

1. **Browse Products**
   - Visit the homepage
   - Click on Mobile, TV, or Laptop categories to view products

2. **Register/Login**
   - Click "Sign Up" to create an account
   - Click "Sign In" to log in

3. **Add to Cart**
   - Click on any product to view details
   - Click "Add to Cart" button

4. **Place Order**
   - Go to Cart
   - Review items
   - Click "Place Order"

### For Admins

1. **Access Admin Panel**
   - Log in with admin credentials
   - Click "Admin" in the navigation menu

2. **Manage Products**
   - Add New Products
   - View All Products
   - Delete Products

3. **Manage Users**
   - Add New Users
   - View All Users
   - Delete Users

4. **View Orders & Queries**
   - Check customer orders
   - Review customer feedback/queries

---

## 🔐 Default Credentials

After importing eshopdb.sql, use these login credentials:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@eshop.com | admin123 |
| Client | john@example.com | john123 |
| Client | jane@example.com | jane123 |
| Client | bob@example.com | bob123 |

---

## 🎨 Design Features

- Responsive navigation bar
- Product grid layout
- Shopping cart counter
- User session management
- Form validation
- Gradient backgrounds
- Custom CSS styling

---

## 📝 Notes

- This project uses cookies for cart functionality
- Sessions are used for user authentication
- Admin panel is protected and accessible only to users with role='Admin'
- Product images are stored in the `PRODUCT/` directory
- Database credentials should be changed for production use

---

## 🔧 Future Enhancements

- [ ] Payment gateway integration
- [ ] Email notifications
- [ ] Order tracking
- [ ] Product search functionality
- [ ] User profile management
- [ ] Product reviews and ratings
- [ ] Wishlist functionality
- [ ] Multi-category support
- [ ] Stock management
- [ ] Security improvements (password hashing, SQL injection prevention)

---

## 📄 License

This project is for educational purposes. All rights reserved by VP.

---

## 👨‍💻 Author

Created by VP

Feel free to modify and enhance this project according to your needs!

---

## ❓ Support

For any issues or questions:
- Check the code comments
- Review the database schema
- Ensure all prerequisites are installed correctly
