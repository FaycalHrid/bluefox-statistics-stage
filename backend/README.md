# Restful API 
 - Clone the repository
 - Set up database credentials in .env file
 - Run `php artisan migrate` to migrate the database
 - Run `composer update`
 
 
  #### Using table prefixes
 - If you want to set `prefix` in your `.env` file you can: `.env`
 
 ```phpDB_TABLE_PREFIX=pfx_```
 - And in `config/database.php`
 
  ```php 'prefix' => env('DB_TABLE_PREFIX', 'abc')```
  
  ### Eloquent Controller Generator
  
  #### Installation
  Step 1. Add Controller in your project:
  ```
  php artisan make:controller NameController --resource
  ```
  ### Eloquent Model Generator
  
  #### Installation
  Step 1. Add Eloquent Model Generator to your project:
  ```
  composer require krlove/eloquent-model-generator --dev
  ```
  Step 2. Register `GeneratorServiceProvider`:
  ```php
  'providers' => [
      // ...
      Krlove\EloquentModelGenerator\Provider\GeneratorServiceProvider::class,
  ];
  ```
  If you are using Laravel version 5.5 or higher this step can be omitted since this project supports [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery) feature.
  
  Step 3. Configure your database connection.
  
  ### Usage
  Use
  ```
  php artisan krlove:generate:model User
  ```
  to generate a model class. Generator will look for table with name `users` and generate a model for it.
  
  #### table-name
  Use `table-name` option to specify another table name:
  ```
  php artisan krlove:generate:model User --table-name=user
  ```
  In this case generated model will contain `protected $table = 'user'` property.
  
  #### base-class-name
  By default generated class will be extended from `Illuminate\Database\Eloquent\Model`. To change the base class specify `base-class-name` option:
  ```
  php artisan krlove:generate:model User --base-class-name=Some\\Other\\Base\\Model
  ```
  
  #### backup
  Save existing model before generating a new one
  ```
  php artisan krlove:generate:model User --backup
  ```
  
 