<?php 
    require_once('../../private/initialize.php'); 

    $post_requested = False;
    $toggled = False;

    if (is_post_request()) {
        $post_requested = True;

        if (isset($_POST['diagnostic_toggle'])) {
            $toggled = True;
        }
    }

?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <?php 
    if ($diagnostics_enabled) {
        echo '<hr />';
        echo 'WWW_ROOT: ' . WWW_ROOT . '<br />';
        echo url_for('stylesheets/staff.css'); 
        echo '<br />';
        echo 'SHARED_PATH: ' . SHARED_PATH ;
        echo '<br />';
        echo 'A post request was made: '; if ($post_requested) {echo 'True';} else { echo 'False';} echo '<br />'; 
        echo 'Toggle was posted: '; if ($toggled) {echo 'True';} else { echo 'False';} echo '<br />'; 
        echo '<hr />';
    }
    ?> 

    <div id="content">
        <div id="main-menu">
            <h2>Main Menu</h2>
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

            <form action="" method="post">
            <fieldset>
                Enable Diagnostic Output
                <input type="hidden" name="diagnostic_toggle" value="0" />
                <input type="checkbox" name="diagnostic_toggle" value="1"<?php if($diagnostics_enabled) {echo " checked";} ?> />
                <button type = "submit">Apply</button>
            </fieldset>
            </form>
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

