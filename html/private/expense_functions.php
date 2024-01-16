

<?php
  // Return all expenses since given date =====================================

  function find_all_expenses($year) {
    global $db;

    // $sql = "SELECT * FROM expense WHERE dt > '2023-01-01' ";
    $sql = "SELECT * FROM expense WHERE dt > " . "'" . $year . "-01-01' ";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // Return sum of expenses for given year & category
  function find_expense_sum($year, $category) {
      global $db;

      // Example standalone query
      // $sql = "SELECT SUM(amount) as sum FROM expense WHERE dt > '2023-01-01' AND dt < '2023-12-31' AND fk_cat_id = 2;";

      // Include 'as sum' to give this single column result a name in the set.
      $sql = "SELECT SUM(amount) as sum FROM expense WHERE dt >= ";
      $sql .= "'" . $year . "-01-01' ";
      $sql .= "AND dt <= ";
      $sql .= "'" . $year . "-12-31' ";
      $sql .= "AND fk_cat_id = " . $category . ";";
      // echo $sql;
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
  }

?>
