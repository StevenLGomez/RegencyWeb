
    <!-- ************************************************************ -->
    <!-- Owner list display sub-page - included when needed           -->
    <!-- ************************************************************ -->

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/owners/owner_index.php'); ?>">&laquo; Return to Menu</a>
    <hr />

    <?php if ($searching_history) 
    {
        $owner_query = find_owners_by_lot($lot_id); 
        $property_address = get_address_for_lot($lot_id);
        echo '<h3>Owner History for: Lot # ' . $lot_id . ', ' . $property_address . '</h3>';
    } /* if ($searching_history) */  ?>

    <?php if ($searching_rentals) 
    {
        $owner_query = search_rental_properties(); 
        echo '<h3>Rental Property Information</h3>';
    } /* if ($searching_rentals) */  ?>


    <?php // For each item in list, loop to display the relevant information ?>
    <?php while($owner = mysqli_fetch_assoc($owner_query)) { ?>

    <table class="list">

        <tr>
            <td><b>ID:</b> <?php echo $owner['id']; ?></td>
            <td><a class="action" href=
                "<?php echo url_for('staff/owners/owner_index.php?id=' . htmlsc($owner['id'] . '&view_owner_button=1') ); ?>">
                View</a></td>

            <td><a class="action" href=
                "<?php echo url_for('staff/owners/owner_index.php?id=' . htmlsc($owner['id'] . '&edit_owner_button=1') ); ?>">
                Edit</a></td>


        </tr>
        <tr>
            <td><?php echo htmlsc($owner['first']); ?>    </td>
            <td><?php echo htmlsc($owner['mi']); ?>       </td>
            <td><?php echo htmlsc($owner['last']); ?>     </td>
            <td><b>PH:</b><?php echo ' ' . htmlsc($owner['phone']); ?>     </td>
            <td><b>Email:</b><?php echo ' ' . htmlsc($owner['email']); ?>     </td>
        </tr>

        <?php // If a secondary owner exists (last_2 has length of at least 1 char), display it?> 
        <?php if (strlen($owner['last_2']) >= 1) { ?>
        <tr>
            <td><?php echo htmlsc($owner['first_2']); ?>    </td>
            <td><?php echo htmlsc($owner['mi_2']); ?>       </td>
            <td><?php echo htmlsc($owner['last_2']); ?>     </td>
            <td><b>PH:</b><?php echo ' ' . htmlsc($owner['phone_2']); ?>     </td>
            <td><b>Email:</b><?php echo ' ' . htmlsc($owner['email_2']); ?>     </td>
        </tr>
        <?php } /* Bottom of if statement */ ?>
        <?php // End of check for secondary owner ?>

        <?php if ($searching_rentals) {
            echo "<tr>\n";
            echo "<td>" . htmlsc($owner['address']) . "</td>\n";
            echo "<td>" . htmlsc($owner['city']) . "</td>\n";
            echo "<td>" . htmlsc($owner['state']) . "</td>\n";
            echo "<td>" . htmlsc($owner['zip']) . "</td>\n";
            echo "</tr>";
        } ?>

        <tr>
            <td><b>Purchased:</b><?php echo ' ' . htmlsc($owner['buy_date']); ?>     </td>
            <td><b>Current:&nbsp;</b><?php echo $owner['is_current'] == 1 ? 'Yes' : 'No'; ?></td>
        </tr>

        <tr>
            <td><b>Rental:&nbsp;</b><?php echo $owner['is_rental'] == 1 ? 'Yes' : 'No'; ?></td>
        </tr>

    </table>
    <hr /> <!-- Add a separator for each subtable -->

    <?php } /* Bottom of while loop */ ?>

    <?php mysqli_free_result($owner_query); ?>

    <!-- ============================================================ -->

