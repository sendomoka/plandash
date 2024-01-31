# plandash

**plandash** is a simple Laravel API for basic task management, allowing you to perform CRUD operations on tasks.

## Getting Started

To get started with plandash, follow these steps:

1. **Installation**: Clone the repository and install dependencies using Composer.
```bash
git clone https://github.com/sendomoka/plandash.git
cd plandash
composer install
```

2. **Configuration**: Copy the `.env.example` file to `.env` and update the database credentials.
```bash
cp .env.example .env
php artisan key:generate
```

3. **Database**: Create a new database and run the migrations.
```bash
php artisan migrate
```

4. Start the server.
```bash
php artisan serve
```

## API Endpoints

Access the API endpoints to perform CRUD operations on tasks. Here are the basic endpoints:

| Method | URI | Description |
| --- | --- | --- |
| GET | /api/tasks | Get all tasks |
| POST | /api/tasks | Create a new task |
| GET | /api/tasks/{id} | Get a single task |
| PUT | /api/tasks/{id} | Update a task |
| DELETE | /api/tasks/{id} | Delete a task |
| GET | /api/tasks/completed | Get all completed tasks |
| GET | /api/tasks/incomplete | Get all incomplete tasks |
| PUT | /api/tasks/{id}/status | Update the status of a task |

## Contributing

Thank you for considering contributing to plandash! Please feel free to make any pull requests, or open any issues.

## License

plandash is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
