<?php
/*
    addMenuItem
*/
include_once('../includes/connection.php');
$addMenuItem = new removeMenuItem();
class removeMenuItem
{
    public function __construct()
    {
        $this->execute();
    }
    public function removeMenuItem()
    {
        $db = new Connection();
        $sql = "DELETE FROM menu_items WHERE menu_items.item_id = ?;";
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            if($stmt = mysqli_prepare($db->conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "s", $item_id);
                $item_id = $_GET["item_id"];

                if(mysqli_stmt_execute($stmt))
                {
                    header('Location:../menu_update_confirmation.php');
                }
                else
                {
                    echo "ERROR: Could not execute query: $sql. ";
                }
            }
            else
            {
                echo "could not create menu item\n";
                echo mysqli_error($db->conn);
            }
        }

        mysqli_stmt_close($stmt);
    }

    public function execute()
    {
        $this->removeMenuItem();
    }
}
?>