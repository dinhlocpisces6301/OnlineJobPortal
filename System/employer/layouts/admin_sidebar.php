                                <div class="admin-sidebar">
									<div class="admin-user-item for-employer">
										<div class="image">
										<?php
											if ($logo == null) {
													print '<center>Company Logo Here</center>';
													} else {
														echo '<center><img alt="image" title="' .$compname. '" width="180" height="100" src="data:image/jpeg;base64,' . base64_encode($logo) . '"/></center>';
													} ?>
												<br>
											</div>
											<h4><?= "$compname"; ?></h4>
										</div>
									
										<div class="admin-user-action text-center">
											<a href="post-job.php" class="btn btn-primary btn-sm btn-inverse">Đăng tuyển</a>
										</div>
									
										<ul class="admin-user-menu clearfix">
											<li  class="active">
												<a href="./"><i class="fa fa-user"></i> Hồ Sơ</a>
											</li>

											<li class="">
												<a href="change-password.php"><i class="fa fa-key"></i> Đổi mật khẩu</a>
											</li>
			
											<li>
												<a href="../company.php?ref=<?= "$myid"; ?>"><i class="fa fa-briefcase"></i> Tổng quan công ty</a>
											</li>
										
											<li>
												<a href="my-jobs.php"><i class="fa fa-bookmark"></i> Công việc đã đăng</a>
											</li>

											<li>
												<a href="../logout.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
											</li>
										</ul>
									</div>
								</div>