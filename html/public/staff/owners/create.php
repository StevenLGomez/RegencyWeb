<?php 
    require_once('../../../private/initialize.php');

    $editing_existing_owner = False;
    $creating_new_owner = False;
    $view_owner_info = False;

    if (is_get_request())
    {
        if (isset($_GET['view_owner']))
        {
            $primary_last = $_GET['last_name'];
            $view_owner_info = True;
        }

        if (isset($_GET['edit_owner']))
        {
            $primary_last = $_GET['last_name'];
            $editing_existing_owner = True;
        }
    }
    elseif (is_post_request())
    {
        $creating_new_owner = True;

        $page=[];
        $page['primary_first']=$_POST['primary_first'] ?? '';
        $page['primary_middle']=$_POST['primary_middle'] ?? '';
        $page['primary_last']=$_POST['primary_last'] ?? '';
        $page['primary_phone']=$_POST['primary_phone'] ?? '';
        $page['primary_email']=$_POST['primary_email'] ?? '';

        $page['secondary_first']=$_POST['secondary_first'] ?? '';
        $page['secondary_middle']=$_POST['secondary_middle'] ?? '';
        $page['secondary_last']=$_POST['secondary_last'] ?? '';
        $page['secondary_phone']=$_POST['secondary_phone'] ?? '';
        $page['secondary_email']=$_POST['secondary_email'] ?? '';

        $page['lot_number']=$_POST['lot_number'] ?? '';
        $page['purchase_date']=$_POST['purchase_date'] ?? '';
        $page['is_current']=$_POST['is_current'] ?? '';
        $page['is_rental']=$_POST['is_rental'] ?? '';
        $page['owner_address']=$_POST['owner_address'] ?? '';
        $page['owner_city']=$_POST['owner_city'] ?? '';
        $page['owner_state']=$_POST['owner_state'] ?? '';
        $page['owner_zip']=$_POST['owner_zip'] ?? '';
        $page['owner_notes']=$_POST['owner_notes'] ?? '';
    }
    else
    {
        $page=[];
        $page['primary_first']='';
        $page['primary_middle']='';
        $page['primary_last']='Lincoln';
        $page['primary_phone']='';
        $page['primary_email']='';

        $page['secondary_first']='';
        $page['secondary_middle']='';
        $page['secondary_last']='';
        $page['secondary_phone']='';
        $page['secondary_email']='';

        $page['lot_number']='';
        $page['purchase_date']='';
        $page['is_current']='1';
        $page['is_rental']='1';
        $page['owner_address']='';
        $page['owner_city']='';
        $page['owner_state']='';
        $page['owner_zip']='';
        $page['owner_notes']='';
    }
