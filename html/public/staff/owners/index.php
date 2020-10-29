
<?php 
    require_once('../../../private/initialize.php');

    $is_submit = 'No';
    $has_lot = 'No';

    if (is_post_request())
    {
        if (isset($_POST['submit']))
        {
            $is_submit = 'Yes';
        }

        if (isset($_POST['lot']))
        {
            $lot_id = $_POST['lot'];
            $has_lot = 'Yes';
        }
        else
        {
        }
    }
    else
    {
    }

    $lot_set = find_all_lots();

?>

<!-- Assign page title (used in header) & include header -->
<?php $page_title = 'Manage Owners'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner History Management</h2>
            <hr />
                <?php echo 'Is Submit :' . $is_submit . '<br />'; ?>
                <?php echo 'Post variables: ' . $_POST['lot'] . '<br />'; ?>
                <?php echo 'has_lot :' . $has_lot . '<br />'; ?>
                <?php echo 'lot_id :' . $lot_id . '<br />'; ?>
            <hr />

            <!-- This div is a placeholder, not expected to work properly at the moment -->
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/categories/index.php'); ?>">Create New Owner</a>
            </div>
            <hr />

            <h3>Search Criteria</h3>

            <form action="" method="post">

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "lot">By Address</label>
                    <select name="lot" id="lot">

                        <?php while($lot = mysqli_fetch_assoc($lot_set)) { ?>
                            <option value="<?php htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['address']); ?></option>
                        <?php } ?>

                    </select>
                </div>
                <hr />
                <?php mysqli_free_result($lot_set); ?>
                <!-- END The ADDRESS pull down select item -->

                <div id="operations">
                    <input type="submit" name="submit" value="Make it so..." />
                </div>

            </form>








        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

