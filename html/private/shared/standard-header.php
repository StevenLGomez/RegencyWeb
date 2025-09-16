
<?php

class StandardHeader
{
    public function __construct(
        private $page_title = "Default"
        )
    {
    }

    public function draw()
    {
        echo "<!doctype html>";
        echo "<br />";
        echo "<html lang=\"en\"><br />";
        echo "    <head><br />";
        echo "        <title>Regency - " . htmlsc($page_title) . "</title><br />";
        echo "        <meta charset=\"utf-8\"><br />";
        echo "        <link rel=\"stylesheet\" media=\"all\" href=" . url_for('stylesheets/staff.css') . " >";
        echo "    </head><br />";
        echo "<br />";
        echo "    <body><br />";
        echo "        <header><br />";
        echo "            <h1>Administration Area</h1><br />";
        echo "        </header><br />";
        echo "<br />";
        echo "        <navigation><br />";
        echo "            <ul><br />";
        echo "                <li><br />";
        echo "                    <a href=" . url_for('/staff/index.php') . ">Staff Menu</a><br />";
        echo "                </li><br />";
        echo "            </ul><br />";
        echo "        </navigation<br />";
    }

}


?>

<!-- 

<!doctype html>

<html lang="en">
	<head>
		<title>Regency - <?php echo htmlsc($page_title); ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" media="all" href="<?php echo url_for('stylesheets/staff.css'); ?>" />
	</head>

	<body>
		<header>
			<h1>Administration Area</h1>
		</header>

		<navigation>
			<ul>
				<li>
					<a href="<?php echo url_for('/staff/index.php'); ?>">Staff Menu</a>
				</li>
			</ul>
		</navigation>


-->

