# blog_laravel


# Blog Project - PHP With Laravel 

## Overview

This project is a blog management system built with **PHP**, **Laravel**, and **AJAX**. It is designed to provide a dynamic, user-friendly blog platform where multiple user roles (Super Admin, Admin, and User) can interact with the blog content.

The system has two parts: **Backend** and **Frontend**. The backend is where the Super Admin manage blog posts, create categories,approve comments, and user roles, Admin manaage blog post and comments and user can manage own blog post while the frontend allows users to view, search, and interact with blog posts.

### Features

- **User Authentication**: Users must log in to create blog posts and leave comments. 
- **Role-Based Access Control**: There are three user roles in the system:
  - **Super Admin**: Full access to everything, including user management, blog management, and comment moderation.
  - **Admin**: Can manage blog posts and comments but cannot manage users.
  - **User**: Can view blog posts, create comments (pending approval), and create blog posts.
  
- **Blog Posts**: Blog posts can be created by users after logging in. Each blog post is categorized, and users can search blogs by title.
- **Comment System**: Users can leave comments on blog posts, but comments need to be approved by the Super Admin or Admin before being displayed.
- **Blog Search**: Users can search for blog posts by keywords or categories.


## Requirements

#### Before installing the app, make sure you have the following installed on your machine:
- PHP >= 8.2
- Composer
- Laravel 11
- MySQL
- Node.js and npm

---



## Installation

Step 1: Clone the repository

```bash
  git clone https://github.com/parimalroy/blog_laravel.git
  
  cd blog_laravel
```
    
Step 2: Install Composer dependencies


```bash
 composer install
```

Step 3: Set up your environment file


```bash
 cp .env.example .env
```

Step 4: Configure your database


```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_laravel_db
DB_USERNAME=root
DB_PASSWORD=
```
Step 5: Generate the application key

```bash
 php artisan key:generate
```

Step 6: Run database migrations

```bash
 php artisan migrate
```

Step 7: Install front-end dependencies

```bash
npm install
```

Step 8: Install public storage link

```bash
php artisan storage:link
```
## Usage
### Frontend

- Users can browse the blog posts by category and search using title.
- Users can create blog posts, leave comments, and view post details.
- Comments are displayed only after being approved by an Admin or Super Admin.

### Backend

#### Super Admin can:
- View, edit, or delete blog posts.
- Manage user roles (admin, user).
- Approve or delete comments.
- Access all user data and activity.
- View blog analytics.

#### Admin can:
- Approve or delete comments.
- View blog analytics.

#### User can:
- Create blog posts.
- manage own blog posts but not others.
- Leave comments (which are subject to approval).
- View and search blog posts.


## Roles and Permissions
#### Super Admin:

- Full access to the entire application.
- Can manage users, blog posts, comments, and system settings.

#### Admin:

- Can create, edit, delete blog posts.
- Can approve or delete comments.
- Cannot manage users.

#### Admin:

- Can manaage only own blog post.
- Cannot manage other users.
- Cannot manage users.


## Technologies Used:

- Laravel: PHP framework for building the backend.
- AJAX: For dynamic user interaction without reloading the page.
- MySQL: Database management system.
- Twilland: Frontend framework for UI components.
- jQuery: Used for AJAX interactions.

