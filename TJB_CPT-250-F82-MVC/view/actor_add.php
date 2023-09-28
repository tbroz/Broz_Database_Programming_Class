<?php
/*
-----------------------------------------------------------------------------------------------
Name:		actor_add.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file is the form that will allow you to add a new actor record to the sakila
            database

            
-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version 
TJB         2023-09-21      Added the form to be able to add a new actor to the sakila database
-----------------------------------------------------------------------------------------------
*/
include '../view/header.php'; ?>
<main>
    <h1 class="form_h1">Add a New Actor</h1>
    <form action="." method="post" id="add_actor_form">
        <input type="hidden" name="action" value="add_actor">

            <!-- First name input -->
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="first_name" />
            <br>
        </div>

            <!-- Last name input -->
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="last_name" />
            <br>
        </div>

            <!-- Submit button -->
        <label>&nbsp;</label>
        <input type="submit" value="Add Actor" />

</main>
<?php include '../view/footer.php'; ?>