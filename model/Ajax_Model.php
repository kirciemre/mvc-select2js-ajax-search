<?php
class Allowance_Model extends CI_Model
{

public function find_person($search_item)
    {
        $data = $this->db
        ->select('*
                  ')
        ->from('personel as p')
        ->where('CONCAT(p.personel_ad," ", p.personel_soyad) like', "%".$search_item."%")
        ->order_by('p.personel_ad DESC')
        ->get()->result();
        return $data;
    }   
}