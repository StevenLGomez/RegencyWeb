<?php 
    require_once('../../../private/initialize.php');

    $last_name_was_entered = True;
?>
    <!-- Assign page title (used in header) & include header -->
    <?php $page_title = 'Show Owner Details'; ?>
    <?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
           <h2>Show Owner Details</h2>

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

            <!-- ************************************************************ -->
            <!-- This section only entered after a Last Name has been entered -->
            <!-- ************************************************************ -->
            <?php if ($last_name_was_entered) { ?>

            <?php $owner_query = find_owners_by_last('Gomez'); ?>
               <hr />
               <?php echo '<h3> Search Results for: ' . $last_name . '</h3>'; ?>


                  <table class="list">
                      <tr>
                          <th>th>
                          <th>Primary Owner</th>
                          <th>Secondary Owner</th>
                      </tr>

                    <?php $owner = mysqli_fetch_assoc($owner_query); ?>

                      <tr>
                          <td><b>First Name</b></td>
                          <td><?php echo htmlsc($owner['first']); ?>    </td>
                          <td><?php echo htmlsc($owner['first_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Middle</b></td>
                          <td><?php echo htmlsc($owner['mi']); ?>    </td>
                          <td><?php echo htmlsc($owner['mi_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Last Name</b></td>
                          <td><?php echo htmlsc($owner['last']); ?>    </td>
                          <td><?php echo htmlsc($owner['last_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Phone</b></td>
                          <td><?php echo htmlsc($owner['phone']); ?>    </td>
                          <td><?php echo htmlsc($owner['phone_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Email</b></td>
                          <td><?php echo htmlsc($owner['email']); ?>    </td>
                          <td><?php echo htmlsc($owner['email_2']); ?>    </td>
                      </tr>

                      <!-- Add empty row as a spacer -->
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>

                      <tr>
                          <td><b>Lot #</b></td>
                          <td><?php echo htmlsc($owner['fk_lot_id']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Purchase Date</b></td>
                          <td><?php echo htmlsc($owner['buy_date']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Current Owner</b></td>
                          <td><?php echo $owner['is_current'] == 1 ? 'Yes' : 'No'; ?></td>
                      </tr>

                      <tr>
                          <td><b>Is Rental</b></td>
                          <td>TBD</td>
                      </tr>

                      <tr>
                          <td><b>Address</b></td>
                          <td><?php echo htmlsc($owner['address']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>City</b></td>
                          <td><?php echo htmlsc($owner['city']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>State</b></td>
                          <td><?php echo htmlsc($owner['state']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Zip</b></td>
                          <td><?php echo htmlsc($owner['zip']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Notes</b></td>
                          <td>And now for something completely different.</td>
                      </tr>

                  </table>

                  <?php mysqli_free_result($owner_query); ?>

            <?php } /* if ($last_name_was_entered) */  ?>
            <!-- ============================================================ -->







            <hr />

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>


