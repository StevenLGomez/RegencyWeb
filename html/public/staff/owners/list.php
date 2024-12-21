
    <!-- ************************************************************ -->
    <!-- Owner list display sub-page - included when needed           -->
    <!-- ************************************************************ -->

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/owners/index.php'); ?>">&laquo; Return to Search</a>
    <hr />

    <?php if ($searching_history) 
    {
        $owner_query = find_owners_by_lot($lot_id); 
        $property_address = get_address_for_lot($lot_id);
        echo '<h3>Owner History for: Lot # ' . $lot_id . ', ' . $property_address . '</h3>';
    } /* if ($searching_history) */  ?>

    <?php if ($searching_rental_owners) 
    {
        $owner_query = search_renting_owners(); 
        echo '<h3>Rental Property Information</h3>';
    } /* if ($searching_rental_owners) */  ?>


    <!-- For each item in list, loop to display the relevant information -->
    <?php while($owner = mysqli_fetch_assoc($owner_query)) { ?>

    <table class="list">

        <tr>
            <td><b>ID:</b> <?php echo $owner['id']; ?></td>
        </tr>
        <tr>
            <td><?php echo htmlsc($owner['first']); ?>    </td>
            <td><?php echo htmlsc($owner['mi']); ?>       </td>
            <td><?php echo htmlsc($owner['last']); ?>     </td>
            <td><b>PH:</b><?php echo ' ' . htmlsc($owner['phone']); ?>     </td>
            <td><b>Email:</b><?php echo ' ' . htmlsc($owner['email']); ?>     </td>
        </tr>

        <!-- If a secondary owner has been entered (last_2 has length of at least 1 char), display it  -->
        <?php if (strlen($owner['last_2']) >= 1) { ?>
        <tr>
            <td><?php echo htmlsc($owner['first_2']); ?>    </td>
            <td><?php echo htmlsc($owner['mi_2']); ?>       </td>
            <td><?php echo htmlsc($owner['last_2']); ?>     </td>
            <td><b>PH:</b><?php echo ' ' . htmlsc($owner['phone_2']); ?>     </td>
            <td><b>Email:</b><?php echo ' ' . htmlsc($owner['email_2']); ?>     </td>
        </tr>
        <?php } /* Bottom of if statement */ ?>
        <!-- End of check for secondary owner -->

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

