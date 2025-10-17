<?php $page = $_GET['page'] ?? ''; ?>
<ul class="menu-inner py-1">
    <!-- Page -->
    <li class="menu-item <?= (empty($page) || $page == 'home') ? 'active' : '' ?>">
        <a href="index.php?page=home" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Page 1">Home</div>
        </a>
    </li>
    <li class="menu-item <?= ($page == 'somos') ? 'active' : '' ?>">
        <a href="index.php?page=somos" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Page 1">Quem Somos</div>
        </a>
    </li>
    <li class="menu-item <?= ($page == 'produtos') ? 'active' : '' ?>">
        <a href="index.php?page=produtos" class="menu-link">
        <i class="menu-icon tf-icons ti ti-app-window"></i>
        <div data-i18n="Page 2">Produtos</div>
        </a>
    </li>
</ul>