<?php include '../../core/int.php';
$data = array();
$id = $_POST['id'];
$get = mysqli_query($con, "select customer_id, name, address, email, telephone, mobile, image, dob from customer where customer_id = '$id'");
while ($show = mysqli_fetch_array($get)) {
	$data = array(
			'customer_id' => $show['customer_id'],
			'name' => $show['name'],
			'mobile' => $show['mobile'],
			'address' => $show['address'],
			'email' => $show['email'],
			'telephone' => $show['telephone'],
			'image' => $show['image'],
			'dob' => date('d-m-Y', strtotime($show['dob']))
			);
}
echo json_encode($data);
?>