<?php
if(! isset($request)){
    echo $this->Form->create();
    echo $this->Form->input('code', array(
        'label' => 'کد پیگیری',
        'after' => $this->Form->submit('ارسال', array('div' => false , 'style' => 'vertical-align: super')),
    ));
    echo $this->Form->end();
    return;
}
?>
<div class="row" id="toolbar-menu">
    <div class="title">اطلاعات درخواست <?php echo $request['UserInformation']['formattedStatus']; ?></div>
</div>
<div class="tabs-1 widget">
    <ul class="tabs">
        <li><a href="#profile">اطلاعات فردی</a></li>
        <li><a href="#work">اطلاعات کسب و کار</a></li>
        <li><a href="#other">اطلاعات جانبی</a></li>
    </ul>
	<div class="tab_container">
		<div id="profile" class="tab_content form-list">
			<div class="form-row">
                <div class="one-third">
                    <label class="label-information">نام</label>
                    <span class="information"><?php echo $request['UserInformation']['first_name']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">نام خانوادگی</label>
                    <span class="information"><?php echo $request['UserInformation']['last_name']; ?></span>
                </div>
                <div style="float:left;">
                    <span class="information"><?php echo $this->Upload->image($request, 'UserInformation.avatar',array('style' => 'thumb')); ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">نام پدر</label>
                    <span class="information"><?php echo $request['UserInformation']['father_name']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">جنسیت</label>
                    <span class="information"><?php echo $request['UserInformation']['namedGender']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">کد ملی</label>
                    <span class="information"><?php echo $request['UserInformation']['code_melli']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">شماره شناسنامه</label>
                    <span class="information"><?php echo $request['UserInformation']['shenasnameh_number']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">محل صدور</label>
                    <span class="information"><?php echo $request['State']['name']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">تاریخ تولد</label>
                    <span class="information"><?php echo $request['UserInformation']['birth_day']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">دین</label>
                    <span class="information"><?php echo $request['UserInformation']['din']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">مذهب</label>
                    <span class="information"><?php echo $request['UserInformation']['mazhab']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">وضعیت نظام وظیفه</label>
                    <span class="information"><?php echo $request['UserInformation']['namedVazifehOmoomi']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">مدرک تحصیلی</label>
                    <span class="information"><?php echo $request['UserInformation']['namedMadrakTahsili']; ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">وضعیت تاهل</label>
                    <span class="information"><?php echo $request['UserInformation']['namedTaahol']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">سرپرست خانوار</label>
                    <span class="information"><?php echo ($request['UserInformation']['sarparast'] == 1)?'می باشد':'نمی باشد'; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">تعداد افراد تحت تکفل</label>
                    <span class="information"><?php echo $request['UserInformation']['afrad_tahte_takafol']; ?></span>
                </div>
			</div>
			<div class="form-row">
                <div class="one-third">
                    <label class="label-information">وضعیت ایثارگری</label>
                    <span class="information"><?php echo $request['UserInformation']['namedIsargari']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">کد پستی منزل</label>
                    <span class="information"><?php echo $request['UserInformation']['postal_code']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">تلفن ثابت</label>
                    <span class="information"><?php echo $request['UserInformation']['telephone']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">تلفن همراه</label>
                    <span class="information"><?php echo $request['UserInformation']['mobile']; ?></span>
                </div>
                <div class="two-third">
                    <label class="label-information">نشانی منزل</label>
                    <span class="information"><?php echo $request['UserInformation']['home_address']; ?></span>
                </div>
			</div>
		</div>
		<div id="work" class="tab_content form-list">
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">مکان</label>
                    <span class="information"><?php echo $request['Place']['name']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">رسته صنفی</label>
                    <span class="information"><?php echo $request['Raste']['name']; ?></span>
                </div>
                <div style="float:left;">
                    <span class="information"><?php echo $this->Upload->image($request, 'UserInformation.logo',array('style' => 'thumb')); ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">درجه صنفی</label>
                    <span class="information"><?php echo $request['Degree']['name']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">عنوان</label>
                    <span class="information"><?php echo $request['UserInformation']['market_name']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">عنوان تابلو</label>
                    <span class="information"><?php echo $request['UserInformation']['market_sign']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">تلفن</label>
                    <span class="information"><?php echo $request['UserInformation']['market_telephone']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">فاکس</label>
                    <span class="information"><?php echo $request['UserInformation']['market_fax']; ?></span>
                </div>
                <div class="two-third">
                    <label class="label-information">کد پستی</label>
                    <span class="information"><?php echo $request['UserInformation']['market_postal_code']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="three-third">
                    <label class="label-information">نشانی</label>
                    <span class="information"><?php echo $request['UserInformation']['market_address']; ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">شاغل در نهادهای دولتی</label>
                    <span class="information"><?php echo $request['UserInformation']['gov_employment']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">عضو سایر اتحادیه ها</label>
                    <span class="information"><?php echo $request['UserInformation']['reg_other_union']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">دارای پروانه کسب از سایر اتحادیه ها</label>
                    <span class="information"><?php echo $request['UserInformation']['parvaneh_other_union']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">مشاغل قبل از تقاضا</label>
                    <span class="information"><?php echo $request['UserInformation']['latest_employment']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">مدت سابقه کار</label>
                    <span class="information"><?php echo $request['UserInformation']['history_duration']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">منطقه شهرداري</label>
                    <span class="information"><?php echo $request['UserInformation']['mantagheh_shahrdari']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">ناحيه شهرداري</label>
                    <span class="information"><?php echo $request['UserInformation']['nahiye_shahrdari']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">حوزه كلانتري</label>
                    <span class="information"><?php echo $request['UserInformation']['hozeh_kalantari']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">محل استقرار</label>
                    <span class="information"><?php echo $request['UserInformation']['namedMahaleEsteghrar']; ?></span>
                </div>
			</div>
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">وضعیت مالکیت</label>
                    <span class="information"><?php echo $request['UserInformation']['namedVazeyatMalekiat']; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">مساحت</label>
                    <span class="information"><?php echo $request['UserInformation']['market_masahat']. ' متر مربع'; ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">وضعیت جغرافیایی</label>
                    <span class="information"><?php echo $request['UserInformation']['hozeh_kalantari']; ?></span>
                </div>
			</div>
		</div>
        <div id="other" class="tab_content form-list">
            <div class="form-row">
                <div class="one-third">
                    <label class="label-information">تاریخ ارسال درخواست</label>
                    <span class="information"><?php echo Jalali::niceShort($request['UserInformation']['created']); ?></span>
                </div>
                <div class="one-third">
                    <label class="label-information">کد رهگیری</label>
                    <span class="information"><?php echo $request['UserInformation']['code_rahgiri']; ?></span>
                </div>
			</div>
        </div>
	</div>
</div>