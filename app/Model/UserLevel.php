<?php

App::uses('AppModel', 'Model');

Class UserLevel extends AppModel {

public $hasMany = array(
'User');

public function findPlans($role_id) {
$plans = array();
switch($role_id) {
case 1:
$plans = $this->findEmployerPlans();
break;
case 2:
$plans = $this->findApplicantPlans();
break;
default:
$plans = $this->findAllPlans();
}
$return_plans = array();
foreach($plans as $plan) {
$return_plans[$plan['UserLevel']['stripe_plan']] = $plan['UserLevel']['description'] . ": $".$plan['UserLevel']['price'] ."/". $plan['UserLevel']['duration'];
}

return $return_plans;
}

public function findApplicantPlans() {
return $this->find('all', array(
'conditions' => array(
'and' => array(
'id >= ' => '20',
'id < ' => '29'))));
}

public function findEmployerPlans() {
return $this->find('all', array(
'conditions' => array(
'and' => array(
'id >= ' => '10',
'id < ' => '18'))));
}

public function findAllPlans() {
return $this->find('all');
}
}
?>
