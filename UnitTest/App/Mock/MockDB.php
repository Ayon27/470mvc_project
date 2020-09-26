<?php


namespace App\Mock;


class MockDB
{
    public $table, $column, $value, $conn, $db;

    public function __construct($table, $column, $value, $conn)
    {
        $this->$table = $table;
        $this->$column = $column;
        $this->$value = $value;
        $this->$conn = $conn;
    }

    public function buildList()
    {
        $this->db = array(
            array(
                'id' => 01,
                'name' => 'John Doe',
                'email' => 'john@doe.com'
            ),
            array(
                'id' => 02,
                'name' => 'Bob the builder',
                'email' => 'bob@builder.com'
            ),
            array(
                'id' => 03,
                'name' => 'Spider Man',
                'email' => 'Spider@man.com'
            ),
        );
        //echo"gg";
    }

    public function checkDuplicateFromList($item)
    {
        //echo"ggx";

        $dup_found = false;

        foreach ($this->db as $key => $value) {
            foreach ($value as $sub_key => $sub_value) {
                if ($sub_value == $item) {
                    $dup_found = true;
                    echo "Duplicate of " . $item . " has been found";
                    break;
                }
            }
        }
        //echo $dup_found;
        return $dup_found;
    }

}