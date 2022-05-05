<?php require_once('../../../private/initialize.php'); ?>

<?php $subject_set = find_all_categories(); ?>

<?php $page_title = 'Budget Categories'; ?>
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
                    <th>ID</th>
                    <th>Category</th>
                    <th>&nbsp</th>
                    <th>&nbsp</th>
                    <th>&nbsp</th>
                </tr>

                <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($subject['id']); ?></td>
                        <td><?php echo htmlsc($subject['name']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlsc(urlencode($subject['id']))); ?>">Edit</a></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($subject_set); ?>

        </div>
    </div>


<?php include(SHARED_PATH . '/footer.php'); ?>

