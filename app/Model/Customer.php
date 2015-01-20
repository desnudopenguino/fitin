<?php

App::uses('AppModel', 'Model');

Class Customer extends AppModel {
       public $belongsTo = array(
               'User');

       public function beforeSave($options = array()) {
               $this->data[$this->alias]['user_id'] = AuthComponent::user('id');
    return true;
       }
}
?>
