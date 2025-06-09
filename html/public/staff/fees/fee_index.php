
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
                echo "Doing ShowFeeHistory\n";
                break;

            case 'ListUndepositedFees':
                echo "Doing ListUndepositedFees\n";
                break;

            case 'EnterNewFee':
                echo "Doing EnterNewFee\n";
                break;

            default:
                include('./fee_menu.php');

            }
            ?>


            <!-- Original content -->
            <br />
            <br />
            <br />
            <br />

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Lot</th>
                    <th>Date</th>
                    <th>Check</th>
                    <th>amount</th>
                    <th>Deposit ID</th>
                    <th>Payee</th>
                    <th>Note</th>
                    <th>&nbsp</th>
                </tr>

                <?php $fee_set = find_all_fees(); ?>
                <?php while($subject = mysqli_fetch_assoc($fee_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($subject['id']); ?></td>
                        <td><?php echo htmlsc($subject['fk_lot_id']); ?></td>
                        <td><?php echo htmlsc($subject['dt']); ?></td>
                        <td><?php echo htmlsc($subject['ck_no']); ?></td>
                        <td><?php echo htmlsc($subject['amount']); ?></td>
                        <td><?php echo htmlsc($subject['fk_deposit_id']); ?></td>
                        <td><?php echo htmlsc($subject['payee']); ?></td>
                        <td><?php echo htmlsc($subject['note']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlsc(urlencode($subject['id']))); ?>">Edit</a></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($fee_set); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

