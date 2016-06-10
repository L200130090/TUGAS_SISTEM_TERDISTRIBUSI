<?php 
require_once("lib/nusoap.php");
$c = new nusoap_client("http://l/semester-6/sistme-terdistribusi/nusoap/rahmafitriwserver.php?wsdl", true);
($x = $c->getError()) ? print($x) : 0;//if shorthand
$h = $c->call("getInfo", array("name" => "rahmafw"));
if ($c->fault){
	die($c->fault);
}else{
	(! $c->getError()) OR die($c->getError());
	$re = (json_decode($h)); //convert result to stdObject
	if ($re){ //does the sting is a valid json string?
		print_r($re); //yes it is, then print it's stdObject structures
	}else{
		echo $h; //no it is not, so echo the result
	}
}
