<?php 

/**
 *
 */
class TruckmanModel
{
  private $DB;

  function __construct($BD)
  {
      $this->DB = $BD;
  }

  public function getTruckmans()
  {
      $rows = $this->DB->query("SELECT * FROM truckman");
      if ($rows) {
          $output = '';
          // Creating table of data for truckmans
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

  public function updateTruckman($id, $name, $phone_number, $password, $city, $qwater, $gender, $frequency, $upd_date)
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

      $stmt = $this->DB->query("UPDATE truckman SET name=:name, phone_number=:phone_number, password=:password, city=:city, qwater=:qwater, gender=:gender, frequency=:frequency, upd_date=:upd_date WHERE id=:id", $data, 'update');
      
      return $stmt;
  }

  public function getTruckmanByPlasticType($plasticType)
  {
      $result = $this->DB->query("SELECT * FROM truckman WHERE id IN (SELECT DISTINCT truck_id FROM plastic WHERE category_id = ?)", [$plasticType]);
      return $result;
  }

  public function getTruckmanByQWater($qwater)
  {
      $result = $this->DB->query("SELECT * FROM truckman WHERE qwater = ?", [$qwater]);
      return $result;
  }

  public function getTruckmanByCity($city)
  {
      $result = $this->DB->query("SELECT * FROM truckman WHERE city = ?", [$city]);
      return $result;
  }
}

?>