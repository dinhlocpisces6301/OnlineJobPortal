			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">
				<div class="container">
					<div class="logo-wrapper">
						<div class="logo">
							<a href="./"><img src="images/logo.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
						<ul class="nav navbar-nav" id="responsive-menu" style=" display: flow-root">
							<li>
								<a href="./">Trang chủ</a>
							</li>
							
							<li>
								<a href="job-list.php">Danh sách</a>
							</li>
							
							<li>
								<a href="employers.php">Nhà Tuyển Dụng</a>
							</li>
							
							<li>
								<a href="employees.php">Ứng Viên</a>
							</li>
							
							<!-- <li>
								<a href="contact.php">Liên hệ</a>
							</li> -->
						</ul>
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
							<?php if ($user_online == true) {
           print '
							    <li><a href="logout.php">Đăng xuất</i></a></li>
								<li><a href="' .
               $myrole .
               '">Hồ sơ</a></li>';
       } else {
           print '
								<li><a href="login.php">Đăng nhập</i></a></li>
								<li><a data-toggle="modal" href="#registerModal">Đăng kí</a></li>';
       } ?>
						</ul>
					</div>	
				</div>

				<div id="slicknav-mobile"></div>
			</nav>

			
			<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">THAM GIA NGAY</h4>
				</div>
				
				<div class="modal-body">
					<div class="row gap-20">
					
						<div class="col-sm col-md">
							<a href="register.php?p=Employee" class="btn btn-facebook btn-block mb-5-xs">Đăng Kí Ứng Viên</a>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="row gap-20">
						<div class="col-sm col-md">
							<a href="register.php?p=Employer" class="btn btn-facebook btn-block mb-5-xs">Đăng Kí Nhà Tuyển Dụng</a>
						</div>

						
					</div>
				</div>
				<div class="modal-footer text-center">
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Đóng</button>
				</div>
			</div>

			