<?php
/*
-----------------------------------------------------------------------------------------------
Name:		error.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file is the error page that will show up if there are any mishaps with any
            of the functions pertaining to adding, deleting, selecting, and updating the actors
            from the sakila database
-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version     
-----------------------------------------------------------------------------------------------
*/
include '../view/header.php'; ?>

    <!-- Displays error message if invalid input for forms on actor_add.php and actor_change.php -->
<main>
    <h1>Error</h1>
    <p><?php echo $error; ?></p>
</main>

<?php include '../view/footer.php'; ?>
 