
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="margin-top: 90%">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				

<a class="navbar-brand" href="dashboard.php"><span style="font-size: 15px;" class="b-c" ><img src="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" alt="logo" width="70px" style="margin-top: -30%;margin-right: -0.1%;" ></span><span style="font-size: 15px;color: white"></span></a>
				<ul class="nav navbar-top-links navbar-right">

					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						
		
		
		
					
						 <i class="fas fa-envelope fa-fw" ></i>
                               
					</a>
				

						<ul class="dropdown-menu dropdown-alerts" style="background-color: white; " >
<li>
			
										<p style="font-size:15px;color:black;">
											
											<b style="padding: 1px;"><strong><?php  echo $row['message'];?></strong>

										</p><p style="margin: 0.2px;"><small><?php  echo $row['NoteDate'];?></small></p></b>

<hr>


											
						
					
						</ul>
					</li>




<!-- ================================================================
 -->
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-user" style="font-size: 20px;color:;"></em>
					</a>

						<ul class="dropdown-menu dropdown-alerts" style="background-color: white; " >
<li>


											<p style="font-size: 15px;color:black; margin-left: 20px;"><?php  echo $row['username'];?></p>



											<p style="font-size: 15px;color:black; margin-left: 20px;"> <?php  echo $row['email'];?></p>


				
				</li>			
						
						<li class="divider"></li>

							<li><a href="user-profile.php">
								<div style="font-size: 15px;" ><em class="fa fa-user"></em> Account
									</div>
							</a></li>
							<li class="divider"></li>
							<li><a href="logout.php">
								<div style="font-size: 15px;"><em class="fa fa-power-off"></em> Logout
									</div>
							</a></li>
<!-- 							<li class="divider"></li>
 -->							<!-- <li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li> -->
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	
