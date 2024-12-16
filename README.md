## Spatie Project With Bootstrap
### Overview:
The Spatie Project is helping for using role and permission in your project that you can control the specific option.
### Installation:
1. Prerequisites:
   Ensure you have a local development environment set up listed prerequisites:
    
    - PHP >= 8.2
    - php-curl
    - php-mysql
    - Laravel >= 11.0
    - MySql
    - Node >= 20.0
    - NPM >= 6.0
    - Composer >= 2.0
2. Clone the Repository:
     ```Bash
     git clone https://github.com/KajalBormon/Spatie-with-Bootstrap.git
     ```  
3. Install Dependencies:
     ```Bash
     cd role_permission
     composer install
     npm install
     ```
4. **Configuration:**
    - Database Configuration:
      Copy `env.example` file and Edit the `.env` file to configure your database connection details (`host, database name, username, password`).
      Consider using a secure environment variable management solution for production environments.
    - Application Configuration:
      Review the **config** directory for any additional application-specific configuration files.
5. **Database Migrations:**
   Run the following command to create the database tables:**
    ```bash
    php artisan migrate
    ```
6. **Set the APP_ENV:**
    Edit the `.env` to set `APP_ENV`.
    For the production server, set APP_ENV=production
    For the staging server, set APP_ENV=staging
    For local or development server, set APP_ENV=local
7. **Start the Application:**
   Run the following command to start the application:
    ```bash
    php artisan serve --port=8000
    ```
   The application will be accessible at `http://localhost:8000`.
