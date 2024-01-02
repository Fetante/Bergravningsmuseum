<?php

include('../config/config.php');

// Get incoming from posted form
$acronym = $_POST['acronym'] ?? "";
$password = $_POST['password'] ?? "";



// Check if posted acronym and password matches
// a user in the database
// Check if the acronym and password matches
// This should be done using the database
$dsn = getDsnToDatabaseFile("user.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
-- Get the password for a acronym
SELECT
    password,
    role
FROM user
WHERE
    acronym = ?
;
EOD;

// Get the password hash from the database
$stmt = $db->prepare($sql);
$args = [$acronym];
$stmt->execute($args);
$res = $stmt->fetch();

// Verify the database hash
$hash = $res["password"];
$success = password_verify($password, $hash); // true or false


// Debugging tool
//$success = true;

// If no match, return to login page
if (!$success) {
    // Do a redirect
    setFlashMessage("warning", "Login failed, wrong user or password!");
    header("Location: login.php");
    exit();
}

// The acronym and password did match, save the acronym in the session
$_SESSION["user"] = $acronym;
$_SESSION["role"] = $res['role']; // Save role in session for administrative purposes
// Do a redirect
setFlashMessage("success", "Login successful, welcome $acronym!");
header("Location: admin.php");
exit();
