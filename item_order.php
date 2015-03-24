<?php
require_once("includes/init.php");
require_once(resolvePath("includes/header.php"));

$user_id = User::getUser()['user_id'];
$send_addr = User::getUser()['send_addr'];
$full_name = User::getUser()['full_name'];
$credit_id = User::getUser()['credit_id'];
$amount = $_POST['amount'];
$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$cat = $_POST['cat'];
//echo "This id is".$item_id;
$db = new DB();
$result = $db->query("select amount from Items where item_id=$item_id");
foreach ($result as $i => $arr) {
	$n = $arr['amount'];
}

if( $amount > $n )
{
	//order more than amount avail
?>
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-body">
		<h3><span class="label label-lg label-info">Purchase Result</span></h3>
		<div style="font-size:18;margin-top:20px">
			<span><b>Status:</b> Failed : User must submit not more than <?php echo $n; ?> pieces</span><br>		
		</div>
		<br>
		<h3><a href="<?php echo resolveURL('show.php?id='.$item_id); ?>"><span class="label label-lg label-warning">Back</span></a></h3>
	</div>
	</div>

<?php	
}
else{
	if( $db->query("insert into Orders(user_id,item_id,amount,timestamp) values ($user_id,$item_id,$amount,now())") ){
		$result = $db->query("update Items set amount = $n-$amount where item_id = $item_id");
		$result2 = $db->query("select LAST_INSERT_ID()"); 
		foreach ($result2 as $i => $arr) {
			$order_id = $arr['LAST_INSERT_ID()'];
		}
		$result2 = $db->query("insert into Sending(send_id,send_status,date) values ($order_id,1,now())");
		//var_dump($result2);
?>
<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-body">
		<h3><span class="label label-lg label-info">Purchase Result</span></h3>
		<div style="font-size:18;margin-top:20px">
			<span><b>Status:</b> Success</span><br>	
			<span><b>Customer's Name:</b> <?php echo $full_name?></span><br>	
			<span><b>Address:</b> <?php echo $send_addr?></span><br>	
			<span><b>Credit Card Number:</b> <?php echo $credit_id?></span><br>	
			<span><b>Item Code:</b> <?php echo $item_id?></span><br>	
			<span><b>Item Name:</b> <?php echo $item_name?></span><br>
			<span><b>Amount:</b> <?php echo $amount?> <b>Unit(s)</b></span><br>
		</div>
		<h3><a href="cat.php?cat=<?php echo $cat ?>"><span class="label label-lg label-warning">Back</span></a></h3>
	</div>
</div>
<?php

	}else{
		echo "Fail";
	}
}
?>
