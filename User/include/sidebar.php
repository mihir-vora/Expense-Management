<div class="span3" style="margin: 1%">
					<div class="sidebar" >


<!-- <style type="text/css">
	.widget-menu:hover{
		background-color: red;
	}
</style> -->

<ul class="widget widget-menu unstyled" >
						<!-- <ul id="togglePages" class="collapse unstyled" >
										
								
									
								</ul> -->

							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog" style="color: white;"></i>
									<i class="icon-chevron-down pull-right" style="color: white;"></i><i class="icon-chevron-up pull-right" style="color: white;"></i>
									<b style="color: white;">Order Management</b>
								</a>
								<ul id="togglePages" class="collapse unstyled" >
									
								
									
								</ul>
							</li>
							<li>
										<a href="dashboard.php">
											<i class="icon-tasks"></i>
											<span>Dashboard</span>
 
<b class="label orange pull-right"></b>

										</a>
									</li>
							
							<li>
										<a href="todays-orders.php">
											<i class="icon-tasks"></i>
											<span>Today's Orders</span>
  <?php
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
 $result = mysqli_query($db,"SELECT * FROM `orders` where orderDate Between '$from' and '$to'");
$num_rows1 = mysqli_num_rows($result);
{
?>
<b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
<?php } ?>
										</a>
									</li>
								<li>
										<a href="pending-orders.php">
											<i class="icon-tasks"></i>
											Pending Orders
										<?php	
	$status='Delivered';									 
$ret = mysqli_query($db,"SELECT * FROM `orders` where orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right" style="background-color: #FF8C00;"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="delivered-orders.php">
											<i class="icon-inbox"></i>
											Delivered Orders
								<?php	
	$status='Delivered';									 
$rt = mysqli_query($db,"SELECT * FROM orders where orderStatus='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>

							<li>
								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Manage users
								</a>
							</li>

						</ul>



						<ul class="widget widget-menu unstyled">
                                <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Create Category </a></li>
                                <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Sub Category </a></li>
                                <li><a href="insert-product.php"><i class="menu-icon icon-paste"></i>Insert Product </a></li>
                                <li><a href="manage-products.php"><i class="menu-icon icon-table"></i>Manage Products </a></li>
                        
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>User Login Log </a></li>
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
