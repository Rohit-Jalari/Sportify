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
            <a href="../pages/participatedGameIndex.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Name">
                    <?= $gameDetail['gameName']; ?>
                </div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manage</span>
        </li>
        <li class="menu-item">
            <a href="../pages/seeParticipatedGameDetail.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Edit">See Game Details</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Participants</span>
        </li>
        <li class="menu-item">
            <a href="../pages/seeParticipatedParticipantList.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="List">See List</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Live Update</span>
        </li>
        <li class="menu-item">
            <a href="../pages/seeParticipatedLive.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="List">See Live Updates</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tie-Sheet</span>
        </li>
        <li class="menu-item">
            <a href="../pages/seeParticipatedBracket.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="List">View</div>
            </a>
        </li>
    </ul>
</aside>