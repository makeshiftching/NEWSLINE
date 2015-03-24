<?php
require_once('includes/init.php');
require_once(resolvePath("includes/header.php"));
//require_once('home.php');
$id= $_GET['id'];
$db = new DB();
$result = $db->query("select item_name,amount,description,price_per_unit,img_src,category from Items where item_id = $id");
//var_dump($result);
foreach ($result as $i => $arr) {
	$img = $arr["img_src"];
	$name = $arr["item_name"];
	$n = $arr["amount"];
	$desc = $arr["description"];
	$price = $arr["price_per_unit"];
	$cat = $arr["category"];
}

?>
<html>
<meta charset="utf-8">
<style>
	.jumbotron{
		padding-top: 15px;
		padding-bottom: 30px;
	}
</style>
<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-body">
		<h3><span class="label label-lg label-info">Item Description</span></h3>
		<div style="height:20px"></div>
		<table style="width:100%">
			<tr>
				<td style="width:150px"><img style="width:150px;height:auto" src="<?php echo resolveURL("uploads/$img"); ?>"></img> </td>
				<td style="vertical-align:top">
					<div style="margin-left:20px;font-size:18">
						<span><b>Item ID :</b> <?php echo $id; ?></span><br>
						<span><b>Item Name :</b> <?php echo $name; ?></span><br>
						<span><b>Price/Unit :</b> <?php echo $price; ?>&nbsp; <b>Bht</b></span><br>
						<span><b>Amount Available :</b> <?php echo $n ?>&nbsp; <b>piece</b></span><br>
						<span><b>Item Description :</b> <?php echo $desc; ?></span>
					</div>
				</td>
			</tr>
			<tr>
				<td >
				</td>
				<td>
					<?php
						$type = User::getUserType();
						if( $type == CLIENT )
						{
					?>
					<div style="text-align:right">
					<form method="POST" action="item_order.php" class="form-inline" role="form">
						<div class="form-group">
							<span style="margin-right:10px">Amount</span>
							<input style="width:100px;margin-right:10px" type="text" name="amount" class="form-control" value="1">	
						</div>
						<input name="cat" type="hidden" value="<?php echo $cat?>">
						<input name="item_id" type="hidden" value="<?php echo $id?>">
						<input name="item_name" type="hidden" value="<?php echo $name?>">
						<button type="submit" class="btn btn-md btn-success" style="align:right" >Order This</button>
						<a href="contact_seller.php?id=<?php echo $id; ?>"><span class="btn btn-md btn-warning" style="align:right">Contact Us</span></a>
					</form>
					</div>
					<?php  
						}
					else { 
					?>
					<div style="text-align:right">
						<a href="contact_seller.php?id=<?php echo $id; ?>"><span class="btn btn-md btn-warning" style="align:right">Contact Us</span></a>
						<a href="cat.php?cat=<?php echo $cat; ?>"><span class="btn btn-md btn-success" style="align:right">Back</span></a>
					</div>
					<?php
						} 
					?>
				</td>
			</tr>
		</table>
	</div>
</div>
</html>
