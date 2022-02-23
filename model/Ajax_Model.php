<?php
class Allowance_Model extends CI_Model
{

    public function find_person($search_item)
    {
        $data = $this->db
        ->select('*
                  ')
        ->from('users as u')
        ->join('user_profile_pictures as up','up.fk_user_id=u.tckn and up.status=1','left')
        ->where('CONCAT(u.ad," ", u.soyad) like', "%".$search_item."%")
        ->where("u.status", 1)
        ->order_by('u.ad DESC')
        ->get()->result_array();
        return $data;
    }   