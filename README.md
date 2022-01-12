## Setup Procedures

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- clone this repo to local 
- duplicate .env.example file, rename as .env, put your local mysql credits in, add database to your local mysql
- cd into repo root directy
- run `composer install'
- run `npm install` (optional)
- run `php artisan migrate` to set up tables
- run `php artisan db:seed` to seed tables with example data
- run `php artisan serve` to start the backend server as e.g. http://127.0.0.1:8000

[Caveats]
- If met with "Class 'Facade\Ignition\IgnitionServiceProvider' not found" as I did when migrate tables, run `composer dumpautoload` solved the issue.
- if met with "League\Flysystem\Exception Impossible to create the root directory" error, run 'php artisan storage:link' solved the issue

## Third party packages used
[intervention/image](https://github.com/Intervention/image)

