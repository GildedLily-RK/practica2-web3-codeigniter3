<?php
defined('BASEPATH') OR exit('No acceso al codigo');

class Paciente_model extends CI_Model {
    private $table = 'pacientes';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id) {
        return $this->db
                    ->where('id', $id)
                    ->get($this->table)
                    ->row_array();
    }

    public function crear($data){
        return $this->db->insert($this->table, $data);
    }

    public function actualizar($id, $data){
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function eliminar($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
?>