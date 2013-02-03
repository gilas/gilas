<?php
$this->Html->script('modal', false);
$this->Html->css('modal', null, array('inline' => false));
?>
<!-- Modal Form -->
<form id="statusForm" method="post" action="<?php echo $this->Html->url(array('action' => 'changeStatus', $request['UserInformation']['id'])) ?>" style="display: none;">
    <input type="hidden" name="status" value="" id="statusInput" />
    <p>دلیل عدم تائید را بیان نمائید.</p>
    <textarea name="desc" style="width:320px;height:150px;"></textarea>
    <div class="clearfix"></div>
    <input type="submit" value="ارسال" class="btn btn-success" />
</form>
<!-- End Modal Form -->
<div class="row" id="toolbar-menu">
    <div class="title">اطلاعات درخواست <?php echo $request['UserInformation']['formattedStatus']; ?></div>
    <ul id="toolbar">
        <?php if($request['UserInformation']['status'] == 0): ?>
        <li>
        <?php 
        // First OK
        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-ok icon-white')),array('action' => 'changeStatus', $request['UserInformation']['id']), array('data' => array('status' => 1), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'تائید اولیه', 'tooltip-place' => 'bottom'));
        ?>
        </li>
        <li>
            <span style="margin-right:5px;">|</span>
            <a onclick="$('#statusInput').val(-1);$('#statusForm').modal({overlayClose:true});" tooltip-place="bottom" data-original-title="حذف" rel="tooltip" class="btn btn-danger" href="#">
                <i class="icon-remove icon-white"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if($request['UserInformation']['status'] == 1): ?>
        <li>
        <?php 
        // Warden OK
        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-user icon-white')),array('action' => 'changeStatus', $request['UserInformation']['id']), array('data' => array('status' => 2), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'تائید بازرس', 'tooltip-place' => 'bottom')); 
        ?>
        </li>
        <li>
            <span style="margin-right:5px;">|</span>
            <a onclick="$('#statusInput').val(-2);$('#statusForm').modal({overlayClose:true});" tooltip-place="bottom" data-original-title="عدم تائید بازرس" rel="tooltip" class="btn btn-danger" href="#">
                <i class="icon-user icon-white"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if($request['UserInformation']['status'] == 2): ?>
        <li>
        <span style="margin-right:5px;">|</span>
        <?php 
        // Doc OK
        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-file icon-white')),array('action' => 'changeStatus', $request['UserInformation']['id']), array('data' => array('status' => 3), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'تائید مدارک', 'tooltip-place' => 'bottom'));
        ?>
        </li>
        <?php endif; ?>
        <li>
        <?php
        // Print
        echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-print icon-white')),array('action' => 'print', $request['UserInformation']['id']), array('class' => 'btn btn-info popup-link', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'چاپ', 'tooltip-place' => 'bottom')); 
        ?>
        </li>
    </ul>
