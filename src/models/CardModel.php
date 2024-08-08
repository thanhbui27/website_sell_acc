<?php
namespace Models;

class CardModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insertTransaction($username, $menhgia, $seri, $pin, $loaithe, $currentMillis, $trans_id) {
        $this->db->query("INSERT INTO naptien(uid, sotien, seri, code, loaithe, time, noidung, tinhtrang, tranid, magioithieu) 
                          VALUES (:username, :menhgia, :seri, :pin, :loaithe, :currentMillis, :username, '0', :trans_id, '0')");
        $this->db->bind(':username', $username);
        $this->db->bind(':menhgia', $menhgia);
        $this->db->bind(':seri', $seri);
        $this->db->bind(':pin', $pin);
        $this->db->bind(':loaithe', $loaithe);
        $this->db->bind(':currentMillis', $currentMillis);
        $this->db->bind(':trans_id', $trans_id);

        return $this->db->execute();
    }

    public function findTransaction($content, $pin, $serial) {
        $this->db->query("SELECT * FROM `naptien` WHERE tinhtrang = '0' AND tranid = :content AND code = :pin AND seri = :serial");
        $this->db->bind(':content', $content);
        $this->db->bind(':pin', $pin);
        $this->db->bind(':serial', $serial);
        return $this->db->single();
    }


    public function updateTransaction($id, $status, $amount = null) {
        if ($status == '1') {
            $this->db->query("UPDATE `naptien` SET `tinhtrang` = 1 WHERE `id` = :id");
        } elseif ($status == '2') {
            $this->db->query("UPDATE `naptien` SET `tinhtrang` = 2, `sotien` = :amount WHERE `id` = :id");
            $this->db->bind(':amount', $amount);
        } else {
            $this->db->query("UPDATE `naptien` SET `tinhtrang` = 3 WHERE `id` = :id");
        }
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
