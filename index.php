<?php
	require_once('config.php');
	// $dao = new DAO();
	// $usuarios = $dao->select('select * from tb_usuarios where idusuario = :ID',array(':ID'=>5));
	// echo json_encode($usuarios);

	$root = new Usuario();
	$root->loadByID(8);	
	echo "<br>"."LOAD BY ID"."<br>";
	echo $root;
	echo "<hr>";

	echo "<pre>";
	echo "<br>"."GET LIST"."<br>";
	print_r( Usuario::getList());
	echo "</pre>";

	echo "<hr>";
	echo "<pre>";
	echo "<br>"."SEARCH"."<br>";
	print_r( Usuario::search('ser'));
	echo "</pre>";
	echo "<hr>";

	$usu = new Usuario();
	$usu->login('root',124);
	echo "<pre>";
	echo "<br>"."LOGIN"."<br>";	
	print_r($usu);
	echo "</pre>";
	echo $usu;

	$usu2 = new Usuario('tetigo','tetigo');
	$usu2->insert();
	echo "<hr>";
	echo "<br>"."INSERT"."<br>";	
	echo $usu2;
	echo "<hr>";
	echo "<hr>";
	
	echo "<br>"."UPDATE"."<br>";	
	$usu3 = new Usuario();
	$usu3->loadByID(14);
	$usu3->update('login_update', 'pass_update');
	echo $usu3;


?>