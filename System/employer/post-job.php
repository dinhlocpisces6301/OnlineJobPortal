<!doctype html>
<html lang="en">

<?php
require '../constants/settings.php';
require 'constants/check-login.php';
$title = "Đăng bài tuyển dụng";
if ($user_online == 'true') {
    if ($myrole == 'employer') {
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

	<title>Nightingale Jobs - Post Job</title>
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?= "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?= "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Nightingale Jobs" />
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
						<li><span><?=$title?></span></li>
					</ol>
				</div>
			</div>

			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-sm-5 col-md-4">
							
								<div class="company-detail-sidebar">
									
									<div class="image">
										<?php if ($logo == null) {
              print '<center>Company Logo Here</center>';
          } else {
              echo '<center><img alt="image" title="' .
                  $compname .
                  '" width="180" height="100" src="data:image/jpeg;base64,' .
                  base64_encode($logo) .
                  '"/></center>';
          } ?>
									</div>
									
									<h2 class="heading mb-15"><h4><?= "$compname"; ?></h4>
								
									<p class="location"><i class="fa fa-map-marker"></i> <?= "$zip"; ?> <?= "$city"; ?>. <?= "$street"; ?>, <?= "$country"; ?> <span class="block"> <i class="fa fa-phone"></i> <?= "$myphone"; ?></span></p>
									
									<ul class="meta-list clearfix">
										<li>
											<h4 class="heading">Được thành lập tại:</h4>
											<?= "$esta"; ?>
										</li>
										<li>
											<h4 class="heading">Chuyên môn:</h4>
											<?= "$mytitle"; ?>
										</li>
										<li>
											<h4 class="heading">Quy mô:</h4>
											<?= "$mypeople"; ?>
										</li>
										<li>
											<h4 class="heading">Website: </h4>
											<a target="_blank" href="https://<?= "$myweb"; ?>"><?= "$myweb"; ?></a>
										</li>
										<li>
											<h4 class="heading">Email: </h4>
											<?= "$mymail"; ?>
										</li>

									</ul>
									
									
									<a href="./" class="btn btn-primary mt-5"><i class="fa fa-pencil-square-o mr-5"></i>Sửa</a>
									
								</div>
					
					
							</div>
							
							<div class="col-sm-7 col-md-8">
							
								<div class="company-detail-wrapper">

									<div class="company-detail-company-overview  mt-0 clearfix">
										
										<div class="section-title-02">
											<h3 class="text-left"><?=$title?></h3>
										</div>

										<form class="post-form-wrapper" action="app/post-job.php" method="POST" autocomplete="off">
								
											<div class="row gap-20">
											<?php require 'constants/check_reply.php'; ?>
										
												<div class="col-sm-8 col-md-8">
												
													<div class="form-group">
														<label>Chức vụ</label>
														<input name="title" required type="text" class="form-control" placeholder="Nhập chức vụ">
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-4 col-md-4">
												
													<div class="form-group">
														<label>Thành phố</label>
														<input name="city" required type="text" class="form-control" placeholder="Nhập thành phố">
													</div>
													
												</div>
												
												<div class="col-sm-4 col-md-4">
												
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

                                             foreach (
                                                 $result
                                                 as $row
                                             ) { ?> <option <?php if (
     $country == $row['country_name']
 ) {
     print ' selected ';
 } ?> value="<?= $row['country_name']; ?>"><?= $row[
    'country_name'
]; ?></option> <?php }
                                         } catch (PDOException $e) {
                                         }
                                         ?>
														</select>
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-4 col-md-4">
												
													<div class="form-group">
														<label>Ngành nghề</label>
															<select name="category" required class="selectpicker show-tick form-control" data-live-search="true">
															<option disabled value="">Lựa chọn</option>
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
                                                 'SELECT * FROM tbl_categories ORDER BY category'
                                             );
                                             $stmt->execute();
                                             $result = $stmt->fetchAll();

                                             foreach (
                                                 $result
                                                 as $row
                                             ) { ?> <option value="<?= $row[
     'category'
 ]; ?>"><?= $row['category']; ?></option> <?php }
                                         } catch (PDOException $e) {
                                         }
                                         ?>
														</select>
											
														
													</div>
													
												</div>
											    <div class="col-sm-4 col-md-4">
												
													<div class="form-group">
														<label>Hạn nộp</label>
														<input name="deadline" required type="text" class="form-control" placeholder="30/12/2018">
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												
													<div class="form-group mb-20">
														<label>Loại công việc:</label>
														<select name="jobtype" required class="selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
															<option value="" selected>Lựa chọn</option>
															<option value="Full-time" data-content="<span class='label label-warning'>Full-time</span>">Full-time</option>
															<option value="Part-time" data-content="<span class='label label-danger'>Part-time</span>">Part-time</option>
															<option value="Freelance" data-content="<span class='label label-success'>Freelance</span>">Freelance</option>
														</select>
													</div>
													
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												
													<div class="form-group mb-20">
														<label>Kinh nghiệm:</label>
														<select name="experience" required class="selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
															<option value="" selected >Lựa chọn</option>
															<option value="Expert">Expert</option>
															<option value="2 Years">2 năm</option>
															<option value="3 Years">3 năm</option>
															<option value="4 Years">4 năm</option>
															<option value="5 Years">5 năm</option>
															<option value="5 Years"> > 5 năm</option>
														</select>
													</div>
													
													
												</div>

												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group bootstrap3-wysihtml5-wrapper">
														<label>Mô tả công việc</label>
														<textarea class="form-control bootstrap3-wysihtml5" name="description" required placeholder="Enter description ..." style="height: 200px;"></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group bootstrap3-wysihtml5-wrapper">
														<label>Quyền lợi</label>
														<textarea name="responsiblities" required class="form-control bootstrap3-wysihtml5" placeholder="Enter responsiblities..." style="height: 200px;"></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group bootstrap3-wysihtml5-wrapper">
														<label>Yêu cầu</label>
														<textarea name="requirements" required class="form-control bootstrap3-wysihtml5" placeholder="Enter requirements..." style="height: 200px;"></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>
												

												
												<div class="clear"></div>
												

												
												<div class="clear mb-10"></div>

												
												<div class="clear mb-15"></div>

												
												<div class="clear"></div>
												
												<div class="col-sm-6 mt-30">
													<button type="submit"  onclick = "validate(this)" class="btn btn-primary btn-lg">Đăng tuyển</button>
												</div>

											</div>
											
										</form>
										
									</div>
									
							


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


<script type="text/javascript" src="../js/fileinput.min.js"></script>
<script type="text/javascript" src="../js/customs-fileinput.js"></script>




<script type="text/javascript" src="../js/jquery.sheepItPlugin.js"></script>
<script type="text/javascript" src="../js/customs-sheepItPlugin.js"></script>

</body>

</html>