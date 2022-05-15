<!-- ???? -->
<!doctype html>
<html lang="en">
<?php
require 'constants/settings.php';
require 'constants/check-login.php';
require 'constants/db_config.php';

if (isset($_GET['ref'])) {
    $company_id = $_GET['ref'];

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare(
            "SELECT * FROM tbl_users WHERE member_no = :memberno AND role = 'employer'"
        );
        $stmt->bindParam(':memberno', $company_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $rec = count($result);

        if ($rec == '0') {
            header('location:./');
        } else {
            foreach ($result as $row) {
                $compname = $row['first_name'];
                $compesta = $row['byear'];
                $compmail = $row['email'];
                $comptype = $row['title'];
                $compphone = $row['phone'];
                $compcity = $row['city'];
                $compstreet = $row['street'];
                $compzip = $row['zip'];
                $compcountry = $row['country'];
                $compbout = $row['about'];
                $complogo = $row['avatar'];
                $compserv = $row['services'];
                $compexp = $row['expertise'];
                $compweb = $row['website'];
                $comppeopl = $row['people'];
            }
        }
    } catch (PDOException $e) {
    }
} else {
    header('location:./');
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == '' || $page == '1') {
        $page1 = 0;
        $page = 1;
    } else {
        $page1 = $page * 5 - 5;
    }
} else {
    $page1 = 0;
    $page = 1;
}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nightingale Jobs - <?= "$compname" ?></title>
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?= "$actual_link" ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?= "$actual_link" ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Nightingale Jobs" />
    <meta property="og:description" content="Online Job Management / Job Portal" />

	<link rel="shortcut icon" href="images/ico/favicon.png">
	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	<link href="css/edit.css" rel="stylesheet">


	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<link href="css/style.css" rel="stylesheet">

	
</head>


<body class="not-transparent-header">
    <!-- hihihihi -->
	<div class="container-wrapper">
		<header id="header">
			<?php include 'layouts/header.php'; ?>
		</header>

		<div class="main-wrapper breadcrumb">
		<div class="container" >
				
				<ol class="breadcrumb-list booking-step padbot" >
					<li><a href="employers.php">Employers</a></li>
					<li><span><?php echo "$compname"; ?></span></li>
				</ol>
				
			</div>

			
			<div class="company-cover">
<div class="container">
<div class="cover-wrapper">
<img src="https://www.topcv.vn/images/default_cover/default_normal_cover.jpg" width="100%" height="236px" class="img-responsive cover-img">
</div>
<div class="company-detail-overview">
<div id="company-logo">
<div class="company-image-logo">
<?php if ($complogo == null) {
    print '<center>Company Logo Here</center>';
} else {
    echo '<center><img alt="image" title="' .
        $compname .
        '" width="180" height="100" class="img-responsive" src="data:image/jpeg;base64,' .
        base64_encode($complogo) .
        '"/></center>';
} ?>

</div>
</div>
<div class="company-info">
<h1 class="company-detail-name text-highlight"><?= "$compname" ?></h1>
<div class="d-flex">
<p class="website">
<i class="fa fa-globe"></i>
<a href="https://<?= "$compweb" ?>" target="_blank"><?= "$compweb" ?></a>
</p>
<p class="company-size">
<i class="fa fa-building" aria-hidden="true"></i>

<?php echo "$comppeopl"; ?>
</p>
</div>
</div>

