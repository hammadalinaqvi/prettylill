
##Pretty Little Thing Test

This is a test Laravel application. Laravel `Auth` is implemented for the basic user management CURD. Following features are included;

- Bacis Laravel Auth for User management (Login, Register)
- Upload CSV file or products
- List Products

##INSTRUCTIONS
- Clone the application to your web root
- Set your DB credentials is .env file
- Run `composer install` to install the framework dependencies that are mentioned in 'composer.json'. They will go in 'vendor' folder
- Run `php artisan key:generate` this will generate a unique Key Hash in .evn file that is used for encryption within the system.
- Run `php artisan migrate` this will create the tables in your MySQL DB that you have mentioned in .env file
- Run `php artisan serve`
- Now go to **http://127.0.0.1:8000/**
- Login or Register on the application
- Once you are logged in, you will be redirected to the uplode page
- To run the command to upload file, run `php artisan import:products /path/to/file`, this will import the products in DB and will be shown on products page
- Navigations for products are added in the user menu drop down

##Useful Commands & Files
- `composer dump-autoload` refreshes the Package manifest and generates optimized autoload files
- `php artisan view:clear` clears cached views
- `php artisan cache:clear` clears cached files and data
- Routes are defined in 'routes/web.php'

##About Laravel
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).