
<?php 
      require_once('../../../private/initialize.php'); 
      require_once('../../../private/fee_functions.php');

      $page_title = 'Fee Management';  // Default value

      $edit_existing_fee = False;
      $create_new_fee = False;

      if (is_post_request())
      {
        var_dump($_POST);

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

        // Fee Management - Enter new fee selected
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
            $switch_action = 'EnterNewFee';
            $page_title = 'Here Is The New Fee';
        }
      }

    if (is_get_request())
    {
        var_dump($_POST);

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
                create_new_fee($fee) {
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

