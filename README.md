# Web Magazine

Meet the project created in laravel.  
Our goal is to create an online magazine offering registration, the ability to add, rate and comment on entries, integration of widgets with an external API and other functionalities

### Production

-   creating a **backend**: [Eryk Sikora - blueris](https://github.com/ErykSikora)
-   creating a **frontend**: [Tomasz Bortacki](https://github.com/tomaszbortacki)
-   creating hapiness: both

### DEMO and screenshots

soon..

## Requirements

-   PHP >= 7.x
-   composer
-   XAMPP (or another Apache & MySQL) [[install help]](xampp-configuration-panel)

## How to install?

1. Create new laravel project `laravel new laravel-blog`
2. Install [jetstream](https://jetstream.laravel.com/1.x/introduction.html) `composer require laravel/jetstream`
3. Install [jetstream livewire](https://jetstream.laravel.com/1.x/stacks/livewire.html) `php artisan jetstream:install livewire`
4. Clone this repo `git clone https://github.com/ErykSikora/laravel-magazine.git`
5. Set the _.env_ file [[instructions]](#setting-the-env-file)
6. Migrate databases [[instructions]](#database-migrations)

## How to run?

### Basic option

`php artisan serve` - **Warning!** may not support the database!

### XAMPP configuration manual

1. Open the XAMPP Control Panel
2. Open Apache _Config_
3. Find _DocumentRoot_ and change from `DocumentRoot "[...path...]/xampp/htdocs/blog/public"` to `DocumentRoot "D:/Programy/xampp/htdocs/laravel-magazine/public"`

Thus the `localhost` link will be the main link of the page (type it in the browser).

### Setting the .env file

The env file was not included in the repository for security reasons (stores all passwords and application data).  
Recommended settings for the XAMPP database:

````DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_magazine
DB_USERNAME=root
DB_PASSWORD=```
````

### Database migrations

#TODO: migrations and faker description
