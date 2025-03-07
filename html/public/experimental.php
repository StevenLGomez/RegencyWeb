
<?php
    require_once('../private/initialize.php');

    if (is_post_request())
    {
        echo "This is a POST request";
        $switch_tag = $_POST['name'];
        var_dump($_POST);

        if (isset($_POST['chickens'])) {
            echo "Chickens";
            $switch_tag = $_POST['chickens'];
        }

        if (isset($_POST['ducks'])) {
            echo "Ducks";
            $switch_tag = $_POST['ducks'];
        }

        if (isset($_POST['cows'])) {
            echo "Cows";
            $switch_tag = $_POST['cows'];
        }
    }
    else
    {
        echo "NOT a POST request";
    }

?>

    <?php $page_title = 'Experiment'; ?>
    <?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Experimental Page</h2>

            <?php echo "Switch tag: " . $switch_tag . "\n"; ?>

            <fieldset>
            <form action="" method="post">
                <h4>Chickens</h4>
                <div class="actions"> 
                    <input type="submit" name="chickens" value="Chickens" />
                </div>
            </form>
            </fieldset>

            <fieldset>
            <form action="" method="post">
                <h4>Ducks</h4>
                <div class="actions"> 
                    <input type="submit" name="ducks" value="Ducks" />
                </div>
            </form>
            </fieldset>

            <fieldset>
            <form action="" method="post">
                <h4>Cows</h4>
                <div class="actions"> 
                    <input type="submit" name="cows" value="Cows" />
                </div>
            </form>
            </fieldset>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

