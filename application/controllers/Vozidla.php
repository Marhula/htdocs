<?php

class Vozidla extends CI_Controller
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
        $this->load->model('vozidla_model');
        $total_row = $this->vozidla_model->record_count();
        $config = array();
        $config['base_url'] = base_url() . 'Vozidla/index';
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
        $data['vozidla'] = $this->vozidla_model->getVozidla($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/vozidla', $data);
        $this->load->view('templates/footer');
    }

    public function pridat()
    {
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/pridat_vozidlo');
        $this->load->view('templates/footer');
    }

    public function ulozit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('znacka', 'Značka', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('spz', 'ŠPZ', 'required|is_unique[auto.spz]');
        $this->form_validation->set_rules('najazdeneKM', 'Počet najazdených km', 'required|numeric');

        if ($this->form_validation->run()) {
            $data = $this->input->post();
            unset($data['submit']);
            $this->load->model('vozidla_model');
            $this->vozidla_model->addVozidlo($data);
            redirect(base_url() . "Vozidla/index");

        } else {
            $this->pridat();
        }

    }

    public function upravit($ID)
    {
        $this->load->model('vozidla_model');
        $data['vozidla'] = $this->vozidla_model->getVozidlo($ID);
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/upravit_vozidlo', $data);
        $this->load->view('templates/footer');
    }

    public function upravit_vozidlo($ID)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('znacka', 'Značka', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('spz', 'ŠPZ', 'required');
        $this->form_validation->set_rules('najazdeneKM', 'Počet najazdených km', 'required|numeric');

        if ($this->form_validation->run()) {
            $data = $this->input->post();
            unset($data['submit']);
            $this->load->model('vozidla_model');
            $this->vozidla_model->updateVozidlo($data, $ID);
            redirect(base_url() . "Vozidla/index");
        } else {
            $this->pridat();
        }
    }

    public function detail($ID)
    {
        $this->load->model('vozidla_model');
        $data['vozidla'] = $this->vozidla_model->getVozidlo($ID);
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/detail_vozidlo', $data);
        $this->load->view('templates/footer');
    }

    public function delete($ID)
    {
        $this->load->model('vozidla_model');
        $this->vozidla_model->deleteVozidlo($ID);
        redirect(base_url() . "Vozidla/index");

    }
}

?>