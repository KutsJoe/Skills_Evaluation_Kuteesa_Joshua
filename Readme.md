# Symfony Project with Docker

This repository contains a Symfony project set up with Docker. The setup includes a PHP-FPM container, an Nginx web server container, and a MySQL database container, all managed using Docker Compose. This allows you to run the Symfony application in a consistent and isolated environment.

## Prerequisites

Before you begin, make sure you have the following tools installed:

- [Docker](https://www.docker.com/get-started) (including Docker Compose)
- [Git](https://git-scm.com/)
- [Symfony CLI (optional)](https://symfony.com/download) (for managing Symfony-specific tasks, though it's not required)

### Docker and Docker Compose Installation

1. **Docker**:  
   Follow the installation guide for Docker on [Docker's official website](https://docs.docker.com/get-docker/).

2. **Docker Compose**:  
   Docker Compose is typically installed alongside Docker. You can verify its installation with:
   ```bash
   docker-compose --version
   ```

## Project Setup

Follow these steps to set up and run the Symfony project using Docker.

### 1. Clone the Repository

Clone the repository containing the Symfony project:

```bash
git clone https://github.com/yourusername/symfony-project.git
cd symfony-project
```

### 2. Build the Docker Containers

Use Docker Compose to build the necessary containers:

```bash
docker-compose build
```

This will build the PHP-FPM container, Nginx container, and MySQL container as defined in the `Dockerfile` and `docker-compose.yml` files.

### 3. Start the Containers

Run the following command to start the containers in the background:

```bash
docker-compose up -d
```

This will start the Symfony application, Nginx web server, and MySQL database.

### 4. Install Symfony Dependencies

Once the containers are running, you need to install the Symfony PHP dependencies using Composer. Since the `php` container is already set up with Composer, you can execute this inside the container.

Run the following command to access the PHP container and install the dependencies:

```bash
docker-compose exec php bash
```

Inside the container, run:

```bash
composer install
```

This will install all required dependencies specified in `composer.json` (including Symfony and other PHP libraries).

### 5. Set Up the Database

Next, run the following commands to set up the database.

1. **Create the database** (if not already created):

   ```bash
   docker-compose exec php php bin/console doctrine:database:create
   ```

2. **Run migrations** (if you have any pending migrations):

   ```bash
   docker-compose exec php php bin/console doctrine:migrations:migrate
   ```

3. **Load fixtures** (optional, if you have data fixtures to populate your database):

   ```bash
   docker-compose exec php php bin/console doctrine:fixtures:load
   ```

### 6. Access the Application

Once everything is set up, you can access the Symfony application in your browser at:

```
http://localhost:8080
```

This is the Nginx web server's default port mapped to the host machine's port `8080`.

### 7. Stopping the Containers

When you're done working with the containers, you can stop them using:

```bash
docker-compose down
```

This will stop and remove the containers, but keep the data in the volumes (such as the MySQL database) intact.

### 8. Rebuilding the Containers

If you make changes to the `Dockerfile`, `docker-compose.yml`, or any configuration, you may need to rebuild the containers:

```bash
docker-compose build
```

Then restart the containers:

```bash
docker-compose up -d
```

## Troubleshooting

- **Permissions Issues**:  
  If you encounter permission errors (e.g., when Symfony can't write to directories), make sure the file permissions are correct in your project directory. You can run:

  ```bash
  sudo chown -R 1000:1000 .
  ```

  This ensures that files are owned by the correct user within the Docker container.

- **Container Logs**:  
  To view the logs of your running containers, use:

  ```bash
  docker-compose logs -f
  ```

- **Symfony Console Commands**:  
  To run Symfony console commands inside the `php` container, use:

  ```bash
  docker-compose exec php php bin/console <command>
  ```

- **Database Connection Issues**:  
  If you're having issues with connecting to the database, check that the `DB_URL` environment variable is correctly set in your `.env` file. The default configuration in the `docker-compose.yml` assumes MySQL is running on `mysql://root:root@db:3306/symfony`.

## Docker Compose Overview

Here is a brief description of the services in the `docker-compose.yml` file:

- **php**:  
  Runs the PHP-FPM container, which handles the PHP application. This container also installs Composer and Symfony.

- **nginx**:  
  Runs the Nginx web server and serves the Symfony application. It forwards PHP requests to the PHP-FPM container.

- **db (MySQL)**:  
  Runs the MySQL container with the specified credentials and database.

The containers are all connected to a custom network (`symfony_net`), allowing them to communicate with each other.

## Conclusion

By following these steps, you should have a fully functioning Symfony application running inside Docker containers, with all dependencies managed via Composer and the database configured.

Feel free to modify the configuration files (`Dockerfile`, `docker-compose.yml`, `nginx/default.conf`) as needed to suit your application's requirements.
