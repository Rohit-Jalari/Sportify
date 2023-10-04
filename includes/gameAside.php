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
			<a href="../pages/index.php" class="menu-link">
				<i class='bx bxs-game'></i>
				<div data-i18n="Analytics">Game Name</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Manage</span>
		</li>
		<?php if ($userRecord == null || $userRecord['Manage'] == null) { ?>
			<li class="menu-item">
				<a href="../pages/edit.php" class="menu-link">
					<i class="menu-icon tf-icons bx bx-dock-top"></i>
					<div data-i18n="Edit">Edit</div>
				</a>
			</li>
		<?php } ?>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Search Schedule</span>
		</li>
		<?php if ($userRecord == null || $userRecord['Enter Code'] == null) { ?>
			<li class="menu-item">
				<a href="../pages/enter code.php" class="menu-link">
                <i class='bx bx-code-alt'></i>
					<div data-i18n="Enter Code">Enter Code</div>
				</a>
			</li>
		<?php } ?>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Participant</span>
		</li>
		<?php if ($userRecord == null || $userRecord['List'] == null) { ?>
			<li class="menu-item">
				<a href="../pages/list.php" class="menu-link">
					<i class="menu-icon tf-icons bx bx-dock-top"></i>
					<div data-i18n="List">List</div>
				</a>
			</li>
		<?php } ?>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Live Update</span>
		</li>
		<?php if ($userRecord == null || $userRecord['See Live '] == null) { ?>
			<li class="menu-item">
				<a href="../pages/SeeLive .php" class="menu-link">
                <i class='bx bx-stopwatch' ></i>
					<div data-i18n="See Live ">See Live </div>
				</a>
                <?php } ?>
                <?php if ($userRecord == null || $userRecord['Go Live '] == null) { ?>
			<li class="menu-item">
				<a href="../pages/goLive .php" class="menu-link">
                <i class='bx bx-webcam' ></i>
					<div data-i18n="goLive ">Go Live </div>
				</a>
			</li>
		<?php } ?>

        <li class="menu-header small text-uppercase">
			<span class="menu-header-text">Schedule</span>
		</li>
		<?php if ($userRecord == null || $userRecord['Create '] == null) { ?>
			<li class="menu-item">
				<a href="../pages/create.php" class="menu-link">
					<i class="menu-icon tf-icons bx bx-dock-top"></i>
					<div data-i18n="Create ">Create </div>
				</a>
                <?php } ?>
                <?php if ($userRecord == null || $userRecord['View '] == null) { ?>
			<li class="menu-item">
				<a href="../pages/view.php" class="menu-link">
                <i class='bx bxs-low-vision' ></i>
					<div data-i18n="view ">View </div>
				</a>
			</li>
		<?php } ?>

        <li class="menu-header small text-uppercase">
			<span class="menu-header-text">Record</span>
		</li>
		<?php if ($userRecord == null || $userRecord['Seerecord'] == null) { ?>
			<li class="menu-item">
				<a href="../pages/seeRecord.php" class="menu-link">
                <i class='bx bxs-video-recording' ></i>
					<div data-i18n="See Record">See Record</div>
				</a>
			</li>
            <?php } ?>

		</li>

	</ul>
</aside>