?>

    <!-- Assign page title (used in header) & include header -->
    <?php if($editing_existing_owner) {
        $page_title='Edit Owner';
        }
        elseif ($creating_new_owner)
        {
            $page_title='Create Owner';
        }
        else
        {
            $page_title='View Owner';
        }
        ?>
    <?php include(SHARED_PATH . '/header.php'); ?>

    <!-- Show diagnostic information -->
    <?php
    if ( $diagnostics_enabled) {
       echo '<hr />';
       echo '<div>';

       echo 'Primary First Name:   '; echo htmlsc($page['primary_first']); echo '<br />';
       echo 'Primary Middle:       '; echo htmlsc($page['primary_middle']); echo '<br />';
       echo 'Primary Last Name:    '; echo htmlsc($page['primary_last']); echo '<br />';
       echo 'Primary Last Name:    '; echo htmlsc($primary_last); echo '<br />';
       echo 'Primary Phone:        '; echo htmlsc($page['primary_phone']); echo '<br />';
       echo 'Primary Email:        '; echo htmlsc($page['primary_email']); echo '<br />';
       echo '<br />';
       echo 'Secondary First Name: '; echo htmlsc($page['secondary_first']); echo '<br />';
       echo 'Secondary Middle:     '; echo htmlsc($page['secondary_middle']); echo '<br />';
       echo 'Secondary Last Name:  '; echo htmlsc($page['secondary_last']); echo '<br />';
       echo 'Secondary Phone:      '; echo htmlsc($page['secondary_phone']); echo '<br />';
       echo 'Secondary Email:      '; echo htmlsc($page['secondary_email']); echo '<br />';
       echo '<br />';
       echo 'Lot Number:           '; echo htmlsc($page['lot_number']); echo '<br />';
       echo 'Purchase Date:        '; echo htmlsc($page['purchase_date']); echo '<br />';
       echo 'Current Owner?:       '; echo htmlsc($page['is_current']); echo '<br />';
       echo 'Is Rental?:           '; echo htmlsc($page['is_rental']); echo '<br />';
       echo 'Owner Address:        '; echo htmlsc($page['owner_address']); echo '<br />';
       echo 'Owner City:           '; echo htmlsc($page['owner_city']); echo '<br />';
       echo 'Owner State:          '; echo htmlsc($page['owner_state']); echo '<br />';
       echo 'Owner Zip:            '; echo htmlsc($page['owner_zip']); echo '<br />';
       echo 'Notes:                '; echo htmlsc($page['owner_notes']); echo '<br />';
       echo '<br />';

       echo '</div>';
       echo '<hr />';
       } ?>
    <!-- *************************** -->

    <div id="content">
        <a class="back-link" href="<?php echo url_for('/staff/owners/index.php'); ?>">&laquo; Return to Search</a>
        <div id="regency-menu">

        <!-- Assign page title (used in header) & include header -->
        <?php if($editing_existing_owner) {
            echo '<h2>Edit Owner</h2>';
            }
            elseif ($creating_new_owner)
            {
                echo '<h2>Create Owner</h2>';
            }
            else
            {
                echo '<h2>View Owner</h2>';
            }
            ?>

            <form action="" method="post">
                <table class="list">

                        <th></th>
                        <th>Primary Owner</th>
                        <th>Secondary Owner</th>

                          <tr>
                              <td><b>First Name</b></td>
                              <td><input type="text" name="primary_first" value="<?php echo htmlsc($page['primary_first']); ?>" /></td>
                              <td><input type="text" name="secondary_first" value="<?php echo htmlsc($page['secondary_first']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Middle</b></td>
                              <td><input type="text" name="primary_middle" value="<?php echo htmlsc($page['primary_middle']); ?>" /></td>
                              <td><input type="text" name="secondary_middle" value="<?php echo htmlsc($page['secondary_middle']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Last Name</b></td>
                              <td><input type="text" name="primary_last" value="<?php echo htmlsc($page['primary_last']); ?>" /></td>
                              <td><input type="text" name="secondary_last" value="<?php echo htmlsc($page['secondary_last']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Phone</b></td>
                              <td><input type="text" name="primary_phone" value="<?php echo htmlsc($page['primary_phone']); ?>" /></td>
                              <td><input type="text" name="secondary_phone" value="<?php echo htmlsc($page['secondary_phone']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Email</b></td>
                              <td><input type="text" name="primary_email" value="<?php echo htmlsc($page['primary_email']); ?>" /></td>
                              <td><input type="text" name="secondary_email" value="<?php echo htmlsc($page['secondary_email']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Lot #</b></td>
                              <td><input type="text" name="lot_number" value="<?php echo htmlsc($page['lot_number']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Purchase Date</b></td>
                              <td><input type="text" name="purchase_date" value="<?php echo htmlsc($page['purchase_date']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Is Current Owner?</b></td>
                              <td>
                                  <input type="hidden" name="is_current" value="0" />
                                  <input type="checkbox" name="is_current" value="1"<?php if($page['is_current'] == "1") {echo " checked";} ?> />
                              </td>
                          </tr>

                          <tr>
                              <td><b>Is Rental?</b></td>
                              <td>
                                  <input type="hidden" name="is_rental" value="0" />
                                  <input type="checkbox" name="is_rental" value="1"<?php if($page['is_rental'] == "1") {echo " checked";} ?> />
                              </td>
                          </tr>

                          <tr>
                              <td><b>Owner Address</b></td>
                              <td><input type="text" name="owner_address" value="<?php echo htmlsc($page['owner_address']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Owner City</b></td>
                              <td><input type="text" name="owner_city" value="<?php echo htmlsc($page['owner_city']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Owner State</b></td>
                              <td><input type="text" name="owner_state" value="<?php echo htmlsc($page['owner_state']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Owner Zip</b></td>
                              <td><input type="text" name="owner_zip" value="<?php echo htmlsc($page['owner_zip']); ?>" /></td>
                          </tr>

                          <tr>
                              <td><b>Notes</b></td>
                              <td><input type="text" name="owner_notes" value="<?php echo htmlsc($page['owner_notes']); ?>" /></td>
                          </tr>

                </table>
                <br />
                <input type="submit" value="Add User"/>
                <br />
            </form>
            <!-- ============================================================ -->

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>


