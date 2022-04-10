<?php 
    require_once('../../../private/initialize.php');

    $last_name_was_entered = True;
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

            <!-- ************************************************************ -->
            <!-- This section only entered after a Last Name has been entered -->
            <!-- ************************************************************ -->
            <?php if ($last_name_was_entered) { ?>

            <?php $owner_query = find_owners_by_last('Emerson'); ?>
               <hr />
               <?php echo '<h3> Search Results for: ' . $last_name . '</h3>'; ?>


                  <table class="list">
                      <tr>
                          <th>-----</th>
                          <th>Primary Owner</th>
                          <th>Secondary Owner</th>
                      </tr>

                    <?php $owner = mysqli_fetch_assoc($owner_query); ?>

                      <tr>
                          <td>First Name</td>
                          <td><?php echo htmlsc($owner['first']); ?>    </td>
                          <td><?php echo htmlsc($owner['first_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td>Middle</td>
                          <td><?php echo htmlsc($owner['mi']); ?>    </td>
                          <td><?php echo htmlsc($owner['mi_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td>Last Name</td>
                          <td><?php echo htmlsc($owner['last']); ?>    </td>
                          <td><?php echo htmlsc($owner['last_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td>Phone</td>
                          <td><?php echo htmlsc($owner['phone']); ?>    </td>
                          <td><?php echo htmlsc($owner['phone_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td>Email</td>
                          <td><?php echo htmlsc($owner['email']); ?>    </td>
                          <td><?php echo htmlsc($owner['email_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>

                      <tr>
                          <td>Lot #</td>
                          <td><?php echo htmlsc($owner['fk_lot_id']); ?>    </td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>Buy Date</td>
                          <td><?php echo htmlsc($owner['buy_date']); ?>    </td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>Current Owner</td>
                          <td><?php echo $owner['is_current'] == 1 ? 'Yes' : 'No'; ?></td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>Is Rental</td>
                          <td>TBD</td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>Address</td>
                          <td><?php echo htmlsc($owner['address']); ?>    </td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>City</td>
                          <td><?php echo htmlsc($owner['city']); ?>    </td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>State</td>
                          <td><?php echo htmlsc($owner['state']); ?>    </td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>Zip</td>
                          <td><?php echo htmlsc($owner['zip']); ?>    </td>
                          <td>-</td>
                      </tr>

                      <tr>
                          <td>Notes</td>
                          <td>TBD</td>
                      </tr>

                  </table>

                  <?php mysqli_free_result($owner_query); ?>

            <?php } /* if ($last_name_was_entered) */  ?>
            <!-- ============================================================ -->







            <hr />

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>


