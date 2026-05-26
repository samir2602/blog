# MyBlog 📝

A full-featured blog application built with Laravel. Users can create, read, update and delete blog posts, leave comments, and filter posts by category.

## ✨ Features

- User authentication (register, login, logout)
- Create, edit and delete blog posts
- Categories with many-to-many relationships
- Comments system
- Search and pagination
- REST API with Laravel Sanctum
- Background jobs and email notifications
- Caching with cache invalidation
- Authorization policies
- PHPUnit feature tests
- Admin can manage all posts

## 🛠️ Tech Stack

- **Framework:** Laravel 11
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **API Auth:** Laravel Sanctum
- **Frontend:** Blade, Bootstrap 5
- **Queue:** Database driver
- **Testing:** PHPUnit
- **Deployment:** Railway

## ⚙️ Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/myblog.git
cd myblog
```

2. Install dependencies
```bash
composer install
npm install
```

3. Set up environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env` then run:
```bash
php artisan migrate
php artisan db:seed
```

5. Start the server
```bash
php artisan serve
npm run dev
```

## 📡 API Endpoints

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| GET | /api/posts | No | Get all posts |
| GET | /api/posts/{id} | No | Get single post |
| POST | /api/login | No | Get auth token |
| POST | /api/posts | Yes | Create post |
| PUT | /api/posts/{id} | Yes | Update post |
| DELETE | /api/posts/{id} | Yes | Delete post |

## 📄 License
MIT