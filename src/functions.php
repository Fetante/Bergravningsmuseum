<?php

/**
* Destroy the session
*/
function destroySession(): void
{
    // Unset all of the session varables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
}

/**
 * Set flash message
 */
function setFlashMessage(string $type, string $message): void
{
    $flashMessage = <<< EOD
    <div class="$type">
        <p>$message</p>
    </div>
    EOD;
    $_SESSION['flash-message'] = $flashMessage;
}

/**
 * Get the flash message and return it, if any.
 *
 * @return string with flash message, empty string of no message exists-
 */
function getFlashMessage(): string
{
    $flashMessage = $_SESSION["flash-message"] ?? "";
    unset($_SESSION["flash-message"]);

    return $flashMessage;
}

/**
 * Kopplla upp mot databasen
 * $@param
 */
function connectToDatabase(string $dsn): object
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>'$dsn'<br>";
        throw $e;
    }
    return $db;
}

/**
 * Get DSN to the database file
 */
function getDsnToDatabaseFile(string $filename): string
{
    $fileName = "../db/$filename";
    if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
        $fileName = "c:\\db\\$filename";
    }
    $dsn = "sqlite:$fileName"; // Data source name, namn på datakälla
    return $dsn;
}