</div>
</div>
</div>
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
					




							<div class="col-md-12 ">
							
								<div class="company-detail-wrapper">
								
									
						
									<div class="company-detail-company-overview box-white clearfix">
									
										<h3 class="title">Giới thiệu</h3>
										
										<p><?= "$compbout" ?></p>

										
										<h3 class="title">Sản phẩm và dịch vụ</h3>
										
										<p><?= "$compserv" ?></p>
										
										<h3 class="title">Chuyên môn</h3>
										
										<p><?= "$compexp" ?></p>
										
									</div><br><br>

									
									<div class="section-title box-white  mb-40">
						
										<h3 class="text-left title" >Tuyển dụng </h3>
										
									

									<div class="result-list-wrapper">
									<?php
         require 'constants/db_config.php';

         try {
             $conn = new PDO(
                 "mysql:host=$servername;dbname=$dbname",
                 $username,
                 $password
             );
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             $stmt = $conn->prepare(
                 'SELECT * FROM tbl_jobs WHERE company = :compid ORDER BY enc_id DESC LIMIT 5'
             );
             $stmt->bindParam(':compid', $company_id);
             $stmt->execute();
             $result = $stmt->fetchAll();

             foreach ($result as $row) {

                 $post_date = date_format(
                     date_create_from_format('d/m/Y', $row['closing_date']),
                     'd'
                 );
                 $post_month = date_format(
                     date_create_from_format('d/m/Y', $row['closing_date']),
                     'F'
                 );
                 $post_year = date_format(
                     date_create_from_format('d/m/Y', $row['closing_date']),
                     'Y'
                 );
                 $type = $row['type'];
                 if ($type == 'Freelance') {
                     $sta =
                         '<span class="job-label label label-success">Freelance</span>';
                 }
                 if ($type == 'Part-time') {
                     $sta =
                         '<span class="job-label label label-danger">Part-time</span>';
                 }
                 if ($type == 'Full-time') {
                     $sta =
                         '<span class="job-label label label-warning">Full-time</span>';
                 }
                 ?>
										<div class="job-item-list">
										
											<div class="image">
										<?php if ($complogo == null) {
              print '<center><img class="autofit3" alt="image"  src="images/blank.png"/></center>';
          } else {
              echo '<center><img class="autofit3" alt="image" title="' .
                  $compname .
                  '" width="180" height="100" src="data:image/jpeg;base64,' .
                  base64_encode($complogo) .
                  '"/></center>';
          } ?>
											</div>
											
											<div class="content">
												<div class="job-item-list-info">
												
													<div class="row">
													
														<div class="col-sm-7 col-md-8">
														
															<h4 class="heading"><?= $row['title'] ?></h4>
															<div class="meta-div clearfix mb-25">
															<span>at <a href="company.php?ref=<?= "$company_id" ?>"><?= "$compname" ?></a></span>
															<?= "$sta" ?>
															</div>
															
															<p class="texing"><?= $row['description'] ?></p>
														</div>
														
														<div class="col-sm-5 col-md-4">
														<ul class="meta-list">
															<li>
																<span>Quốc gia:</span>
																<?php echo $row['country']; ?>
															</li>
															<li>
																<span>Thành phố:</span>
																<?php echo $row['city']; ?>
															</li>
															<li>
																<span>Kinh nghiệm:</span>
																<?php echo $row['experience']; ?>
															</li>
															<li>
																<span>Hạn nộp hồ sơ: </span>
																<?php echo "$post_month"; ?> <?php echo "$post_date"; ?>, <?php echo "$post_year"; ?>
															</li>
														</ul>
														</div>
														
													</div>
												
												</div>
											
												<div class="job-item-list-bottom">
												
													<div class="row">
													
														<div class="col-sm-7 col-md-8">
														<div class="sub-category">
															<a><?= $row['category'] ?></a>

														</div>
														</div>
														
													<div class="col-sm-5 col-md-4">
														<a target="_blank" href="explore-job.php?jobid=<?= $row[
                  'job_id'
              ] ?>" class="btn btn-primary">Xem thêm</a>
													</div>
														
													</div>
												
												</div>
											
											
											</div>
										
										</div>
										<?php
             }
         } catch (PDOException $e) {
         }
         ?>

									</div>
								<div class="pager-wrapper">
								
						            <ul class="pager-list">
								<?php
        $total_records = 0;
        require 'constants/db_config.php';
        try {
            $conn = new PDO(
                "mysql:host=$servername;dbname=$dbname",
                $username,
                $password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare(
                'SELECT * FROM tbl_jobs WHERE company = :compid ORDER BY enc_id DESC'
            );
            $stmt->bindParam(':compid', $company_id);
            $stmt->execute();
            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $total_records++;
            }
        } catch (PDOException $e) {
        }

        $records = $total_records / 5;
        $records = ceil($records);
        if ($records > 1) {
            $prevpage = $page - 1;
            $nextpage = $page + 1;

            print '<li class="paging-nav" ';
            if ($page == '1') {
                print 'class="disabled"';
            }
            print '><a ';
            if ($page == '1') {
                print '';
            } else {
                print 'href="company.php?ref=' .
                    $company_id .
                    '&page=' .
                    $prevpage .
                    '"';
            }
            print '><i class="fa fa-chevron-left"></i></a></li>';
            for (
                $b = 1;
                $b <= $records;
                $b++
            ) { ?><li  class="paging-nav" ><a <?php if ($b == $page) {
    print ' style="background-color:#33B6CB; color:white" ';
} ?>  href="company.php?ref=<?= "$company_id" ?>&page=<?= "$b" ?>"><?= $b .
    ' ' ?></a></li><?php }
            print '<li class="paging-nav"';
            if ($page == $records) {
                print 'class="disabled"';
            }
            print '><a ';
            if ($page == $records) {
                print '';
            } else {
                print 'href="company.php?ref=' .
                    $company_id .
                    '&page=' .
                    $nextpage .
                    '"';
            }
            print '><i class="fa fa-chevron-right"></i></a></li>';
        }
        ?>

						            </ul>	
									</div>
					                </div>
									
							</div>
						
						</div>
						
					</div>
				
				</div>
			
			</div>
			</div>
			
			<footer class="footer-wrapper">
				<?php include 'layouts/footer.php'; ?>
			</footer>
			
		
		
			</div>
		
 

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/jquery.countimator.js"></script>
<script type="text/javascript" src="js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>


</html>