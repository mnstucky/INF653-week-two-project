<!DOCTYPE html>

<?php
// Get parameters
$firstname = filter_input(INPUT_GET, 'firstname');
$lastname = filter_input(INPUT_GET, 'lastname');
$age = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT);
// Set variable to display whether user can vote
$negation = '';
if ($age < 18) {
	$negation = 'not ';
}
// Convert $age to days
$ageInDays = $age * 365;
// Test for valid input, setting appropriate error messages
$isError = false;
$nameErrorMessage = '';
if (!isset($firstname) || !isset($lastname)) {
	$isError = true;
	$nameErrorMessage = 'You did not submit firstname and lastname parameters.';
}
$ageErrorMessage = '';
if (!isset($age) || !$age) {
	$isError = true;
	$ageErrorMessage = 'You did not submit a numeric age parameter.';
}
?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Get Parameter Assignment: Matt Stucky</title>
</head>

<body>
	<header>
		<p>Today is <?php echo date('m-d-Y')?></p>
	</header>
	<?php
	if ($isError) {
		echo "<p>$nameErrorMessage</p>";
		echo "<p>$ageErrorMessage</p>";
		exit();
	}
	?>
	<h1>Hello, my name is <?php echo htmlspecialchars("$firstname $lastname") ?>.</h1>
	<p>I am <?php echo $negation ?>old enough to vote in the United States.</p>
	<p>That means I'm at least <span class="underlined"><?php echo number_format($ageInDays) ?></span> days old.</p>
</body>

</html>