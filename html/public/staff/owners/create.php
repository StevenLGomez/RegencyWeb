<?php 
    require_once('../../../private/initialize.php');
?>

<!-- Show diagnostic information -->
<?php
if ( $diagnostics_enabled) {
   echo '<hr />';
   echo '<div>';

   echo 'Diagnostics placeholder';

   echo '</div>';
   echo '<hr />';
   } ?>
<!-- *************************** -->


    <!-- Assign page title (used in header) & include header -->
    <?php $page_title = 'Create New Owner'; ?>
    <?php include(SHARED_PATH . '/header.php'); ?>

        <div id="content">
            <div id="regency-menu">
                <h2>Create New Owner</h2>

            <hr />
            <h3>Primary Owner</h3>
            <form action="<?php echo ''; ?>" method="post">
                <dl>
                    <dt>First</dt>
                    <dd><input type="text" name ="menu_name" value="<?php echo 'Abraham'; ?>" /> </dd>
                </dl>
                <dl>
                    <dt>Middle</dt>
                    <dd><input type="text" name ="menu_name" value="<?php echo 'Bob'; ?>" /> </dd>
                </dl>
                <dl>
                    <dt>Last</dt>
                    <dd><input type="text" name ="menu_name" value="<?php echo 'Lincoln'; ?>" /> </dd>
                </dl>

            <h3>Secondary Owner</h3>
                <dl>
                    <dt>First</dt>
                    <dd><input type="text" name ="menu_name" value="<?php echo 'Amelia'; ?>" /> </dd>
                </dl>
                <dl>
                    <dt>Middle</dt>
                    <dd><input type="text" name ="menu_name" value="<?php echo 'J'; ?>" /> </dd>
                </dl>
                <dl>
                    <dt>Last</dt>
                    <dd><input type="text" name ="menu_name" value="<?php echo 'Earhardt'; ?>" /> </dd>
                </dl>

            <hr />
            <dl>
                <dt>Closing Date</dt>
                <dd><input type="text" name ="menu_name" value="<?php echo '20210722'; ?>" /> </dd>
            </dl>

            <dl>
                <dt>Lot ID</dt>
                <dd><input type="integer" name ="menu_name" value="<?php echo '25'; ?>" /> </dd>
            </dl>

            <dl>
                <dt>Current Owner?</dt>
                <dd><input type="checkbox" name ="menu_name" value="checked" /> </dd>
            </dl>

            <hr />
            <h3>Address</h3>
            <dl>
                <dt>Same as lot?</dt>
                <dd><input type="checkbox" name ="menu_name" value="checked" /> </dd>
            </dl>

            <dl>
                <dt>City</dt>
                <dd><input type="text" name ="menu_name" value="<?php echo 'Saint Peters'; ?>" /> </dd>
            </dl>

            <dl>
                <dt>State</dt>
                <dd><input type="text" name ="menu_name" value="<?php echo 'Missouri'; ?>" /> </dd>
            </dl>

            <dl>
                <dt>Zip</dt>
                <dd><input type="text" name ="menu_name" value="<?php echo '63303'; ?>" /> </dd>
            </dl>

            <div id="operations">
                <input type="submit" value="Create New Owner" />
            </div>

            </form>


        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>


