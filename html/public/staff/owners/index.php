
<?php 
    require_once('../../../private/initialize.php');
    require_once('../../../private/owner_functions.php');

    // Set defaults for local variables
    $search_mode = False;

    // Variables to control actions requiring Full Owner Form
    $full_owner_form_required = False;
    $view_existing_owner = False;
    $edit_existing_owner = False;
    $create_new_owner = False;
    $display_new_owner = False;
    $last_name = '';

    // Variables to control actions requiring Owner Information List
    $owner_list_required = False;
    $searching_rental_owners = False;
    $searching_history = False;
    $lot_id = '';

    // Default value for Page Title
    $page_title = 'Search Owners';

    if (is_post_request())
    {
        // This group requires the Full Owner Form
        if (isset($_POST['view_owner'])) {
            $full_owner_form_required = True;
            $view_existing_owner = True;
            $requested_name = $_POST['last_name'];

            $page_title = 'View Owner Information';
        }

        if (isset($_POST['edit_owner'])) {
            $full_owner_form_required = True;
            $edit_existing_owner = True;
            $requested_name = $_POST['last_name'];

            $page_title = 'Edit Owner Information';
        }

        if (isset($_POST['create_owner'])) {
            $full_owner_form_required = True;
            $create_new_owner = True;

            $page_title = 'Create New Owner';
        }
        // End of group requiring the Full Owner Form

        // This group supports actions request from the Owner Form
        if (isset($_POST['add_owner_from_form'])) {
            $full_owner_form_required = True;
            $display_new_owner = True;

            // Read the values posted from the form (recreate a local copy of $owner)
            $owner = [];
            $owner['first'] = $_POST['first'] ?? '';
            $owner['mi'] = $_POST['mi'] ?? '';
            $owner['last'] = $_POST['last'] ?? '';
            $owner['phone'] = $_POST['phone'] ?? '';
            $owner['email'] = $_POST['email'] ?? '';

            $owner['first_2'] = $_POST['first_2'] ?? '';
            $owner['mi_2'] = $_POST['mi_2'] ?? '';
            $owner['last_2'] = $_POST['last_2'] ?? '';
            $owner['phone_2'] = $_POST['phone_2'] ?? '';
            $owner['email_2'] = $_POST['email_2'] ?? '';

            // $owner['fk_lot_id'] = 39;
            $owner['fk_lot_id'] = $_POST['fk_lot_id'] ?? '';
            $owner['buy_date'] = $_POST['buy_date'] ?? '';
            $owner['is_current'] = $_POST['is_current'] ?? '';
            $owner['is_rental'] = $_POST['is_rental'] ?? '';
            $owner['owner_address'] = $_POST['owner_address'] ?? '';
            $owner['owner_city'] = $_POST['owner_city'] ?? '';
            $owner['owner_state'] = $_POST['owner_state'] ?? '';
            $owner['owner_zip'] = $_POST['owner_zip'] ?? '';
            $owner['owner_notes'] = $_POST['owner_notes'] ?? '';

            $result = insert_new_owner($owner);
            if ($result === True) {
                echo 'Submit returned True';
                $new_id = mysqli_insert_id($db);
            }
            else
            {
                echo 'Submit returned False';
                $errors = $result;
            }
        }
        // End of group of actions requested from the Owner Form

        // This group requires the queried list of owner information
        if (isset($_POST['view_rentals'])) {
            $owner_list_required = True;
            $searching_rental_owners = True;

            $page_title = 'Rental Properties';
        }

        // Search history by address was requested
        if (isset($_POST['address_id'])) {
            $owner_list_required = True;
            $searching_history = True;
            $lot_id = $_POST['address_id'];

            $page_title = 'Property History';
        }

        // Search history by lot number was requested
        if (isset($_POST['lot_number'])) {
            $owner_list_required = True;
            $searching_history = True;
            $lot_id = $_POST['lot_number'];

            $page_title = 'Property History';
        }
    }
    else
    {
        // If nothing was posted, this page returns to Search Mode
        $search_mode = True;
    }

    $address_query = create_address_list();
    $lot_query = create_lot_list();

?>

