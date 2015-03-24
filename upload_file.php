<?php
header('Location: create_item.php');
require_once("includes/init.php");

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

$item_name = $_POST['db_cp_item_name'];
$cat = $_POST['db_cp_item_cat'];
$price = $_POST['db_cp_item_price'];
$n = $_POST['db_cp_item_amount'];
$desc = $_POST['db_cp_item_desc'];
$img_src = $_FILES['file']['name'];
$user_id = $_POST['user_id'];

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
      //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
      //echo "Type: " . $_FILES["file"]["type"] . "<br>";
      //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
      //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

      if (file_exists(resolvePath("uploads/") . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
      else
      {
          $db = new DB();
          $result = $db->query("insert into Items (user_id,item_name,description,amount,price_per_unit,category,img_src) 
            values ('$user_id','$item_name','$desc','$n','$price','$cat','$img_src')");

          move_uploaded_file($_FILES["file"]["tmp_name"],
          resolvePath("uploads/") . $_FILES["file"]["name"]);
          //echo "Stored in: " . "uploads/" . $_FILES["file"]["name"];
          
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>