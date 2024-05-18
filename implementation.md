Sure! Here is the source code for each component of the application:

Go Application
Directory Structure
go
Copy code
/go-app
  - main.go
  - go.mod
  - Dockerfile
main.go
go
Copy code
package main

import (
	"fmt"
	"net/http"
)

func handler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Hello, Go!")
}

func main() {
	http.HandleFunc("/", handler)
	http.ListenAndServe(":8080", nil)
}
go.mod
go
Copy code
module github.com/yourusername/go-app

go 1.16
Dockerfile
dockerfile
Copy code
FROM golang:1.16-alpine

WORKDIR /app

COPY . .

RUN go build -o main .

CMD ["./main"]
Next.js (TypeScript) Application
Directory Structure
markdown
Copy code
/nextjs-app
  - pages
    - index.tsx
  - public
  - styles
    - Home.module.css
  - package.json
  - tsconfig.json
  - Dockerfile
  - .eslintrc.json
  - .prettierrc
  - .eslintignore
pages/index.tsx
tsx
Copy code
import React from 'react';
import styles from '../styles/Home.module.css';

const Home: React.FC = () => {
  return (
    <div className={styles.container}>
      <h1>Hello, Next.js!</h1>
    </div>
  );
};

export default Home;
package.json
json
Copy code
{
  "name": "nextjs-app",
  "version": "1.0.0",
  "private": true,
  "scripts": {
    "dev": "next dev",
    "build": "next build",
    "start": "next start",
    "lint": "next lint"
  },
  "dependencies": {
    "next": "11.1.2",
    "react": "17.0.2",
    "react-dom": "17.0.2"
  },
  "devDependencies": {
    "@types/node": "16.10.2",
    "@types/react": "17.0.33",
    "eslint": "7.32.0",
    "eslint-config-next": "11.1.2",
    "typescript": "4.4.3",
    "prettier": "2.4.1"
  }
}
tsconfig.json
json
Copy code
{
  "compilerOptions": {
    "target": "es5",
    "lib": ["dom", "dom.iterable", "esnext"],
    "allowJs": true,
    "skipLibCheck": true,
    "strict": false,
    "forceConsistentCasingInFileNames": true,
    "noEmit": true,
    "esModuleInterop": true,
    "module": "esnext",
    "moduleResolution": "node",
    "resolveJsonModule": true,
    "isolatedModules": true,
    "jsx": "preserve",
    "incremental": true
  },
  "include": ["next-env.d.ts", "**/*.ts", "**/*.tsx"],
  "exclude": ["node_modules"]
}
Dockerfile
dockerfile
Copy code
FROM node:14-alpine

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .

RUN npm run build

CMD ["npm", "start"]
.eslintrc.json
json
Copy code
{
  "extends": "next/core-web-vitals"
}
.prettierrc
json
Copy code
{
  "semi": true,
  "singleQuote": true,
  "printWidth": 80,
  "tabWidth": 2,
  "trailingComma": "es5"
}
.eslintignore
lua
Copy code
node_modules/
.next/
WordPress Application
Directory Structure
markdown
Copy code
/wordpress-app
  - index.php
  - Dockerfile
index.php
php
Copy code
<?php
// Silence is golden.
?>
Dockerfile
dockerfile
Copy code
FROM wordpress:latest

COPY . /var/www/html
Docker Compose File
docker-compose.yml
yaml
Copy code
version: '3'

services:
  go-app:
    build: ./go-app
    ports:
      - "8080:8080"

  nextjs-app:
    build: ./nextjs-app
    ports:
      - "3000:3000"

  wordpress-app:
    build: ./wordpress-app
    ports:
      - "8081:80"
CI/CD Workflow Files
Go CI Workflow (.github/workflows/go.yml)
yaml
Copy code
name: Go CI

on: [push, pull_request]

jobs:
  build:
    runs-on: ubuntu-latest

    steps:
    - name: Checkout code
      uses: actions/checkout@v2

    - name: Set up Go
      uses: actions/setup-go@v2
      with:
        go-version: 1.16

    - name: Install dependencies
      run: go mod tidy

    - name: Lint
      run: go get github.com/golangci/golangci-lint/cmd/golangci-lint && golangci-lint run ./...

    - name: Test
      run: go test ./...
Next.js CI Workflow (.github/workflows/nextjs.yml)
yaml
Copy code
name: Next.js CI

on: [push, pull_request]

jobs:
  build:
    runs-on: ubuntu-latest

    steps:
    - name: Checkout code
      uses: actions/checkout@v2

    - name: Set up Node.js
      uses: actions/setup-node@v2
      with:
        node-version: '14'

    - name: Install dependencies
      run: npm install

    - name: Lint
      run: npm run lint

    - name: Test
      run: npm run test
WordPress CI Workflow (.github/workflows/wordpress.yml)
yaml
Copy code
name: WordPress CI

on: [push, pull_request]

jobs:
  build:
    runs-on: ubuntu-latest

    steps:
    - name: Checkout code
      uses: actions/checkout@v2

    - name: Set up PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '7.4'

    - name: Install dependencies
      run: composer install

    - name: Lint
      run: phpcs --standard=WordPress .
Docker Build and Push Workflow (.github/workflows/docker-build.yml)
yaml
Copy code
name: Build and Push Docker Images

on:
  push:
    branches:
      - main

jobs:
  build-and-push:
    runs-on: ubuntu-latest

    steps:
    - name: Checkout code
      uses: actions/checkout@v2

    - name: Set up Docker Buildx
      uses: docker/setup-buildx-action@v1

    - name: Log in to Docker Hub
      uses: docker/login-action@v1
      with:
        username: ${{ secrets.DOCKER_USERNAME }}
        password: ${{ secrets.DOCKER_PASSWORD }}

    - name: Build and push Go image
      run: |
        docker build -t ${{ secrets.DOCKER_USERNAME }}/myapp-go:latest ./go-app
        docker push ${{ secrets.DOCKER_USERNAME }}/myapp-go:latest

    - name: Build and push Next.js image
      run: |
        docker build -t ${{ secrets.DOCKER_USERNAME }}/myapp-nextjs:latest ./nextjs-app
        docker push ${{ secrets.DOCKER_USERNAME }}/myapp-nextjs:latest

    - name: Build and push WordPress image
      run: |
        docker build -t ${{ secrets.DOCKER_USERNAME }}/myapp-wordpress:latest ./wordpress-app
        docker push ${{ secrets.DOCKER_USERNAME }}/myapp-wordpress:latest
Documentation
README.md
markdown
Copy code
# MyApp

This repository contains the source code for the MyApp web application, which consists of three components: Go, Next.js (TypeScript), and WordPress.

## Setup

### Prerequisites
- Docker
- Docker Compose
- Node.js
- Go
- PHP

### Running Locally

1. Clone the repository:
   ```sh
   git clone https://github.com/yourusername/myapp.git
   cd myapp
Build and start the services using Docker Compose:

sh
Copy code
docker-compose up --build
Access the applications:

Go application: http://localhost:8080
Next.js application: http://localhost:3000
WordPress application: http://localhost:8081
CI/CD Pipelines
Go Application
The Go application is linted and tested using GolangCI-Lint and Go test.
CI workflow file: .github/workflows/go.yml
Next.js (TypeScript) Application
The Next.js application is linted using ESLint and Prettier, and tested using Jest.
CI workflow file: `.github/workflows/next






