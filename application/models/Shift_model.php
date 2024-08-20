<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shift_model extends CI_Model
{
    public function getShift()
    {
        $this->db->select('shift_kd, shift_nm, shift_in, shift_out');
        $this->db->from('master_shift'); // Tambahkan titik koma di sini

        $query = $this->db->get();
        return $query->result();
    }

    public function getShiftById($id)
    {
        $this->db->where('shift_kd', $id);
        $query = $this->db->get('master_shift');
        return $query->row();
    }

    function filter_shift()
    {
        $this->getShift();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function insertShift()
    {
        $post = $this->input->post();
        $array = array(
            'shift_kd' => $post["shift_kd"],
            'shift_nm' => $post["shift_nm"],
            'shift_in' => time(), // Menggunakan time() untuk mendapatkan waktu saat ini
            'shift_out' => time() // Menggunakan time() untuk mendapatkan waktu saat ini
        );
        return $this->db->insert("master_shift", $array);
    }

    public function updateShift()
    {
        $post = $this->input->post();
        $data = array(
            'shift_nm' => $post["shift_nm"],
            'shift_in' => $post["shift_in"],
            'shift_out' => $post["shift_out"]
        );
        $this->db->where('shift_kd', $post['shift_kd']);
        return $this->db->update("master_shift", $data);
    }

    public function deleteShift($id)
    {
        $this->db->where('shift_kd', $id);
        return $this->db->delete('master_shift');
    }
}
