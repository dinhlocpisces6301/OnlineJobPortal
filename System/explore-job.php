<!doctype html>
<html lang="en">
<?php
require 'constants/settings.php';
require 'constants/check-login.php';
require 'constants/db_config.php';

if (isset($_GET['jobid'])) {
    $jobid = $_GET['jobid'];

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT * FROM tbl_jobs WHERE job_id = :jobid');
        $stmt->bindParam(':jobid', $jobid);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $rec = count($result);
        if ($rec == '0') {
            header('location:./');
        } else {
            foreach ($result as $row) {
                $jobtitle = $row['title'];
                $jobcity = $row['city'];
                $jobcountry = $row['country'];
                $jobcategory = $row['category'];
                $jobtype = $row['type'];
                $experience = $row['experience'];
                $jobdescription = $row['description'];
                $jobrespo = $row['responsibility'];
                $jobreq = $row['requirements'];
                $closingdate = $row['closing_date'];
                $opendate = $row['date_posted'];
                $compid = $row['company'];
                if ($jobtype == 'Freelance') {
                    $sta = '<span class="label label-success">Freelance</span>';
                }
                if ($jobtype == 'Part-time') {
                    $sta = '<span class="label label-danger">Part-time</span>';
                }
                if ($jobtype == 'Full-time') {
                    $sta = '<span class="label label-warning">Full-time</span>';
                }
            }
        }
    } catch (PDOException $e) {
    }
} else {
    header('location:./');
}

try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare(
        "SELECT * FROM tbl_users WHERE member_no = '$compid'"
    );
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $row) {
        $compname = $row['first_name'];
        $complogo = $row['avatar'];
        $compbout = $row['about'];
    }
} catch (PDOException $e) {
}

$today_date = strtotime(date('Y/m/d'));
$last_date = date_format(
    date_create_from_format('d/m/Y', $closingdate),
    'Y/m/d'
);
$post_date = date_format(date_create_from_format('d/m/Y', $closingdate), 'd');
$post_month = date_format(date_create_from_format('d/m/Y', $closingdate), 'F');
$post_year = date_format(date_create_from_format('d/m/Y', $closingdate), 'Y');
$conv_date = strtotime($last_date);

