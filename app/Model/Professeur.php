<?php
/**
 * Professeur Model
 *
 */
  class Professeur extends AppModel {

    public function getProfesseurNames ($term = null) {
      if(!empty($term)) {
        $professeurs = $this->find('list', array(
          'conditions' => array(
            'name LIKE' => trim($term) . '%'
          )
        ));
        return $professeurs;
      }
      return false;
    }
  }