# FriendBook 📘

**FriendBook** is a mini social networking app built using **Laravel**. It allows users to register, log in, create and manage posts, and interact with content — just like a lightweight version of Facebook.

---

## 🚀 Features

- ✅ User Registration and Login (Authentication)
- 📝 Create, Update, Delete Posts
- 🌐 View All Users' Posts
- ❤️ Like/Unlike Posts
- 🔎 Search posts by title, user or author
- ⚡ Event & Listener on Post Creation
- 🔔 Flash Messages for success/errors
- 💻 Responsive Blade UI with Tailwind CSS


---

## 🛠 Tech Stack

- **Laravel 10 / 12**
- Blade Components
- Laravel Events & Listeners
- Accessors & Mutators
- Eloquent ORM
- Seeder & Factory for test data
- Tailwind CSS for styling
- XAMPP (for local development)

---

## 📂 Project Setup

```bash
git clone https://github.com/Zillemudasar2158/friend_book.git
cd friend_book
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
