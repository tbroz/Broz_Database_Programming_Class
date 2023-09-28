<?php
/*
-----------------------------------------------------------------------------------------------
Name:		actor_list.php
Author:		Tiffany Broz
Date:		2023-09-20
Language:	PHP
Purpose:	This file displays a table of all the existing actors inside the sakila database

            
-----------------------------------------------------------------------------------------------
ChangeLog:
Who			When			What
----------- --------------- -------------------------------------------------------------------
TJB			2023-09-20		Original Version 
TJB         2023-09-21      added ability to delete from table
-----------------------------------------------------------------------------------------------
*/
include '../view/header.php'; ?>
<main>
    <h1 class="nav_h1">Add/Update Actor</h1>
        <nav>
            <ul>
                    <!-- links to go to actor_add.php and actor_change.php -->
                <li><a href="index.php?action=show_actor_add_form">Add New Actor</a></li>
                <li><a href="index.php?action=show_update_actor_form">Update Existing Actor</a></li>
            </ul>
        </nav>           
    

    <section>
            
        <h1 class="table_h1">List of Actors</h1>

            <!-- display a table of actors -->
        <div class="table_div">
            <table>
                <tr>
                    <th>Actor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Last Updated</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($actors as $actor) : ?>
                <tr>
                        <!-- data populated to table from sakila database -->
                    <td><?php echo $actor['actor_id']; ?></td>
                    <td><?php echo $actor['first_name']; ?></td>
                    <td><?php echo $actor['last_name']; ?></td>
                    <td><?php echo $actor['last_update']; ?></td>
                    
                        <!-- delete function -->
                    <td><form action="." method="post">
                        <input type="hidden" name="action"
                            value="delete_actor">
                        <input type="hidden" name="actor_id"
                            value="<?php echo $actor['actor_id']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>