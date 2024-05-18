# Company-Task

# MyApp

This repository contains three independent components developed in Go, Next.js (TypeScript), and WordPress.

## Setup Instructions

### Go Application

1. Navigate to the `go-app` directory.
2. Build and run the application:
   ```sh
   go build -o main .
   ./main

Access the application at http://localhost:8080.

Next.js Application

Navigate to the nextjs-app directory.
Install dependencies and run the application:

```
npm install
npm run dev

```

- Access the application at http://localhost:3000.

WordPress Application

Navigate to the wordpress-app directory.
Use Docker to run the application:

sh
```
docker-compose up

```

- Access the WordPress site at http://localhost:8081.

Dockerization

Each component has a Dockerfile for containerization. Use the following commands to build and run the Docker images:

### go application

```
docker build -t myapp-go:latest ./go-app
docker run -p 8080:8080 myapp-go:latest

```

### Next.js application

```
docker build -t myapp-nextjs:latest ./nextjs-app
docker run -p 3000:3000 myapp-nextjs:latest

```

### wordpress application

```
docker build -t myapp-wordpress:latest ./wordpress-app
docker run -p 8081:80 myapp-wordpress:latest

```

CI/CD
GitHub Actions workflows are set up for each component to handle CI/CD.

Go Application
Located in .github/workflows/go.yml.

Next.js Application
Located in .github/workflows/nextjs.yml.

WordPress Application
Located in .github/workflows/wordpress.yml.

Coding Standards
Go
Linting is done using golangci-lint.

Next.js (TypeScript)
Linting is done using ESLint and Prettier.

WordPress (PHP)
Linting is done using phpcs.