</div>
<div class="tabs-1 widget">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#profile" data-toggle="tab">اطلاعات فردی</a></li>
        <li><a href="#work" data-toggle="tab">اطلاعات کسب و کار</a></li>
        <li><a href="#warden" data-toggle="tab">تائید مکان (بازرسی اولیه)</a></li>
        <li><a href="#docs" data-toggle="tab">مدارک مورد نیاز</a></li>
        <li><a href="#inquiries" data-toggle="tab">استعلامات</a></li>
        <li><a href="#other" data-toggle="tab">اطلاعات جانبی</a></li>
    </ul>
	<div class="tab-content">
		<div id="profile" class="tab-pane active">
            <div style="float:left;">
                <?php echo $this->Upload->image($request, 'UserInformation.avatar',array('style' => 'thumb')); ?>
            </div>
			<div class="row row-margin">
                <div class="span4">
                    <label class="label-information">نام</label>
                    <span class="information"><input type="text" field="first_name" val="<?php echo $request['UserInformation']['first_name']; ?>" class="information" value="<?php echo $request['UserInformation']['first_name']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">نام خانوادگی</label>
                    <span class="information"><input type="text" field="last_name" val="<?php echo $request['UserInformation']['last_name']; ?>" class="information" value="<?php echo $request['UserInformation']['last_name']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">نام پدر</label>
                    <span class="information"><input type="text" field="father_name" val="<?php echo $request['UserInformation']['father_name']; ?>" class="information" value="<?php echo $request['UserInformation']['father_name']; ?>"/></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">جنسیت</label>
                    <span class="information"><?php echo $this->Form->input('gender', array('label' => 'جنسیت' ,'div' => false,'label'  => false,'class' => 'information','options' => $genderOptions, 'value' => $request['UserInformation']['gender'], 'val' => $request['UserInformation']['gender'], 'field' => 'gender')); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">کد ملی</label>
                    <span class="information"><input type="text" field="code_melli" val="<?php echo $request['UserInformation']['code_melli']; ?>" class="information" value="<?php echo $request['UserInformation']['code_melli']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">شماره شناسنامه</label>
                    <span class="information"><input type="text" field="shenasnameh_number" val="<?php echo $request['UserInformation']['shenasnameh_number']; ?>" class="information" value="<?php echo $request['UserInformation']['shenasnameh_number']; ?>"/></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">محل صدور</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('mahale_sodoor', array(
                        'options' => $this->Html->getCityList($cities),
                        'value' => $request['UserInformation']['mahale_sodoor'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['mahale_sodoor'],
                        'field' => 'mahale_sodoor',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">تاریخ تولد</label>
                    <span class="information"><input type="text" field="birth_day" val="<?php echo $request['UserInformation']['birth_day']; ?>" class="information" value="<?php echo $request['UserInformation']['birth_day']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">دین</label>
                    <span class="information"><input type="text" field="din" val="<?php echo $request['UserInformation']['din']; ?>" class="information" value="<?php echo $request['UserInformation']['din']; ?>"/></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">مذهب</label>
                    <span class="information"><input type="text" field="mazhab" val="<?php echo $request['UserInformation']['mazhab']; ?>" class="information" value="<?php echo $request['UserInformation']['mazhab']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">وضعیت نظام وظیفه</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('vazifeh_omoomi', array(
                        'options' => $vazifehOmoomiOptions,
                        'value' => $request['UserInformation']['vazifeh_omoomi'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['vazifeh_omoomi'],
                        'field' => 'vazifeh_omoomi',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">مدرک تحصیلی</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('madrak_tahsili', array(
                        'options' => $madrakTahsiliOptions,
                        'value' => $request['UserInformation']['madrak_tahsili'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['madrak_tahsili'],
                        'field' => 'madrak_tahsili',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
            </div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">وضعیت تاهل</label>
                    <?php 
                    echo $this->Form->input('taahol', array(
                        'options' => $taaholOptions,
                        'value' => $request['UserInformation']['taahol'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['taahol'],
                        'field' => 'taahol',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">سرپرست خانوار</label>
                    <?php 
                    echo $this->Form->input('sarparast', array(
                        'options' => array('0' => 'نمی باشد', '1' => 'می باشد'),
                        'value' => $request['UserInformation']['sarparast'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['sarparast'],
                        'field' => 'sarparast',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">تعداد افراد تحت تکفل</label>
                    <span class="information"><input type="text" field="afrad_tahte_takafol" val="<?php echo $request['UserInformation']['afrad_tahte_takafol']; ?>" class="information" value="<?php echo $request['UserInformation']['afrad_tahte_takafol']; ?>"/></span>
                </div>
                
			</div>
			<div class="row row-margin">
                <div class="span4">
                    <label class="label-information">وضعیت ایثارگری</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('isargari', array(
                        'options' => $isargariOptions,
                        'value' => $request['UserInformation']['isargari'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['isargari'],
                        'field' => 'isargari',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">کد پستی منزل</label>
                    <span class="information"><input type="text" field="postal_code" val="<?php echo $request['UserInformation']['postal_code']; ?>" class="information" value="<?php echo $request['UserInformation']['postal_code']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">تلفن ثابت</label>
                    <span class="information"><input type="text" field="telephone" val="<?php echo $request['UserInformation']['telephone']; ?>" class="information" value="<?php echo $request['UserInformation']['telephone']; ?>"/></span>
                </div>
                
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">تلفن همراه</label>
                    <span class="information"><input type="text" field="mobile" val="<?php echo $request['UserInformation']['mobile']; ?>" class="information" value="<?php echo $request['UserInformation']['mobile']; ?>"/></span>
                </div>
                <div class="span8">
                    <label class="label-information">نشانی منزل</label>
                    <span class="information"><input type="text" field="home_address" style="width: 80%;" val="<?php echo $request['UserInformation']['home_address']; ?>" class="information" value="<?php echo $request['UserInformation']['home_address']; ?>"/></span>
                </div>
			</div>
		</div>
		<div id="work" class="tab-pane">
            <div style="float:left;">
                <?php echo $this->Upload->image($request, 'UserInformation.logo',array('style' => 'thumb')); ?>
            </div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">مکان</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('place_id', array(
                        'options' => $places,
                        'value' => $request['UserInformation']['place_id'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['place_id'],
                        'field' => 'place_id',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">رسته صنفی</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('raste_id', array(
                        'options' => $rastes,
                        'value' => $request['UserInformation']['raste_id'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['raste_id'],
                        'field' => 'raste_id',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">درجه صنفی</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('degree_id', array(
                        'options' => $degrees,
                        'empty' => '',
                        'value' => $request['UserInformation']['degree_id'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['degree_id'],
                        'field' => 'degree_id',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">عنوان</label>
                    <span class="information"><input type="text" field="market_name" val="<?php echo $request['UserInformation']['market_name']; ?>" class="information" value="<?php echo $request['UserInformation']['market_name']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">عنوان تابلو</label>
                    <span class="information"><input type="text" field="market_sign" val="<?php echo $request['UserInformation']['market_sign']; ?>" class="information" value="<?php echo $request['UserInformation']['market_sign']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">تلفن</label>
                    <span class="information"><input type="text" field="market_telephone" val="<?php echo $request['UserInformation']['market_telephone']; ?>" class="information" value="<?php echo $request['UserInformation']['market_telephone']; ?>"/></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">فاکس</label>
                    <span class="information"><input type="text" field="market_fax" val="<?php echo $request['UserInformation']['market_fax']; ?>" class="information" value="<?php echo $request['UserInformation']['market_fax']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">کد پستی</label>
                    <span class="information"><input type="text" field="market_postal_code" val="<?php echo $request['UserInformation']['market_postal_code']; ?>" class="information" value="<?php echo $request['UserInformation']['market_postal_code']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">نشانی</label>
                    <span class="information"><input type="text" field="market_address" val="<?php echo $request['UserInformation']['market_address']; ?>" class="information" value="<?php echo $request['UserInformation']['market_address']; ?>"/></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">شاغل در نهادهای دولتی</label>
                    <span class="information"><input type="text" field="gov_employment" val="<?php echo $request['UserInformation']['gov_employment']; ?>" class="information" value="<?php echo $request['UserInformation']['gov_employment']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">عضو سایر اتحادیه ها</label>
                    <span class="information"><input type="text" field="reg_other_union" val="<?php echo $request['UserInformation']['reg_other_union']; ?>" class="information" value="<?php echo $request['UserInformation']['reg_other_union']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">دارای پروانه کسب از سایر اتحادیه ها</label>
                    <span class="information"><input type="text" style="width: 50%;" field="parvaneh_other_union" val="<?php echo $request['UserInformation']['parvaneh_other_union']; ?>" class="information" value="<?php echo $request['UserInformation']['parvaneh_other_union']; ?>"/></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">مشاغل قبل از تقاضا</label>
                    <span class="information"><input type="text" field="latest_employment" val="<?php echo $request['UserInformation']['latest_employment']; ?>" class="information" value="<?php echo $request['UserInformation']['latest_employment']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">مدت سابقه کار</label>
                    <span class="information"><input type="text" field="history_duration" val="<?php echo $request['UserInformation']['history_duration']; ?>" class="information" value="<?php echo $request['UserInformation']['history_duration']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">منطقه شهرداري</label>
                    <span class="information"><input type="text" field="mantagheh_shahrdari" val="<?php echo $request['UserInformation']['mantagheh_shahrdari']; ?>" class="information" value="<?php echo $request['UserInformation']['mantagheh_shahrdari']; ?>"/></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">ناحيه شهرداري</label>
                    <span class="information"><input type="text" field="nahiye_shahrdari" val="<?php echo $request['UserInformation']['nahiye_shahrdari']; ?>" class="information" value="<?php echo $request['UserInformation']['nahiye_shahrdari']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">حوزه كلانتري</label>
                    <span class="information"><input type="text" field="hozeh_kalantari" val="<?php echo $request['UserInformation']['hozeh_kalantari']; ?>" class="information" value="<?php echo $request['UserInformation']['hozeh_kalantari']; ?>"/></span>
                </div>
                <div class="span4">
                    <label class="label-information">محل استقرار</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('mahale_esteghrar', array(
                        'options' => $mahaleEsteghrarOptions,
                        'value' => $request['UserInformation']['mahale_esteghrar'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['mahale_esteghrar'],
                        'field' => 'mahale_esteghrar',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span4">
                    <label class="label-information">وضعیت مالکیت</label>
                    <span class="information">
                    <?php 
                    echo $this->Form->input('vazeyat_malekiat', array(
                        'options' => $vazeyatMalekiatOptions,
                        'value' => $request['UserInformation']['vazeyat_malekiat'],
                        'showParents' => true,
                        'val' => $request['UserInformation']['vazeyat_malekiat'],
                        'field' => 'vazeyat_malekiat',
                        'class' => 'information',
                        'label' => false,
                        'div' => false,
                    )); ?></span>
                </div>
                <div class="span4">
                    <label class="label-information">مساحت</label>
                    <span class="information"><input type="text" field="market_masahat" val="<?php echo $request['UserInformation']['market_masahat']; ?>" class="information" value="<?php echo $request['UserInformation']['market_masahat']; ?>"/> متر مربع</span>
                </div>
                <div class="span4">
                    <label class="label-information">وضعیت جغرافیایی</label>
                    <span class="information"><input type="text" field="hozeh_kalantari" val="<?php echo $request['UserInformation']['hozeh_kalantari']; ?>" class="information" value="<?php echo $request['UserInformation']['hozeh_kalantari']; ?>"/></span>
                </div>
			</div>
		</div>
        <div id="warden" class="tab-pane">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="col-no">ردیف</th>
                    <th>شرح</th>
                    <th>وضعیت</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
                <?php $index = 0; foreach ($wardenOptions as $wardenOption): ?>
                <form method="post" action="<?php echo $this->Html->url(array('action' => 'changeWarden')) ?>">
                <input type="hidden" name="user_information_id" value="<?php echo $request['UserInformation']['id'] ?>" />
                <input type="hidden" name="option_id" value="<?php echo $wardenOption['option_id'] ?>" />
                <input type="hidden" name="id" value="<?php echo $wardenOption['submitted_id'] ?>" />
                <tr>
                    <td id="grid-align"><?php echo ++$index; ?></td>
                    <td><?php echo $wardenOption['option_value']; ?></td>
                    <td>
                        <select name="value">
                            <option value="0"  <?php if($wardenOption['submitted_value'] == 0) echo 'selected=""' ?> ></option>
                            <option value="1"  <?php if($wardenOption['submitted_value'] == 1) echo 'selected=""' ?> >می باشد</option>
                            <option value="-1" <?php if($wardenOption['submitted_value'] == -1) echo 'selected=""' ?> >نمی باشد</option>
                        </select>
                    </td>
                    <td><input type="text" name="description" value="<?php echo $wardenOption['submitted_desc']; ?>" /></td>
                    <td id="grid-align"><input type="submit" value="ذخیره" class="btn btn-success" /></td>
                </tr>
                </form>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="docs" class="tab-pane">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="col-no">ردیف</th>
                    <th>شرح</th>
                    <th>وضعیت</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
                <?php $index = 0; foreach ($docsOptions as $docsOption): ?>
                <form method="post" action="<?php echo $this->Html->url(array('action' => 'changeDocs')) ?>">
                <input type="hidden" name="user_information_id" value="<?php echo $request['UserInformation']['id'] ?>" />
                <input type="hidden" name="option_id" value="<?php echo $docsOption['option_id'] ?>" />
                <input type="hidden" name="id" value="<?php echo $docsOption['submitted_id'] ?>" />
                <tr>
                    <td id="grid-align"><?php echo ++$index; ?></td>
                    <td><?php echo $docsOption['option_value']; ?></td>
                    <td>
                        <select name="value">
                            <option value="0"  <?php if($docsOption['submitted_value'] == 0) echo 'selected=""' ?> ></option>
                            <option value="1"  <?php if($docsOption['submitted_value'] == 1) echo 'selected=""' ?> >دریافت شده</option>
                        </select>
                    </td>
                    <td><input type="text" name="description" value="<?php echo $docsOption['submitted_desc']; ?>" /></td>
                    <td id="grid-align"><input type="submit" value="ذخیره" class="btn btn-success" /></td>
                </tr>
                </form>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="inquiries" class="tab-pane">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="col-no">ردیف</th>
                    <th>شرح</th>
                    <th>وضعیت</th>
                    <th>شماره نامه</th>
                    <th>عملیات</th>
                </tr>
                <?php $index = 0; foreach ($inquiriesOptions as $inquiriesOption): ?>
                <form method="post" action="<?php echo $this->Html->url(array('action' => 'changeInquiry')) ?>">
                <input type="hidden" name="user_information_id" value="<?php echo $request['UserInformation']['id'] ?>" />
                <input type="hidden" name="option_id" value="<?php echo $inquiriesOption['option_id'] ?>" />
                <input type="hidden" name="id" value="<?php echo $inquiriesOption['submitted_id'] ?>" />
                <tr>
                    <td id="grid-align"><?php echo ++$index; ?></td>
                    <td><?php echo $inquiriesOption['option_value']; ?></td>
                    <td>
                        <select name="value">
                            <option value="0"  <?php if($inquiriesOption['submitted_value'] == 0) echo 'selected=""' ?> ></option>
                            <option value="1"  <?php if($inquiriesOption['submitted_value'] == 1) echo 'selected=""' ?> >دریافت شده</option>
                        </select>
                    </td>
                    <td><input type="text" name="description" value="<?php echo $inquiriesOption['submitted_desc']; ?>" /></td>
                    <td id="grid-align"><input type="submit" value="ذخیره" class="btn btn-success" /></td>
                </tr>
                </form>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="other" class="tab-pane">
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">تاریخ ارسال درخواست</label>
                    <span class="information"><?php echo Jalali::niceShort($request['UserInformation']['created']); ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">کد رهگیری</label>
                    <span class="information"><?php echo $request['UserInformation']['code_rahgiri']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span6">
                    <label class="label-information">تاریخچه</label>
                    <?php
                    $desc = unserialize($request['UserInformation']['status_desc']);
                    if($desc):
                    ?>
                    <table class="table">
                        <tr>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>توضیحات</th>
                        </tr>
                        <?php foreach($desc as $descValue): ?>
                        <tr>
                            <td><?php echo $formattedStatus[$descValue['status']]; ?></td>
                            <td><?php echo Jalali::niceShort($descValue['date']); ?></td>
                            <td><?php echo $descValue['desc']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif;?>
                </div>
			</div>
        </div>
	</div>
</div>
<script>
    $(function(){
        $('input.information, select.information').change(function(){
            $input = $(this);
            name = $input.attr('field')
            value = $input.val()
            id = '<?php echo $request['UserInformation']['id']; ?>'
            $.post('<?php echo $this->Html->url(array('action' => 'editField')) ?>',{'field':name, 'value':value, 'id': id},function(data){
                if(data != true){
                    alert(data);
                    $input.val($input.attr('val'))
                    
                }else{
                    $input.blur()
                    $input.attr('val', $input.val())
                }
            });
        })
    })
</script>