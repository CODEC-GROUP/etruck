<?php /**
 *
 */
class Auth
{
  private $DB;

  function __construct($BD)
  {
      $this->DB = $BD;
  }
     
    public function Login($phone_number, $password){
        $result = $this->DB->query("SELECT id FROM truckman WHERE phone_number=? AND password=?", [$phone_number, $password]);
        if (count($result)>0) {
            $userId = $result[0]['id'];
            session_start();
            $_SESSION['userId'] = $userId;
            return 1;
        } else {
            return 0;
        }
    }

    public function RegisterUser(
        $name,
        $phone_number,
        $password,
        $city,
        $qwater,
        $gender,
        $frequency,
        $crt_date,  
        $upd_date,
    )
    {
        $data = [$name,$phone_number,$password,$city,$qwater,$gender,$frequency,$crt_date,$upd_date];
        $stmt = $this->DB->query("INSERT INTO `user`(`id`,`name`, `phone_number`, `password`, `city`, `qwater`, `gender`, `frequency`, `crt_date`, `upd_date`) VALUES (NULL,?,?,?,?,?,?,?,?,?);", $data, 'insert');
        if ($stmt) {
            return 1;
        } else {
            return 0;
        }
        
    }
    public function RegisterCompany(
        $name,
        $phone_number,
        $password,
        $city,
        $qwater,
        $frequency,
        $crt_date,  
        $upd_date,
    )
    {
        $data = [$name,$phone_number,$password,$city,$qwater,$frequency,$crt_date,$upd_date];
        $stmt = $this->DB->query("INSERT INTO `user`(`id`,`name`, `phone_number`, `password`, `city`, `qwater`, `frequency`, `crt_date`, `upd_date`) VALUES (NULL,?,?,?,?,?,?,?,?);", $data, 'insert');
        if ($stmt) {
            return 1;
        } else {
            return 0;
        }
        
    }
    public function logOut(){
        session_unset();
        session_destroy();
        $_SESSION = [];
        return 1;
    }

}

?>