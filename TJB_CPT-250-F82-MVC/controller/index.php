<?php
/*
-----------------------------------------------------------------------------------------------
Name:		index.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file handles all the control functions for the web page and processes actions 
            such as listing actors, deleting existing actors, updating an actor, and adding
            a new actor. 
-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version 
TJB         2023-09-21      Added the add and delete function ability 
TJB         2023-09-22      Added the update function ability
TJB         2023-09-23      finished any comments that was not put in yet
-----------------------------------------------------------------------------------------------
*/

require('../model/database.php');
require('../model/actor_db.php');
 
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_actors';
    }
}

    /* Populates the table with data from the sakila database */
if ($action == 'list_actors') {
    $actors = get_all_actors();
    include('../view/actor_list.php');

    /* Allows the ability to delete actor or throw an error message */
} else if ($action == 'delete_actor') {
    $actor_id = filter_input(INPUT_POST, 'actor_id', 
            FILTER_VALIDATE_INT);
    if ($actor_id == NULL || $actor_id == FALSE) {
        $error = "Unable to delete actor.";
        include('../errors/error.php');
    } else { 
        delete_actor($actor_id);
        header("Location: .?action=list_actors");
    }

    /* Goes to the actor_add.php when clicked on */
} else if ($action == 'show_actor_add_form') {
    include('../view/actor_add.php');

    /* Allows the ability to add a new actor */
} else if ($action == 'add_actor') {
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');

        /* this allows for all letters in name to be capitalized like the 
        rest of the data from the sakila table */
    $first_name = strtoupper($first_name);
    $last_name = strtoupper($last_name);

        /* Throws an error if the data is invalid */
    if ($first_name == NULL || $last_name == NULL) {
      $error = "Invalid actor data. Please check all fields and try again.";
      include('../errors/error.php');
    } else {
        $last_update =  date('Y-m-d H:i:s');
        add_actor($first_name, $last_name, $last_update);
        
        header("Location: .?action=list_actors");
    }

    /* Goes to the actor_change.php when clicked on */
} else if ($action == 'show_update_actor_form') {
    $actors = get_all_actors(); 
    include('../view/actor_change.php');

    /* Allows the ability to update an existing actor */
} else if ($action == 'update_actor') {
    $actor_id = filter_input(INPUT_POST, 'actor_id', FILTER_VALIDATE_INT);
    $updated_first_name = filter_input(INPUT_POST, 'updated_first_name');
    $updated_last_name = filter_input(INPUT_POST, 'updated_last_name');

        /* this allows for all letters in name to be capitalized like the 
        rest of the data from the sakila table */
    $updated_first_name = strtoupper($updated_first_name);
    $updated_last_name = strtoupper($updated_last_name);

        /* Throws an error if the data is invalid */
    if ($actor_id == NULL || $actor_id == FALSE || $updated_first_name == NULL
        || $updated_last_name == NULL) {
        $error = "Invalid data. Please check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_actor($actor_id, $updated_first_name, $updated_last_name);

        header("Location: .?action=list_actors");

    }
}

?>