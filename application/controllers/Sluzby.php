<?php

class Sluzby extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
        $config['base_url'] = "http://localhost:1337/";
    }

    public function index()
    {
        $this->load->model('sluzby_model');
        $total_row = $this->sluzby_model->record_count();
        $config = array();
        $config['base_url'] = base_url() . 'Sluzby/index';
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
        $config['num_links'] = $total_row;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['prev_link'] = 'Predošlí';
        $config['next_link'] = 'Ďalší';

        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['sluzby'] = $this->sluzby_model->getSluzby($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/sluzby', $data);
        $this->load->view('templates/footer');
    }

    public function pridat()
    {
        $this->load->model('sluzby_model');
        $data['taxikari']=$this->sluzby_model->getTaxikari();
        $data['vozidla']=$this->sluzby_model->getVozidla();
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/pridat_sluzbu',$data);
        $this->load->view('templates/footer');
    }

    public function ulozit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('taxikar', 'Vodič', 'required');
        $this->form_validation->set_rules('auto_ID', 'Vozidlo', 'required');
        $this->form_validation->set_rules('zaciatok_sluzby', 'Začiatok služby', 'required');
        $this->form_validation->set_rules('dlzka_sluzby', 'Dlažka služby', 'required');

        if ($this->form_validation->run()) {
            $data = $this->input->post();
            unset($data['submit']);
            $this->load->model('sluzby_model');
            $this->sluzby_model->addSluzba($data);
            redirect(base_url() . "Sluzby/index");

        } else {
            $this->pridat();
        }
    }

    public function upravit($ID)
    {
        $this->load->model('sluzby_model');
        $data['sluzba']=$this->sluzby_model->getSluzba($ID);
        $data['taxikari']=$this->sluzby_model->getTaxikari();
        $data['vozidla']=$this->sluzby_model->getVozidla();
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/upravit_sluzbu', $data);
        $this->load->view('templates/footer');
    }

    public function upravitSluzbu($ID)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('taxikar', 'Vodič', 'required');
        $this->form_validation->set_rules('auto_ID', 'Vozidlo', 'required');
        $this->form_validation->set_rules('zaciatok_sluzby', 'Začiatok služby', 'required');
        $this->form_validation->set_rules('dlzka_sluzby', 'Dlažka služby', 'required');

        if ($this->form_validation->run()) {
            $data = $this->input->post();
            unset($data['submit']);
            $this->load->model('sluzby_model');
            $this->sluzby_model->updateSluzba($data,$ID);
            redirect(base_url() . "Sluzby/index");

        } else {
            $this->pridat();
        }
    }

    public function delete($ID){
        $this->load->model('sluzby_model');
        $this->sluzby_model->deleteSluzba($ID);
        redirect(base_url() . "Sluzby/index");
    }

    public function detail($ID){
        $this->load->model('sluzby_model');
        $data['sluzba'] = $this->sluzby_model->getDetailSluzby($ID);
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/detail_sluzby', $data);
        $this->load->view('templates/footer');
    }

}