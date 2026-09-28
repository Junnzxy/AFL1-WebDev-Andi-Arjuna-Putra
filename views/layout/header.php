<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'PHP MVC Assignment') ?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>

    <header>
        <div class="header-container">
            <a href="index.php" class="logo-brand">
                <i data-lucide="layers"></i>
                <span>PHP MVC</span>
                <span class="logo-badge">AFL 1</span>
            </a>
            
            <nav class="main-nav">
                <a href="index.php?page=employee" class="nav-link <?= (($activeTab ?? '') === 'employee') ? 'active' : '' ?>">
                    <i data-lucide="users"></i>
                    <span>Employee</span>
                </a>
                <a href="index.php?page=office" class="nav-link <?= (($activeTab ?? '') === 'office') ? 'active' : '' ?>">
                    <i data-lucide="building-2"></i>
                    <span>Office</span>
                </a>
                <a href="index.php?page=office-employees" class="nav-link <?= (($activeTab ?? '') === 'office-employees') ? 'active' : '' ?>">
                    <i data-lucide="network"></i>
                    <span>Office-Employees</span>
                </a>
            </nav>
        </div>
    </header>

    <main class="content-container">
