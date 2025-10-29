<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

    ├── docker-compose.yml
    ├── backend/
    │   ├── README.md
    │   ├── artisan
    │   ├── CHANGELOG.md
    │   ├── composer.json
    │   ├── composer.lock
    │   ├── Dockerfile
    │   ├── package-lock.json
    │   ├── package.json
    │   ├── phpunit.xml
    │   ├── vite.config.js
    │   ├── .editorconfig
    │   ├── .env.example
    │   ├── .gitattributes
    │   ├── .gitignore
    │   ├── .styleci.yml
    │   ├── app/
    │   │   ├── Console/
    │   │   │   ├── Kernel.php
    │   │   │   └── Commands/
    │   │   │       └── UpdateStats.php
    │   │   ├── Events/
    │   │   │   ├── BookingStatsUpdated.php
    │   │   │   └── StatsUpdated.php
    │   │   ├── Exceptions/
    │   │   │   └── Handler.php
    │   │   ├── Http/
    │   │   │   ├── Controllers/
    │   │   │   │   ├── Controller.php
    │   │   │   │   ├── DashboardController.php
    │   │   │   │   ├── Api/
    │   │   │   │   │   ├── BannerController.php
    │   │   │   │   │   ├── CategoryController.php
    │   │   │   │   │   ├── ChatController.php
    │   │   │   │   │   ├── ProductController.php
    │   │   │   │   │   ├── VideoController.php
    │   │   │   │   │   ├── Auth/
    │   │   │   │   │   │   ├── LoginController.php
    │   │   │   │   │   │   ├── LogoutController.php
    │   │   │   │   │   │   ├── ProfileController.php
    │   │   │   │   │   │   ├── RegisterController.php
    │   │   │   │   │   │   └── SocialiteController.php
    │   │   │   │   │   └── ProductActions/
    │   │   │   │   │       ├── BookingController.php
    │   │   │   │   │       ├── CommentController.php
    │   │   │   │   │       └── FavoriteController.php
    │   │   │   │   ├── Auth/
    │   │   │   │   │   ├── LoginController.php
    │   │   │   │   │   └── SocialiteController.php
    │   │   │   │   └── Web/
    │   │   │   │       ├── BannerController.php
    │   │   │   │       ├── BookingController.php
    │   │   │   │       ├── CategoriesController.php
    │   │   │   │       ├── HomeController.php
    │   │   │   │       ├── NotificationController.php
    │   │   │   │       ├── ProductAttributeTypeController.php
    │   │   │   │       ├── ProductAttributeValueConfigController.php
    │   │   │   │       ├── ProductAttributeValueController.php
    │   │   │   │       ├── ProductController.php
    │   │   │   │       ├── ProductVariantController.php
    │   │   │   │       ├── TagController.php
    │   │   │   │       ├── VideoController.php
    │   │   │   │       └── Accounts/
    │   │   │   │           └── AdminController.php
    │   │   │   └── Middleware/
    │   │   │       └── AdminMiddleware.php
    │   │   ├── Models/
    │   │   │   ├── AppNotification.php
    │   │   │   ├── Banner.php
    │   │   │   ├── Booking.php
    │   │   │   ├── Category.php
    │   │   │   ├── Comment.php
    │   │   │   ├── Product.php
    │   │   │   ├── ProductAttributeType.php
    │   │   │   ├── ProductAttributeValue.php
    │   │   │   ├── ProductAttributeValueConfig.php
    │   │   │   ├── ProductFavorite.php
    │   │   │   ├── ProductImage.php
    │   │   │   ├── ProductVariant.php
    │   │   │   ├── Tag.php
    │   │   │   ├── User.php
    │   │   │   ├── User_details.php
    │   │   │   ├── Users_profiles.php
    │   │   │   └── Video.php
    │   │   ├── Notifications/
    │   │   │   └── BookingConfirmation.php
    │   │   ├── Providers/
    │   │   │   ├── AppServiceProvider.php
    │   │   │   └── EventServiceProvider.php
    │   │   └── Services/
    │   │       ├── MailService.php
    │   │       └── StatsService.php
    │   ├── bootstrap/
    │   │   ├── app.php
    │   │   ├── providers.php
    │   │   └── cache/
    │   │       └── .gitignore
    │   ├── config/
    │   │   ├── app.php
    │   │   ├── auth.php
    │   │   ├── broadcasting.php
    │   │   ├── cache.php
    │   │   ├── database.php
    │   │   ├── filesystems.php
    │   │   ├── logging.php
    │   │   ├── mail.php
    │   │   ├── queue.php
    │   │   ├── sanctum.php
    │   │   ├── services.php
    │   │   ├── session.php
    │   │   └── websockets.php
    │   ├── database/
    │   │   ├── .gitignore
    │   │   ├── factories/
    │   │   │   ├── CategoriesFactory.php
    │   │   │   ├── ProductsFactory.php
    │   │   │   ├── UserDetailsFactory.php
    │   │   │   ├── UserFactory.php
    │   │   │   └── UsersProfilesFactory.php
    │   │   ├── migrations/
    │   │   │   ├── 0001_01_01_000000_create_users_table.php
    │   │   │   ├── 0001_01_01_000001_create_cache_table.php
    │   │   │   ├── 0001_01_01_000002_create_jobs_table.php
    │   │   │   ├── 2025_05_15_155515_create_permission_tables.php
    │   │   │   ├── 2025_05_23_072204_create_users_profiles_table.php
    │   │   │   ├── 2025_05_23_073645_create_user_details_table.php
    │   │   │   ├── 2025_05_23_160448_create_categories_table.php
    │   │   │   ├── 2025_05_23_161217_create_products_table.php
    │   │   │   ├── 2025_06_18_070550_create_tags_table.php
    │   │   │   ├── 2025_06_18_070640_create_category_tag_table.php
    │   │   │   ├── 2025_06_18_095645_create_product_tag_table.php
    │   │   │   ├── 2025_06_19_064231_create_product_variants_table.php
    │   │   │   ├── 2025_06_19_064739_create_product_images_table.php
    │   │   │   ├── 2025_06_19_071932_create_product_category_table.php
    │   │   │   ├── 2025_06_19_154535_create_product_attribute_types_table.php
    │   │   │   ├── 2025_06_19_154548_create_product_attribute_values_table.php
    │   │   │   ├── 2025_06_19_154559_create_product_variant_attribute_value_table.php
    │   │   │   ├── 2025_06_24_080241_create_product_attribute_value_configs_table.php
    │   │   │   ├── 2025_06_29_072232_create_personal_access_tokens_table.php
    │   │   │   ├── 2025_06_30_073330_create_product_favorites_table.php
    │   │   │   ├── 2025_06_30_073347_create_bookings_table.php
    │   │   │   ├── 2025_06_30_073354_create_comments_table.php
    │   │   │   ├── 2025_07_09_144435_create_banners_table.php
    │   │   │   ├── 2025_09_26_132310_create_videos_table.php
    │   │   │   └── 2025_10_16_223835_create_notifications_table.php
    │   │   └── seeders/
    │   │       ├── CategoriesSeeder.php
    │   │       ├── DatabaseSeeder.php
    │   │       ├── ExportSeeder.php
    │   │       ├── ImportSeeder.php
    │   │       ├── ProductsSeeder.php
    │   │       ├── UserDetailsSeeder.php
    │   │       └── UsersProfilesSeeder.php
    │   ├── public/
    │   ├── resources/
    │   │   ├── css/
    │   │   │   └── app.css
    │   │   ├── js/
    │   │   │   ├── app.js
    │   │   │   └── bootstrap.js
    │   │   └── views/
    │   │       ├── index.blade.php
    │   │       ├── welcome.blade.php
    │   │       ├── apps/
    │   │       │   ├── account/
    │   │       │   │   ├── admin/
    │   │       │   │   │   └── index.blade.php
    │   │       │   │   ├── manager/
    │   │       │   │   │   └── index.blade.php
    │   │       │   │   └── users/
    │   │       │   │       └── index.blade.php
    │   │       │   ├── banners/
    │   │       │   │   └── index.blade.php
    │   │       │   ├── booking/
    │   │       │   │   └── index.blade.php
    │   │       │   ├── category/
    │   │       │   │   └── index.blade.php
    │   │       │   ├── notifications/
    │   │       │   │   └── index.blade.php
    │   │       │   ├── product/
    │   │       │   │   └── index.blade.php
    │   │       │   ├── tag/
    │   │       │   │   └── index.blade.php
    │   │       │   └── video/
    │   │       │       └── index.blade.php
    │   │       ├── emails/
    │   │       │   └── booking.blade.php
    │   │       ├── layouts/
    │   │       │   └── app.blade.php
    │   │       ├── pages/
    │   │       │   └── authentication/
    │   │       │       └── card/
    │   │       │           └── sign-in.blade.php
    │   │       └── partials/
    │   │           ├── footer.blade.php
    │   │           ├── header.blade.php
    │   │           └── sidebar.blade.php
    │   ├── routes/
    │   │   ├── api.php
    │   │   ├── backup.php
    │   │   ├── channels.php
    │   │   └── web.php
    │   ├── storage/
    │   │   ├── app/
    │   │   │   ├── private/
    │   │   │   │   └── .gitignore
    │   │   │   └── public/
    │   │   │       ├── uploads/
    │   │   │       │   ├── attribute_configs/
    │   │   │       │   ├── avatars/
    │   │   │       │   ├── banners/
    │   │   │       │   ├── categories/
    │   │   │       │   └── products/
    │   │   │       │       ├── general/
    │   │   │       │       └── variants/
    │   │   │       └── videos/
    │   │   │           ├── banners/
    │   │   │           └── files/
    │   │   ├── framework/
    │   │   │   ├── cache/
    │   │   │   ├── sessions/
    │   │   │   ├── testing/
    │   │   │   └── views/
    │   │   └── logs/
    │   ├── tests/
    │   │   ├── TestCase.php
    │   │   ├── Feature/
    │   │   │   └── ExampleTest.php
    │   │   └── Unit/
    │   │       └── ExampleTest.php
    │   └── .github/
    └── frontend/
        ├── README.md
        ├── Dockerfile
        ├── eslint.config.js
        ├── index.html
        ├── nginx.conf
        ├── package-lock.json
        ├── package.json
        ├── vercel.json
        ├── vite.config.js
        ├── .gitignore
        ├── public/
        └── src/
            ├── App.css
            ├── App.jsx
            ├── index.css
            ├── index.jsx
            ├── main.jsx
            ├── appRedux/
            │   ├── hooks.js
            │   ├── index.js
            │   ├── store.js
            │   └── slices/
            │       └── favoritesSlice.js
            ├── common/
            │   ├── API.js
            │   └── constants.js
            ├── core/
            │   ├── components/
            │   │   ├── ErrorIndicator.css
            │   │   ├── ErrorIndicator.jsx
            │   │   ├── LoadingIndicator.jsx
            │   │   └── VerifiedBadge.jsx
            │   └── layouts/
            │       ├── AuthLayout/
            │       │   └── AuthLayout.jsx
            │       ├── components/
            │       │   ├── Footer.jsx
            │       │   ├── Header.jsx
            │       │   └── SupportChatWidget.jsx
            │       └── MainLayout/
            │           ├── MainLayout.css
            │           └── MainLayout.jsx
            ├── hoc/
            │   └── withAuth.jsx
            ├── hooks/
            │   └── useAuth.js
            ├── modules/
            │   ├── Auth/
            │   │   ├── api.js
            │   │   ├── index.js
            │   │   ├── slice.js
            │   │   └── containers/
            │   │       ├── AuthCallbackPage.jsx
            │   │       ├── LoginPage.jsx
            │   │       └── RegisterPage.jsx
            │   ├── Banners/
            │   │   ├── api.js
            │   │   └── slice.js
            │   ├── bookings/
            │   │   ├── api.js
            │   │   └── slice.js
            │   ├── Categories/
            │   │   ├── api.js
            │   │   └── slice.js
            │   ├── Products/
            │   │   ├── api.js
            │   │   ├── slice.js
            │   │   ├── components/
            │   │   │   ├── BookingFormModal.jsx
            │   │   │   ├── CommentFormModal.jsx
            │   │   │   └── GoogleMapAutocomplete.jsx
            │   │   └── containers/
            │   │       ├── ProductDetailPage.jsx
            │   │       ├── ProductsByCategoriesPage.jsx
            │   │       └── ProductsPage.jsx
            │   └── profile/
            │       ├── api.js
            │       ├── slice.js
            │       └── containers/
            │           └── ProfilePage.jsx
            ├── pages/
            │   ├── About/
            │   │   └── containers/
            │   │       ├── AboutPage.jsx
            │   │       └── AboutPage.module.css
            │   ├── BookingPolicy/
            │   │   ├── BookingPolicy.jsx
            │   │   └── BookingPolicy.module.css
            │   ├── Bookings/
            │   │   └── BookingsPage.jsx
            │   ├── Contact/
            │   │   ├── ContactPage.jsx
            │   │   └── ContactPage.module.css
            │   ├── FAQ/
            │   │   ├── FAQPage.jsx
            │   │   └── FAQPage.module.css
            │   ├── FavoriteProducts/
            │   │   ├── FavoriteProducts.css
            │   │   └── FavoriteProducts.jsx
            │   ├── Home/
            │   │   └── containers/
            │   │       ├── CategorySlider.module.css
            │   │       ├── CustomerSlider.module.css
            │   │       ├── HomePage.jsx
            │   │       └── HomeSlider.module.css
            │   ├── PrivacyPolicy/
            │   │   ├── PrivacyPolicy.jsx
            │   │   └── PrivacyPolicy.module.css
            │   ├── Terms/
            │   │   ├── TermsPage.jsx
            │   │   └── TermsPage.module.css
            │   └── Warranty/
            │       ├── WarrantyPolicy.jsx
            │       └── WarrantyPolicy.module.css
            └── utils/
                └── format.js