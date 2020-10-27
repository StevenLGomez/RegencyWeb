
<?php require_once('../../../private/initialize.php'); ?>

<?php $subject_set = find_all_owners(); ?>

<?php $page_title = 'Manage Owners'; ?>
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
                    <th>address</th>
                    <th>city</th>
                    <th>state</th>
                    <th>last</th>
                    <th>first</th>
                    <th>mi</th>
                    <th>&nbsp</th>
                </tr>

                <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($subject['id']); ?></td>
                        <td><?php echo htmlsc($subject['address']); ?></td>
                        <td><?php echo htmlsc($subject['city']); ?></td>
                        <td><?php echo htmlsc($subject['state']); ?></td>
                        <td><?php echo htmlsc($subject['last']); ?></td>
                        <td><?php echo htmlsc($subject['first']); ?></td>
                        <td><?php echo htmlsc($subject['mi']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlsc(u($subject['id']))); ?>">Edit</a></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($subject_set); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

