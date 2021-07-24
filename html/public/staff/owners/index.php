
<?php 
    require_once('../../../private/initialize.php');

    // Set defaults for local variables
    $lot_is_selected = False;
    $lot_id = '';

    if (is_post_request())
    {
        if (isset($_POST['address_id']))
        {
            $lot_id = $_POST['address_id'];
            $lot_is_selected = True;
        }
    }

    $lot_query = find_all_lots();

?>

<!-- Assign page title (used in header) & include header -->
<?php $page_title = 'Search Owners'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner Management</h2>

            <!-- Show diagnostic information -->
            <?php
            if ( $diagnostics_enabled) {
                echo '<hr />';
                echo '<div>';

                // Show lot selected information
                echo '$lot_is_selected: '; 
                if ($lot_is_selected) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';
                echo '$lot_id: ' . $lot_id;

                echo '</div>';
                echo '<hr />';
                } ?>

            <!-- Provide link to enter new Owner information -->
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/owners/create.php'); ?>">Create New Owner</a>
            </div>
            <hr />

            <h3>Search Criteria</h3>

            <!-- Form for Searching by Lot Address -->
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
            <!-- ************************************************************ -->

            <!-- Form for Searching by Lot Address -->
            <form action="" method="post">
                <div>
                    <hr />
                    <?php echo 'Placeholder for search by Last Name' ?>
                    <hr />
                </div>
            </form>
            <!-- ************************************************************ -->

            <!-- This section only entered after an Address has been selected -->
            <?php if ($lot_is_selected) { ?>
            <?php $owner_query = find_owners_by_lot($lot_id); ?>
               <hr />
               <h3> Owner History for Lot#: <?php echo $lot_id ?> </h3> 
                  <table class="list">
                      <tr>
                          <th>First</th>
                          <th>MI</th>
                          <th>Last</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Zip</th>
                          <th>Current</th>
                      </tr>

                <?php while($owner = mysqli_fetch_assoc($owner_query)) { ?>
                    <tr>
                        <td><?php echo htmlsc($owner['first']); ?>    </td>
                        <td><?php echo htmlsc($owner['mi']); ?>       </td>
                        <td><?php echo htmlsc($owner['last']); ?>     </td>
                        <td><?php echo htmlsc($owner['address']); ?>  </td>
                        <td><?php echo htmlsc($owner['city']); ?>     </td>
                        <td><?php echo htmlsc($owner['state']); ?>    </td>
                        <td><?php echo htmlsc($owner['zip']); ?>      </td>
                        <td><?php echo $owner['is_current'] == 1 ? 'Yes' : 'No'; ?></td>
                    </tr>
                <?php } /* Bottom of while loop */ ?>

                  </table>
                  <?php mysqli_free_result($owner_query); ?>

            <?php } /* if ($lot_is_selected) */  ?>
            <!-- ************************************************************ -->

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

