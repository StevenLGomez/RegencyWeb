
    <!-- ************************************************************ -->
    <!-- Owner list display sub-page                                  -->
    <!-- ************************************************************ -->

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/owners/index.php'); ?>">&laquo; Return to Search</a>
    <hr />
    <?php echo "Owners with last name beginning with: " . "<b>" .$requested_name . "</b>"; ?>
    <hr />

    <?php if ($searching_owners) 
    {
        $view_existing_owner = True;
        $owner_search_query = find_owner_by_last($requested_name);
    } /* if ($searching_owners) */  ?>

    <!-- For each item in list, loop to display the relevant information -->
    <?php while($owner = mysqli_fetch_assoc($owner_search_query)) { ?>

    <table class="list">

        <tr>
            <td><b>ID:</b> <?php echo $owner['id']; ?></td>
            <td><a class="action" href="<?php echo url_for('staff/owners/index.php?id=' . htmlsc(urlencode($owner['$id']))); ?>">Vim</a></td>
            <td><a class="action" href="<?php echo url_for('staff/owners/index.php?id=' . '57'); ?>">View</a></td>
        </tr>
        <tr>
            <td><?php echo htmlsc($owner['first']); ?>    </td>
            <td><?php echo htmlsc($owner['mi']); ?>       </td>
            <td><?php echo htmlsc($owner['last']); ?>     </td>
            <td><b>PH:</b><?php echo ' ' . htmlsc($owner['phone']); ?>     </td>
            <td><b>Email:</b><?php echo ' ' . htmlsc($owner['email']); ?>     </td>
        </tr>

    </table>
    <hr /> <!-- Add a separator for each subtable -->

    <?php } /* Bottom of while loop */ ?>

    <?php mysqli_free_result($owner_search_query); ?>

    <!-- ============================================================ -->

