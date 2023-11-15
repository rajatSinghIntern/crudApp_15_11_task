<?php
class DatabaseHandler{
    public $conn;
    public function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "crud_15_11");
        if($this->conn->connect_error){
            echo("Error in connecting to db: {$this->conn->connect_error}.");
        }
    }

    public function createEntry($username, $email, $pass, $fav_supe){
        // code to create db entry
        // success or failure message is returned
        $sql = "INSERT INTO Fans (username, email, password, fav_supe) VALUES (?, ?, ?, ?)";

        if($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("ssss", $username, $email, $pass, $fav_supe);

            if($stmt->execute()){
                return 1;
            } else{
                return 0;
            }
        } else {
            return 0; // Failed to prepare the statement
        }
    }

    public function readAll(){
        // code to read all the entries
        // array is returned
    
        $sql = "SELECT * from fans";
    
        $result = $this->conn->query($sql);
    
        if($result->num_rows > 0){
            $out = array();
            while($row = $result->fetch_assoc()){
                $out[] = array(
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'fav_supe' => $row['fav_supe']
                );
            }
            return $out;
        }
        else{
            return (array());
        }    
    }

    public function readById($id){
        // code to fetch user data from database based on his/her id
        // success or failure message is returned
    
        $sql = "SELECT * from fans WHERE id = ?";
    
        if($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("i", $id);
    
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    return array(
                        'id' => $row['id'],
                        'username' => $row['username'],
                        'email' => $row['email'],
                        'password' => $row['password'],
                        'fav_supe' => $row['fav_supe']
                    );
                } else{
                    return 1; // no user found
                }
            } else{
                return 0; // failed to execute satement
            }
        } else {
            return 0; // failed to prepare statement
        }
    }


public function updateEntry($id, $username, $email, $pass, $fav_supe){
    // code for updating an entry if present
    // $id is mandatory
    // other parameters can be passed as 'no_need' if not needed to update
    // returns success or failure message

    $sql = "UPDATE fans SET "
         . ($username !== '' ? "username = ?, " : "")
         . ($pass !== '' ? "password = ?, " : "")
         . ($email !== '' ? "email = ?, " : "")
         . ($fav_supe !== '' ? "fav_supe = ? " : "")
         . "WHERE id = ?";

    if($stmt = $this->conn->prepare($sql)){
        $types = '';
        $params = array();

        if($username !== ''){
            $types .= 's';
            $params[] = &$username;
        }

        if($pass !== ''){
            $types .= 's';
            $params[] = &$pass;
        }

        if($email !== ''){
            $types .= 's';
            $params[] = &$email;
        }

        if($fav_supe !== ''){
            $types .= 's';
            $params[] = &$fav_supe;
        }

        $types .= 'i';
        $params[] = &$id;

        $stmt->bind_param($types, ...$params);

        if($stmt->execute()){
            return 1; //"Update successful";
        } else{
            return 0; //"Failed to execute statement";
        }
    } else {
        return 0; //"Failed to prepare the statement";
    }
}


    public function deleteEntry($id){
        // code for deleting an entry from database based on the id passed
        // returns success or failure message

        $sql = "DELETE FROM fans WHERE id = ?";

        if($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("i", $id);

            if($stmt->execute()){
                return "Delete successful";
            } else{
                return "Failed to execute statement";
            }
        } else {
            return "Failed to prepare the statement";
        }
    }

}
?>