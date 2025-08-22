# Notes App

A **lightweight note-taking application** built with **Laravel 12** and **TailwindCSS**, allowing you to **create, edit, view, and organize your notes** effortlessly in a **clean and responsive interface**.

## Screenshots

**Index Page (Empty State — No Notes Yet)**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/6d8b91c1-4573-46bb-87d0-e3edf14ce559" /><br>

**Index Page (With Notes)**

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/271fbb4d-2c3f-46a5-8445-820aff3d2c10" /><br>

**Create Note**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/6f92b4cf-ebdd-4b94-b900-19802b597662" /><br>

**View Note**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/1bdc9733-ed88-4865-925b-f9be75239880" /><br>

**Edit Note**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/075d212e-fd76-441a-81af-5a886decdd6d" /><br>  

**Delete Confirmation**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/eba48f2c-4af4-463c-a16a-732b284126a0" /><br>  

## Tech Stack

- **Backend:** Laravel 12  
- **Frontend:** Blade Templates + TailwindCSS  
- **Database:** MySQL 
- **Version Control:** GitHub  

## Quick Start

```bash
# Clone repository
git clone https://github.com/fahrilhadi/notes-app.git
cd notes-app

# Install dependencies
composer install
npm install
npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Serve application
php artisan serve
