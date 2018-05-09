<?php
class Taxikari extends CI_Controller{
    public function ulozit(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('meno', 'Meno', 'required');
        $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'required');
        $this->form_validation->set_rules('telCislo', 'Telefonne čislo', 'required');

        if($this->form_validation->run()) {
            $now = date('Y-m-d');
            $data = $this->input->post();
            $data['zamestnany'] = $now;
            unset($data['submit']);
            print_r($data);

            $this->load->model('taxikari_query');
            $this->taxikari_query->addTaxikari($data);
            return redirect(taxikari);

        } else {
            $this->load->view('templates/header',['title'=>'Taxi Služba']);
            $this->load->view('templates/navigation');
            $this->load->view('pages/pridat_taxikara');
            $this->load->view('templates/footer');
        }
    }
}