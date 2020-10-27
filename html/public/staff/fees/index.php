
<?php require_once('../../../private/initialize.php'); ?>

<?php $subject_set = find_all_fees(); ?>

<?php $page_title = 'Manage Fees'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="ecn-menu">
            <h2>Budget Categories</h2>

            <hr />
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/categories/index.php'); ?>">Create New Category</a>
            </div>
            <hr />

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Lot</th>
                    <th>Date</th>
                    <th>Check</th>
                    <th>amount</th>
                    <th>Deposit ID</th>
                    <th>Note</th>
                    <th>&nbsp</th>
                </tr>

                <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($subject['id']); ?></td>
                        <td><?php echo htmlsc($subject['fk_lot_id']); ?></td>
                        <td><?php echo htmlsc($subject['dt']); ?></td>
                        <td><?php echo htmlsc($subject['ck_no']); ?></td>
                        <td><?php echo htmlsc($subject['amount']); ?></td>
                        <td><?php echo htmlsc($subject['fk_deposit_id']); ?></td>
                        <td><?php echo htmlsc($subject['note']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlsc(u($subject['id']))); ?>">Edit</a></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($subject_set); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

