<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=benelusit_db", "benelusit_user", "hanq1w2e3a1s2d3");
     $db->query("SET CHARACTER SET utf8");
} catch ( PDOException $e ){
     print $e->getMessage();
}

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
