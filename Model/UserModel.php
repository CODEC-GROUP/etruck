
<?php /**

 *
 */
class UserModel
{
    private $DB;

    function __construct($BD)
    {
        $this->DB = $BD;
    }
  

    public function getUsers()
    {
        $rows = $this->DB->query("SELECT * FROM user");
        if ($rows) {
            $output = '';
            // creating table of data for household
            foreach ($rows as $key => $row) {
                $output .=
                    '<tr>
            <td>' . ($key + 1) . '</td>
            <td>' . $row->name . '</td>
               <td>' . $row->phone_number . '</td>
               <td>' . $row->city . '</td>
               <td> ' . $row->qwater . '</td>
               <td>' . $row->gender . '</td>
               <td> ' . $row->frequency . '</td>
               <td> ' . $row->crt_date . '</td>
            </tr>';
            }
            return $output;
        } else {
            return $output = "empty Table";
        }
    }

    public function deleteUser(int $id): int
    {
        // checking if data to delete exist
        $rows = $this->DB->query("SELECT * FROM `user` WHERE `id`=?", [$id]);
        if (count($rows) > 0) {
            // if data is available we proceed to delete
            $stmt = $this->DB->query("DELETE FROM user WHERE id=?", [$id], 'delete');
            if ($stmt) {
                // we retun 1 if successfull delete
                return 1;
            }
        } elseif (count($rows) == 0) {
            // if data is available we proceed to delete
            return 2;
        }
    }
}
