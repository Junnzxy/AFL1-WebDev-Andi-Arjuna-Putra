# MVC using PHP — Assignment & Challenge (AFL 1)

A modern, full-featured **PHP Web Application** implementing the **Model-View-Controller (MVC)** architectural pattern for managing Employees, Offices, and their Relationships (Office-Employees).

---

## 🌟 Features Implemented

1. **Employee Management (Requirement 1)**
   - **Store/Save**: Form to add a new employee (Nama, Jabatan, Usia).
   - **Display/View**: Responsive data table listing all employees.
   - **Delete**: Action button to delete an employee record.

2. **Office Management (Requirement 2)**
   - **Store/Save**: Form to add office data (Nama Kantor, Alamat, Kota, Nomor Telepon).
   - **Display/View**: Responsive data table displaying offices with details.
   - **Delete**: Action button to remove office entries.

3. **Office-Employees Relationship (CHALLENGE - Requirement 3)**
   - **Store/Save**: Assign employees to office locations via interactive dropdowns.
   - **Display/View**: View active employee-office assignments in a unified view (`Employee | Office`).
   - **Delete**: Unassign / delete employee-office relationships.

4. **Modern UI & UX**
   - Built with modern glassmorphism, responsive grid layouts, custom badges, and smooth micro-animations.
   - Integrated Lucide icons for visual clarity.

---

## 🏗️ MVC Architecture Breakdown

The project follows a clean **MVC (Model-View-Controller)** pattern with a Front Controller router:

```
AFL - 1/
├── index.php                      # Front Controller & Router
├── controller.php                 # Single-entry Controller wrapper (slide compatibility)
├── model.php                      # Single-entry Model wrapper (slide compatibility)
├── view.php                       # Single-entry View wrapper (slide compatibility)
├── app/
│   ├── Controllers/
│   │   ├── EmployeeController.php # Handles Employee HTTP actions & business flow
│   │   ├── OfficeController.php   # Handles Office HTTP actions
│   │   └── OfficeEmployeeController.php # Handles relationship actions
│   ├── Models/
│   │   ├── Employee.php           # Employee data access & logic
│   │   ├── Office.php             # Office data access & logic
│   │   └── OfficeEmployee.php     # Relationship data access & logic
│   └── Database/
│       └── Storage.php            # JSON Storage handler (zero database config needed)
├── views/
│   ├── layout/
│   │   ├── header.php             # Header component & Navigation menu
│   │   └── footer.php             # Footer component & scripts
│   ├── employee/index.php         # Employee view template
│   ├── office/index.php           # Office view template
│   └── office_employee/index.php  # Office-Employees relationship view template
├── public/
│   └── css/style.css              # Custom styling system
└── data/
    └── storage.json               # Auto-generated persistent storage
```

### Component Roles:
- **Models (`app/Models/`)**: Contain business logic and data manipulation methods (`getAll()`, `save()`, `delete()`).
- **Views (`views/`)**: Pure UI template files rendering HTML structure based on variables provided by Controllers.
- **Controllers (`app/Controllers/`)**: Act as intermediaries, fetching data from Models and passing it to Views or handling form submissions and redirects.

---

## 🚀 How to Run Locally

1. Open your terminal in the project directory:
   ```bash
   cd "path/to/AFL - 1"
   ```

2. Start the built-in PHP development server:
   ```bash
   php -S localhost:8000
   ```

3. Open your browser and navigate to:
   ```
   http://localhost:8000
   ```

---

## 📹 YouTube Video Script Outline (Slide 4 Requirement)

When recording your video overview for YouTube, follow this recommended structure:

1. **Introduction (30s)**:
   - Introduce yourself and your course module (Web Development - AFL 1).
   - State the objective: Demonstrating MVC architecture using PHP.

2. **Web Application Tour (1.5 mins)**:
   - Show the navigation bar (`Employee | Office | Office-Employees`).
   - Demonstrate **Employee**: Add a new employee, view the updated list, delete an entry.
   - Demonstrate **Office**: Add a new office (Name, Address, City, Phone), view list, delete an entry.
   - Demonstrate **Challenge (Office-Employees)**: Assign an employee to an office using dropdowns, save, and show the resulting relation in the table.

3. **Code Architecture Explanation (2 mins)**:
   - Show `index.php` (Front Controller routing query parameters).
   - Open a Model (e.g., `Employee.php`) to show data logic separation.
   - Open a Controller (e.g., `EmployeeController.php`) to show action handling (`index()`, `store()`, `delete()`).
   - Open a View (e.g., `views/employee/index.php`) to show UI separation.

4. **Conclusion (30s)**:
   - Summarize how MVC enforces clean code organization.
   - Provide link to GitHub repository in video description.

---

## 🐙 GitHub Publishing Guide

To push this repository to GitHub:

```bash
git init
git add .
git commit -m "Initial commit - Complete PHP MVC App with Challenge"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/php-mvc-assignment.git
git push -u origin main
```
Ensure the repository is set to **Public** as required by the assignment guidelines!
