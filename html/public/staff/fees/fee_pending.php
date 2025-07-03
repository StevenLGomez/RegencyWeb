


    <!-- ************************************************************ -->
    <!-- Create & display list of UNdeposited fee entries             -->
    <!-- ************************************************************ -->

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/fees/fee_index.php'); ?>">&laquo; Return to Menu</a>
    <hr />

    <div id="content">
        <div id=""regency-menu">

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

            <?php $undeposited_set = find_undeposited_fees(); ?>
            <?php while($undeposited_list = mysqli_fetch_assoc($undeposited_set)) { ?>

                <tr>
                    <td><?php echo htmlsc($undeposited_list['id']); ?></td>
                    <td><?php echo htmlsc($undeposited_list['fk_lot_id']); ?></td>
                    <td><?php echo htmlsc($undeposited_list['dt']); ?></td>
                    <td><?php echo htmlsc($undeposited_list['ck_no']); ?></td>
                    <td><?php echo htmlsc($undeposited_list['amount']); ?></td>
                    <td><?php echo htmlsc($undeposited_list['fk_deposit_id']); ?></td>
                    <td><?php echo htmlsc($undeposited_list['payee']); ?></td>
                    <td><?php echo htmlsc($undeposited_list['note']); ?></td>
                    <td><a class="action" href="<?php // echo url_for('/staff/subjects/show.php?id=' . htmlsc(urlencode($subject['id']))); ?>">Edit</a></td>
                </tr>

            <?php } ?>
        </table>

        <?php mysqli_free_result($undeposited_set); ?>

        </div>
    </div>


