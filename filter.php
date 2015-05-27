<?php
	require_once(dirname(__FILE__) . '/../../config.php');
	global $PAGE, $CFG, $OUTPUT, $DB;
	
	$filter = $_REQUEST['filter'];
	$selectData = $DB->get_records_sql("SELECT * FROM mdl_local_omegasync WHERE unidad_academica LIKE '%".$filter."%'");
	echo json_encode($selectData);
?>