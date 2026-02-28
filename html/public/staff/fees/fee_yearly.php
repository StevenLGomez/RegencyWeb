
    <?php include ('../../../private/shared/fee_select.php'); ?>

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/fees/fee_index.php'); ?>">&laquo; Return to Menu</a>
    <hr />

    <?php
        // Create the selector object and fetch the set
        $fee_selector = new FeeSelector();
        $fee_set = $fee_selector->select_by_year($requested_year);
        $fee_count = $fee_selector->fee_count_for_year($requested_year);

        // Output heading information
        echo '<h3>Fee History for: ' . $requested_year . ' - Total entries found: ' . $fee_count . '</h3>';
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

            <?php while($fee = mysqli_fetch_assoc($fee_set)) { ?>

                <tr>
                    <td><?php echo htmlsc($fee['id']); ?></td>
                    <td><?php echo htmlsc($fee['fk_lot_id']); ?></td>
                    <td><?php echo htmlsc($fee['dt']); ?></td>
                    <td><?php echo htmlsc($fee['ck_no']); ?></td>
                    <td><?php echo htmlsc($fee['amount']); ?></td>
                    <td><?php echo htmlsc($fee['fk_deposit_id']); ?></td>
                    <td><?php echo htmlsc($fee['payee']); ?></td>
                    <td><?php echo htmlsc($fee['note']); ?></td>
                    <td><a class="action" href=
                        "<?php echo url_for('/staff/fees/fee_index.php?id=' . htmlsc($fee['id'] . '&edit_fee_button=1') ); ?>">
                        Edit</a></td>
                </tr>
            <?php } ?>

        </table>

        <?php mysqli_free_result($fee_set); ?>



