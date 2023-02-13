# Laravel  App

# Description:
> Build a system using Laravel framework for a
> mini ecommerce where  admin can add products and users and Languages, and also traslated products. 

# Build Database: 
 1. languages (title & slogan & img ):
 2. Products: [name,description,image,lang_id]
 3. users: [email,name,pass,lang_id]
  >Notes:
   1. language_id is the id of languages.(F.K).
 
# start work:
 1. make Models, Migration & relations between tables plus laravel UI.
 2. `composer require laravel/ui`.
 3. make CRUD For Product and languages plus users, Extra show on products in  dashboard page :) and rendering products like :).
 6. make Factories and seeders for create products and users and langs :) for testing :) `php artisan  migrate:fresh seed`.
 7. Complete All Coding Until Finish :)


# Steps To Run This App:
  To clone the project you must follow the following steps:
  1. Navigate to the main page of the repository.
  2. Above the list of files, click Code button and copy the https link.
  3. Go to your visual studio code editor then open the terminal and write this command git clone with https linK.
  4. Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu.
  5. Open your .env file and change the database name to `seo_product`, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
  6. open Mysql Host and create Database with `pharmacydb` with your above configuration.
  6. Run `composer install`
  6. Run `php artisan key:generate`
  7. Run `php artisan migrate`
  8. Run `php artisan db:seed` if you want to make atest on some faker data in the order
       php artisan db:seed --class=AdminSeeder
       php artisan db:seed --class=LanguagesSeeder
       php artisan db:seed --class=DatabaseSeeder
       php artisan db:seed --class=ProductsSeeder                                                                           
  9. Run `http://localhost/test/login` for normal User and `http://localhost/test/admin/adminLogin` for admin start Manage products & users in App :) 
