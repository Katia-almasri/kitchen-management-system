# Kitchen Management System

This `README.md` file provides a clear and structured description of the project with headings, bullet points, and commands to guide users through setup and features.
-----------------------------------------------------
Welcome to the **Kitchen Management System**, a specialized module that is part of the Restaurant Management System. This system focuses on managing products within a kitchen environment, with each product being assigned a specific location and sub-location.

## Key Features
1. Retrieve location details using a QR code.
2. Get sub-location details by ID.
3. Retrieve product details using a QR code.
4. Withdraw a specific quantity from a product.
5. Return a specific quantity to a product.
6. Update kitchen name.
7. Get users associated with a specific kitchen.
8. Create a new role.
9. Assign a role to a user for future authorization purposes.
10. View available roles in the system.

## Installation and Usage Steps

1. Clone the project:
   ```bash
   git clone <repository-url>

2. install packages:
   ```bash
   composer install

3. configure the database :
  - Update the .env file with your database details (e.g., name, username, and password).
- You can use tools like Datagrip or PHPMyAdmin to manage your database.

4. Run the database migrations:
   ```bash
   php artisan migrate
5. Seed the database with initial data::
   ```bash
   php artisan db:seed
1. Start the server:
   ```bash
   php artisan serve

And That's It! 😉
