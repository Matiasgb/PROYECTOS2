<?php

const DB_HOST = "127.0.0.1";
const DB_NAME = "Proyecto2";
const DB_CHARSET = "utf8mb4";
const DB_USER = "root";
const DB_PASS = "";


const DB_DSN = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

try {
    
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch(Exception $e) {
    
    die("Error al conectar con MySQL. Motivo: " . $e->getMessage());
  
}
