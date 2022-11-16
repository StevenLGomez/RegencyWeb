
    <!-- ************************************************************ -->
    <!-- Owner list display sub-page - included when needed           -->
    <!-- ************************************************************ -->

    <?php if ($searching_history) 
    {
        $owner_query = find_owners_by_lot($lot_id); 
        echo '<h3>Owner History for Lot: ' . $lot_id . '</h3>';
    } /* if ($searching_history) */  ?>

    <?php if ($searching_rental_owners) 
    {
        $owner_query = search_renting_owners(); 
        echo '<h3>Rental Property Information</h3>';
    } /* if ($searching_rental_owners) */  ?>

    <table class="list">
        <tr>
            <th>First</th>
            <th>MI</th>
            <th>Last</th>
            <th>Buy Date</th>
            <th>Owner Address</th>
            <th>Current</th>
            <th>Rental</th>
        </tr>

        <?php while($owner = mysqli_fetch_assoc($owner_query)) { ?>
        <tr>
            <td><?php echo htmlsc($owner['first']); ?>    </td>
            <td><?php echo htmlsc($owner['mi']); ?>       </td>
            <td><?php echo htmlsc($owner['last']); ?>     </td>
            <td><?php echo htmlsc($owner['buy_date']); ?>     </td>
            <td><?php echo htmlsc($owner['address']); ?>  </td>
            <td><?php echo $owner['is_current'] == 1 ? 'Yes' : 'No'; ?></td>
            <td><?php echo $owner['is_rental'] == 1 ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php } /* Bottom of while loop */ ?>

    </table>
    <?php mysqli_free_result($owner_query); ?>

    <!-- ============================================================ -->

