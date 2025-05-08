
<?php 
      require_once('../../../private/initialize.php'); 
      require_once('../../../private/fee_functions.php');

      $page_title = 'Fee Management';

      $subject_set = find_all_fees();

?>

<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <?php echo '<h2>' . $page_title . '</h2>'; ?>



            <!-- Original content -->
            <hr />
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/fees/index.php'); ?>">Create New Fee Entry</a>
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
                    <th>Payee</th>
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
                        <td><?php echo htmlsc($subject['payee']); ?></td>
                        <td><?php echo htmlsc($subject['note']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlsc(urlencode($subject['id']))); ?>">Edit</a></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($subject_set); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

