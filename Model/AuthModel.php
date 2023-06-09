<?php /**
 *
 */
class AuthModel
{
  private $DB;

  function __construct($BD)
  {
      $this->DB = $BD;
  }
     
    public function login($phone_number, $password, $role){
        $role = strtolower($role);
        $result = $this->DB->query("SELECT id FROM $role WHERE phone_number=? AND password=?", [$phone_number, $password]);
        if (count($result)>0) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function registerUser(
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
        $stmt = $this->DB->query("INSERT INTO `user` (`name`, `phone_number`, `password`, `city`, `qwater`, `gender`, `frequency`, `crt_date`, `upd_date`) VALUES (?,?,?,?,?,?,?,?,?);", $data, 'insert');
        if ($stmt) {
            return 1;
        } else {
            return 0;
        }
        
    }

    public function registerTruckman(
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
        $stmt = $this->DB->query("INSERT INTO `truckman`(`name`, `phone_number`, `password`, `city`, `qwater`, `gender`, `frequency`, `crt_date`, `upd_date`) VALUES (?,?,?,?,?,?,?,?,?);", $data, 'insert');
        if ($stmt) {
            return 1;
        } else {
            return 0;
        }
        
    }

    public function registerCompany(
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
        $stmt = $this->DB->query("INSERT INTO `user`(`name`, `phone_number`, `password`, `city`, `qwater`, `frequency`, `crt_date`, `upd_date`) VALUES (?,?,?,?,?,?,?,?);", $data, 'insert');
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