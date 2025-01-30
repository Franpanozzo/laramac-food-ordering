# LaraMac Food Ordering 🍽️

A modern food ordering platform built with Laravel, Vue.js, and Inertia.js. This application allows restaurants to manage their menus and orders while providing customers with a seamless food ordering experience.

![image](https://github.com/user-attachments/assets/d18bdb3c-0c70-4a75-9496-44fba5909226)
![image](https://github.com/user-attachments/assets/27afeb03-79fc-4449-9a64-784e17b3d364)

## Features

### For Customers 👥
- Browse restaurants and their menus
- Add items to cart
- Place and track orders
- View order history

### For Restaurant Owners 🏪
- Manage restaurant profile
- Create and update menu items
- Manage product categories
- Add and manage staff members

### For Restaurant Staff 👨‍🍳
- Real-time order management
- Update order statuses (Prepare, Ready, Cancel)
- View current and past orders

### For Administrators 👑
- Manage all restaurants
- User management
- System-wide settings

## Tech Stack

- **Backend:** Laravel 10
- **Frontend:** Vue.js 3
- **Server-side Rendering:** Inertia.js
- **Styling:** Tailwind CSS
- **Database:** MySQL
- **Development Environment:** Laravel Sail (Docker)

## Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/laramac-food-ordering.git
cd laramac-food-ordering
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM dependencies
```bash
npm install
```

4. Set up environment file
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Start Docker containers with Laravel Sail
```bash
./vendor/bin/sail up -d
```

7. Run migrations and seed the database
```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

8. Build frontend assets
```bash
npm run dev
```

## Default Users

After seeding, you can login with these demo accounts:

- **Admin:** admin@example.com / password
- **Restaurant Owner:** vendor@example.com / password
- **Customer:** customer@example.com / password

## Development

To start the development server:

```bash
# Start Laravel Sail
./vendor/bin/sail up -d

# Start Vite development server
npm run dev
```

## Testing

```bash
./vendor/bin/sail artisan test
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Built with [Laravel](https://laravel.com)
- Frontend powered by [Vue.js](https://vuejs.org)
- Styled with [Tailwind CSS](https://tailwindcss.com)

