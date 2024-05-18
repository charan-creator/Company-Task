Here is a basic implementation of the source code for the Go, Next.js (TypeScript), and WordPress applications:

Go Application
/go-app/main.go
go
Copy code
package main

import (
	"fmt"
	"net/http"
)

func helloHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Hello, World!")
}

func main() {
	http.HandleFunc("/", helloHandler)
	http.ListenAndServe(":8080", nil)
}
/go-app/go.mod
go
Copy code
module myapp

go 1.16
Next.js (TypeScript) Application
/nextjs-app/package.json
json
Copy code
{
  "name": "nextjs-app",
  "version": "1.0.0",
  "scripts": {
    "dev": "next dev",
    "build": "next build",
    "start": "next start",
    "lint": "next lint"
  },
  "dependencies": {
    "next": "latest",
    "react": "latest",
    "react-dom": "latest"
  },
  "devDependencies": {
    "@types/react": "latest",
    "@types/react-dom": "latest",
    "eslint": "latest",
    "eslint-config-next": "latest",
    "typescript": "latest"
  }
}
/nextjs-app/tsconfig.json
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
    "jsx": "preserve"
  },
  "include": ["next-env.d.ts", "**/*.ts", "**/*.tsx"],
  "exclude": ["node_modules"]
}
/nextjs-app/pages/index.tsx
tsx
Copy code
import React from 'react';

const Home: React.FC = () => {
  return (
    <div>
      <h1>Hello, World!</h1>
    </div>
  );
};

export default Home;
WordPress Application
For the WordPress application, you need a basic WordPress setup. Here’s an example of what the directory might look like:

/wordpress-app/index.php
php
Copy code
<?php
// Silence is golden.
Dockerfiles
/go-app/Dockerfile
dockerfile
Copy code
FROM golang:1.16-alpine

WORKDIR /app

COPY . .

RUN go build -o main .

CMD ["./main"]
/nextjs-app/Dockerfile
dockerfile
Copy code
FROM node:14-alpine

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .

RUN npm run build

CMD ["npm", "start"]
/wordpress-app/Dockerfile
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
GitHub Actions Workflows
/go-app/.github/workflows/go.yml
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
      run: go install github.com/golangci/golangci-lint/cmd/golangci-lint@latest && golangci-lint run ./...

    - name: Test
      run: go test ./...
/nextjs-app/.github/workflows/nextjs.yml
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
/wordpress-app/.github/workflows/wordpress.yml
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
Final Steps
Push all changes to your GitHub repository.
Make sure all workflows are correctly configured and trigger on pushes.
Test your pipelines to ensure they are working as expected.
Document the setup process in the README.md file.
Submit the GitHub repository link with all the implemented features.