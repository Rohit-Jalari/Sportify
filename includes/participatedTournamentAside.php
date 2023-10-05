
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand">
        <a href="../pages/index.php" class="py-2">
            <span class="logo logo-shadow">Sportify</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="../pages/participatedTournamentIndex.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Name"><?=$participatedTournament["tournamentName"];?></div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">About Tournament</span>
        </li>
        <li class="menu-item">
            <a href="../pages/seeParticipatedTournamentDetail.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Edit">See Detail</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Games</span>
        </li>
        <li class="menu-item">
            <a href="../pages/participatedGameList.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="List">Game List</div>
            </a>
        </li>
    </ul>
</aside>