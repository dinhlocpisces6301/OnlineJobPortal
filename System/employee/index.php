<!doctype html>
<html lang="en">
<?php
require '../constants/settings.php';
require 'constants/check-login.php';

if ($user_online == 'true') {
    if ($myrole == 'employee') {
    } else {
        header('location:../');
    }
} else {
    header('location:../');
}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nightingale Jobs - Employee Profile</title>
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?= "$actual_link" ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?= "$actual_link" ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Bwire Jobs" />
    <meta property="og:description" content="Online Job Management / Job Portal" />

	<link rel="shortcut icon" href="../images/ico/favicon.png">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="../icons/linearicons/style.css">
	<link rel="stylesheet" href="../icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../icons/rivolicons/style.css">
	<link rel="stylesheet" href="../icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="../icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="../icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="../icons/flaticon-ventures/flaticon-ventures.css">

	<link href="../css/style.css" rel="stylesheet">
	
</head>
  <style>
    .autofit2 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
  
  </style>

<body class="not-transparent-header">

	<div class="container-wrapper">

		<header id="header">
  			<?php include 'layouts/header.php'; ?>
		</header>

		<div class="main-wrapper">
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb-list booking-step">
						<li><a href="../">Trang chủ</a></li>
						<li><span>Hồ sơ</span></li>
					</ol>
				</div>
			</div>

			
			<div class="admin-container-wrapper">
				<div class="container">
					<div class="GridLex-gap-15-wrappper">
						<div class="GridLex-grid-noGutter-equalHeight">
							<div class="GridLex-col-3_sm-4_xs-12">
								<?php include 'layouts/admin_slider.php'; ?>
							</div>
							
							<div class="GridLex-col-9_sm-8_xs-12">
								<div class="admin-content-wrapper">
									<div class="admin-section-title">
										<h2>HỒ SƠ</h2>
										<p>Lần đăng nhập cuối: <span class="text-primary"><?= "$mylogin" ?></span></p>
									</div>
									
										<form class="post-form-wrapper" action="app/update-profile.php" method="POST" autocomplete="off">
											<div class="row gap-20">
											<?php require 'constants/check_reply.php'; ?>

												<div class="clear"></div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Tên</label>
														<input name="fname" required type="text" class="form-control" value="<?= "$myfname" ?>" placeholder="Điền tên của bạn">
													</div>
												</div>
												
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Họ</label>
														<input name="lname" required type="text" class="form-control" value="<?= "$mylname" ?>" placeholder="Điền họ của bạn">
													</div>
												</div>
												
												<div class="clear"></div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Ngày sinh</label>
														<div class="row gap-5">
															<div class="col-xs-3 col-sm-3">
																<select name="date" required class="selectpicker form-control" data-live-search="false">
																	<option disabled value="">Ngày</option>
                                                                    <?php
                                                                    $x = 1;

                                                                    while (
                                                                        $x <= 31
                                                                    ) {
                                                                        if (
                                                                            $x <
                                                                            10
                                                                        ) {
                                                                            $x = "0$x";
                                                                            print '<option ';
                                                                            if (
                                                                                $mydate ==
                                                                                $x
                                                                            ) {
                                                                                print ' selected ';
                                                                            }
                                                                            print ' value="' .
                                                                                $x .
                                                                                '">' .
                                                                                $x .
                                                                                '</option>';
                                                                        } else {
                                                                            print '<option ';
                                                                            if (
                                                                                $mydate ==
                                                                                $x
                                                                            ) {
                                                                                print ' selected ';
                                                                            }
                                                                            print ' value="' .
                                                                                $x .
                                                                                '">' .
                                                                                $x .
                                                                                '</option>';
                                                                        }
                                                                        $x++;
                                                                    }
                                                                    ?>
																</select>
															</div>

															<div class="col-xs-5 col-sm-5">
																<select name="Tháng" required class="selectpicker form-control" data-live-search="false">
                                                                    <?php
                                                                    $x = 1;

                                                                    while (
                                                                        $x <= 12
                                                                    ) {
                                                                        if (
                                                                            $x <
                                                                            10
                                                                        ) {
                                                                            $x = "0$x";
                                                                            print '<option ';
                                                                            if (
                                                                                $mymonth ==
                                                                                $x
                                                                            ) {
                                                                                print ' selected ';
                                                                            }
                                                                            print ' value="' .
                                                                                $x .
                                                                                '">' .
                                                                                $x .
                                                                                '</option>';
                                                                        } else {
                                                                            print '<option ';
                                                                            if (
                                                                                $mymonth ==
                                                                                $x
                                                                            ) {
                                                                                print ' selected ';
                                                                            }
                                                                            print ' value="' .
                                                                                $x .
                                                                                '">' .
                                                                                $x .
                                                                                '</option>';
                                                                        }
                                                                        $x++;
                                                                    }
                                                                    ?>
																</select>
															</div>

															<div class="col-xs-4 col-sm-4">
																<select name="Năm" class="selectpicker form-control" data-live-search="false">
													            	<?php
                          $x = date('Y');
                          $yr = 60;
                          $y2 = $x - $yr;
                          while ($x > $y2) {
                              print '<option ';
                              if ($myyear == $x) {
                                  print ' selected ';
                              }
                              print ' value="' . $x . '">' . $x . '</option>';
                              $x = $x - 1;
                          }
                          ?>
																</select>
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Email</label>
														<input type="email" name="email" required class="form-control" value="<?= "$myemail" ?>" placeholder="Nhập địa chỉ email của bạn">
													</div>
												</div>
												
												<div class="clear"></div>
												<div class="form-group">
													<div class="col-sm-12">
														<label>Trình độ học vấn</label>
													</div>
													
													<div class="col-sm-6 col-md-4">
                                                    	<input value="<?= "$myedu" ?>" name="education" type="text" required class="form-control" placeholder="Eg: Diploma, Degree...etc">
													</div>
													
													<div class="col-sm-6 col-md-4">
														<input value="<?= "$mytitle" ?>" name="title" required type="text" class="form-control mb-15" placeholder="Eg: Computer Science, IT...etc">
													</div>
														
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Giới tính</label>
														<select name="gender" required class="selectpicker show-tick form-control" data-live-search="false">
															<option disabled value="">Chọn</option>
															<option <?php if ($mygender == 'Male') {
                   print ' selected ';
               } ?> value="Male">Nam</option>
															<option <?php if ($mygender == 'Female') {
                   print ' selected ';
               } ?>value="Female">Nữ</option>
														</select>
													</div>
												</div>
												
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Tỉnh/Thành phố</label>
														<input name="city" required type="text" class="form-control" value="<?= "$mycity" ?>">
													</div>
													
												</div>
												
												<div class="clear"></div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Đường</label>
														<input name="street" required type="text" class="form-control" value="<?= "$mystreet" ?>">
													</div>
												</div>
												
											
												<div class="clear"></div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>Quốc gia</label>
														<select name="country" required class="selectpicker show-tick form-control" data-live-search="true">
															<option disabled value="">Select</option>
						                                   	<?php
                                          require '../constants/db_config.php';
                                          try {
                                              $conn = new PDO(
                                                  "mysql:host=$servername;dbname=$dbname",
                                                  $username,
                                                  $password
                                              );
                                              $conn->setAttribute(
                                                  PDO::ATTR_ERRMODE,
                                                  PDO::ERRMODE_EXCEPTION
                                              );

                                              $stmt = $conn->prepare(
                                                  'SELECT * FROM tbl_countries ORDER BY country_name'
                                              );
                                              $stmt->execute();
                                              $result = $stmt->fetchAll();

                                              foreach ($result as $row) { ?> 
																		<option <?php if ($mycountry == $row['country_name']) {
                      print ' selected ';
                  } ?> value="<?= $row['country_name'] ?>"><?= $row[
    'country_name'
] ?></option> 
																	<?php }
                                          } catch (PDOException $e) {
                                          }
                                          ?>
														</select>
													</div>
												</div>
												
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label>SĐT</label>
														<input type="text" name="phone" required class="form-control" value="<?= "$myphone" ?>">
													</div>
												</div>

												<div class="clear"></div>
												<div class="col-sm-12 col-md-12">
													<div class="form-group bootstrap3-wysihtml5-wrapper">
														<label>Giới thiệu bản thân</label>
														<textarea name="about" class="bootstrap3-wysihtml5 form-control" placeholder="Giới thiệu một vài điều về bản thân . . ." style="height: 200px;"><?= "$mydesc" ?></textarea>
													</div>
												</div>
												
												<div class="clear"></div>
												<div class="col-sm-12 mt-10">
													<button type="submit" class="btn btn-primary">Cập nhật</button>
													<button type="reset" class="btn btn-primary btn-inverse">Hủy</button>
												</div>
											</div>
										</form>
										<br>
										
										<form action="app/new-dp.php" method="POST" enctype="multipart/form-data">
											<div class="row gap-20">
												<div class="col-sm-12 col-md-12">
													<div class="form-group bootstrap3-wysihtml5-wrapper">
														<label>Sửa ảnh đại diện</label>
														<input accept="image/*" type="file" name="image" required>
													</div>
												</div>
													
												<div class="clear"></div>
												<div class="col-sm-12 mt-10">
													<button type="submit" class="btn btn-primary">Cập nhật</button>
													<?php if ($myavatar == null) {
             } else {
                  ?>
															<a onclick = "return confirm('Bạn có muốn xóa ảnh đại diện ?')" class="btn btn-primary btn-inverse" href="app/drop-dp.php">Xóa</a> 
														<?php
             } ?>
												</div>
											</div>
										</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer-wrapper" style="margin-top: 16px">
				<?php include 'layouts/footer.php'; ?>
			</footer>
		</div>
	</div>
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="../js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="../js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<script type="text/javascript" src="../js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="../js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="../js/customs.js"></script>

</body>
</html>