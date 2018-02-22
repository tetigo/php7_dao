<?php
	require_once('config.php');
	$dao = new DAO();
	$usuarios = $dao->select('select * from tb_usuarios where idusuario = :ID',array(':ID'=>5));
	echo json_encode($usuarios);
?>