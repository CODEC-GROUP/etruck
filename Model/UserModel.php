<?php

/**
 *
 */
class UserModel
{
    private $DB;

    public function __construct($DB)
    {
        $this->DB = $DB;
    }

    public function updateUser($id, $name, $phone_number, $password, $city, $qwater, $gender, $frequency, $upd_date)
    {
        $data = [
            'name' => $name,
            'phone_number' => $phone_number,
            'password' => $password,
            'city' => $city,
            'qwater' => $qwater,
            'gender' => $gender,
            'frequency' => $frequency,
            'upd_date' => $upd_date,
            'id' => $id
        ];

        $stmt = $this->DB->query("UPDATE user SET name=:name, phone_number=:phone_number, password=:password, city=:city, qwater=:qwater, gender=:gender, frequency=:frequency, upd_date=:upd_date WHERE id=:id", $data, 'update');

        return $stmt;
    }

    public function getUsers()
    {
        $rows = $this->DB->query("SELECT * FROM user");
        if ($rows) {
            $output = '';
            // Creating table of data for users
            foreach ($rows as $key => $row) {
                $output .=
                    '<tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $row->name . '</td>
                    <td>' . $row->phone_number . '</td>
                    <td>' . $row->city . '</td>
                    <td>' . $row->qwater . '</td>
                    <td>' . $row->gender . '</td>
                    <td>' . $row->frequency . '</td>
                    <td>' . $row->crt_date . '</td>
                </tr>';
            }
            return $output;
        } else {
            return "empty Table";
        }
    }

    public function findUserByPlasticType($plasticType)
    {
        $result = $this->DB->query("SELECT * FROM user WHERE id IN (SELECT DISTINCT user_id FROM plastic WHERE category_id = ?)", [$plasticType]);
        return $result;
    }

    public function findUserByQWater($qwater)
    {
        $query = "SELECT * FROM user WHERE qwater = ?";
        $result = $this->DB->query($query, [$qwater]);
        return $result;
    }

    public function findUserByCity($city)
    {
        $query = "SELECT * FROM user WHERE city = ?";
        $result = $this->DB->query($query, [$city]);
        return $result;
    }
}

?>