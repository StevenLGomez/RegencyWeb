
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/lot_functions.php'); ?>

<?php $lot_set = find_all_lots(); ?>

<?php $page_title = 'Lot Info'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Lot Information</h2>

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Note</th>
                </tr>

                <?php while($lot = mysqli_fetch_assoc($lot_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($lot['id']); ?></td>
                        <td><?php echo htmlsc($lot['address']); ?></td>
                        <td><?php echo htmlsc($lot['city']); ?></td>
                        <td><?php echo htmlsc($lot['state']); ?></td>
                        <td><?php echo htmlsc($lot['zip']); ?></td>
                        <td><?php echo htmlsc($lot['note']); ?></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($subject_set); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

