<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shift extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->session->userdata('login') != TRUE) {
            redirect(base_url('login'));
        }
        $this->load->model('shift_model');
    }
    public function index()
    {
        level_user('user', 'index', $this->session->userdata('kategori'), 'read') > 0 ? '' : show_404();
        $this->load->view('member/user/beranda');
    }

    public function shift()
    {
        level_user('user', 'shift', $this->session->userdata('kategori'), 'read') > 0 ? '' : show_404();
        $data['shift'] = $this->db->get('master_shift')->result();
        $this->load->view('member/user/shift', $data);
    }

    public function shiftdetail()
    {
        cekajax();
        $get = $this->input->get();
        $list = $this->shift_model->getShift();
        $data = array();
        foreach ($list as $r) {
            $row = array();
            $tombolhapus = level_user('user', 'shift', $this->session->userdata('kategori'), 'delete') > 0 ? '<li><a href="#" onclick="hapus(this)" data-id="' . $this->security->xss_clean($r->id) . '">Hapus</a></li>' : '';
            $tomboledit = level_user('user', 'shift', $this->session->userdata('kategori'), 'edit') > 0 ? '<li><a href="#" onclick="edit(this)" data-id="' . $this->security->xss_clean($r->id) . '">Edit</a></li>' : '';

            $row[] = ' 
                    <div class="btn-group dropup">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">  
                            ' . $tomboledit . '
                            ' . $tombolhapus . '
                        </ul>
                    </div>
                    ';
                    $this->security->xss_clean($r->shift_kd),
                    $this->security->xss_clean($r->shift_nm),
                    $this->security->xss_clean($r->shift_in),   
                    $this->security->xss_clean($r->shift_out)
        }
        $result = array(
            "draw" => $get['draw'],
            "recordsTotal" => $this->shift_model->getShift(),
            "recordsFiltered" => $this->shift_model->filter_shift(),
            "data" => $data,
        );
        echo json_encode($result);
    }

    public function shiftedit()
    {
        cekajax();
        $simpan = $this->shift_model;
        $post = $this->input->post();
        if ($simpan->updateShift()) {
            $data['success'] = true;
            $data['message'] = "Berhasil menyimpan data";
        } else {
            $errors['fail'] = "gagal melakukan update data";
            $data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function shifthapus()
    {
        cekajax();
        $hapus = $this->shift_model;
        if ($hapus->deleteShift()) {
            $data['success'] = true;
            $data['message'] = "Berhasil menghapus data";
        } else {
            $errors['fail'] = "gagal menghapus data";
            $data['errors'] = $errors;
        }
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }
}
