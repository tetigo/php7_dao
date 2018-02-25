<?php
	require_once('config.php');
	// $dao = new DAO();
	// $usuarios = $dao->select('select * from tb_usuarios where idusuario = :ID',array(':ID'=>5));
	// echo json_encode($usuarios);

	$root = new Usuario();
	$root->loadByID(8);	
	echo $root;
	echo "<hr>";
	echo "<pre>";
	print_r( Usuario::getList());
	echo "</pre>";
	echo "<hr>";
	echo "<pre>";
	print_r( Usuario::search('ser'));
	echo "</pre>";
	echo "<hr>";
	$usu = new Usuario();
	$usu->login('root',125);
	echo "<pre>";
	print_r($usu);
	echo "</pre>";
	echo $usu;


?>