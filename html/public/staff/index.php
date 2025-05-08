
<?php 
    require_once('../../private/initialize.php'); 
?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="main-menu">
            <h2>Main Menu</h2>
            <fieldset>
                <ul>
                    <li>
                        <a href="<?php echo url_for('/staff/lots/index.php'); ?>">Lots</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/categories/index.php'); ?>">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/deposits/index.php'); ?>">Deposits</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/expenses/index.php'); ?>">Expenses</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/fees/fee_index.php'); ?>">Fees</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/owners/owner_index.php'); ?>">Owners</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/assessments/index.php'); ?>">Assessments</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/mail_merge/index.php'); ?>">Mail Merge</a>
                    </li>
                </ul>
            </fieldset>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

