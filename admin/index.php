<?php

	require('engine.php');

	if(!isset($_SESSION['admin'])){
		header("location:login.php");
	}else{
		header("location:main.php");
	}