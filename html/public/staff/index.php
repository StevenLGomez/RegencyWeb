<?php 
    require_once('../../private/initialize.php'); 

    if (is_post_request()) {

        if (isset($_POST['diagnostic_setting'])) {

            if ( (int)$_POST['diagnostic_setting'] === 1 ) {
                $diagnostics_enabled = True;
            }
            else
            {
                $diagnostics_enabled = False;
            }
        }
    }

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
                        <a href="<?php echo url_for('/staff/fees/index.php'); ?>">Fees</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/owners/index.php'); ?>">Owners</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/assessments/index.php'); ?>">Assessments</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/staff/mail_merge/index.php'); ?>">Mail Merge</a>
                    </li>
                </ul>
            </fieldset>

            <form action="" method="post">
            <fieldset>
                Enable Diagnostic Output
                <input type="hidden" name="diagnostic_setting" value="0" />
                <button type = "submit">Apply</button>
            </fieldset>
            </form>
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

