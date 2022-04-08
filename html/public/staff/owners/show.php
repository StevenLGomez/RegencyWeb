
<?php require_once('../../../private/initialize.php'); ?>
<?php
$id = $_GET['id'] ?? '57'; // PHP > 7.0

// $owner = find_owners_by_id($id);
$owner = find_owner_by_id($id);
?>

<!-- Assign page title (used in header) & include header -->
<?php $page_title = 'Show Owner'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>


    <div id="content">
        <div id ="regency-menu">
            <h2>Show Owner</h2>

            <!-- Show diagnostic information -->
            <?php
                 if ($diagnostics_enabled)
                 {
                     echo '<hr />';
                     echo '<div>';

                     echo '$id: ' . $id;

                     echo '<div>';
                     echo '<hr />';
                 }
             ?>

             <h3>This a web page</h3>

            <?php echo htmlsc($owner['last']); ?>
            <?php echo htmlsc($id); ?>
            <?php echo 'Just show up would you!!'; ?>
        
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>


