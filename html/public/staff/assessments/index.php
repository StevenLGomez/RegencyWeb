
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/assessment_functions.php'); ?>

<?php $assessment_set = find_all_assessments(); ?>

<?php $page_title = 'Assessment History'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Assessment History</h2>

            <table class="list">
                <tr>
                    <th>Year</th>
                    <th>Amount</th>
                    <th>Note</th>
                </tr>

                <?php while($assessment = mysqli_fetch_assoc($assessment_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($assessment['yr']); ?></td>
                        <td><?php echo htmlsc($assessment['amount']); ?></td>
                        <td><?php echo htmlsc($assessment['note']); ?></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($subject_set); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

