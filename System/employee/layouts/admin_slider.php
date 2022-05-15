								<div class="admin-sidebar">
									<div class="admin-user-item">
										<div class="image">	
										<?php 
											if ($myavatar == null) {
												print '<center><img class="img-circle autofit2" src="../images/default.jpg" title="'.$myfname.'" alt="image"  /></center>';
											} else {
												echo '<center><img class="img-circle autofit2" alt="image" title="'.$myfname.'"  src="data:image/jpeg;base64,'.base64_encode($myavatar).'"/></center>';	
											}
										?>
										</div>
										
										<br>
										
										<h4><?= "$myfname"; ?> <?= "$mylname"; ?></h4>
										<p class="user-role"><?= "$mytitle"; ?></p>
									</div>
									
									<!-- <div class="admin-user-action text-center">
										<a target="_blank" href="my_cv" class="btn btn-primary btn-sm btn-inverse">View my CV</a>
									</div> -->
									
									<ul class="admin-user-menu clearfix">
										<li  class="active">
											<a href="./"><i class="fa fa-user"></i>Hồ sơ</a>
										</li>

										<li class="">
											<a href="change-password.php"><i class="fa fa-key"></i>Thay đổi mật khẩu</a>
										</li>

										<li>
											<a href="qualifications.php"><i class="fa fa-trophy"></i>Trình độ chuyên môn</a>
										</li>

										<li>
											<a href="language.php"><i class="fa fa-language"></i>Trình độ ngôn ngữ</a>
										</li>

										<!-- <li>
											<a href="training.php"><i class="fa fa-gears"></i> Training và Hội thảo</a>
										</li> -->

										<!-- <li>
											<a href="referees.php"><i class="fa fa-users"></i>Referees</a>
										</li> -->

										<li>
											<a href="academic.php"><i class="fa fa-graduation-cap"></i>Trình độ học vấn</a>
										</li>

										<li>
											<a href="experience.php"><i class="fa fa-briefcase"></i>Kinh nghiệm làm việc</a>
										</li>

										<li>
											<a href="attachments.php"><i class="fa fa-folder-open"></i>Tệp đính kèm</a>
										</li>

										<li>
											<a href="applied-jobs.php"><i class="fa fa-bookmark"></i>Công việc đã ứng tuyển</a>
										</li>

										<li>
											<a href="../logout.php"><i class="fa fa-sign-out"></i>Đăng xuất</a>
										</li>
									</ul>
								</div>