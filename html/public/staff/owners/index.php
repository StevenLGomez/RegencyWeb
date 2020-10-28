
<?php require_once('../../../private/initialize.php'); ?>

<?php $lot_set = find_all_lots(); ?>

<?php $page_title = 'Manage Owners'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="ecn-menu">
            <h2>Budget Categories</h2>

            <hr />
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/categories/index.php'); ?>">Create New Category</a>
            </div>
            <hr />


            <h3>Owner Search</h3>

            <!-- The pull down select item -->
            <div class="actions"> 
                <label for "lot">By Address</label>
                <select name="lot" id="lot">
                    <option value=""</option>

                    <?php while($lot = mysqli_fetch_assoc($lot_set)) { ?>
                        <option value="<?php htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['address']); ?></option>
                    <?php } ?>

                </select>
            </div>
            <hr />
            <?php mysqli_free_result($lot_set); ?>
            <!-- END The pull down select item -->

            <hr />


        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

