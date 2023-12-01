<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
	data-assets-path="<?= site_url('asset/sneat') ?>/assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>Login SANDPAPAER</title>
	<meta name="description" content="" />
	<!-- Icons. Uncomment required icon fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet">

	<!-- Icons. Uncomment required icon fonts -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/css/core.css"
		class="template-customizer-core-css" />
	<link rel="stylesheet"
		href="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/css/theme-default.css"
		class="template-customizer-theme-css" />
	<link rel="stylesheet" href="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/css/demo.css" />
	<link rel="stylesheet"
		href="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet"
		href="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/css/pages/page-auth.css" />
	<script src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/js/helpers.js"></script>
	<script src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/js/config.js"></script>
</head>

<body>
	<!-- Content -->

	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner">
				<!-- Register -->
				<div class="card">
					<div class="card-body">

						<a href="<?= site_url('home') ?>" class="btn rounded-pill btn-icon btn-outline-secondary">
							<span class="tf-icons bx bx-arrow-back"></span>
						</a>

						<!-- Logo -->
						<div class="app-brand justify-content-center">
							<span class="app-brand-text demo text-body fw-bolder">SandPaper 👋</span>
							</a>
						</div>
						<!-- /Logo -->
						<form class="mb-3" action="<?= base_url('sandpaper_login_admin/login') ?>" method="POST">
							<div class="mb-3">
								<label class="form-label">Username</label>
								<input type="text" class="form-control" name="username"
									placeholder="Enter your username" autofocus="autofocus" />
							</div>
							<div class="mb-3 form-password-toggle">
								<div class="d-flex justify-content-between">
									<label class="form-label">Password</label>
								</div>
								<div class="input-group input-group-merge">
									<input type="password" class="form-control" name="password"
										placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
										aria-describedby="password" />
									<span class="input-group-text cursor-pointer">
										<i class="bx bx-hide"></i>
									</span>
								</div>
							</div>
							<div class="mb-3">
								<button class="btn btn-primary d-grid w-100" type="submit">Login ga?</button>
							</div>
							<div id="menghilang">
								<?= $this->session->flashdata('alert') ?>
							</div>
						</form>

						<p class="text-center text-primary">
							<span>Karanganyar</span>
						</p>
					</div>
				</div>
				<!-- /Register -->
			</div>
		</div>
	</div>


	<script src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/libs/jquery/jquery.js"></script>
	<script src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/libs/popper/popper.js"></script>
	<script src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/js/bootstrap.js"></script>
	<script
		src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js">
	</script>
	<script src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/vendor/js/menu.js"></script>
	<script src="https://presensi.pipapip.web.id/assets/vendor/sneat/assets/js/main.js"></script>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>