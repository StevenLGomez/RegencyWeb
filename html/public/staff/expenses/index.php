
<?php require_once('../../../private/initialize.php'); ?>

<?php $expense_set = find_all_expenses('2023'); ?>

<?php $page_title = 'Manage Expenses'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Expense History</h2>

            <hr />

            <table class="list">
                <tr>
                    <th>Date</th>
                    <th>Payee</th>
                    <th>ck_no</th>
                    <th>Amount</th>
                    <th>Category</th>
                    <th>Note</th>
                </tr>

                <?php while($expense_row = mysqli_fetch_assoc($expense_set)) { ?>

                    <tr>
                        <td><?php echo htmlsc($expense_row['dt']); ?></td>
                        <td><?php echo htmlsc($expense_row['payee']); ?></td>
                        <td><?php echo htmlsc($expense_row['ck_no']); ?></td>
                        <td><?php echo htmlsc($expense_row['amount']); ?></td>
                        <td><?php echo htmlsc($expense_row['fk_cat_id']); ?></td>
                        <td><?php echo htmlsc($expense_row['note']); ?></td>
                    </tr>

                <?php } ?>

            </table>

            <?php mysqli_free_result($expense_set); ?>
            <br /><hr /><br />

            <table class="list">
                <tr>
                    <th>Year</th>
                    <th>-</th>
                    <th>Mowing</th>
                    <th>Maintenance</th>
                    <th>Insurance</th>
                    <th>Postage</th>
                    <th>State Fees</th>
                    <th>Bank Charge</th>
                    <th>Returned Check Fees</th>
                    <th>Supplies</th>
                    <th>-</th>
                    <th>Totals</th>
                </tr>

                <?php
                // Expense categories: 2 (mowing) -> 9 (supplies)

                $start_year = 2004;   // First year included in original database conversions.
                $latest_year = 2025;  // Current year  TODO investigate method to automate this date.

                ?>

                <?php for ($year_index = $start_year; $year_index <= $latest_year; $year_index++) { ?>
                    <tr>
                        <?php $yearly_total = 0.00; ?>

                        <!-- Date column -->
                        <td>
                            <?php echo htmlsc($year_index); ?>
                        </td>

                        <!-- Spacer column to provide spacing between year -->
                        <td></td>

                        <!-- Mowing column, index 2 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '2');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- Maintenance column, index 3 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '3');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- Insurance column, index 4 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '4');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- Postage column, index 5 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '5');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- State Fees column, index 6 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '6');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- Bank Charge column, index 7 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '7');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- Returned Check column, index 8 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '8');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- Supplies column, index 9 -->
                        <?php
                        $sum_result = find_expense_sum($year_index, '9');
                        $cell_value = mysqli_fetch_assoc($sum_result);
                        $yearly_total = $yearly_total + $cell_value['sum'];
                        ?>
                        <td><?php echo htmlsc($cell_value['sum']); ?></td>
                        <?php mysqli_free_result($sum_result); ?>

                        <!-- Spacer column to provide spacing before totals -->
                        <td></td>

                        <!-- Spacer column to provide spacing between year -->
                        <td><?php echo $yearly_total; ?></td>

                    <?php } ?>

            </table>

            <br /><hr /><br />
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

