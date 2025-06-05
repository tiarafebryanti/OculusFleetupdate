<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="../assets/img/logo-oculus.png" alt="logo" />
            </span>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu"></div>
        <ul class="menu-links">
            <li class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>">
                <a href="../index.php">
                    <i class="fa-solid fa-house icon"></i> 
                    <span class="text nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-link <?= $current_page == 'tripsummary.php' ? 'active' : '' ?>">
                <a href="pages/tripsummary.php">
                    <i class="fas fa-window-maximize icon"></i>
                    <span class="text nav-text">Trip Summary</span>
                </a>
            </li>
            <li class="nav-link <?= $current_page == 'configuration.php' ? 'active' : '' ?>">
                <a href="configuration.php">
                    <i class="fas fa-sliders-h icon"></i>
                    <span class="text nav-text">Configuration</span>
                </a>
            </li>
            <li class="nav-link <?= $current_page == 'schedule.php' ? 'active' : '' ?>">
                <a href="schedule.php">
                    <i class="fas fa-calendar-days icon"></i>
                    <span class="text nav-text">Schedule</span>
                </a>
            </li>
            <li class="nav-link <?= $current_page == 'sign-up.php' ? 'active' : '' ?>">
                <a href="sign-up.php">
                    <i class="fas fa-right-from-bracket icon"></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
