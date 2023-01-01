<?php


class ChatModel
{
    
    public static function getContentById($id)
    {   
        $db = DB::getInstance();
        $result = mysqli_query($db->con, "SELECT * FROM users WHERE id = {$id}");
        return $result;
    }
 
    public static function getAdmininfor(){
        $db = DB::getInstance();
        $sql = mysqli_query($db->con, "SELECT * FROM users WHERE id = '1000'");
        $row = mysqli_fetch_assoc($sql);
        return $row;
    }

}