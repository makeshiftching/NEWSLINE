<?php
require_once('includes/init.php');
require_once(resolvePath("includes/header.php"));
//require_once('home.php');
?>
<script>
	$("#menu_product").addClass("active");
</script>
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
	<div class="btn-group col-md-offset-2">
  			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
    		Select Category
    		<span class="caret"></span>
  			</button>
  			<ul class="dropdown-menu" role="menu">
    			<li><a href="cat.php?cat=1">Audios & Books</a></li>
    			<li><a href="cat.php?cat=2">Clothings & Shoes</a></li>
    			<li><a href="cat.php?cat=3">Electronics Devices</a></li>
    			<li><a href="cat.php?cat=4">Home & Accessories</a></li>
  			</ul>
	</div>
	<br></br>
<?php
$cat = $_GET['cat'];
$db = new DB();
$result = $db->query("select item_id,item_name,amount,description,price_per_unit,img_src from Items where category = $cat");
//var_dump($result);
	if( $cat == 1 ){ $t_name="Audios & Books";}
	else if( $cat == 2 ){ $t_name="Clothings & Shoes";}
	else if( $cat == 3 ){ $t_name="Electronics Devices";}
	else { $t_name="Home & Accessories";} 
//echo $t_name;
	foreach ($result as $i => $arr) {
		$id = $arr["item_id"];
		$name = $arr["item_name"];
		$desc = $arr["description"];
		$img = $arr["img_src"];
		$ppu = $arr["price_per_unit"];
		$n = $arr["amount"];
?>

		<div class="panel panel-default col-md-8 col-md-offset-2" >
			<div class="panel-body">
				<table>
				<tr>
				<td style="vertical-align:middle">
					<img style="width:100px;height:auto" src="<?php echo resolveURL("uploads/$img"); ?>"></img>
				</td>
				<td style="vertical-align:top">
					<div style="margin-left:20px">
						<a href="show.php?id=<?php echo $id; ?>"><span style="color:#555588;font-size:20px"><b><?php echo $name;?></b></span></a><br>
						<span >Item Name : <?php echo $name;?></span><br>
						<span>Price/Unit : <?php echo $ppu;?> Bht</span><br>
						<div style="height:10px"></div>
						<a href="show.php?id=<?php echo $id; ?>"><span class="label label-primary">Order/Description</span></a>
					</div>
				</td>
				</tr>
				</table>
			</div>
			
		</div>
<?php
	}
?>
</body>
</html>

