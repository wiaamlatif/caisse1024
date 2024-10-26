<?php

$pdo = new PDO("mysql:host=localhost;dbname=caisse1024","root","root");

// 
var_dump($pdo ->lastInsertId());