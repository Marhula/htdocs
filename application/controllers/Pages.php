<?php
    class Pages extends CI_Controller{
        public function view($page='home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }


            $data['title'] = 'Taxi Služba';
            $this->load->model('graph_model');
            $data['topkm'] = $this->graph_model->getTopAuta();
            $data['pocetAut'] = $this->graph_model->getTopAuta();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/navigation');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/footer');


        }
    }