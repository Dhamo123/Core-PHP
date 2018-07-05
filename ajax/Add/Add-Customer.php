<?php include '../../core/int.php';
include('../../abeautifulsite/SimpleImage.php');

$img = new abeautifulsite\SimpleImage();

if(isset($_FILES["image"]["type"])) {

	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$dob = date('Y-m-d', strtotime($_POST['dob']));
	$address = $_POST['address'];
	$image = randNum().$_FILES["image"]["name"];
	$image_tmp = $_FILES["image"]["tmp_name"];
	$path = '../../dist/img/customer/'.$image;
	$img->load($image_tmp);
	$img->save($path);

	mysqli_query($con, "insert into customer (name, address, email, telephone, mobile, image, dob) values('$name', '$address', '$email', '$telephone', '$mobile', '$image', '$dob')");

} else {

	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$dob = date('Y-m-d', strtotime($_POST['dob']));
	$address = $_POST['address'];

	mysqli_query($con, "insert into customer (name, address, email, telephone, mobile, dob) values('$name', '$address', '$email', '$telephone', '$mobile', '$dob')");

}

?>