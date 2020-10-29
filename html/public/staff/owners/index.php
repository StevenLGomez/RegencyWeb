
<?php 
    require_once('../../../private/initialize.php');

    $lot_is_selected = False;

    if (is_post_request())
    {
        if (isset($_POST['address_id']))
        {
            $lot_id = $_POST['address_id'];
            $lot_is_selected = True;
        }
    }
    else
    {
        $lot_id = '';
    }

    $lot_query = find_all_lots();

?>

<!-- Assign page title (used in header) & include header -->
<?php $page_title = 'Search Owners'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner Management</h2>

            <!-- This div is a placeholder, not expected to work properly at the moment -->
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/categories/index.php'); ?>">Create New Owner</a>
            </div>
            <hr />

            <h3>Search Criteria</h3>

            <form action="" method="post">

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "address_id">Address History</label>
                    <select name="address_id" id="address_id">

                        <?php while($lot = mysqli_fetch_assoc($lot_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['address']); ?></option>
                        <?php } ?>

                    </select>
                </div>
                <?php mysqli_free_result($lot_query); ?>
                <!-- END The ADDRESS pull down select item -->

                <div id="operations">
                    <input type="submit" name="submit" value="Perform Search" />
                </div>

            </form>

            <?php 
                  if ($lot_is_selected)
                  {
                      echo '<hr />'; 
                      echo '<h3> Owner History for Lot#: ' . $lot_id . '</h3>'; 
                      echo '<hr />'; 
                  }
             ?>


        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

