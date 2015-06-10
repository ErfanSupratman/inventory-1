<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->external->redirect_logged_in();
    }

    public function index($offset = 0) {
        $pengaturan = new MSetting();

        $data['data_pengaturan'] = $pengaturan->get();
        $this->load->view('utility/pengaturan/index', $data);
    }

    function tambah() {
        $data['form_action'] = site_url('utility/pengaturan/save');
        $data['id'] = '';
        $data['status'] = '';
        $data['name'] = array('name' => 'name', 'placeholder' => 'Name for Key', 'class' => 'span4');
        $data['content'] = array('name' => 'content');
        $data['btn_back'] = site_url('utility/pengaturan/');
        $this->load->view('utility/pengaturan/tambah', $data);
    }

    function edit($id) {
        $pengaturan = new MSetting();
        $rs = $pengaturan->where('id', $id)->get();
        $data['form_action'] = site_url('utility/pengaturan/update');

        $data['id'] = $id;
        $data['status'] = $rs->type;
        $data['name'] = array('name' => 'name', 'placeholder' => 'Name for Key', 'class' => 'span4', 'value' => $rs->name);
        $data['content'] = array('name' => 'content', 'value' => $rs->value);
        $data['btn_back'] = site_url('pengaturan/');
        $this->load->view('utility/pengaturan/tambah', $data);
    }

    function save() {
        $pengaturan = new MSetting();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Type for content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('utility/pengaturan/add');
        } else {
            if ($pengaturan->exists_record('name', $this->input->post('name')) == TRUE) {
                $this->session->set_flashdata('message', '<div class="alert alert-error">Record Exists, please change another name.</div>');
                redirect('utility/pengaturan/add');
            } else {
                $pengaturan->name = $this->input->post('name');
                $pengaturan->created_at = date('c');

                if ($this->input->post('status') == 'images') {
                    // upload photo
                    $config['upload_path'] = 'assets/upload/pengaturan';
                    $config['allowed_types'] = 'gif|jpg|png|bmp';
                    $this->load->library("upload", $config);
                    if ($this->upload->do_upload("content")) {
                        $data = $this->upload->data();
                        $pengaturan->value = $data["file_name"];
                    } else {
                        print_r($this->upload->display_errors());
                    }
                    $pengaturan->type = "images";
                } else {
                    $pengaturan->type = "text";
                    $pengaturan->value = $this->input->post('content');
                }

                if ($pengaturan->save()) {
                    $msg = '<div class="alert alert-success">Created successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);

                    redirect('utility/pengaturan/');
                }
            }
        }
    }

    function update() {
        $pengaturan = new MSetting();
        // upload photo
        $config['upload_path'] = 'assets/upload/pengaturan';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("content")) {
            $data = $this->upload->data();
        } else {
            //print_r($this->upload->display_errors());
        }

        $pengaturan->where('id', $this->input->post('id'))
                ->update(array(
                    'name' => $this->input->post('name'),
                    'value' => $data["file_name"] == '' ? $this->input->post('content') : $data["file_name"],
                    'updated_at' => date('c')
                        )
        );

        $msg = '<div class="alert alert-success">Update successfuly.</div>';
        $this->session->set_flashdata('message', $msg);
        redirect('utility/pengaturan/');
    }

    function delete($id) {
        $pengaturan = new MSetting();
        $pengaturan->_delete($id);
        redirect('utility/pengaturan/');
    }

}