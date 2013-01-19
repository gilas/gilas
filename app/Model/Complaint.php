<?php
App::uses('AppModel', 'Model');
/**
 * Complaint Model
 *
 * @property User $User
 */
class Complaint extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $tablePrefix = 'yg_';
    
    public $actsAs = array(
        'UploadPack.Upload' => array(
            'attachment' => array(
                'path' => ':webroot/files/complaints/:id-:basename.:extension'
            ),
        ),
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'subject';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'تکمیل این فیلد ضروری است',
			),
		),
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'تکمیل این فیلد ضروری است',
			),
		),
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'تکمیل این فیلد ضروری است',
			),
		),
		'comp_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'تکمیل این فیلد ضروری است',
			),
		),
		'comp_family' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'تکمیل این فیلد ضروری است',
			),
		),
		'comp_email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'مقدار وارد شده نامعتبر است',
				'allowEmpty' => true,
			),
		),
		'comp_mobile' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'تکمیل این فیلد ضروری است',
			),
			'minlength' => array(
				'rule' => array('minlength', 11),
				'message' => 'مقدار وارد شده نامعتبر است',
			),
            'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'مقدار وارد شده نامعتبر است',
			),
		),
        'attachment' => array(
            'maxSize' => array(
                'rule' => array('attachmentMaxSize', 2096576),
                'message' => 'اندازه تصویر آپلودی نمی تواند بیشتر از 2 مگابایت باشد',
                
            ),
            'extension' => array(
                'rule' => array('attachmentContentType', array('image/jpeg', 'image/png', 'image/pjpeg', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')),
                'message' => 'فقط مجاز به فرمت های jpg, png, doc, docx, pdf',
            ),
        )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}