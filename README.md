# Task Manager

Follow these steps to install dependencies, configure the environment, and run the web application locally.

---

##  Getting Started

### 1. Prerequisites & Installation
First, install the backend and frontend dependencies:
```bash
composer install
npm install
```

### 2. Envrionment configuration
```
cp .env.example .env
``` 
<br>
Open the .env file and update the database settings with your local credentials:
<br>
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=task_manager
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
```

### 3. Application Key & migrations
Generate a secure encryption key and run your migrations along with the database seeders: <br>
```
php artisan key:generate
php artisan migrate --seed
```

### 4. Run the application
To spin up both the local Laravel backend and Vite development servers simultaneously, run:
<br>
```
composer run dev
```

#### Running tests
To execute the automated test suites, run:
```composer run test```

#### Architecturele beslissingen: 
- CREATE en UPDATE heb ik verwerkt in een component voor herbruikbaarheid, in plaats van dat ik twee aparte views maak die bijna identiek zijn op opstelling. 

- Writing operaties (Maken, lezen, verwijderen) worden allemaal doorverwezen naar task-index via de RedirectAfterWrite Middleware om duplicatie in code te voorkomen. 

- Validatie van het maken en bewerken van Tasks wordt gecontroleerd via TaskRequest om model en controller niet vol te gooien met code. 