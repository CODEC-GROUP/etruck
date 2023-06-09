<?php

/**
 *
 */
class PlasticModel
{
    private $DB;

    function __construct($BD)
    {
        $this->DB = $BD;
    }

    public function insertPlastic($categoryId, $poster, $posterId, $image, $will, $location, $status, $crt_date, $upd_date)
    {
        $data = [
            'category_id' => $categoryId,
            'poster' => $poster,
            'poster_id' => $posterId,
            'image' => $image,
            'will' => $will,
            'location' => $location,
            'status' => $status,
            'crt_date' => $crt_date,
            'upd_date' => $upd_date,
        ];

        $stmt = $this->DB->query("INSERT INTO plastic (category_id, poster, poster_id, image, will, location, status, crt_date, upd_date) VALUES (:category_id, :poster, :poster_id, :image, :will, :location, :status, :crt_date, :upd_date)", $data, 'insert');

        return $stmt;
    }

    public function reservePlastic($plasticId, $truckId)
    {
        $data = [
            'plastic_id' => $plasticId,
            'truck_id' => $truckId,
        ];

        $stmt = $this->DB->query("UPDATE plastic SET truck_id=:truck_id WHERE id=:plastic_id", $data, 'update');

        return $stmt;
    }

    public function updatePlastic($plasticId, $categoryId, $poster, $posterId, $image, $will, $location, $status, $upd_date)
    {
        $data = [
            'plastic_id' => $plasticId,
            'category_id' => $categoryId,
            'poster' => $poster,
            'poster_id' => $posterId,
            'image' => $image,
            'will' => $will,
            'location' => $location,
            'status' => $status,
            'upd_date' => $upd_date,
        ];

        $stmt = $this->DB->query("UPDATE plastic SET category_id=:category_id, poster=:poster, poster_id=:poster_id, image=:image, will=:will, location=:location, status=:status, upd_date=:upd_date WHERE id=:plastic_id", $data, 'update');

        return $stmt;
    }

    public function getPlastics()
    {
        $rows = $this->DB->query("SELECT * FROM plastic");
        if ($rows) {
            $output = '';
            // Creating table of data for plastics
            foreach ($rows as $key => $row) {
                $output .=
                    '<tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $row->category_id . '</td>
                    <td>' . $row->poster . '</td>
                    <td>' . $row->poster_id . '</td>
                    <td>' . $row->truck_id . '</td>
                    <td>' . $row->image . '</td>
                    <td>' . $row->will . '</td>
                    <td>' . $row->location . '</td>
                    <td>' . $row->status . '</td>
                    <td>' . $row->crt_date . '</td>
                    <td>' . $row->upd_date . '</td>
                </tr>';
            }
            return $output;
        } else {
            return "empty Table";
        }
    }

    public function getPlasticsByType($categoryId)
    {
        $result = $this->DB->query("SELECT * FROM plastic WHERE category_id = ?", [$categoryId]);
        return $result;
    }
}


?>