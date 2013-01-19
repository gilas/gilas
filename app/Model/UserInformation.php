<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UserInformation extends AppModel {

    public $tablePrefix = 'yg_';
	public $validate = array(
        'place_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'raste_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'first_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'last_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'father_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'gender' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 2),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        'code_melli' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
            'check_code' => array(
				'rule' => array('checkCodeMelli'),
				'message' => 'کد ملی معتبر نمی باشد ',
			),
        ),
        'shenasnameh_number' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
        ),
        'mahale_sodoor' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'birth_day' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'din' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'mazhab' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'vazifeh_omoomi' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 3),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        'madrak_tahsili' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 9),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        'taahol' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 2),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        'sarparast' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 2),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        'isargari' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 5),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        'history_duration' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
                'allowEmpty' => true,
            ),
        ),
        'postal_code' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
            'minLength' => array(
	            'rule'    => array('minLength', 10),
	            'message' => 'کد پستی 10 رقمی وارد شود',
	        ),
        ),
        'telephone' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
            'minLength' => array(
	            'rule'    => array('minLength', 11),
	            'message' => 'طول مقدار نباید کمتر از 11 باشد',
	        ),
        ),
        'home_address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'mobile' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
            'minLength' => array(
	            'rule'    => array('minLength', 11),
	            'message' => 'مقدار باید 11 رقمی باشد',
	        ),
        ),
        'market_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'market_address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'market_telephone' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
            'minLength' => array(
	            'rule'    => array('minLength', 11),
	            'message' => 'طول مقدار نباید کمتر از 11 باشد',
	        ),
        ),
        'market_fax' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
            'minLength' => array(
	            'rule'    => array('minLength', 11),
	            'message' => 'طول مقدار نباید کمتر از 11 باشد',
	        ),
        ),
        'market_postal_code' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
            'minLength' => array(
	            'rule'    => array('minLength', 10),
	            'message' => 'کد پستی 10 رقمی وارد شود',
	        ),
        ),
        'mantagheh_shahrdari' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'vazeyat_joghrafiaee' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
        ),
        'vasihat_malekiat' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 6),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        'market_masahat' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'فقط عدد باید وارد شود',
            ),
        ),
        'mahale_esteghrar' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'تکمیل این فیلد ضروری است',
            ),
            'between' => array(
                'rule' => array('between', 1, 3),
                'message' => 'مقدار وارد شده نامعتبر است',
            ),
        ),
        
    );
	
    public $namedStatus = array(
        -1 => 'حذف شده',
        0 => 'جدید',
        1 => 'تائید اولیه',
        2 => 'تائید مدارک',
        3 => 'تائید بازرس',
        -3 => 'عدم تائید بازرس',
    );
    public $formattedStatus = array(
        -1 => '<span class="label label-important">حذف شده</span>',
        0 => '<span class="label">جدید</span>',
        1 => '<span class="label label-success">تائید اولیه</span>',
        2 => '<span class="label label-success">تائید مدارک</span>',
        3 => '<span class="label label-success">تائید بازرس</span>',
        -3 => '<span class="label label-important">عدم تائید بازرس</span>',
    );
    public $namedVazifehOmoomi = array(
        1 => 'پایان خدمت',
        2 => 'معاف دائم',
        3 => 'معافیت تحصیلی',
    );
    public $namedGender = array(
        1 => 'مرد',
        2 => 'زن',
    );
    public $namedMadrakTahsili = array(
        1 => 'بی سواد',
		2 => 'خواندن، نوشتن',
		3 => 'حوزوی',
		4 => 'سیکل',
		5 => 'دیپلم',
		6 => 'کاردانی',
		7 => 'کارشناسی',
		8 => 'کارشناسی ارشد',
		9 => 'دکترا',
    );
    public $namedIsargari = array(
        0 => 'فاقد سهمیه',
        1 => 'خانواده شهید',
		2 => 'آزاده',
		3 => 'جانباز',
		4 => 'رزمنده',
		5 => 'بسیجی',
    );
    public $namedTaahol = array(
        1 => 'مجرد',
		2 => 'متاهل',
    );
    public $namedMahaleEsteghrar =  array(
		1 => 'مستقل',
		2 => 'مجتمع تجاری',
		3 => 'مجتمع مسکونی',
	);
    public $namedVazeyatMalekiat = array(
		1 => 'ملکی',
		2 => 'استيجاري',
		3 => 'رهن',
		4 => 'رهن - اجاره',
		5 => 'سرقفلي',
		6 => 'قولنامه',
	);
    public $namedVazeyatJoghrafiaee = array(
        1 => 'مجاور اصلی',
        2 => 'مجاور فرعی',
        3 => 'داخل کوچه',
    );
    
	public $belongsTo = array(
		'User',
		'Place',
		'Raste',
		'Degree',
        'State' => array(
			'className' => 'State',
			'foreignKey' => 'mahale_sodoor',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
    
    function checkCodeMelli($meli_code){
       	$meli_code = $meli_code['code_melli'];
            if(strlen($meli_code) == 10){
                if ($meli_code == '1111111111' ||
                    $meli_code == '0000000000' ||
                    $meli_code == '2222222222' ||
                    $meli_code == '3333333333' ||
                    $meli_code == '4444444444' ||
                    $meli_code == '5555555555' ||
                    $meli_code == '6666666666' ||
                    $meli_code == '7777777777' ||
                    $meli_code == '8888888888' ||
                    $meli_code == '9999999999') {
                    return false;
                }
                $c = intval($meli_code[9]);
                $n = intval($meli_code[0]) * 10 +
                     intval($meli_code[1]) * 9 +
                     intval($meli_code[2]) * 8 +
                     intval($meli_code[3]) * 7 +
                     intval($meli_code[4]) * 6 +
                     intval($meli_code[5]) * 5 +
                     intval($meli_code[6]) * 4 +
                     intval($meli_code[7]) * 3 +
                     intval($meli_code[8]) * 2;
                $r = $n - intval($n / 11) * 11;
                if (($r == 0 && $r == $c) || ($r == 1 && $c == 1) || ($r > 1 && $c == 11 - $r)) {
                    return true;
                }
            }
            return false;
    }
        
    public function afterFind($results){
        if(empty($results)){
            return $results;
        }
        if($this->findQueryType != 'count'){
            foreach($results as &$result){
                //TODO: Unknown error , how to get type of find (all, first, count, ...) 
                if(!empty($result['UserInformation']) and is_array($result['UserInformation'])){
                    $this->_getCityInfo($result['UserInformation']);
                    $result['UserInformation']['namedStatus'] = $this->namedStatus[$result['UserInformation']['status']];
                    $result['UserInformation']['formattedStatus'] = $this->formattedStatus[$result['UserInformation']['status']];
                    $result['UserInformation']['namedVazifehOmoomi'] = $this->namedVazifehOmoomi[$result['UserInformation']['vazifeh_omoomi']];
                    $result['UserInformation']['namedGender'] = $this->namedGender[$result['UserInformation']['gender']];
                    $result['UserInformation']['namedMadrakTahsili'] = $this->namedMadrakTahsili[$result['UserInformation']['madrak_tahsili']];
                    $result['UserInformation']['namedIsargari'] = $this->namedIsargari[$result['UserInformation']['isargari']];
                    $result['UserInformation']['namedTaahol'] = $this->namedTaahol[$result['UserInformation']['taahol']];
                    $result['UserInformation']['namedMahaleEsteghrar'] = $this->namedMahaleEsteghrar[$result['UserInformation']['mahale_esteghrar']];
                    $result['UserInformation']['namedVazeyatMalekiat'] = $this->namedVazeyatMalekiat[$result['UserInformation']['vazeyat_malekiat']];
                    $result['UserInformation']['namedVazeyatJoghrafiaee'] = $this->namedVazeyatJoghrafiaee[$result['UserInformation']['vazeyat_joghrafiaee']];
                    
                }
            }
        }
        return $results;
    }
}

?>
