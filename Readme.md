# Skills Test Symfony Project - Kuteesa Joshua Odera

This repository contains a Symfony project set up with Docker or if you already have Symfony installed, you can just run the application once cloned and you cd into the folder. The Docker setup includes a php-apache container, an apache web server container, and a MySQL database container, all managed using Docker Compose. This allows you to run the Symfony application in a consistent and isolated environment.

## Prerequisites

Before you begin, make sure you have the following tools installed:

- [Docker](https://www.docker.com/get-started) (including Docker Compose)
- [Git](https://git-scm.com/)
- [Symfony CLI (optional)](https://symfony.com/download) (for managing Symfony-specific tasks, though it's not required)

### Running the project with Symfony preinstalled

1. **Clone the Repository**

Clone the repository containing the Symfony project:

```bash
git clone https://github.com/KutsJoe/Skills_Evaluation_Kuteesa_Joshua
cd Skills_Evaluation_Kuteesa_Joshua
```

2. **Instll Dependencies**

```bash
composer install
```


3. **Start the server**

```bash
symfony server:start
```

4. **Test the routes in your browser**


[Circle Test Route](http://127.0.0.1:8000/circle/2)
[Triangle Test Route](http://127.0.0.1:8000/triangle/3/4/5)

5. **You can also run the command below to run a sample test using phpunit**

```bash
php bin/phpunit
```


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
git clone https://github.com/KutsJoe/Skills_Evaluation_Kuteesa_Joshua
cd Skills_Evaluation_Kuteesa_Joshua
```

### 2. Build the Docker Containers

Use Docker Compose to build the necessary containers:

```bash
docker-compose build
```

This will build the PHP-FPM container, Apache container, and MySQL container as defined in the `Dockerfile` and `docker-compose.yml` files.

### 3. Start the Containers

Run the following command to start the containers in the background:

```bash
docker-compose up -d
```

This will start the Symfony application, Apache web server, and MySQL database.

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

### 5. Access the Application

Once everything is set up, you can access the Symfony application in your browser at:

```
http://localhost:8080
```

This is the Apache web server's default port mapped to the host machine's port `8080`.

### 6. Stopping the Containers

When you're done working with the containers, you can stop them using:

```bash
docker-compose down
```

This will stop and remove the containers, but keep the data in the volumes (such as the MySQL database) intact.

### 7. Rebuilding the Containers

If you make changes to the `Dockerfile`, `docker-compose.yml`, or any configuration, you may need to rebuild the containers:

```bash
docker-compose build
```

Then restart the containers:

```bash
docker-compose up -d
```
