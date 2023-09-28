<?php
/*
-----------------------------------------------------------------------------------------------
Name:		actor_change.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file is the form that will allow you to update an existing actor record from 
            the sakila database

            
-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version 
TJB         2023-09-22      Added the form to be able to update the actor names
-----------------------------------------------------------------------------------------------
*/

include '../view/header.php';
?>

<main>
    <h1 class="form_h1">Update Actor Information</h1>

        <form action="." method="post" id="update_actor_form">
            <input type="hidden" name="action" value="update_actor">

                <!-- Gives a drop down menu to populate the actor name to be updateed 
                to give a more user friendly experience when trying to update
                the first and last name of an actor from the sakila database table -->    
            <div class="form-group">
                <label>Select Actor to Update</label>
                <select name="actor_id">
                    <?php foreach($actors as $actor) : ?>
                        <option value="<?php echo $actor['actor_id']; ?>">
                            <?php echo $actor['first_name'] . ' ' . $actor['last_name']; ?>
                            </option>
                    <?php endforeach; ?>
                </select>
                <br>
            </div>

                <!-- First name input -->
            <div class="form-group">
                <label>Updated First Name:</label>
                <input type="text" name="updated_first_name"/>
                <br>
            </div>
                <!-- Last name input -->
            <div class="form-group">
                <label>Updated Last Name:</label>
                <input type="text" name="updated_last_name" /> 
                <br>
            </div>
                
                <!-- Last name input -->
            <input type="submit" value="Update Actor">
        </form>    
</main>    
<?php include '../view/footer.php'; ?>