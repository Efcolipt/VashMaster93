<?php 
session_start();
	if (empty($_SESSION['tokenAdmin']) && empty($_SESSION['tokenGuest'])) {
		header("Location:auth.php");
		exit;
	}

	if (!empty($_SESSION['tokenGuest'])){
		header("Location:index.php");
		exit;
	}

require 'db.php';
$data =$_POST;
if(!empty($data['id']) && !empty($data['namePage'])){

	$id = $data['id']; 
	$id = (int) $id; 
	if (is_int($id)) {



	if ($data['namePage'] == 'portfolio') {

		$findId  = mysqli_query($link,'select count(*) FROM '.$datatablePortfolio.' WHERE id = '.$id.'') or die();
		$row = mysqli_fetch_row($findId);
		if ($row[0] > 0){
		    $query = mysqli_query($link, "DELETE FROM ".$datatablePortfolio." WHERE id = '".$id."'");
		
			if ($query) {
				echo "true"; 
				exit;
				mysqli_close($link);
			}else{
				echo "false";
				exit; 
				mysqli_close($link);
			}

		}else{
		    echo "false";
		    exit;
		    mysqli_close($link);
		}

		
	}


	if ($data['namePage'] == 'applications') {
		$findId  = mysqli_query($link,'select count(*) FROM '.$datatableContact.' WHERE id = '.$id.'') or die();
		$row = mysqli_fetch_row($findId);
		if ($row[0] > 0){
		    $query = mysqli_query($link, "DELETE FROM ".$datatableContact." WHERE id = '".$id."'");

			if ($query) {
				echo "true"; 
				exit;
				mysqli_close($link);
			}else{
				echo "false";
				exit;
				mysqli_close($link); 
			}

		}else{
		    echo "false";
		    exit;
		    mysqli_close($link);
		}

	}

	if ($data['namePage'] == 'testimonials') {
		$findId  = mysqli_query($link,'select count(*) FROM '.$datatableTestimonial.' WHERE id = '.$id.'') or die();
		$row = mysqli_fetch_row($findId);
		if ($row[0] > 0){
		    $query = mysqli_query($link, "DELETE FROM ".$datatableTestimonial." WHERE id = '".$id."'");

			if ($query) {
				echo "true"; 
				exit;
				mysqli_close($link);
			}else{
				echo "false";
				exit;
				mysqli_close($link); 
			}

		}else{
		    echo "false";
		    exit;
		    mysqli_close($link);
		}

	}

	if ($data['namePage'] == 'users') {
		$findId  = mysqli_query($link,'select count(*) FROM '.$datatablePerson.' WHERE id = '.$id.'') or die();
		$row = mysqli_fetch_row($findId);
			if ($row[0] > 0){
			   $query = mysqli_query($link, "DELETE FROM ".$datatablePerson." WHERE id = '".$id."'");
			if ($query) {
				echo "true"; 
				exit;
				mysqli_close($link);
			}else{
				echo "false";
				exit;
				mysqli_close($link); 
			}

		}else{
		    echo "false";
		    exit;
		    mysqli_close($link);
		}
	}
		


	}else{
		echo "false"; 
		exit;
		mysqli_close($link);
	}

}else{
	echo "false"; 
	exit;
	mysqli_close($link);
}


?>	