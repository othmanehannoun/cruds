<?php
require_once('db_config.php');
$db = new dbconfig();
class User {
    public function InsertUser(){
        global $db;

        if(isset($_POST['send'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $db->connection->prepare(" INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (null,?,?,?) ");
            $stmt->execute(array($name, $email, $password));

            if (!$stmt) {
                print_r($stmt->errorInfo());
                return array('status' => 'error', 'message' => 'Problema ao remover este item...');
            } else {
                return array('status' => 'success', 'message' => 'O registo foi removido com sucesso...');
            }
        }
    }

}
?>