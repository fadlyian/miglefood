# MigleFood

<p align="center">
  <img src="https://github.com/fadlyian/miglefood/assets/91882024/c5986b4e-cffe-48af-b422-9f630203332b" alt="Gambar">
</p>

MigleFood is an innovative Food and Beverage (FnB) system that aims to streamline and expedite the food ordering process for customers through a user-friendly website. The system is developed using Laravel, Blade template, and Tailwind CSS. It is deployed on AWS using Ubuntu and Nginx, along with other necessary tools.

To see our application please visit the following link [MigleFood](https://miglefood.my.id/)

## Features

- Easy and fast food ordering process
- Seamless browsing and menu selection
- Convenient cart management
- Real-time order tracking

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites

Make sure you have the following software installed on your machine:
- PHP (version 8.1.2)
- Composer (version 2.2.6)
- MySQL (version 10.4.24)
- Node.js (version 14.0.0 or above)
- NPM (Node Package Manager)

## Installation

```
# Clone this repository
$ git clone [repository-url]

# Navigate to the project folder
$ cd miglefood

# Install the dependencies
$ composer install

# Duplicate the .env.example file and rename it to .env
$ cp .env.example .env

# Generate an application key
$ php artisan key:generate

# Run the database migrations
$ php artisan migrate

# Install the Node.js dependencies
$ npm install

# Build the frontend assets for production using the following command
$ npm run build

# Develop or run a MigleFood project in development mode
$ npm run dev

# Start the development server
$ php artisan serve

# Open your web browser and go to
$ http://localhost:8000
```

## Technology Stack

- Laravel (PHP Framework)
- Tailwind CSS (Utility-First CSS Framework)

## Contributors

- [Fadly Sofyansyah](https://github.com/fadlyian) - Backend Developer
- [Arif Saputra](https://github.com/arifsptra) - Frontend Developer and DevOps Engineer

## Feature

#### Consumer

- Login
- See All Menus
- Ordering Food
- See All Orders
- See Cart
- See Their Order

#### Admin
- Login
- Create Accounts for Employees
- See All Employee Accounts
- Edit mployee Accounts
- Delete employee accounts
- Add Menus
- See All Menus
- Edit Menus
- Delete Menus
- See the List of Orders
- See Transaction History
- Print Transaction Reports
- Edit profile
- logout

#### Cashier
- Login
- See the List of Orders
- Payment Confirmation
- See Transaction History
- Print Transaction Reports
- Edit profile
- logout

#### Chef
- Login
- See the List of Orders
- Order Confirmation
- logout

## App Preview

#### Consumer Page
![consumer-page](https://github.com/fadlyian/miglefood/assets/91882024/37a6194c-2142-46c9-b784-b01672770515)

#### Admin Page
![admin-page](https://github.com/fadlyian/miglefood/assets/91882024/3a5b9aa9-3556-41ed-8612-8550430214fc)

#### Cashier Page
![cashier-page](https://github.com/fadlyian/miglefood/assets/91882024/408c870f-be8f-44d9-9ea8-ea88c26a113c)

#### Chef Page
![chef-page](https://github.com/fadlyian/miglefood/assets/91882024/0f68df74-574c-4956-9abd-04a0b704c274)


## Database Schema

![db_miglefood](https://github.com/fadlyian/miglefood/assets/91882024/803704b8-80c7-4fcc-b313-322c47a79364)

## Licence

This project is licensed under the MIT license. Please see the LICENSE file for more information.
