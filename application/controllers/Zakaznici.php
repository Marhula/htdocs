<?php
class Zakaznici extends CI_Controller
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
        $this->load->model('zakaznici_model');
        $total_row = $this->zakaznici_model->record_count();
        $config = array();
        $config['base_url'] = base_url() . 'Zakaznici/index';
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
        $data['zakaznici'] = $this->zakaznici_model->getZakaznici($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $this->load->view('templates/header', ['title' => 'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/zakaznici', $data);
        $this->load->view('templates/footer');
    }

    public function pridat(){
        $this->load->view('templates/header',['title'=>'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/pridat_zakaznika');
        $this->load->view('templates/footer');
    }

    public function ulozit(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('meno', 'Meno', 'required');
        $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'required');
        $this->form_validation->set_rules('tel', 'Telefonne čislo', 'required');
        $this->form_validation->set_rules('mesto', 'Mesto', 'required');
        $this->form_validation->set_rules('userName', 'Prihlasovacie meno', 'required|is_unique[zakaznik.userName]');
        $this->form_validation->set_rules('heslo', 'Heslo', 'required|min_length[5]');

        if($this->form_validation->run()) {
            $data = $this->input->post();
            unset($data['submit']);

            $this->load->model('zakaznici_model');
            $this->zakaznici_model->addZakaznika($data);
            redirect(base_url()."Zakaznici/index");

        } else {
            $this->pridat();
        }
    }

    public function upravit($ID){
        $this->load->model('zakaznici_model');
        $data['zakaznici'] = $this->zakaznici_model->getZakaznika($ID);
        $this->load->view('templates/header',['title'=>'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/upravit_zakaznika',$data);
        $this->load->view('templates/footer');
    }
    public function upravit_zakaznika($ID){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('meno', 'Meno', 'required');
        $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'required');
        $this->form_validation->set_rules('tel', 'Telefonne čislo', 'required');
        $this->form_validation->set_rules('mesto', 'Mesto', 'required');
        $this->form_validation->set_rules('userName', 'Prihlasovacie meno', 'required');
        $this->form_validation->set_rules('heslo', 'Heslo', 'required|min_length[5]');

        if($this->form_validation->run()) {
            $data = $this->input->post();
            unset($data['submit']);

            $this->load->model('zakaznici_model');
            $this->zakaznici_model->updateZakaznika($data,$ID);
            redirect(base_url()."Zakaznici/index");

        } else {
            $this->upravit();
        }
    }
    public function delete($ID){
        $this->load->model('zakaznici_model');
        $this->zakaznici_model->deleteZakaznika($ID);
        redirect(base_url()."Zakaznici/index");
    }

    public function detail($ID){
        $this->load->model('zakaznici_model');
        $data['zakaznici'] = $this->zakaznici_model->getZakaznika($ID);
        $this->load->view('templates/header',['title'=>'Taxi Služba']);
        $this->load->view('templates/navigation');
        $this->load->view('pages/detail_zakaznika',$data);
        $this->load->view('templates/footer');
    }

}