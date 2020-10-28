
<?php require_once('../../../private/initialize.php'); ?>

<!-- Queries used on this page -->
<?php $lot_set = find_all_lots(); ?>
<?php $owner_set = find_all_owners(); ?>

<!-- Assign page title & include header -->
<?php $page_title = 'Manage Owners'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner History Management</h2>

            <hr />
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/categories/index.php'); ?>">Create New Owner</a>
            </div>
            <hr />
            <h3>Search Criteria</h3>

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

            <!-- The Owner name pull down select item -->
            <div class="actions"> 
                <label for "owner">By Last Name</label>
                <select name="owner" id="owner">

                    <?php while($owner = mysqli_fetch_assoc($owner_set)) { ?>
                        <option value="<?php htmlsc($owner['id']); ?>"><?php echo htmlsc($owner['last']); ?></option>
                    <?php } ?>

                </select>
            </div>
            <hr />
            <?php mysqli_free_result($owner_set); ?>
            <!-- END The Owner name pull down select item -->








        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

