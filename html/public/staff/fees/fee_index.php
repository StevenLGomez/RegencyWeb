
<?php 
      require_once('../../../private/initialize.php'); 
      require_once('../../../private/fee_functions.php');

      $page_title = 'Fee Management';

      if (is_post_request())
      {
          // var_dump($_POST);

        // Fee Management - View By Address was selected
        if (isset($_POST['fees_by_address'])) {
            $lot_id = $_POST['fees_by_address'];
            $switch_action = 'ShowFeeHistory';
            $page_title = 'History By Address';

            // echo "fees_by_address selected " . $lot_id;
        }

        // Fee Management - View By Lot was selected
        if (isset($_POST['fees_by_lot'])) {
            $lot_id = $_POST['fees_by_lot'];
            $switch_action = 'ShowFeeHistory';
            $page_title = 'History By Lot';

            // echo "fees_by_address selected" . $lot_id;
        }

        // Fee Management - List undeposited fees selected
        if (isset($_POST['list_undeposited_fees'])) {
            $switch_action = 'ListUndepositedFees';
            $page_title = 'Undeposited Fees';

            // echo "list_undeposited_fees";
        }

        // Fee Management - List undeposited fees selected
        if (isset($_POST['enter_new_fee'])) {
            $switch_action = 'EnterNewFee';
            $page_title = 'Enter New Fee';

            // echo "enter_new_fee";
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
            case 'ShowFeeHistory':
                include('./fee_history.php');
                break;

            case 'ListUndepositedFees':
                echo "Doing ListUndepositedFees\n";
                break;

            case 'EnterNewFee':
                include('./fee_form.php');
                break;

            default:
                include('./fee_menu.php');

            }
            ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

