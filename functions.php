<?php

	include 'dbcon.php';
	session_start();

    if(isset($_POST['create-query'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $place = mysqli_real_escape_string($conn, $_POST['place']);
        $soalan = mysqli_real_escape_string($conn, $_POST['soalan']);
        $status = "ongoing";
        
        $sql = "SELECT * FROM query where query_id = '$id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

            $msg = "The query id is duplicated.";
            $status = "danger";
            returnMsg($msg, $status);
            header('location:new-query.php');
            return;
        }
            
       
        $sql = "INSERT INTO query (query_id, name, location_id, question, status) VALUES ('$id', '$name', '$place', '$soalan', '$status')";

    
        $query_run = mysqli_query($conn, $sql);
               
        if ($query_run) {

            $msg = "Successfully create new query";
            $status = "success";
            returnMsg($msg, $status);
            header('location:new-query.php');
        
        } else {
            $msg = "Failed to create new query";
            $status = "danger";
            returnMsg($msg, $status);
            header('location: new-query.php');
        }

    }

    if(isset($_POST['update-query'])){

        $eid = mysqli_real_escape_string($conn, $_POST['eid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $place = mysqli_real_escape_string($conn, $_POST['place']);
        $soalan = mysqli_real_escape_string($conn, $_POST['soalan']);
      
        $sql = "UPDATE query SET location_id='$place', question='$soalan', name='$name'";
        $sql .= "WHERE id = '$eid'";

        if (mysqli_query($conn, $sql)) {

            $msg = "Successfully update query";
            $status = "success";
            returnMsg($msg, $status);
            header('location:edit-query.php?eid='.$eid);
        
        } else {
            $msg = "Failed to update query";
            $status = "danger";
            returnMsg($msg, $status);
            header('location: edit-query.php?eid='.$eid);
        }

    }

    if(isset($_POST['save-respone'])){

        $id = $_POST['idE'];
        $responsE = mysqli_real_escape_string($conn, $_POST['responsE']);
        $statusE = mysqli_real_escape_string($conn, $_POST['statusE']);
      
        $sql = "UPDATE query SET respond='$responsE', status='$statusE'";
        $sql .= "WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {

            $msg = "Successfully update query respone";
            $status = "success";
            returnMsg($msg, $status);
            header('location:respone.php?eid='.$id);
        
        } else {
            $msg = "Failed to update query respone";
            $status = "danger";
            returnMsg($msg, $status);
            header('location: respone.php?eid='.$id);
        }

    }


    if(isset($_POST['create-location'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $number_of_programme = mysqli_real_escape_string($conn, $_POST['number_of_programme']);            
       
        $sql = "INSERT INTO location (location_name, address, number_of_programme) VALUES ('$name', '$address', '$number_of_programme')";

        $query_run = mysqli_query($conn, $sql);
               
        if ($query_run) {

            $msg = "Successfully create new location info";
            $status = "success";
            returnMsg($msg, $status);
            header('location:new-place.php');
        
        } else {
            $msg = "Failed to create new location info";
            $status = "danger";
            returnMsg($msg, $status);
            header('location: new-place.php');
        }

    }

     if(isset($_POST['update-location'])){

        $eid = mysqli_real_escape_string($conn, $_POST['eid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $number_of_programme = mysqli_real_escape_string($conn, $_POST['number_of_programme']);
      
        $sql = "UPDATE location SET location_name = '$name', address='$address', number_of_programme='$number_of_programme'";

        $sql .= "WHERE location_id = '$eid'";



        if (mysqli_query($conn, $sql)) {

            $msg = "Successfully update location info";
            $status = "success";
            returnMsg($msg, $status);
            header('location:edit-place.php?eid='.$eid);
        
        } else {
            $msg = "Failed to update location info";
            $status = "danger";
            returnMsg($msg, $status);
            header('location: edit-place.php?eid='.$eid);
        }

    }


  
	function returnMsg($msgR, $statusR){

	   	$_SESSION['msg'] = $msgR;
	    $_SESSION['msg_status'] = $statusR;
	   
	}


	function returnMsgE($msgE, $statusE){

	   	$_SESSION['msgE'] = $msgE;
	    $_SESSION['msg_statusE'] = $statusE;
	   
	}



?>