<?php 
require_once('../../config/app.config.php');

$nid = $_GET['nid'];
$result = pg_query($db, "DELETE FROM tbl_campus WHERE nid=$nid");

if($result){
    header('location: home.admin.php');
}


?>