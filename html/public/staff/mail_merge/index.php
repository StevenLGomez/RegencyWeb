
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/owner_functions.php'); ?>

<?php $page_title = 'Mail Merge'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Mail Merge CSV Report</h2>

            <?php generate_mail_merge_csv(); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

