<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

	<div class="app-brand">
		<a href="../pages/gameIndex.php" class="py-2">
			<span class="logo logo-shadow">Sportify</span>
		</a>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>
	<ul class="menu-inner py-1">
		<!-- Tournament Name -->
		<li class="menu-item active">
			<a href="../pages/tournamentIndex.php" class="menu-link">
			<i class='bx bxs-home' ></i>
				<div data-i18n="Analytics">Tournament Name</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Manage</span>
		</li>
		<?php if ($userRecord == null || $userRecord['manage'] == null) { ?>
			<li class="menu-item">
				<a href="../pages/edit.php" class="menu-link">
				<i class='bx bxs-edit-alt' ></i>
					<div data-i18n="Edit">Edit</div>
				</a>
			</li>
		<?php } ?>
		
		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Games</span>
		</li>
		<?php if ($userRecord == null || $userRecord['participant'] == null) { ?>
			<li class="menu-item">
				<a href="../pages/list.php" class="menu-link">
				<i class='bx bx-list-check' ></i>
					<div data-i18n="List">List</div>
				</a>
			</li>
		<?php } ?>
	</ul>
</aside>
