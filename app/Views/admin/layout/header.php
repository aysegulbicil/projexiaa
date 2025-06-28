<style>
    .pc-sidebar .b-brand {
        display: flex;
        padding-left: 30px;

        margin-bottom: 5px;
        margin-top: 15px;

    }

    .pc-sidebar .logo-lg {
        max-width: 150px;
        height: auto;
    }

    .pc-navbar .pc-item.active>.pc-link {
        background-color: rgba(43, 47, 179, 0.05);
        color: #2b2fb3 !important;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    .pc-navbar .pc-item.active .pc-micon svg {
        fill: rgba(43, 47, 179, 255) !important;
    }

    .pc-navbar .pc-item .pc-link:hover {
        background-color: rgba(43, 47, 179, 0.08) !important;
        color: #2b2fb3 !important;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    .quick-access-trigger {
        position: relative;
        /* fixed yerine relative */
        display: inline-flex;
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 8px 32px rgba(102, 126, 234, 0.4);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 3px solid rgba(255, 255, 255, 0.2);
        z-index: 1050;
        /* top ve transform özelliklerini kaldırın */
    }

    .quick-access-trigger:hover {
        transform: scale(1.1);
        /* translateY kaldırıldı */
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.6);
    }

    .quick-access-trigger i {
        color: white;
        font-size: 24px;
        transition: transform 0.3s ease;
    }

    .quick-access-trigger.active i {
        transform: rotate(45deg);
    }

    .quick-access-panel {
        position: fixed;
        top: 0;
        right: -400px;
        width: 400px;
        height: 100vh;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
        transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1040;
        overflow-y: auto;
    }

    .quick-access-panel.active {
        right: 0;
    }

    .panel-header {
        padding: 30px 25px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .panel-title {
        font-size: 24px;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .panel-subtitle {
        font-size: 14px;
        opacity: 0.9;
        margin: 8px 0 0 0;
    }

    .panel-content {
        padding: 25px;
    }

    .quick-section {
        margin-bottom: 35px;
    }

    .section-title {
        font-size: 16px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .quick-item {
        background: white;
        border-radius: 16px;
        padding: 20px 16px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        text-decoration: none;
        color: inherit;
        position: relative;
        overflow: hidden;
    }

    .quick-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--item-color) 0%, var(--item-color-dark) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .quick-item:hover::before {
        opacity: 0.05;
    }

    .quick-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        border-color: var(--item-color);
    }

    .quick-item i {
        font-size: 28px;
        margin-bottom: 12px;
        color: var(--item-color);
        position: relative;
        z-index: 2;
        transition: color 0.3s ease;
    }

    .quick-item:hover i {
        color: var(--item-color-dark);
    }

    .quick-item-title {
        font-size: 13px;
        font-weight: 600;
        color: #2d3748;
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .quick-item-desc {
        font-size: 11px;
        color: #718096;
        margin: 4px 0 0 0;
        position: relative;
        z-index: 2;
    }

    /* Renk tanımlamaları */
    .quick-item.primary {
        --item-color: #667eea;
        --item-color-dark: #5a6fd8;
    }

    .quick-item.success {
        --item-color: #48bb78;
        --item-color-dark: #38a169;
    }

    .quick-item.warning {
        --item-color: #ed8936;
        --item-color-dark: #dd7324;
    }

    .quick-item.info {
        --item-color: #4299e1;
        --item-color-dark: #3182ce;
    }

    .quick-item.purple {
        --item-color: #9f7aea;
        --item-color-dark: #805ad5;
    }

    .quick-item.danger {
        --item-color: #f56565;
        --item-color-dark: #e53e3e;
    }

    .quick-item.dark {
        --item-color: #4a5568;
        --item-color-dark: #2d3748;
    }

    .quick-item.secondary {
        --item-color: #a0aec0;
        --item-color-dark: #718096;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .stat-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .stat-title {
        font-size: 14px;
        color: #718096;
        font-weight: 500;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }

    .stat-change {
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 20px;
        font-weight: 600;
    }

    .stat-change.positive {
        background: rgba(72, 187, 120, 0.1);
        color: #38a169;
    }

    .stat-change.negative {
        background: rgba(245, 101, 101, 0.1);
        color: #e53e3e;
    }

    .recent-list {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .recent-item {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f7fafc;
        text-decoration: none;
        color: inherit;
        transition: all 0.2s ease;
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-item:hover {
        background: rgba(102, 126, 234, 0.05);
        border-radius: 8px;
        margin: 0 -8px;
        padding: 12px 8px;
    }

    .recent-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        font-size: 16px;
        color: white;
    }

    .recent-info h6 {
        font-size: 14px;
        margin: 0 0 4px 0;
        font-weight: 600;
        color: #2d3748;
    }

    .recent-info small {
        color: #718096;
        font-size: 12px;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1030;
    }

    .overlay.active {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 768px) {
        .quick-access-panel {
            width: 100%;
            right: -100%;
        }

        .quick-access-trigger {
            right: 15px;
            width: 50px;
            height: 50px;
        }

        .quick-access-trigger i {
            font-size: 20px;
        }
    }

    /* Animasyonlar */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .quick-item {
        animation: slideIn 0.3s ease forwards;
    }

    .quick-item:nth-child(2) {
        animation-delay: 0.1s;
    }

    .quick-item:nth-child(3) {
        animation-delay: 0.2s;
    }

    .quick-item:nth-child(4) {
        animation-delay: 0.3s;
    }

    .quick-item:nth-child(5) {
        animation-delay: 0.4s;
    }

    .quick-item:nth-child(6) {
        animation-delay: 0.5s;
    }
</style>
<?php
$is_admin_panel = (strpos(current_url(), '/admin') !== false);
$user_role = (int) session()->get('user_role');
?>

<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="">
            <a href="<?= base_url('/') ?>" class="b-brand text-primary">
                <img src="/assets/images/layout/projexiaa.png" class="img-fluid logo-lg" alt="logo" />
            </a>
        </div>
        <div class="navbar-content">
      <?php
$is_admin_panel = (strpos(current_url(), '/admin') !== false);
$user_role = (int) session()->get('user_role');
?>

<ul class="pc-navbar">
    <?php if ($user_role === 1 && $is_admin_panel): ?>
        <!-- Admin panelindeyiz ve kullanıcı admin -->
        <li class="pc-item">
            <a href="<?= base_url('/admin') ?>" class="pc-link">
                <span class="pc-micon">
                    <svg class="pc-icon"><use xlink:href="#custom-notification-status"></use></svg>
                </span>
                <span class="pc-mtext">Anasayfa</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="<?= base_url('/admin/projeler') ?>" class="pc-link">
                <span class="pc-micon">
                    <svg class="pc-icon"><use xlink:href="#custom-text-block"></use></svg>
                </span>
                <span class="pc-mtext">Projeler</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="<?= base_url('/admin/kullanicilar') ?>" class="pc-link">
                <span class="pc-micon">
                    <svg class="pc-icon"><use xlink:href="#custom-document"></use></svg>
                </span>
                <span class="pc-mtext">Kullanıcılar</span>
            </a>
        </li>

    <?php else: ?>
        <!-- Kullanıcı panelindeyiz veya admin ama kullanıcı panelinde -->
        <li class="pc-item">
            <a href="<?= base_url('/') ?>" class="pc-link">
                <span class="pc-micon">
                    <svg class="pc-icon"><use xlink:href="#custom-notification-status"></use></svg>
                </span>
                <span class="pc-mtext">Anasayfa</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="<?= base_url('/projeekle') ?>" class="pc-link">
                <span class="pc-micon">
                    <svg class="pc-icon"><use xlink:href="#custom-text-block"></use></svg>
                </span>
                <span class="pc-mtext">Proje Ekle</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="<?= base_url('/user/projelerim') ?>" class="pc-link">
                <span class="pc-micon">
                    <svg class="pc-icon"><use xlink:href="#custom-text-block"></use></svg>
                </span>
                <span class="pc-mtext">Projelerim</span>
            </a>
        </li>
    <?php endif; ?>
</ul>

        </div>
    </div>
</nav>


<header class="pc-header">
    <div class="header-wrapper">
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <div class="overlay" id="overlay"></div>
            </ul>
        </div>
        <div class="ms-auto">
            <ul class="list-unstyled d-flex align-items-center gap-3 mb-0">
                <!-- Kullanıcı Profili -->
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="<?= base_url('/profilePicture') ?>" alt="kullanıcı resmi" class="user-avtar"
                            onerror="this.onerror=null;this.src='<?= base_url('assets/images/user/avatar-xe.jpg') ?>';" />
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Profil</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <div class="d-flex mb-1">
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1"><?= esc(session()->get('user_name')) ?></h6>
                                        <span><?= esc(session()->get('user_email')) ?></span>
                                    </div>
                                </div>

                                <hr class="border-secondary border-opacity-50" />

                                <?php
                                $user_role = session()->get('user_role');
                                $is_admin_panel = (strpos(current_url(), '/admin') !== false);

                                if ($user_role === '1'):
                                    if ($is_admin_panel): ?>
                                        <!-- Admin panelindeyiz, kullanıcı paneline git butonu -->
                                        <div class="d-grid mb-3">
                                            <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
                                                <svg class="pc-icon me-2">
                                                    <use xlink:href="#custom-user"></use>
                                                </svg>
                                                Kullanıcı Paneli
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <!-- Kullanıcı panelindeyiz, yönetici paneline git butonu -->
                                        <div class="d-grid mb-3">
                                            <a href="<?= base_url('/admin') ?>" class="btn btn-outline-secondary">
                                                <svg class="pc-icon me-2">
                                                    <use xlink:href="#custom-setting-2"></use>
                                                </svg>
                                                Yönetici Paneli
                                            </a>
                                        </div>
                                <?php endif;
                                endif;
                                ?>


                                <div class="d-grid mb-3">
                                    <a href="<?= base_url('/logout'); ?>" class="btn btn-primary">
                                        <svg class="pc-icon me-2">
                                            <use xlink:href="#custom-logout-1-outline"></use>
                                        </svg>Çıkış Yap
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>