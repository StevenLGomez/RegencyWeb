
<?php 
      require_once('../../../private/initialize.php'); 
      require_once ('../../../private/lot_functions.php');
      require_once('../../../private/fee_functions.php');

      $page_title = 'Fee Management';  // Default value

      $edit_existing_fee = False;
      $add_new_fee_to_db = False;

      if (is_post_request())
      {
        // var_dump($_POST);

        // Fee Management - View By Address was selected
        if (isset($_POST['fees_by_address'])) {
            $page_title = 'History By Address';
            $lot_id = $_POST['fees_by_address'];
            $switch_action = 'ShowFeesByAddress';

            // echo "fees_by_address selected " . $lot_id;
        }

        // Fee Management - View By Lot was selected
        if (isset($_POST['fees_by_lot'])) {
            $page_title = 'History By Lot';
            $lot_id = $_POST['fees_by_lot'];
            $switch_action = 'ShowFeesByLot';
        }

        // Fee Management - List undeposited fees selected
        if (isset($_POST['list_undeposited_fees'])) {
            $switch_action = 'ListUndepositedFees';
            $page_title = 'Undeposited Fees';
        }

        // Enter new fee selected from fee_menu.php
        if (isset($_POST['enter_new_fee'])) {
            $switch_action = 'EnterNewFee';
            $page_title = 'Enter New Fee';
        }

        // Duplicate?
        if (isset($_POST['apply_fee_changes_button'])) {
            $fee_id = $_POST['id'];
            $switch_action = 'ApplyFeeChanges';
            $page_title = 'Here Is The Edited Fee';
        }

        if (isset($_POST['add_fee_complete_button'])) {
            $fee_id = $_POST['id'];
            $switch_action = 'AddFeeToDb';
            $page_title = 'Here Is The New Fee';
        }
      }

    if (is_get_request())
    {
        // var_dump($_POST);

        if (isset($_GET['edit_fee_button']))
        {
            $fee_id = $_GET['id'] ?? '0';
            $switch_action = 'EditExistingFee';
            $page_title = 'Fee Detail Edit Screen';
            echo "Edit fee button pressed in history list " . $fee_id;
        }
    }
?>

      <?php include(SHARED_PATH . '/header.php'); ?>

      <div id="content">
          <div id="regency-menu">
              <?php echo '<h2>' . $page_title . '</h2>'; ?>

            <?php

            switch ($switch_action)
            {
            case 'ShowFeesByAddress':
                include('./fee_history.php');
                break;

            case 'ShowFeesByLot':
                include('./fee_history.php');
                break;

            case 'ListUndepositedFees':
                include('./fee_pending.php');
                break;

            case 'EnterNewFee':
                $page_title = 'Enter New Fee';
                $create_new_fee = True;

                include('./fee_form.php');
                break;

            case 'AddFeeToDb':
                $page_title = 'View New Fee';
                $create_new_fee = True;

                // Create fee array
                $fee = [];
                $fee['id'] = $_POST['id'] ?? '';
                $fee['dt'] = $_POST['dt'] ?? '';
                $fee['payee'] = $_POST['payee'] ?? '';
                $fee['fk_lot_id'] = $_POST['fk_lot_id'] ?? '';
                $fee['ck_no'] = $_POST['ck_no'] ?? '';
                $fee['amount'] = $_POST['amount'] ?? '';
                $fee['note'] = $_POST['note'] ?? '';

                add_new_fee_to_db($fee);
                include('./fee_form.php');
                break;

            case 'EditExistingFee':
                $page_title = 'Edit Fee';
                $edit_existing_fee = True;
                include('./fee_form.php');
                break;

            default:
                include('./fee_menu.php');

            }
            ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

