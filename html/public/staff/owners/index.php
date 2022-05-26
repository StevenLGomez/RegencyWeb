
<?php 
    require_once('../../../private/initialize.php');

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
            echo 'Adding from form, > '; echo $owner['first']; echo ' <';
            $full_owner_form_required = True;
            $display_new_owner = True;

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

        if (isset($_POST['address_id'])) {
            $owner_list_required = True;
            $searching_history = True;
            $lot_id = $_POST['address_id'];

            $page_title = 'Property History';
        }
    }
    else
    {
        // If nothing was posted, this page returns to Search Mode
        $search_mode = True;
    }

    $lot_query = find_all_lots();

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

                echo '<hr />';

                echo '<!-- End of diagnostic information -->';
                echo '<!-- *************************** -->';
                echo '</div>';
            } ?>

        <!-- ============================================================ -->
        <!-- This is the beginning of the "Default Owner Page "           -->
        <!-- ============================================================ -->
        <?php if ($search_mode) { ?>
            <!-- Form for Searching by Last name -->

            <form action="" method="post">
            <fieldset>
                <!-- The Last Name Entry Box -->
                <div class="actions"> 
                    <label for "last_name">Search By Last Name</label>
                    <input type="text" id="last_name" name="last_name">
                </div>
                <!-- END The Last Name Entry Box -->

                <div id="actions">
                    <!-- These inputs instruct form.php which action to make available -->
                    <input type="submit" name="view_owner" value="View" />
                    <input type="submit" name="edit_owner" value="Edit" />
                    <input type="submit" name="create_owner" value="Create" />
                </div>

            </fieldset>
            </form>
            <!-- ============================================================ -->

            <!-- Form for Searching for Rental owners -->
            <form action="" method="post">
            <fieldset>
                <div id="actions">
                    <label for "view_rentals">View Renting Owners</label>
                    <input type="submit" name="view_rentals" value="View Rentals" />
                </div>
            </fieldset>
            </form>
            <!-- ============================================================ -->

            <!-- Form for Searching by Address -->
            <form action="" method="post">
            <fieldset>

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "address_id">Show Owner History For:</label>
                    <select name="address_id" id="address_id">

                        <?php while($lot = mysqli_fetch_assoc($lot_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['address']); ?></option>
                        <?php } ?>

                    </select>
                </div>
                <?php mysqli_free_result($lot_query); ?>
                <!-- END The ADDRESS pull down select item -->

                <div id="actions">
                    <input type="submit" name="submit" value="Display History" />
                </div>

            </fieldset>
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

