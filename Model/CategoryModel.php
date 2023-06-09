<?php

/**
 *
 */
class CategoryModel
{
  private $DB;

  function __construct($BD)
  {
      $this->DB = $BD;
  }

  public function getCategories()
  {
      $rows = $this->DB->query("SELECT * FROM category");
      if ($rows) {
          $output = '';
          // Creating table of data for categories
          foreach ($rows as $key => $row) {
              $output .=
                  '<tr>
                  <td>' . ($key + 1) . '</td>
                  <td>' . $row->name . '</td>
                  <td>' . $row->crt_date . '</td>
                  <td>' . $row->upd_date . '</td>
              </tr>';
          }
          return $output;
      } else {
          return "empty Table";
      }
  }
}

?>
