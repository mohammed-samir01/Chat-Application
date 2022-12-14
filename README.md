## Chat-Application

This is a simple chat application built using Laravel and Livewire It uses Pusher to send messages in real-time.

### Installation

Clone the repository

```bash
git clone
```

Install dependencies

```bash
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```


Update the .env file with Database credentials

```bash 
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```


Change Broadcast Driver to Pusher

```bash
BROADCAST_DRIVER=pusher
```


Create a new Pusher application and update the .env file with the pusher credentials

```bash
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=
```


Generate an app encryption key

```bash
php artisan key:generate
```

Run the database migrations (Set the database connection in .env before migrating)

```bash
php artisan migrate
```

Install the JavaScript dependencies

```bash
npm install
```

Run Websockets server

```bash
php artisan websockets:serve
```


Run the local development server

```bash
php artisan serve
```

You can now access the server at http://localhost:8000


### Testing
You can test the application by opening two different browsers and login with two different users. You can now send messages between the two users.

Have fun!

### Credits

- [Laravel](https://laravel.com/)
- [Livewire](https://laravel-livewire.com/)
- [Pusher](https://pusher.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Alpine.js]()
- [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze)
- [Laravel Websockets](https://laravel.com/docs/8.x/starter-kits#laravel-websockets)
- [Laravel](https://laravel.com/)
- [Livewire](https://laravel-livewire.com/)
- [Pusher](https://pusher.com/)
- [Tailwind CSS](https://tailwindcss.com/)


## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all
modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video
tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging
into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
