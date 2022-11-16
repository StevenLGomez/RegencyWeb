<?php 
    require_once('../../private/initialize.php'); 

    // The following breaks the page
    // global $diagnostics_enabled
    // The $diagnostics_enabled settings work, but only on this page...

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

    <?php 
    if ($diagnostics_enabled) {
        echo '<hr />';
        echo 'WWW_ROOT: ' . WWW_ROOT . '<br />';
        echo '<hr />';
    }
    ?> 

    <div id="content">
        <div id="main-menu">
            <h2>Main Menu</h2>
            <fieldset>
                <ul>
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
                </ul>
            </fieldset>

            <form action="" method="post">
            <fieldset>
                Enable Diagnostic Output
                <input type="hidden" name="diagnostic_setting" value="0" />
                <input type="checkbox" name="diagnostic_setting" value="1"<?php if($diagnostics_enabled) {echo " checked";} ?> />
                <button type = "submit">Apply</button>
            </fieldset>
            </form>
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

