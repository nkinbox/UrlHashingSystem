## Prerequisites

Make sure you have the following installed:

- Docker: [https://www.docker.com/](https://www.docker.com/)
- Docker Compose: [https://docs.docker.com/compose/](https://docs.docker.com/compose/)


## Installation Steps

Follow these steps to set up the URL Hashing System:


1. Build the Docker images and start the containers:

   ```bash
   docker-compose up -d --build
   ```

   This command will build the Docker image using the provided Dockerfile and start the necessary containers.

2. Run the database migrations:

   ```bash
   docker-compose exec app php artisan migrate
   ```

   This command will create the required tables in the database.
