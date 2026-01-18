# Hotel Kiran Place - Laravel Website Project

A complete hotel booking website built with Laravel framework featuring a responsive frontend and admin panel.

## 📋 Table of Contents

- [Project Overview](#project-overview)
- [Project Structure](#project-structure)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [File Structure](#file-structure)
- [Routes](#routes)
- [Usage Guide](#usage-guide)
- [Frontend Pages](#frontend-pages)
- [Admin Panel](#admin-panel)
- [Global Components](#global-components)

## 🎯 Project Overview

Hotel Kiran Place is a complete hotel management website with:
- **Frontend Website**: Public-facing pages for hotel information, rooms, gallery, and contact
- **Admin Panel**: Management dashboard for content updates (to be implemented)
- **No Database**: Currently frontend-only, no database connections
- **No API**: Pure frontend implementation without external API calls

## 📁 Project Structure

```
Hotelkiran/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── Controller.php          # Base controller
│           ├── WebsiteController.php   # Website pages controller
│           └── AdminController.php     # Admin panel controller
│
├── public/
│   ├── css/
│   │   └── boot.css                   # Bootstrap CSS (manually added)
│   ├── js/
│   │   └── boot.js                    # Bootstrap JS (manually added)
│   └── index.php                      # Laravel entry point
│
├── resources/
│   └── views/
│       ├── common/                     # Common/shared components
│       │   ├── layout.blade.php        # Main website layout
│       │   ├── header.blade.php        # Website header/navbar
│       │   ├── footer.blade.php        # Website footer
│       │   ├── toast.blade.php         # Global toast notification system
│       │   ├── 404.blade.php           # 404 error page
│       │   └── no-internet.blade.php   # No internet connection page
│       │
│       ├── website/                    # Public website pages
│       │   ├── home.blade.php          # Home page
│       │   ├── about.blade.php         # About hotel page
│       │   ├── rooms.blade.php         # Rooms & Tariff page
│       │   ├── amenities.blade.php     # Amenities page
│       │   ├── gallery.blade.php       # Photo gallery page
│       │   ├── contact.blade.php       # Contact page with form & map
│       │   ├── terms.blade.php         # Terms & Conditions
│       │   ├── privacy.blade.php       # Privacy Policy
│       │   ├── faq.blade.php           # FAQ page
│       │   └── blog.blade.php          # Blog page
│       │
│       ├── admin/                      # Admin panel pages
│       │   ├── layout.blade.php        # Admin layout
│       │   ├── navbar.blade.php        # Admin navbar
│       │   ├── login.blade.php         # Admin login page
│       │   └── dashboard.blade.php     # Admin dashboard
│       │
│       └── welcome.blade.php           # Maintenance/welcome page
│
├── routes/
│   └── web.php                         # All application routes
│
└── README.md                           # This file
```

## ✨ Features

### Frontend Website
- ✅ Responsive Bootstrap design
- ✅ Home page with hero section
- ✅ About hotel page
- ✅ Rooms & Tariff with pricing
- ✅ Amenities showcase
- ✅ Photo gallery with modal
- ✅ Contact form with validation
- ✅ Google Maps integration
- ✅ WhatsApp chat button
- ✅ Terms, Privacy, FAQ pages
- ✅ Blog page

### Admin Panel
- ✅ Admin login (no validation - accepts any credentials)
- ✅ Admin dashboard
- ✅ Session-based authentication
- ✅ Protected admin routes
- ✅ Logout functionality

### Global Features
- ✅ Toast notifications (bottom slide animation)
- ✅ Font Awesome icons integration
- ✅ Global toast function (use anywhere: `toast('success', 'Message')`)
- ✅ Mobile responsive design
- ✅ Bootstrap 5 components

## 🛠 Technology Stack

- **Framework**: Laravel 12
- **CSS Framework**: Bootstrap 5 (from public/css/boot.css)
- **JavaScript**: Bootstrap JS (from public/js/boot.js)
- **Icons**: Font Awesome 6.5.1 (CDN)
- **Authentication**: Session-based (no database)

## 📦 Installation

### Prerequisites
- PHP 8.2+
- Composer
- XAMPP/WAMP/LAMP (for local development)

### Setup Steps

1. **Clone/Navigate to project:**
   ```bash
   cd F:\xampp\htdocs\Hotelkiran
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Environment setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run development server:**
   ```bash
   php artisan serve
   ```

5. **Access website:**
   - Frontend: `http://localhost:8000/home`
   - Welcome/Maintenance: `http://localhost:8000/`
   - Admin Login: `http://localhost:8000/login/hotelkiranpalace/admin`

## 📂 File Structure Details

### Controllers (`app/Http/Controllers/`)

#### `WebsiteController.php`
Handles all public website pages:
- `home()` - Home page
- `about()` - About page
- `rooms()` - Rooms page
- `amenities()` - Amenities page
- `gallery()` - Gallery page
- `contact()` - Contact page
- `contactSubmit()` - Contact form submission
- `terms()` - Terms page
- `privacy()` - Privacy page
- `faq()` - FAQ page
- `blog()` - Blog page

#### `AdminController.php`
Handles admin panel:
- `showLogin()` - Display login page
- `login()` - Process login (accepts any credentials)
- `logout()` - Logout admin
- `dashboard()` - Admin dashboard

### Routes (`routes/web.php`)

#### Website Routes
```
GET  /home                → Home page
GET  /about               → About page
GET  /rooms               → Rooms & Tariff
GET  /amenities           → Amenities
GET  /gallery             → Photo Gallery
GET  /contact             → Contact page
POST /contact             → Contact form submit
GET  /terms               → Terms & Conditions
GET  /privacy             → Privacy Policy
GET  /faq                 → FAQ page
GET  /blog                → Blog page
GET  /                    → Welcome/Maintenance page
```

#### Admin Routes
```
GET  /login/hotelkiranpalace/admin → Admin login page
POST /login/hotelkiranpalace/admin → Admin login submit
GET  /admin/dashboard               → Admin dashboard
POST /admin/logout                  → Admin logout
```

### Common Components (`resources/views/common/`)

#### `layout.blade.php`
Main layout file for website:
- Contains HTML structure
- Imports Bootstrap CSS/JS globally
- Imports Font Awesome icons
- Includes header, footer
- Includes toast notification system

#### `header.blade.php`
Website navigation bar:
- Bootstrap responsive navbar
- Links: Home, About, Rooms, Amenities, Gallery, Contact

#### `footer.blade.php`
Website footer:
- Quick links
- Legal pages links
- Copyright information

#### `toast.blade.php`
Global toast notification system:
- **Location**: `resources/views/common/toast.blade.php`
- **Global function**: `toast(type, message, duration)`
- **Types**: `success` (green), `error` (red), `warning` (yellow), `info` (blue)
- **Style**: Full colored background with white text
- **Position**: Bottom-right (responsive for mobile)
- **Auto-show**: Displays Laravel session messages automatically
- **Usage**: Call `toast('success', 'Message here')` from anywhere in JavaScript

### Admin Components (`resources/views/admin/`)

#### `layout.blade.php`
Admin panel layout:
- Admin navbar
- Toast notifications
- Global styles/scripts

#### `navbar.blade.php`
Admin navigation:
- Dashboard link
- View website link
- Logout button

#### `login.blade.php`
Admin login page:
- Login form with email and password fields
- **Credentials**: admin@gmail.com / admin@123
- Toast notifications
- Standalone page

#### `dashboard.blade.php`
Admin dashboard:
- Stats cards
- Quick actions
- System information

## 🚀 Usage Guide

### Using Toast Notifications

Toast notifications use **full colored backgrounds** with different colors for each type:

- **Success**: Green background (`bg-success`)
- **Error**: Red background (`bg-danger`)
- **Warning**: Yellow background (`bg-warning`)
- **Info**: Blue background (`bg-info`)

**File Location**: `resources/views/common/toast.blade.php` (included in all layouts)

**From JavaScript (Anywhere in your code):**
```javascript
// Success toast (green background)
toast('success', 'Operation successful!');

// Error toast (red background)
toast('error', 'Something went wrong!');

// Warning toast (yellow background)
toast('warning', 'Please check this!');

// Info toast (blue background)
toast('info', 'Here is some information!');

// Custom duration (default is 5000ms = 5 seconds)
toast('success', 'Message', 3000);
```

**From Laravel Backend (Controllers):**
```php
// Success message (shows green toast)
return redirect()->back()->with('success', 'Saved successfully!');

// Error message (shows red toast)
return redirect()->back()->with('error', 'Error occurred!');

// Warning message (shows yellow toast)
return redirect()->back()->with('warning', 'Warning message!');

// Info message (shows blue toast)
return redirect()->back()->with('info', 'Info message!');
```

**When to Use Each Type:**
- **`success`**: Use when operation completes successfully (e.g., "Saved successfully!", "Deleted!")
- **`error`**: Use for errors, failures, or invalid operations (e.g., "Invalid credentials", "Failed to save")
- **`warning`**: Use for warnings or important notices (e.g., "Please check your input", "This action cannot be undone")
- **`info`**: Use for informational messages (e.g., "New update available", "Processing...")

### Using Font Awesome Icons

Icons are available globally. Use anywhere:
```html
<i class="fas fa-home"></i>
<i class="fas fa-user"></i>
<i class="fas fa-phone"></i>
<i class="fas fa-envelope"></i>
<i class="fab fa-whatsapp"></i>
```

### Adding New Pages

1. **Create view file:**
   ```
   resources/views/website/newpage.blade.php
   ```

2. **Add method in WebsiteController:**
   ```php
   public function newpage()
   {
       return view('website.newpage');
   }
   ```

3. **Add route in web.php:**
   ```php
   Route::get('/newpage', [WebsiteController::class, 'newpage'])->name('newpage');
   ```

4. **Create view:**
   ```blade
   @extends('common.layout')
   
   @section('title', 'New Page - Hotel Kiran Place')
   
   @section('content')
   <div class="container my-5">
       <h1>New Page</h1>
       <!-- Your content here -->
   </div>
   @endsection
   ```

## 🌐 Frontend Pages

All pages use `common/layout.blade.php` and include:
- Header with navigation
- Footer with links
- Toast notifications
- Bootstrap CSS/JS
- Font Awesome icons

### Key Pages:

1. **Home** (`/home`) - Landing page with hero, rooms preview, amenities preview
2. **About** (`/about`) - Hotel information and mission
3. **Rooms** (`/rooms`) - Room types with pricing
4. **Amenities** (`/amenities`) - List of hotel facilities
5. **Gallery** (`/gallery`) - Photo gallery with modal view
6. **Contact** (`/contact`) - Contact form, info, Google Maps, WhatsApp button
7. **Terms** (`/terms`) - Terms & Conditions
8. **Privacy** (`/privacy`) - Privacy Policy
9. **FAQ** (`/faq`) - Frequently Asked Questions (Bootstrap accordion)
10. **Blog** (`/blog`) - Blog posts listing

## 🔐 Admin Panel

### Access Admin Panel

**Login URL:** `http://localhost:8000/login/hotelkiranpalace/admin`

**Credentials:** 
- **Email**: admin@gmail.com
- **Password**: admin@123

**Note**: Only these credentials work. All other attempts will show error toast.

### Admin Features (Planned)

- Update website content
- Change room prices
- Upload/delete gallery images
- Update contact details
- View contact inquiries
- Enable/disable sections

## 🎨 Styling & Assets

### CSS
- **Location**: `public/css/boot.css`
- **Framework**: Bootstrap 5
- **Usage**: Automatically loaded in layouts
- **Custom CSS**: Avoid adding custom CSS, use Bootstrap classes

### JavaScript
- **Location**: `public/js/boot.js`
- **Framework**: Bootstrap 5 JS
- **Usage**: Automatically loaded in layouts

### Icons
- **Source**: Font Awesome 6.5.1 (CDN)
- **Usage**: `<i class="fas fa-icon-name"></i>`
- **Loaded**: Automatically in all layouts

## 📝 Notes

- **No Database**: Project is frontend-only, no database connections
- **No API**: No external API integrations
- **Session Auth**: Admin uses session-based authentication
- **Bootstrap Classes**: Use Bootstrap utility classes, avoid custom CSS
- **Toast Global**: Toast function available globally via `window.toast()`
- **Responsive**: All pages are mobile-responsive using Bootstrap

## 🔧 Customization

### Change Contact Information
Edit: `resources/views/website/contact.blade.php`

### Change Room Prices
Edit: `resources/views/website/rooms.blade.php`

### Modify Toast Position/Design
Edit: `resources/views/common/toast.blade.php`

### Update Footer Links
Edit: `resources/views/common/footer.blade.php`

### Change Navigation Menu
Edit: `resources/views/common/header.blade.php`

## 📄 License

This project is private and proprietary.

## 👨‍💻 Development

For any changes or additions:
1. Maintain Bootstrap class structure
2. Keep controllers simple (no database queries)
3. Use global toast function for notifications
4. Follow existing file structure
5. Ensure mobile responsiveness

---

**Last Updated**: January 2026
**Version**: 1.0.0
**Framework**: Laravel 12
**PHP Version**: 8.2+
