<?php
/*
-----------------------------------------------------------------------------------------------
Name:		database.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file is used connect to the sakila database
-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version    
-----------------------------------------------------------------------------------------------
*/

   // Define database connection details for Sakila
   $dsn = 'mysql:host=localhost;dbname=sakila';
   $username = 'SCC';
   $password = 'SCC';

   try {
    $db = new PDO($dsn, $username, $password);
   } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
   }
 
?>