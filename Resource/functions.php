<?php
include_once 'connection.php';

function duplicateExists($table, $column, $value, $conn)
{
    $dup = false;
    try {
        //echo ($table . $column . $value);
        $query = "SELECT * FROM $table where $column = ?;";
        $statement = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($statement, $query)) {
            mysqli_stmt_bind_param($statement, "s", $value);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);

            if (mysqli_fetch_assoc($result)) {
                $dup = true;
            }
            return $dup;
        }
        mysqli_close($conn);
    } catch (Exception $e) {
    }
}

function duplicateExistsI($table, $column, $value, $conn, $userID)
{
    $dup = false;
    try {
        //echo ($table . $column . $value);
        $query = "SELECT * FROM $table where $column = ? AND id != $userID;";
        $statement = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($statement, $query)) {
            mysqli_stmt_bind_param($statement, "s", $value);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);

            if (mysqli_fetch_assoc($result)) {
                $dup = true;
            }
            return $dup;
        }
        mysqli_close($conn);
    } catch (Exception $e) {
    }
}

function checkNumber($value)
{
    return is_numeric($value);
}

function checkName($value)
{
    $value = str_replace(" ", "", $value);
    return ctype_alpha($value);
}
