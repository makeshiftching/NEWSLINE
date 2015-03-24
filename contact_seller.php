<?php
require_once('includes/init.php');
require_once(resolvePath("includes/header.php"));
//require_once('home.php');
$id= $_GET['id']; //item_id
$db = new DB();
$result = $db->query("select user_id,category from Items where item_id = $id");
foreach ($result as $i => $arr) {
		$uid = $arr["user_id"];
		$cat = $arr["category"];
}
$result = $db->query("select contact_no from Sellers where user_id=$uid");
foreach ($result as $i => $arr) {
		$contact_no = $arr["contact_no"];
}

$result = $db->query("select full_name from Users where user_id=$uid");
foreach ($result as $i => $arr) {
		$name = $arr["full_name"];
}
?>

	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-body">
		<h3><span class="label label-lg label-info">Contact Seller</span></h3>
		<div style="height:20px"></div>
		<span style="font-size:21px"><b>Seller's Name:</b> <?php echo $name; ?></span><br>
		<span style="font-size:21px"><b>Seller's Contact Number:</b> <?php echo $contact_no; ?></span><br>
		<div style="text-align:right">
			<a href="cat.php?cat=<?php echo $cat; ?>"><span class="btn btn-md btn-success" style="align:right">Back</span></a>
		</div>
	</div>
	</div>