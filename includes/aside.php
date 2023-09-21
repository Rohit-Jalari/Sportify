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
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
			
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Tournament</span>
		</li>
		<?php if($userRecord == null || $userRecord['tournamentID'] == null) {?>
		<li class="menu-item">
			<a href="../pages/createTournament.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-dock-top"></i>
				<div data-i18n="Create">Create</div>
			</a>
		</li> <?php } ?>
		<li class="menu-item">
			<a href="../pages/participateTournament.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
				<div data-i18n="Participate">Participate</div>
			</a>
		</li>
		<li class="menu-item">
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-cube-alt"></i>
				<div data-i18n="Spectate">Spectate</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item">
					<a href="../pages/enterCode.php" class="menu-link">
						<div data-i18n="Code">Enter Code</div>
					</a>
				</li>
				<li class="menu-item">
					<a href="../pages/shortlist.php" class="menu-link">
						<div data-i18n="Shortlist">Shortlist</div>
					</a>
				</li>
			</ul>
		</li>

		<?php if($userRecord != null) {?>
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Created Tournament</span></li>

		<!-- Created Tournament-->
		<li class="menu-item">
			<a href="javascript:void(0);" class="menu-link">
				<i class="menu-icon tf-icons bx bx-detail"></i>
				<div data-i18n="Messages"><?=($databaseCon->Tournaments->findOne(['tournamentID'=>$userRecord['tournamentID']])['tournamentName']);?></div>
			</a>
		</li>
		<?php } ?>

		<!-- Joined Tournament-->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Joined Tournament</span></li>
		<li class="menu-item">
			<a href="javascript:void(0);" class="menu-link">
				<i class="menu-icon tf-icons bx bx-detail"></i>
				<div data-i18n="Messages">4-A Side Football</div>
			</a>
		</li>
		

		<!-- Social Networking-->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Social Networking</span></li>

		<li class="menu-item">
			<a href="../pages/messages.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-detail"></i>
				<div data-i18n="Messages">Messages</div>
			</a>
		</li>
		<li class="menu-item">
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-detail"></i>
				<div data-i18n="Friends">Friends</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item">
					<a href="../pages/addFriends.php" class="menu-link">
						<div data-i18n="AddFriends">Add Friends</div>
					</a>
				</li>
				<li class="menu-item">
					<a href="../pages/friendList.php" class="menu-link">
						<div data-i18n="FriendList">Friend List</div>
					</a>
				</li>
			</ul>
		</li>

		<!-- Profile -->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Profile</span></li>
		<!-- Detail -->
		<li class="menu-item">
			<a href="../pages/accountDetail.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-collection"></i>
				<div data-i18n="Basic">Account Detail</div>
			</a>
		</li>
		<!-- Manage profile -->
		<li class="menu-item">
			<a href="../pages/manageAccount.php" class="menu-link">
				<i class="menu-icon tf-icons bx bx-box"></i>
				<div data-i18n="Manage">Manage</div>
			</a>
		</li>

		<!-- Authentication -->
		<li class="menu-item">
			<a href="javascript:void(0)" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-copy"></i>
				<div data-i18n="Authentication">Authentication</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item">
					<a href="../pages/login.php" class="menu-link">
						<div data-i18n="Login">Login</div>
					</a>
				</li>
				<li class="menu-item">
					<a href="../pages/register.php" class="menu-link">
						<div data-i18n="Register">Register</div>
					</a>
				</li>
				<li class="menu-item">
					<a href="../pages/logout.php" class="menu-link">
						<div data-i18n="LogOut">Log Out</div>
					</a>
				</li>
			</ul>
		</li>

	</ul>
</aside>