if ($today_date > $conv_date) {
    $jobexpired = true;
} else {
    $jobexpired = false;
}
?>


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nightingale Jobs - <?= "$jobtitle" ?></title>
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

	<link href="css/style.css" rel="stylesheet">

	 <script type="text/javascript">
   function update(str)
   {
	   
	var txt;
    var r = confirm("Are you sure you want to apply this job , you can not UNDO");
    if (r == true) {
		document.getElementById("data").innerHTML = "Please wait...";
         var xmlhttp;

      if (window.XMLHttpRequest)
      {
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","app/apply-job.php?opt="+str, true);
      xmlhttp.send();
    } else {

    }

  }
</script>

	
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
						<li><a href="job-list.php">Danh s??ch vi???c l??m</a></li>
						<li><a target="_blank" href="company.php?ref=<?= "$compid" ?>"><?= "$compname" ?></a></li>
						<li><span><?= "$jobtitle" ?></span></li>
					</ol>
					
				</div>
				
			</div>

            

			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
                          <div class="col-md-12">            
                             <div class="box-white box-detail-job">
                                <div class="box-header">
                                    <a href="company.php?ref=<?php echo "$compid"; ?>" title="C??ng Ty TNHH Thi???t B??? D??n D???ng Thu???n Phong" class="company-logo">
                                        <div class="box-company-logo">
                                            <?php if ($complogo == null) {
                                                print '<center>No Company Logo</center>';
                                            } else {
                                                echo '<center> <img class="autofit2" alt="image" title="' .
                                                    $compname .
                                                    'class="img-responsive" src="data:image/jpeg;base64,' .
                                                    base64_encode($complogo) .
                                                    '"/></center>';
                                            } ?>

                                        </div>
                                     </a>
                                        <div class="box-info-job">
                                        <h1 class="job-title text-highlight bold" style="overflow-wrap:break-word;"> <a href="company.php?ref=<?php echo "$compid"; ?>" class="text-highlight" target="_blank"><?= "$jobtitle" ?></a> </h1>
                                        <div class="company-title">
                                        <a href="company.php?ref=<?php echo "$compid"; ?>" class="text-dark-blue"><?php echo "$compname"; ?></a>
                                        </div>

                                        <div class="job-deadline">
                                        <i class="fa-regular fa-clock"></i> H???n n???p h??? s??: <?php echo "$post_month"; ?> <?php echo "$post_date"; ?>, <?php echo "$post_year"; ?>
                                        </div>
                                        </div>
                                        <div class="box-apply-current">
                                        <?php if ($user_online == true) {
                                            if ($jobexpired == true) {
                                                print '<button class="btn btn-topcv-primary btn-primary-hover btn-apply open-apply-modal"><i class="flaticon-line-icon-set-calendar"></i> H???t h???n n???p h??? s?? </button>';
                                            } else {
                                                if ($myrole == 'employee') {
                                                    print '<button'; ?> onclick="update(this.value)" <?php print ' value="' .
     $jobid .
     '" class="btn btn-primary btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-pencil"></i> ???ng tuy???n ngay</button>';
                                                } else {
                                                    print '<button class="btn btn-topcv-primary btn-primary-hover btn-apply open-apply-modal"><i class="flaticon-line-icon-set-padlock"></i> ????ng nh???p ????? ???ng tuy???n ngay</button>';
                                                }
                                            }
                                        } else {
                                            print '<button class="btn btn-topcv-primary btn-primary-hover btn-apply open-apply-modal"><i class="flaticon-line-icon-set-padlock"></i> ????ng nh???p ????? ???ng tuy???n ngay</button>';
                                        } ?>
								
								<p id="data"></p>
                                        </div>

                                </div>
                                </div>
                                </div>

                        <div class="col-md-12"><div class="box-info-job box-white">
<h2 class="box-title">Chi ti???t tin tuy???n d???ng</h2>
<div class="row">
<div class="col-md-12">
<div class="box-info">
<p>Th??ng tin chung</p>
<div class="box-main">
 <div class="box-item">
<img src="https://www.topcv.vn/v4/image/job-detail/icon/1.svg" alt="">
<div>
<strong>M???c l????ng </strong> <br>
<span>
Tho??? thu???n
</span>
</div>
</div>
<div class="box-item">
<img src="https://www.topcv.vn/v4/image/job-detail/icon/6.svg" alt="">
<div>
<strong>C???p b???c </strong> <br>
<span><?php echo "$jobtitle"; ?> </span>
</div>
</div>
<div class="box-item">
<img src="https://www.topcv.vn/v4/image/job-detail/icon/2.svg" alt="">
<div>
<strong>H??nh th???c l??m vi???c </strong> <br>
<span><?php echo "$jobtype"; ?></span>
</div>
</div>


<div class="box-item">
<img src="https://www.topcv.vn/v4/image/job-detail/icon/7.svg" alt="">
<div>
<strong>Kinh nghi???m </strong> <br>
<span><?php echo "$experience"; ?></span>
</div>
</div>
</div>
</div>
<div class="box-address">
<p>?????a ??i???m l??m vi???c</p>
<div>
<div style="margin-bottom: 10px;color: #333"><?php echo "$jobcity"; ?> , <?php echo "$jobcountry"; ?></div>
</div>
</div>
<div class="job-data">
<h3>M?? t??? c??ng vi???c</h3>
<div class="content-tab"><p><?= "$jobdescription" ?></p>

<h3>Y??u c???u ???ng vi??n</h3>
<div class="content-tab"> <?php echo "$jobreq"; ?></p></div>
<h3>Quy???n l???i</h3>
<div class="content-tab"><p><?= "$jobrespo" ?></p>

<div class="apply-job-wrapper">
								<?php if ($user_online == true) {
            if ($jobexpired == true) {
                print '<button class="btn btn-topcv-primary btn-primary-hover btn-apply open-apply-modal"><i class="flaticon-line-icon-set-calendar"></i> H???t h???n n???p h??? s?? </button>';
            } else {
                if ($myrole == 'employee') {
                    print '<button'; ?> onclick="update(this.value)" <?php print ' value="' .
     $jobid .
     '" class="btn btn-primary btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-pencil"></i> ???ng tuy???n ngay</button>';
                } else {
                    print '<button class="btn btn-topcv-primary btn-primary-hover btn-apply open-apply-modal"><i class="flaticon-line-icon-set-padlock"></i> ????ng nh???p ????? ???ng tuy???n ngay</button>';
                }
            }
        } else {
            print '<button class="btn btn-topcv-primary btn-primary-hover btn-apply open-apply-modal"><i class="flaticon-line-icon-set-padlock"></i> ????ng nh???p ????? ???ng tuy???n ngay</button>';
        } ?>
								
								<p id="data"></p>

								</div>


<p class="dateline">H???n n???p h??? s??: <?php echo "$post_month"; ?> <?php echo "$post_date"; ?>, <?php echo "$post_year"; ?></p>
</div>
</div>
</div>
</div>
    </div>
    </div>
   

						
								
	<div class="tab-style-01 box-white">
								
									<ul  role="tablist">
										<li role="presentation" class="active" ><h4 class="box-title">C??c c??ng vi???c kh??c ?????n t??? <?php echo "$compname"; ?></h4></li>
									</ul>

									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="relatedJob1">
											<div class="tab-content-inner">
							<div class="recent-job-wrapper alt-stripe mr-0">
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
               "SELECT * FROM tbl_jobs WHERE company = '$compid' AND job_id != :jobid ORDER BY rand() LIMIT 5"
           );
           $stmt->bindParam(':jobid', $jobid);
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
               $jobtype = $row['type'];

               $jobtype = $row['type'];
               if ($jobtype == 'Freelance') {
                   $sta = '<div class="job-label label label-success">
									Freelance
									</div>';
               }
               if ($jobtype == 'Part-time') {
                   $sta = '<div class="job-label label label-danger">
									Part-time
									</div>';
               }
               if ($jobtype == 'Full-time') {
                   $sta = '<div class="job-label label label-warning">
									Full-time
									</div>';
               }
               ?>
																											<a href="explore-job.php?jobid=<?= $row[
                               'job_id'
                           ] ?>" class="recent-job-item clearfix">
														<div class="GridLex-grid-middle">
															<div class="GridLex-col-6_sm-12_xs-12">
																<div class="job-position">
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
																		<h4><?= $row['title'] ?></h4>
																		<p><?= "$compname" ?></p>
																	</div>
																</div>
															</div>
															<div class="GridLex-col-3_sm-8-xs-8_xss-12 mt-10-xss">
																<div class="job-location">
																	<i class="fa fa-map-marker text-primary"></i> <?= $row['country'] ?>
																</div>
															</div>
															<div class="GridLex-col-3_sm-4_xs-4_xss-12">
                                                             <?= "$sta" ?>
																<span class="font12 block spacing1 font400 text-center"> Due - <?= "$post_month" ?> <?= "$post_date" ?>, <?= "$post_year" ?></span>
															</div>
														</div>
													</a>
													<?php
           }
       } catch (PDOException $e) {
       }
       ?>
						



							
							</div>

											
											</div>
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