<!-- Include HTML header here, note $page_title must be previously defined -->
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner Management</h2>

            <?php

            if ( $diagnostics_enabled) {
                echo '<hr />';
                echo '<!-- Show diagnostic information -->';
                echo '<div>';

                echo '$view_existing_owner: '; 
                if ($view_existing_owner) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';

                echo '$edit_existing_owner: '; 
                if ($edit_existing_owner) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';

                echo '$create_new_owner: '; 
                if ($create_new_owner) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';

                get_mail_merge_info_by_lot(1);
                echo '<br />';
                // get_mail_merge_info_by_lot(2);
                // echo '<br />';

                echo '<hr />';

                echo '<!-- End of diagnostic information -->';
                echo '<!-- *************************** -->';
                echo '</div>';
            } ?>

        <!-- ============================================================ -->
        <!-- This is the beginning of the "Default Owner Page "           -->
        <!-- ============================================================ -->
        <?php if ($search_mode) { ?>

            <!-- Start of Search Owner History section =================== -->

            <!-- ============================================================ -->
            <!-- Form for Searching by Address -->
            <form action="" method="post">
            <fieldset>
                <h4>Owner History</h4>

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "address_id">By Address:</label>
                    <select name="address_id" id="address_id">

                        <?php while($lot = mysqli_fetch_assoc($address_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['address']); ?></option>
                        <?php } ?>

                    </select>
                    <input type="submit" name="submit" value="View By Address" />
                </div>
                <?php mysqli_free_result($address_query); ?>
                <!-- END The ADDRESS pull down select item -->

            </fieldset>
            </form>
            <!-- ============================================================ -->

            <!-- ============================================================ -->
            <!-- Form for Searching by Lot # -->
            <form action="" method="post">
            <fieldset>

                <!-- The LOT pull down select item -->
                <div class="actions"> 
                    <label for "lot_number">By Lot#:</label>
                    <select name="lot_number" id="lot_number">

                        <?php while($lot = mysqli_fetch_assoc($lot_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['id']); ?></option>
                        <?php } ?>

                    </select>
                    <input type="submit" name="submit" value="View By Lot" />
                </div>
                <?php mysqli_free_result($lot_query); ?>
                <!-- END The LOT pull down select item and button -->

            </fieldset>
            </form>
            <!-- ============================================================ -->

            <!-- End of Search Property History Section ===================== -->
            <hr />

            <!-- ============================================================ -->
            <!-- Form for Viewing existing owner by Last name -->

            <form action="" method="post">
            <fieldset>
                <h4>By Last Name</h4>
                <!-- The Last Name Entry Box -->
                <div class="actions"> 
                    <label for "last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name">
                    <input type="submit" name="view_owner" value="View" />
                </div>
                <!-- END The Last Name Entry Box -->

            </fieldset>
            </form>
            <!-- ============================================================ -->
            <hr />

            <!-- ============================================================ -->
            <!-- Form for Searching for Rental owners -->
            <form action="" method="post">
            <fieldset>
                <h4>View Rentals</h4>
                <div id="actions">
                    <input type="submit" name="view_rentals" value="View" />
                </div>
            </fieldset>
            </form>
            <!-- ============================================================ -->
            <hr />

            <!-- ============================================================ -->
            <!-- Form for Creating new owner-->

            <form action="" method="post">
            <fieldset>
                <!-- Create New Owner -->
                <h4>New Owner</h4>
                <div class="actions"> 
                    <input type="submit" name="create_owner" value="Create" />
                </div>
            </fieldset>
                <!-- END The Create New Owner Entry Box -->

            </form>
            <!-- ============================================================ -->

        <?php } /* if ($search_mode) */ ?>

        <!-- ============================================================ -->
        <!-- This is the end of the "Default Owner Page " =============== -->
        <!-- ============================================================ -->

        <!-- Owner Form display has been requested -->
        <?php if ($full_owner_form_required) 
        {
            include('./form.php'); 
        } /* if ($full_owner_form_required) */ ?>
        <!-- Bottom of Owner Form include =============================== -->

        <!-- List of Owner Information has been requested -->
        <?php if ($owner_list_required) { ?>
            <?php include('./list.php'); ?>
        <?php } /* if ($owner_list_required) */ ?>
        <!-- ============================================================ -->

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

