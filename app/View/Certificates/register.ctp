<?php 

$this->Html->addCrumb('درخواست پروانه');

// Tooltip
$this->Html->script('qtip', false);

echo $this->Form->create('UserInformation',array(
	'inputDefaults' => array(
		'div' => array('class' => 'input text one-third')
	),
	'class' => 'form-list',
));
?>
<div class="tabs-1 widget">
	<ul class="tabs">
        <li><a href="#desc">توضیحات</a></li>
		<li><a href="#personal">اطلاعات فردی</a></li>
		<li><a href="#work">اطلاعات کسب و کار</a></li>
	</ul>
	<div class="tab_container">
        <div id="desc" class="tab_content">
            <h5>مدارک لازم جهت اخذ پروانه کسب محصولات فرهنگی</h5>
            <?php echo $this->Html->nestedList($docs); ?>
            <hr />
        </div>
		<div id="personal" class="tab_content">
			<div class="form-row">
				<?php
				echo $this->Form->input('first_name', array('label' => 'نام'));
				echo $this->Form->input('last_name', array('label' => 'نام خانوادگی'));
				echo $this->Form->input('father_name', array('label' => 'نام پدر'));
				?>
			</div>
			<div class="form-row">
				<div class="input text one-third">
					<label for="UserInformationGender">جنسیت</label>
					<input type="radio" id="UserInformationGender" name="data[UserInformation][gender]" value="1"> <label>مرد</label>
					<input type="radio" id="UserInformationGender" name="data[UserInformation][gender]" value="2"> <label>زن</label>
                    <?php
						if ($this->Form->isFieldError('UserInformation.gender')) {
						    echo $this->Form->error('UserInformation.gender');
						}
					?>
				</div>
				<?php
				echo $this->Form->input('code_melli', array('label' => 'کد ملی'));
				echo $this->Form->input('shenasnameh_number', array('label' => 'شماره شناسنامه'));
				?>
			</div>
			<div class="form-row">
				<?php 
                echo $this->Form->input('mahale_sodoor', array(
                    'label' => 'محل صدور',
                    'options' => $this->Html->getCityList($cities),
                    'showParents' => true,
                )); 
                ?>
				<div class="input text one-third"><label for="UserInformationBirthDateMonth">تاریخ تولد</label>
					<select id="UserInformationBirthDateMonth" name="data[UserInformation][birth_date][day]" style="width: 50px">
						<?php for($i = 1; $i <= 31; $i ++): ?>
							<option value="<?php printf('%02s', $i) ?>"><?php printf('%02s', $i) ?></option>
						<?php endfor; ?>
					</select>
					<select id="UserInformationBirthDateDay" name="data[UserInformation][birth_date][month]" style="width: 79px">
						<option value="01">فروردین</option>
						<option value="02">اردیبهشت</option>
						<option value="03">خرداد</option>
						<option value="04">تیر</option>
						<option value="05">مرداد</option>
						<option value="06">شهریور</option>
						<option value="07">مهر</option>
						<option value="08">آبان</option>
						<option value="09">آذر</option>
						<option value="10">دی</option>
						<option value="11">بهمن</option>
						<option value="12">اسفند</option>
					</select>
					<select id="UserInformationBirthDateMonth" name="data[UserInformation][birth_date][year]" style="width: 70px">
						<?php for($i = 1300; $i <= 1370; $i ++): ?>
							<option value="<?php printf('%02s', $i) ?>"><?php printf('%02s', $i) ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<?php echo $this->Form->input('din', array('label' => 'دین')); ?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('mazhab', array('label' => 'مذهب'));
				echo $this->Form->input('vazifeh_omoomi', array( 'label' => 'وضعیت نظام وظیفه', 'options' => $vazifehOmoomiOptions));
				echo $this->Form->input('madrak_tahsili', array( 'label' => 'مدرک تحصیلی', 'options' => $madrakTahsiliOptions));
				?>
			</div>
			<div class="form-row">
				<div class="input text one-third">
					<label for="UserInformationTaahol">وضعیت تاهل</label>
					<input type="radio" id="UserInformationTaahol" name="data[UserInformation][taahol]" value="1" <?php if($this->request->data('UserInformation.taahol') == 1) echo 'checked="checked"'  ?>> <label>مجرد</label>
					<input type="radio" id="UserInformationTaahol" name="data[UserInformation][taahol]" value="2" <?php if($this->request->data('UserInformation.taahol') == 2) echo 'checked="checked"'  ?>> <label>متاهل</label>
					<?php
						if ($this->Form->isFieldError('UserInformation.taahol')) {
						    echo $this->Form->error('UserInformation.taahol');
						}
					?>
				</div>
				<div class="input text one-third">
					<label for="UserInformationSarparast">سرپرست خانوار</label>
					<input type="radio" id="UserInformationSarparast" name="data[UserInformation][sarparast]" value="1" <?php if($this->request->data('UserInformation.sarparast') == 1) echo 'checked="checked"'  ?>> <label>هستم</label>
					<input type="radio" id="UserInformationSarparast" name="data[UserInformation][sarparast]" value="2" <?php if($this->request->data('UserInformation.sarparast') == 2) echo 'checked="checked"'  ?>> <label>نیستم</label>
                    <?php
						if ($this->Form->isFieldError('UserInformation.sarparast')) {
						    echo $this->Form->error('UserInformation.sarparast');
						}
					?>
				</div>
                
				<?php echo $this->Form->input('afrad_tahte_takafol', array('label' => 'تعداد افراد تحت تکفل'));?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('isargari', array( 'label' => 'وضعیت ایثارگری', 'options' => $isargariOptions));
				echo $this->Form->input('postal_code', array('label' => 'کد پستی منزل'));
				echo $this->Form->input('telephone', array('label' => 'تلفن ثابت'));
				?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('mobile', array('label' => 'تلفن همراه'));
				echo $this->Form->input('home_address', array('label' => 'نشانی منزل','type'=>'text', 'div' => array('class' => 'input text two-third')));
				?>
			</div>
		</div><!--/ tab_content-->

		<div id="work" class="tab_content">
            <div class="form-row">
				<?php
				echo $this->Form->input('place_id',  array('label' => 'مکان'));
				//TODO: Fix this error, this field has no label
				echo $this->Form->input('raste_id',  array('label' => 'رسته صنفی'));
				echo $this->Form->input('degree_id', array('label' => 'درجه صنفی'));
				?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('market_name', 			array('label' => 'عنوان'));
				//TODO: Fix this error, this field has no label
				echo $this->Form->input('market_sign', 			array('label' => 'عنوان تابلو'));
				echo $this->Form->input('market_telephone', 	array('label' => 'تلفن'));
				?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('market_fax', 			array('label' => 'فاکس'));
				echo $this->Form->input('market_address', 		array('label' => 'نشانی','type'=>'text','div' => array('class' => 'input text two-third')));
				?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('market_postal_code', 	array('label' => 'کد پستی'));
				echo $this->Form->input('gov_employment', 		array('label' => 'شاغل در نهادهای دولتی'.$this->Html->tooltip('در صورت شاغل بودن فیلد مربوطه را تکمیل نمائید.')));
				echo $this->Form->input('reg_other_union', 		array('label' => 'عضو سایر اتحادیه ها'.$this->Html->tooltip('در صورت عضو بودن فیلد مربوطه را تکمیل نمائید.')));
				?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('parvaneh_other_union',array('label' => 'دارای پروانه کسب از سایر اتحادیه ها'.$this->Html->tooltip('در صورت داشتن پروانه، فیلد مربوطه را تکمیل نمائید.')));
				echo $this->Form->input('latest_employment', 	array('label' => 'مشاغل قبل از تقاضا'));
				echo $this->Form->input('history_duration', 	array('label' => 'مدت سابقه کار'));
				?>
			</div>
			<div class="form-row">
				<?php
				echo $this->Form->input('mantagheh_shahrdari', 	array('label' => 'منطقه شهرداري'));
				echo $this->Form->input('nahiye_shahrdari', 		array('label' => 'ناحيه شهرداري'));
				echo $this->Form->input('hozeh_kalantari', 		array('label' => 'حوزه كلانتري'));
				?>
			</div>
			<div class="form-row">
				<?php 
                echo $this->Form->input('vazeyat_joghrafiaee', 	array('label' => 'وضعیت جغرافیایی', 'options' => $vazeyatJoghrafiaeeOptions));
				echo $this->Form->input('mahale_esteghrar', array('label' => 'محل استقرار', 'options' => $mahaleEsteghrarOptions));
				echo $this->Form->input('vazeyat_malekiat', array('label' => 'وضعیت مالکیت','options' => $vazeyatMalekiatOptions));
				?>
			</div>
            <div class="form-row">
				<?php echo $this->Form->input('market_masahat', array('label' => 'مساحت (متر مربع)'));?>
			</div>
		</div><!--/ tab_content-->
	</div><!--/ tab_container-->
	
</div><!--/ tabs-1-->
<a class="button red small" style="width: 50px">لغو</a>	
<input type="submit" value="ارسال" class="button green small"  style="width: 70px;float:left"/>
<?php echo $this->Form->end();?>