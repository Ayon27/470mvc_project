<?php


namespace App\Models;

use App\Mock\MockDB;
use Exception;

class checkDuplicate
{
    function duplicateExists($table, $column, $value, $conn): bool
    {
//        $dup = false;
//        try {
//            //echo ($table . $column . $value);
//            $query = "SELECT * FROM $table where $column = ?;";
//            $statement = mysqli_stmt_init($conn);
//
//            if (mysqli_stmt_prepare($statement, $query)) {
//                mysqli_stmt_bind_param($statement, "s", $value);
//                mysqli_stmt_execute($statement);
//                $result = mysqli_stmt_get_result($statement);
//
//                if (mysqli_fetch_assoc($result)) {
//                    $dup = true;
//                }
//                return $dup;
//            }
//            mysqli_close($conn);
//        } catch (Exception $e) {
//        }


        $MockDB = new MockDB($table, $column, $value, $conn);
        $MockDB->buildList();
        // echo "gg";
        return $MockDB->checkDuplicateFromList($value);
    }

    function duplicateExistsI($table, $column, $value, $conn, $userID)
    {
        $dup = false;
        try {
//            //echo ($table . $column . $value);
//            $query = "SELECT * FROM $table where $column = ? AND id != $userID;";
//            $statement = mysqli_stmt_init($conn);
//
//            if (mysqli_stmt_prepare($statement, $query)) {
//                mysqli_stmt_bind_param($statement, "s", $value);
//                mysqli_stmt_execute($statement);
//                $result = mysqli_stmt_get_result($statement);
//
//                if (mysqli_fetch_assoc($result)) {
//                    $dup = true;
//                }
//                return $dup;
//            }
//            mysqli_close($conn);
        } catch (Exception $e) {
        }
    }


}