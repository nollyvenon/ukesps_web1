<?php

/**
 * DB class
 * @author Lekan Esan <lekan@instafxng.com>
 */
class mysqlDB
{
    private $host = "localhost";
    private $user = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    private $conn;

    function __construct($db, $user, $password)
    {
        $this->database = $db;
        $this->user = $user;
        $this->password = $password;
        $this->conn = $this->connectDB();
    }

    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    function closeDB()
    {
        if (isset($this->conn)) {
            mysqli_close($this->conn);
            unset($this->conn);
        }
    }

    function runQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function fetchAssoc($result)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }

    function fetchArray($result)
    {
        while ($row = mysqli_fetch_array($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }

    function fetchRow($result)
    {
        while ($row = mysqli_fetch_row($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }

    function numRows($query)
    {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        if (empty($rowcount)) {
            return 0;
        } else {
            return $rowcount;
        }
    }

    function maxOf($column, $table, $where)
    {
        global $db_handle;
        $query = "SELECT MAX(`$column`) AS Max_data FROM `$table` WHERE $where";
        $result = mysqli_query($this->conn, $query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data[0]['Max_data'];
    }

    /** Get the maximum value of a column in a table.
     * @param $column The column where to compute the maximum.
     * @param $table The table where to compute the maximum.
     * @return The maximum value (or NULL if result is empty).
     */
    function maxOfAll($column, $table)
    {
        global $db_handle;
        $query = "SELECT MAX($column) as $column FROM $table ORDER BY number DESC LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $maxID = $fetched_data[0][$column];
        return $maxID;
    }

    function numOfRows($result)
    {
        $rowcount = mysqli_num_rows($result);
        if (empty($rowcount)) {
            return 0;
        } else {
            return $rowcount;
        }
    }

    function affectedRows()
    {
        return mysqli_affected_rows($this->conn);
    }

    function multi_query($query)
    {
        /* execute multi query */
        if (mysqli_multi_query($this->conn, $query)) {
            $i = true;
            do {
                /* store first result set */
                if ($result = mysqli_store_result($this->conn)) {
                    while ($row = mysqli_fetch_row($result)) {
                        printf("%s\n", $row[0]);
                    }
                    mysqli_free_result($result);
                }
                /* print divider */
                if (mysqli_more_results($this->conn)) {
                    $i = true;
                    printf("-----------------\n");
                } else {
                    $i = false;
                }
            } while ($i && mysqli_next_result($this->conn));
        }
    }

    function insertedId()
    {
        return mysqli_insert_id($this->conn);
    }

    function sanitizePost($string)
    {
        return mysqli_real_escape_string($this->conn, $string);
    }
}

$db_handle = new mysqlDB(DB_NAME, DB_USER, DB_PASS);
//$db_handle2 = new mysqlDB('lifehelpclub', 'root', '');