<?php
  class ProfesseursController extends AppController {

    public $layout = 'default';

    public $components = array('RequestHandler');

    public function index() {
      if ($this->request->is('ajax')) {
        $term = $this->request->query('term');
        $professeurNames = $this->Professeur->getProfesseurNames($term);
        $this->set(compact('professeurNames'));
        $this->set('_serialize', 'professeurNames');
      }
    }
  }