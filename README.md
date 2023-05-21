# URL Hashing System

A scalable URL hashing application

## Architecture

The application architecture consists of the following components:

- Laravel: The PHP framework used for building the web application.
- PHP-FPM: The PHP FastCGI Process Manager responsible for processing PHP requests.
- Nginx: The web server used to serve static files and proxy PHP requests to PHP-FPM.
- Redis: An in-memory data store used for caching and session management.
- MongoDB: A NoSQL database used for storing application data.



## Application Flow

This API documentation provides details on how to interact with the URL Hashing System.

### Base URL

The base URL for all endpoints is: `http://localhost`

### List URLs

Retrieves a list of URLs stored in the system.

- Method: `GET`
- URL: `/api/v1/admin/urls`

Example Request:
```http
GET http://localhost/api/v1/admin/urls
```

### Create URL

Creates a new URL entry in the system.

- Method: `POST`
- URL: `/api/v1/admin/urls`
- Body:

```json
{
    "long_url": "https://www.google.com",
    "is_once": false
}
```

Example Request:
```http
POST http://localhost/api/v1/admin/urls
Content-Type: application/json

{
    "long_url": "https://www.google.com",
    "is_once": false
}
```

### Hashed URL

Use the `short_url` value from the List and add it to http://localhost/{short_url}