<?php

include "includes/database.php";

class Check extends Database
{
    //check db connction
    public function abstractCheck()
    {
        $this->connect();
    }

public function addData(){
    $statment = $this->connect()->prepare('INSERT INTO users (users_name, users_password, users_email) VALUES ("nothing", "pass", "mail");');
    $statment->execute();
    

}

    public function getdata($id)
    {
        $sql = 'SELECT users_name, users_email FROM users WHERE users_id = ?';
        $statemnt = $this->connect()->prepare($sql);
        $statemnt->execute(array($id));
        $rows =  $statemnt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo $row['users_email'];
        }
    }
}

$news = new Check();
$news->getdata(1);
$news->addData("hridoy", "pass", "mail");
