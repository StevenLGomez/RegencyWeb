

    <!-- ************************************************************ -->
    <!-- Owner list display sub-page - included when needed           -->
    <!-- ************************************************************ -->

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/fees/fee_index.php'); ?>">&laquo; Return to Menu</a>
    <hr />

    <?php
        $property_address = get_address_for_lot($lot_id);
        echo '<h3>Payment History for: Lot # ' . $lot_id . ', ' . $property_address . '</h3>';
    ?>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Lot</th>
                <th>Date</th>
                <th>Check</th>
                <th>amount</th>
                <th>Deposit ID</th>
                <th>Payee</th>
                <th>Note</th>
                <th>&nbsp</th>
            </tr>

            <?php $fee_set = find_fees_by_lot($lot_id); ?>
            <?php while($subject = mysqli_fetch_assoc($fee_set)) { ?>

                <tr>
                    <td><?php echo htmlsc($subject['id']); ?></td>
                    <td><?php echo htmlsc($subject['fk_lot_id']); ?></td>
                    <td><?php echo htmlsc($subject['dt']); ?></td>
                    <td><?php echo htmlsc($subject['ck_no']); ?></td>
                    <td><?php echo htmlsc($subject['amount']); ?></td>
                    <td><?php echo htmlsc($subject['fk_deposit_id']); ?></td>
                    <td><?php echo htmlsc($subject['payee']); ?></td>
                    <td><?php echo htmlsc($subject['note']); ?></td>
                    <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlsc(urlencode($subject['id']))); ?>">Edit</a></td>
                </tr>

            <?php } ?>

        </table>

        <?php mysqli_free_result($fee_set); ?>



