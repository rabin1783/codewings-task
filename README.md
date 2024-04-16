Code Wings Task

#Require Php 8.1+

#package Used
1.composer require surazdott/laravel-repository
    This Package is used to perform Repository Pattern.

2.maatwebsite/excel
    This package is used to export Json file to Excel file.

Get Started
    1.First of all Migrate db using seed

        // Generate db with seeder
        php artisan migrate --seed
    
    2. use composer update
        it updates all the dependencies listed in your composer.json file to their latest versions that match the version constraints specified in your project.

        composer update

    3. Optimize clear

            The optimize:clear command in Laravel is used to clear the cached bootstrap files and compiled classes. It's particularly useful after changes are made to your application's configuration or when you want to refresh the cached files for performance optimization.

            php artisan optimize:clear
