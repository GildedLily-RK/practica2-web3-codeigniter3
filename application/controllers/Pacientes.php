<?php
defined('BASEPATH') OR exit('No acceso al codigo');

class Pacientes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Paciente_model');
        $this->load->library('form_validation');
    }

    //READ
    public function index() {
        $data['pacientes'] = $this->Paciente_model->get_all();
        $this->load->view('pacientes/index', $data);
    }

    //CREATE - mostrar formulario
    public function crear() {
        $this->load->view('pacientes/form');
    }

    //CREATE - guardar en la bd
    public function guardar(){
        // Validación
        $this->form_validation->set_rules('nombre_completo', 'Nombre Completo', 'required');
        $this->form_validation->set_rules('diagnostico', 'Diagnóstico', 'required');
        $this->form_validation->set_rules('fecha_ingreso', 'Fecha de Ingreso', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pacientes/form');
        } else {
            $data = [
                'nombre_completo' => $this->input->post('nombre_completo'),
                'diagnostico' => $this->input->post('diagnostico'),
                'fecha_ingreso' => $this->input->post('fecha_ingreso'),
            ];
            $this->Paciente_model->crear($data);
            redirect('pacientes');
        }
    }

    // UPDATE - mostrar formulario
    public function editar($id) {
        $data['paciente'] = $this->Paciente_model->get_by_id($id);
        $this->load->view('pacientes/form', $data);
    }

    //UPDATE - con la bd
    public function actualizar($id){
        $this->form_validation->set_rules('nombre_completo', 'Nombre Completo', 'required');
        $this->form_validation->set_rules('diagnostico', 'Diagnóstico', 'required');
        $this->form_validation->set_rules('fecha_ingreso', 'Fecha de Ingreso', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['paciente'] = $this->Paciente_model->get_by_id($id);
            $this->load->view('pacientes/form', $data);
        } else {
            $data = [
                'nombre_completo' => $this->input->post('nombre_completo'),
                'diagnostico' => $this->input->post('diagnostico'),
                'fecha_ingreso' => $this->input->post('fecha_ingreso'),
            ];
            $this->Paciente_model->actualizar($id, $data);
            redirect('pacientes');
        }
    }

    //eliminar
    public function eliminar($id){
        $this->Paciente_model->eliminar($id);
        redirect('pacientes');
    }
}

?>