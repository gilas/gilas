<div class="page">
<div class="center">بسمه تعالی</div>
<div class="center">اتحادیه صنف عرضه ککندگان محصولات فرهنگی</div>
<div class="para">
	<div class="row row-margin">
        <div class="span2">
            <label class="label-information">نام</label>
            <span class="information"><?php echo $request['UserInformation']['first_name']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">نام خانوادگی</label>
            <span class="information"><?php echo $request['UserInformation']['last_name']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">نام پدر</label>
            <span class="information"><?php echo $request['UserInformation']['father_name']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">جنسیت</label>
            <span class="information"><?php echo $request['UserInformation']['namedGender']; ?></span>
        </div>
	</div>
    <div class="row row-margin">
        <div class="span2">
            <label class="label-information">کد ملی</label>
            <span class="information"><?php echo $request['UserInformation']['code_melli']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">شماره شناسنامه</label>
            <span class="information"><?php echo $request['UserInformation']['shenasnameh_number']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">محل صدور</label>
            <span class="information"><?php echo $request['State']['name']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">تاریخ تولد</label>
            <span class="information"><?php echo $request['UserInformation']['birth_day']; ?></span>
        </div>
	</div>
    <div class="row row-margin">
        <div class="span2">
            <label class="label-information">دین</label>
            <span class="information"><?php echo $request['UserInformation']['din']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">مذهب</label>
            <span class="information"><?php echo $request['UserInformation']['mazhab']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">وضعیت نظام وظیفه</label>
            <span class="information"><?php echo $request['UserInformation']['namedVazifehOmoomi']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">مدرک تحصیلی</label>
            <span class="information"><?php echo $request['UserInformation']['namedMadrakTahsili']; ?></span>
        </div>
	</div>
    <div class="row row-margin">
        <div class="span2">
            <label class="label-information">وضعیت تاهل</label>
            <span class="information"><?php echo $request['UserInformation']['namedTaahol']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">سرپرست خانوار</label>
            <span class="information"><?php echo ($request['UserInformation']['sarparast'] == 1)?'می باشد':'نمی باشد'; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">تعداد افراد تحت تکفل</label>
            <span class="information"><?php echo $request['UserInformation']['afrad_tahte_takafol']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">وضعیت ایثارگری</label>
            <span class="information"><?php echo $request['UserInformation']['namedIsargari']; ?></span>
        </div>
	</div>
	<div class="row row-margin">
        <div class="span2">
            <label class="label-information">کد پستی منزل</label>
            <span class="information"><?php echo $request['UserInformation']['postal_code']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">تلفن ثابت</label>
            <span class="information"><?php echo $request['UserInformation']['telephone']; ?></span>
        </div>
        <div class="span2">
            <label class="label-information">تلفن همراه</label>
            <span class="information"><?php echo $request['UserInformation']['mobile']; ?></span>
        </div>
	</div>
    <div class="row row-margin">
        <div class="span8">
            <label class="label-information">نشانی منزل</label>
            <span class="information"><?php echo $request['UserInformation']['home_address']; ?></span>
        </div>
	</div>
</div>
</div>