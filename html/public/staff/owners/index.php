
<?php 
    require_once('../../../private/initialize.php');

    $getid = 'No';

    if (isset($_GET['id']))
    {
        $getid = 'Yes';
    }

    $is_post = 'Not sure';
    if (is_post_request())
    {
        $is_post = 'Yes sir';
    }
    else
    {
        $is_post = 'Nope';
    }

    if (isset($_POST['submit']))
    {
        $is_submit = 'Yes';
    }
    else
    {
        $is_submit = 'No';
    }

    $lot_set = find_all_lots();

?>

<!-- Assign page title & include header -->
<?php $page_title = 'Manage Owners'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner History Management</h2>
            <hr />
                <?php echo 'Get ID :' . $getid . '<br />'; ?>
                <?php echo 'Post request :' . $is_post . '<br />'; ?>
                <?php echo 'id :' . $id . '<br />'; ?>
                <?php echo 'Is Submit :' . $is_submit . '<br />'; ?>
            <hr />
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
                    <input type="submit" name="submit" value="Do It" />
                </div>

            </form>








        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

