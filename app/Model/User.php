App::uses('AppModel', 'Model');

Class User extends AppModel {
	public $validate = array(
		'email' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => "Email is blank" 

		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => "Password is blank"
			)
		),

		'roleId' => array(
			'required' => array(
				'rule' => array('naturalNumber', true),
				'message' => "Role is not valid"

		)

	);	

}
