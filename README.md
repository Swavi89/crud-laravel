# Student Management System with Todo API

A Laravel-based application that provides a complete Student Management System with CRUD operations and a Todo API for testing purposes.

## Features

-   Student Management (CRUD Operations)
    -   Create new students
    -   View student list
    -   Edit student details
    -   Delete students
    -   Search functionality
    -   Status management (Active/Inactive)
-   Todo API for testing
    -   RESTful API endpoints
    -   Postman collection available
    -   CRUD operations for todos

## Prerequisites

-   Docker
-   Docker Compose
-   Postman (for API testing)

## Quick Start with Docker

1. Clone the repository:

```bash
git clone <your-repository-url>
cd crud-laravel
```

2. Copy the environment file:

```bash
cp .env.example .env
```

3. Start the Docker containers:

```bash
docker-compose up -d
```

4. Install dependencies and set up the application:

```bash
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan storage:link
```

5. Access the application:

-   Web Interface: http://localhost:8000
-   Database: localhost:3306
    -   Database Name: laravel
    -   Username: root
    -   Password: root

## Docker Container Information

The application runs in the following containers:

-   `app`: Laravel application (PHP 8.1)
-   `db`: MySQL database
-   `nginx`: Web server
-   `phpmyadmin`: Database management (optional)

## Todo API Testing with Postman

### API Endpoints

1. Get all todos

```
GET http://localhost:8000/api/todos
```

2. Create a new todo

```
POST http://localhost:8000/api/todos
Content-Type: application/json

{
    "title": "Test Todo",
    "description": "This is a test todo",
    "completed": false
}
```

3. Get a specific todo

```
GET http://localhost:8000/api/todos/{id}
```

4. Update a todo

```
PUT http://localhost:8000/api/todos/{id}
Content-Type: application/json

{
    "title": "Updated Todo",
    "description": "This is an updated todo",
    "completed": true
}
```

5. Delete a todo

```
DELETE http://localhost:8000/api/todos/{id}
```

### Postman Collection

You can import the Postman collection from:

```
docs/postman/todo-api-collection.json
```

## Student Management System

### Features

-   Create new students with:
    -   Name
    -   Date of Birth
    -   Gender
    -   Email
    -   Mobile
    -   Address
    -   Roll Number
    -   Class
    -   Section
    -   Status
-   Search functionality
-   Pagination
-   Status management

### Access

-   Login URL: http://localhost:8000/login
-   Default credentials:
    -   Email: admin@example.com
    -   Password: password

## Development

### Running Tests

```bash
docker-compose exec app php artisan test
```

### Database Migrations

```bash
docker-compose exec app php artisan migrate
```

### Database Seeding

```bash
docker-compose exec app php artisan db:seed
```

## Troubleshooting

1. If you encounter permission issues:

```bash
docker-compose exec app chmod -R 777 storage bootstrap/cache
```

2. If the application doesn't start:

```bash
docker-compose down
docker-compose up -d
```

3. To view logs:

```bash
docker-compose logs -f
```

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.
