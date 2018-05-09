<?php
    class Pages extends CI_Controller{
        public function view($page='home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data = array();
            $data['title'] = 'Taxi Služba';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/navigation');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/footer');
        }
    }