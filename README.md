# Product Management System

A modern, feature-rich product management application built with Laravel 10, Livewire 3, PostgreSQL, and Tailwind CSS. This application provides a sleek dark-themed interface for managing products with full CRUD operations and image upload capabilities.

## ✨ Features

- **🔥 Modern Dark UI**: Sleek dark theme with orange accents and gradient effects
- **📦 Product Management**: Complete CRUD operations for products
- **🖼️ Image Upload**: Optional image upload with preview and validation
- **⚡ Real-time Updates**: Seamless user experience with Livewire 3
- **📱 Responsive Design**: Mobile-friendly interface using Tailwind CSS
- **🔍 Form Validation**: Client and server-side validation
- **💾 PostgreSQL Database**: Robust database with proper relationships
- **🚀 Production Ready**: Configured for deployment on Render

## 🛠️ Tech Stack

- **Backend**: Laravel 10
- **Frontend**: Livewire 3 + Tailwind CSS 3.0
- **Database**: PostgreSQL
- **Build Tool**: Vite
- **File Storage**: Laravel Storage with Symbolic Links
- **PHP Version**: 8.1+

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- PostgreSQL
- Git

## 🚀 Installation

### 1. Clone the Repository

https://github.com/RitikShahi/Product_Management_System.git


### 2. Install Dependencies
Install PHP dependencies
composer install
Install Node.js dependencies
npm install

### 3. Environment Setup
Copy environment file
cp .env.example .env
Generate application key
php artisan key:generate

### 4. Database Configuration

Update your `.env` file with PostgreSQL credentials:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=product_management
DB_USERNAME=your_username
DB_PASSWORD=your_password



Create the database:

### 5. Run Migrations
php artisan migrate


### 6. Create Storage Link
php artisan storage:link


For development
npm run dev
php artisan serve
For production
npm run build


Visit `http://127.0.0.1:8000` to access the application.

## 📖 Usage

### Adding Products
1. Click the **"Add New Product"** button
2. Fill in the product details:
   - **Name**: Product name (minimum 3 characters)
   - **Description**: Product description (minimum 10 characters)
   - **Price**: Product price (must be positive)
   - **Image**: Optional product image (max 2MB)
3. Click **"Save Product"**

### Editing Products
1. Click the **"Edit"** button next to any product
2. Modify the details in the form
3. Upload a new image if desired (optional)
4. Click **"Update Product"**

### Deleting Products
1. Click the **"Delete"** button next to any product
2. Confirm deletion in the dialog
3. The product and its associated image will be permanently removed

## 🏗️ Project Structure

├── app/
│ ├── Livewire/
│ │ └── ProductManager.php # Main Livewire component
│ ├── Models/
│ │ └── Product.php # Product model
│ └── Providers/
│ └── AppServiceProvider.php # Service provider with HTTPS config
├── database/
│ ├── migrations/
│ │ ├── create_products_table.php # Products table migration
│ │ └── add_image_to_products_table.php # Image column migration
│ └── seeders/
│ └── ProductSeeder.php # Sample data seeder
├── resources/
│ ├── css/
│ │ └── app.css # Tailwind CSS configuration
│ ├── js/
│ │ └── app.js # JavaScript entry point
│ └── views/
│ ├── components/layouts/
│ │ └── app.blade.php # Main application layout
│ └── livewire/
│ └── product-manager.blade.php # Product management interface
├── routes/
│ └── web.php # Application routes
├── public/storage/ # Symlinked storage directory
└── storage/app/public/products/ # Uploaded product images



## 🎨 UI/UX Features

- **Dark Theme**: Modern dark interface with gray and black gradients
- **Orange Accents**: Consistent orange color scheme for buttons and highlights
- **Responsive Grid**: Adaptive layout that works on all screen sizes
- **Smooth Animations**: Hover effects and transitions for better user experience
- **Icon Integration**: SVG icons throughout the interface
- **Image Previews**: Real-time image preview during upload
- **Loading States**: Visual feedback during form submissions

## 🔧 Configuration

### Image Upload Settings
- **Maximum file size**: 2MB
- **Allowed formats**: JPG, PNG, GIF, SVG
- **Storage location**: `storage/app/public/products/`
- **Public access**: Via symbolic link at `public/storage/`

### Database Schema
products (
id BIGSERIAL PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
price DECIMAL(10,2) NOT NULL,
image VARCHAR(255) NULL,
created_at TIMESTAMP,
updated_at TIMESTAMP
