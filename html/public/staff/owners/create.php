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
    <?php $page_title = 'Create New Owner'; ?>
    <?php include(SHARED_PATH . '/header.php'); ?>

        <div id="content">
            <div id="regency-menu">
                <h2>Create New Owner</h2>

                <!-- Show diagnostic information -->
                   <?php
                   if ( $diagnostics_enabled) {
                       echo '<hr />';
                       echo '<div>';

                       echo 'Diagnostics placeholder';

                       echo '</div>';
                       echo '<hr />';
                       } ?>

            <table class="list">
                <tr>
                    <th></th>
                    <th>Primary Owner</th>
                    <th>Secondary</th>
                </tr>
                <tr>
                    <td>First</td>
                    <td>Abraham</td>
                    <td>Amelia</td>
                </tr>
                <tr>
                   <td>Middle</td>
                   <td>Joe</td>
                   <td></td>
                </tr>
               <tr>
                  <td>Last</td>
                  <td>Lincoln</td>
                  <td>Earhardt</td>
               </tr>

            </table>

<?php include(SHARED_PATH . '/footer.php'); ?>


