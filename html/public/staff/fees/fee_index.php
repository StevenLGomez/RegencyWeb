
<?php 
      require_once('../../../private/initialize.php'); 
      require_once('../../../private/fee_functions.php');

      $page_title = 'Fee Management';

      if (is_post_request())
      {
          var_dump($_POST);

        // Show Owner History - View By Lot was selected
        if (isset($_POST['lot_number'])) {
            $lot_id = $_POST['lot_number'];
            $switch_action = 'ShowOwnerHistory';
            $page_title = 'History By Lot';
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
            case 'DoSomethingCool':
                echo "Doing something cool\n";
                break;

            default:
                include('./fee_menu.php');

            }
            ?>


            <!-- Original content -->
            <hr />
            <hr />
            <hr />
            <hr />
            <div class="actions"> 
                <a class="action" href="<?php echo url_for('/staff/fees/index.php'); ?>">Create New Fee Entry</a>
            </div>
            <hr />

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

