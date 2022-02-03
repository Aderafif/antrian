<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_model extends CI_Model
{
    private $table = 'pasien';

    public function getAntrian()
    {
        $sql =  $this->db->get($this->table);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }

    public function getFaskes()
    {
        $sql = 'SELECT * FROM faskes';
        return $this->db->query($sql)->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function timer()
    {
        $sql = 'SELECT * FROM sessioninfo';
        return $this->db->query($sql)->row();
    }

    public function deleteTimestamp()
    {
        $sql = 'DELETE FROM pasien';
        return $this->db->query($sql);
    }

    public function makeTimestamp()
    {
        $sql = "INSERT INTO SessionInfo (session, state, ts) VALUES ('test', '1', current_timestamp());";
        return $this->db->query($sql);
    }

    public function infoAntrian()
    {
        $sql = "SELECT COUNT(nik) FROM pasien";
        return $this->db->query($sql);
    }


    //  public function limit()
    //  {
    //     $sql =  $this->db->get($this->table);
    //     if($sql->num_rows() > 0) {
    //        return $sql->num_rows();
    //    } else {
    //         return 0;
    //    } 
    //  }

}
