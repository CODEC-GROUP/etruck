<?php

/**
 *
 */
class CompanyModel
{
    private $DB;

    public function __construct($DB)
    {
        $this->DB = $DB;
    }

    public function updateCompany($id, $name, $phone_number, $password, $city, $qwater, $frequency, $upd_date)
    {
        $data = [
            'name' => $name,
            'phone_number' => $phone_number,
            'password' => $password,
            'city' => $city,
            'qwater' => $qwater,
            'frequency' => $frequency,
            'upd_date' => $upd_date,
            'id' => $id
        ];

        $stmt = $this->DB->query("UPDATE company SET name=:name, phone_number=:phone_number, password=:password, city=:city, qwater=:qwater, frequency=:frequency, upd_date=:upd_date WHERE id=:id", $data, 'update');

        return $stmt;
    }

    public function getCompanies()
    {
        $rows = $this->DB->query("SELECT * FROM company");
        if ($rows) {
            $output = '';
            // Creating table of data for companies
            foreach ($rows as $key => $row) {
                $output .=
                    '<tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $row->name . '</td>
                    <td>' . $row->phone_number . '</td>
                    <td>' . $row->city . '</td>
                    <td>' . $row->qwater . '</td>
                    <td>' . $row->frequency . '</td>
                    <td>' . $row->crt_date . '</td>
                </tr>';
            }
            return $output;
        } else {
            return "empty Table";
        }
    }

    public function getCompanyByPlasticType($plasticType)
    {
        $result = $this->DB->query("SELECT * FROM company WHERE id IN (SELECT DISTINCT company_id FROM plastic WHERE category_id = ?)", [$plasticType]);
        return $result;
    }

    public function findCompanyByQWater($qwater)
    {
        $query = "SELECT * FROM company WHERE qwater = ?";
        $result = $this->DB->query($query, [$qwater]);
        return $result;
    }

    public function findCompanyByCity($city)
    {
        $query = "SELECT * FROM company WHERE city = ?";
        $result = $this->DB->query($query, [$city]);
        return $result;
    }
}

?>

