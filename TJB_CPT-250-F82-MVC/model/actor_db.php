<?php
/*
-----------------------------------------------------------------------------------------------
Name:		actor_db.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file is used create the functions to be used on my web page. We will get all
            the fields/rows from actor table and get fields/rows for specific actor record. This
            file also adds the functions to add, update, and delete records in the database.

-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version 
TJB         2023-09-21      Added the add_actor function, added the delete_actor function
TJB         2023-09-22      Added the update_actor function 
-----------------------------------------------------------------------------------------------
*/


    // this function grabs all the actors from the sakila database
function get_all_actors() {
    global $db;
    $query = 'SELECT * FROM actor';
    $statement = $db->prepare($query);
    $statement->execute();
    $all_actors = $statement->fetchAll();
    $statement->closeCursor();
    return $all_actors;
}

    // this function grabs a single specific actor
function get_actor_fields($actor_id, $first_name, $last_name, $last_update) {
    global $db;
    $query = 'SELECT * FROM actor 
                WHERE actor_id = :actor_id
                AND first_name = :first_name
                AND last_name = :last_name 
                AND last_update = :last_update';
    $statement = $db->prepare($query);
    $statement->bindValue(":actor_id", $actor_id);
    $statement->bindValue(":first_name", $first_name);
    $statement->bindValue(":last_name", $last_name);
    $statement->bindValue(":last_update", $last_update);
    $actor = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $actor;
}

    // this function adds an actor to the sakila database
function add_actor($first_name, $last_name) {
    global $db;
    $last_update = date('Y-m-d H:i:s');
    $query = 'INSERT INTO actor 
                (first_name, last_name, last_update)
              VALUES
                (:first_name, :last_name, :last_update)';
    $statement = $db->prepare($query);
    $statement->bindValue(":first_name", $first_name);
    $statement->bindValue(":last_name", $last_name);
    $statement->bindValue(":last_update", $last_update);
    $statement->execute();
    $statement->closeCursor();
}

    // this function deletes an actor from the sakila database
function delete_actor($actor_id) {
    global $db;
    $query = 'DELETE FROM actor
              WHERE actor_id = :actor_id';
     $statement = $db->prepare($query);
     $statement->bindValue(":actor_id", $actor_id);
     $statement->execute();
     $statement->closeCursor();
}

    // this function updates the first and last name of an actor from the sakila database
function update_actor($actor_id, $updated_first_name, $updated_last_name) {
    global $db;
    $query = 'UPDATE actor
              SET first_name  =:first_name, last_name = :last_name
              WHERE actor_id = :actor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":actor_id", $actor_id);    
    $statement->bindValue(":first_name", $updated_first_name);
    $statement->bindValue(":last_name", $updated_last_name);
    $statement->execute();
    $statement->closeCursor();
}


?>