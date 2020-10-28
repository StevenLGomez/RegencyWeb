
<?php require_once('../../../private/initialize.php'); ?>

<?php $subject_set = find_all_expenses(); ?>

<?php $page_title = 'Manage Expenses'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Budget Categories</h2>

            <hr />
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/categories/index.php'); ?>">Create New Category</a>
            </div>
            <hr />

            <table class="list">
                <tr>
                    <th>Date</th>
                    <th>Payee</th>
                    <th>ck_no</th>
                    <th>Amount</th>
                    <th>Category</th>
                    <th>&nbsp</th>
                </tr>

                <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($subject['dt']); ?></td>
                        <td><?php echo htmlsc($subject['payee']); ?></td>
                        <td><?php echo htmlsc($subject['ck_no']); ?></td>
                        <td><?php echo htmlsc($subject['amount']); ?></td>
                        <td><?php echo htmlsc($subject['fk_cat_id']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlsc(u($subject['id']))); ?>">Edit</a></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($subject_set); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

