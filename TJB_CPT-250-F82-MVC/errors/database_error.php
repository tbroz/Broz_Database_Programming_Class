<?php
/*
-----------------------------------------------------------------------------------------------
Name:		database_error.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file is the error page that will show up if there is any errors with connecting
            to the database.

-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version 
-----------------------------------------------------------------------------------------------
*/

include 'view/header.php'; ?>

    <!-- Displays error message if issues connecting to database on database.php -->
<main>
    <h1>Database Error</h1>
    <p>There was an error connecting to the database</p>
    <p>Please make sure the database is installed as described in the textbook (See page 790 for reference)</p>
    <p>Please make sure MYSQL is running as described in chapter 1 (See page 24 for reference)</p>
    <p>Error message: <?php echo $error_message; ?></p>
</main>

<?php include 'view/footer.php'; ?>