# Workshop Admin - Automotive Workshop Management System

A complete management system for automotive workshops developed with Laravel + Vue.js + Inertia.js.

## 🚗 **Project Description**

Workshop Admin is a comprehensive web application designed to manage daily operations of an automotive workshop, including:

- **Income Management**: Control of services and repairs
- **Expense Management**: Tracking of purchases and payrolls
- **Employee Control**: Staff administration and categories
- **Supplier Management**: Supplier and purchase management
- **Vehicle Control**: Vehicle registration, brands and categories
- **Interactive Dashboard**: Real-time metrics and reports

## 🛠 **Technology Stack**

### Backend
- **Laravel 10** - PHP Framework
- **MySQL** - Database
- **Inertia.js** - Frontend-backend communication
- **Laravel Resources** - API data transformation

### Frontend
- **Vue.js 3** - JavaScript Framework
- **TypeScript** - Static typing
- **Tailwind CSS** - CSS Framework
- **Shadcn/ui** - UI Components
- **Lucide Vue** - Iconography

### Development Tools
- **Vite** - Build tool and development server
- **Laragon** - Local development environment
- **Composer** - PHP dependency management
- **NPM** - Node.js dependency management

## 📋 **Main Features**

### 🔐 **Authentication and Security**
- Login/logout system
- Access control on all routes
- Session validation

### 📊 **Management Modules**

#### **Income**
- Automotive service registration
- Service categorization
- Customer and vehicle control
- Payment types

#### **Expenses**
- Operational expense control
- Expense categorization
- Employee payroll integration

#### **Purchases**
- Supplier invoice management
- Automatic tax calculation (ISV 15%, 18%)
- Accounts payable status control

#### **Payrolls**
- Employee payments
- Employee categorization
- Automatic expense integration

#### **Employees**
- Staff registration
- Employee categories
- Active/inactive status

#### **Suppliers**
- Supplier database
- Status control
- Purchase integration

#### **Vehicles**
- Vehicle registration
- Brands and categories
- License plate and color information

### 🎨 **User Interface**
- Responsive dashboard
- Tables with pagination
- Real-time search
- Intuitive forms
- Confirmation and error messages

## 🚀 **Installation and Setup**

### **Prerequisites**
- PHP 8.1+
- Composer
- Node.js 16+
- MySQL 8.0+
- Laragon (recommended) or XAMPP

### **1. Clone Repository**
```bash
git clone <repository-url>
cd workshop.admin
```

### **2. Install Backend Dependencies**
```bash
composer install
```

### **3. Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
```

### **4. Configure Database**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=***
DB_USERNAME=root
DB_PASSWORD=
```

### **5. Run Database Migrations**
```bash
php artisan migrate
php artisan db:seed # (optional, if seeders exist)
```

### **6. Install Frontend Dependencies**
```bash
npm install
```

### **7. Compile Assets**
```bash
# Development
npm run dev

# Production
npm run build
```

### **8. Start Server**
```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

## 📁 **Project Structure**

```
workshop.admin/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Main controllers
│   │   └── Resources/         # API Resources
│   ├── Models/               # Eloquent models
│   └── ...
├── database/
│   ├── migrations/           # DB migrations
│   └── seeders/             # Test data
├── resources/
│   ├── js/
│   │   ├── components/       # Vue components
│   │   ├── layouts/         # App layouts
│   │   ├── pages/           # Main pages
│   │   └── types/           # TypeScript types
│   └── views/               # Blade templates
├── routes/
│   └── web.php              # Main routes
└── ...
```

## 🎯 **Modules and Features**

### **Dashboard**
- General workshop metrics
- Quick access to modules
- Current date in Spanish

### **Income Management**
- ✅ Create/Edit/Delete income
- ✅ Search and filtering
- ✅ Service categorization
- ✅ Customer and vehicle association

### **Expense Control**
- ✅ Operational expense registration
- ✅ Categorization
- ✅ Soft delete (logical deletion)

### **Purchase Administration**
- ✅ Invoice registration
- ✅ Automatic tax calculation
- ✅ Supplier control
- ✅ Account status

### **Payroll Management**
- ✅ Employee payments
- ✅ Automatic expense integration
- ✅ Category control

### **Database**
- ✅ Employees and categories
- ✅ Suppliers
- ✅ Vehicles, brands and categories
- ✅ Customers


### **Upcoming Features**
- [ ] Multi-language support
- [ ] Advanced reporting dashboard
- [ ] Mobile application
- [ ] API rate limiting
- [ ] Advanced user roles and permissions
- [ ] Inventory management
- [ ] Customer portal
- [ ] Email notifications
- [ ] Backup automation
- [ ] Integration with accounting systems


## 📚 **Additional Resources**

- [Laravel Documentation](https://laravel.com/docs)
- [Vue.js Documentation](https://vuejs.org/guide/)
- [Inertia.js Documentation](https://inertiajs.com/)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [TypeScript Documentation](https://www.typescriptlang.org/docs/)

---

Developed with ❤️ 