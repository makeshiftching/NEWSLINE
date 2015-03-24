<?php
require_once('includes/init.php');
require_once(resolvePath("includes/header.php"));
//require_once('home.php');
?>
<html>
<meta charset="utf-8">
<style>
	.jumbotron{
		padding-top: 15px;
		padding-bottom: 30px;
	}
	.ching{
		font-size: 20px;
		background-color: #ffffcc;
		font-style: normal;
		border-radius:  15px;
	}
</style>
<body> 
	
	<br></br>
<?php
$u_id = User::getUser()['user_id'];
$db = new DB();
$result = $db->query("select order_id from Orders INNER JOIN Items ON Orders.item_id = Items.item_id AND Items.user_id = $u_id");
//var_dump($result);
//echo $t_name;
?>

		<div class="panel panel-default col-md-8 col-md-offset-2" >
			<div class="panel-body">
				<table border="1">
					<tr>
						<th style="width:100px; text-align:center">Send ID</th>
						<th style="width:200px; text-align:center">Item Name</th>
						<th style="width:80px; text-align:center">Amount</th>
						<th style="width:200px; text-align:center">Reciever's Addr</th>
						<th style="width:100px; text-align:center">Status</th>
						<th style="width:100px; text-align:center">Edit</th>
					</tr>
						<?php
						foreach ($result as $i => $arr) {
							$order_id = $arr["order_id"];
							$result2 = $db->query("select item_id,amount,user_id from Orders where order_id=$order_id");
							foreach ($result2 as $j => $arr2) {
								$item_id = $arr2['item_id'];
								$amount = $arr2['amount'];
								$user_id = $arr2['user_id'];
							}
						?>
					<tr>
						<th style="text-align:center"><?php echo $order_id; ?></th>
						<th style="text-align:center"><?php 
								$getitem = $db->query("select item_name from Items where item_id = $item_id");
								foreach ($getitem as $k => $arr3) {
									$item_name = $arr3['item_name'];
								}
								echo $item_name; 
							?>
						</th>
						<th style="text-align:center"><?php echo $amount; ?></th>
						<th style="text-align:center"><?php 
								$getaddr = $db->query("select send_addr from Clients where user_id = $user_id");
								foreach ($getaddr as $k => $arr3) {
									$send_addr = $arr3['send_addr'];
								}
								echo $send_addr; 
							?>
						</th>
						<th style="text-align:center"><?php $getstatus = $db->query("select send_status,date from Sending where send_id = $order_id"); 
								foreach ($getstatus as $k => $arr3) {
								$send_status = $arr3['send_status'];
								$day = $arr3['date'];
							}
							//echo $send_status;
							if( $send_status == 1 ){ echo "Packaging";}
							else if( $send_status == 2 ){ echo "Shipping";}
							else if( $send_status == 3 ){ echo "At Local Post Office";}
							else if( $send_status == 4 ){ echo "Arrived";}
							?>
						</th>
						<th style="text-align:center">
							<?php if ($send_status < 4) { ?>
							<form action="send_item.php" method="POST">
								<input type="hidden" value="<?php echo $order_id; ?>" name="send_id"></input>
								Last modified: <br><?php echo $day; ?>
									<select name="status" style="width:100px">
									<?php if ($send_status < 1) { ?>
										<option value="1">Packaging</option>
									<?php } 
										  if($send_status < 2){ ?>
										<option value="2">Shipping</option>
									<?php } 
										  if($send_status < 3){ ?>
										<option value="3">At Local Post Office</option>
									<?php }
										  if($send_status < 4){ ?>
										<option value="4">Arrived</option>
									<?php } ?>
									</select>
									<input type="submit" value="Edit"></input>
							</form>
							<?php }else{ ?>
								Already Arrived!
							<?php } ?>
						</th>
					</tr>
					<?php 
						}
					?>
				</table>
			</div>
			
		</div>
</body>
</html>
