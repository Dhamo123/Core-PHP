<?php include '../../core/int.php';
include('../../abeautifulsite/SimpleImage.php');

$img = new abeautifulsite\SimpleImage();

if(isset($_FILES["image"]["type"])) {

	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$umobile = $_POST['umobile'];
	if(empty($mobile)) {
		$mobile = $umobile;
	} else {
		$mobile = $mobile;
	}
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$dob = date('Y-m-d', strtotime($_POST['dob']));
	$address = $_POST['address'];
	$id = $_POST['id'];
	$image = randNum().$_FILES["image"]["name"];
	$image_tmp = $_FILES["image"]["tmp_name"];
	$path = '../../dist/img/customer/'.$image;
	$img->load($image_tmp);
	$img->save($path);

	mysqli_query($con, "update customer set name = '$name', address = '$address', email = '$email', telephone = '$telephone', mobile = '$mobile', dob = '$dob', image = '$image' where customer_id = '$id'");

} else {

	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$umobile = $_POST['umobile'];
	if(empty($mobile)) {
		$mobile = $umobile;
	} else {
		$mobile = $mobile;
	}
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$dob = date('Y-m-d', strtotime($_POST['dob']));
	$address = $_POST['address'];
	$id = $_POST['id'];

	mysqli_query($con, "update customer set name = '$name', address = '$address', email = '$email', telephone = '$telephone', mobile = '$mobile', dob = '$dob' where customer_id = '$id'");

}

?>