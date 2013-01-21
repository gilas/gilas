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
        <span style="margin-right:5px;">|</span>
        <?php 
        // Doc OK
        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-file icon-white')),array('action' => 'changeStatus', $request['UserInformation']['id']), array('data' => array('status' => 2), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'تائید مدارک', 'tooltip-place' => 'bottom'));
        ?>
        </li>
        <?php endif; ?>
        <?php if($request['UserInformation']['status'] == 2): ?>
        <li>
        <?php 
        // Warden OK
        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-user icon-white')),array('action' => 'changeStatus', $request['UserInformation']['id']), array('data' => array('status' => 3), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'تائید بازرس', 'tooltip-place' => 'bottom')); 
        ?>
        </li>
        <li>
            <span style="margin-right:5px;">|</span>
            <a onclick="$('#statusInput').val(-3);$('#statusForm').modal({overlayClose:true});" tooltip-place="bottom" data-original-title="عدم تائید بازرس" rel="tooltip" class="btn btn-danger" href="#">
                <i class="icon-user icon-white"></i>
            </a>
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
        <li><a href="#other" data-toggle="tab">اطلاعات جانبی</a></li>
    </ul>
	<div class="tab-content">
		<div id="profile" class="tab-pane active">
            <div style="float:left;">
                <?php echo $this->Upload->image($request, 'UserInformation.avatar',array('style' => 'thumb')); ?>
            </div>
			<div class="row row-margin">
                <div class="span3">
                    <label class="label-information">نام</label>
                    <span class="information"><?php echo $request['UserInformation']['first_name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">نام خانوادگی</label>
                    <span class="information"><?php echo $request['UserInformation']['last_name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">نام پدر</label>
                    <span class="information"><?php echo $request['UserInformation']['father_name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">جنسیت</label>
                    <span class="information"><?php echo $request['UserInformation']['namedGender']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">کد ملی</label>
                    <span class="information"><?php echo $request['UserInformation']['code_melli']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">شماره شناسنامه</label>
                    <span class="information"><?php echo $request['UserInformation']['shenasnameh_number']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">محل صدور</label>
                    <span class="information"><?php echo $request['State']['name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">تاریخ تولد</label>
                    <span class="information"><?php echo $request['UserInformation']['birth_day']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">دین</label>
                    <span class="information"><?php echo $request['UserInformation']['din']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">مذهب</label>
                    <span class="information"><?php echo $request['UserInformation']['mazhab']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">وضعیت نظام وظیفه</label>
                    <span class="information"><?php echo $request['UserInformation']['namedVazifehOmoomi']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">مدرک تحصیلی</label>
                    <span class="information"><?php echo $request['UserInformation']['namedMadrakTahsili']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">وضعیت تاهل</label>
                    <span class="information"><?php echo $request['UserInformation']['namedTaahol']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">سرپرست خانوار</label>
                    <span class="information"><?php echo ($request['UserInformation']['sarparast'] == 1)?'می باشد':'نمی باشد'; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">تعداد افراد تحت تکفل</label>
                    <span class="information"><?php echo $request['UserInformation']['afrad_tahte_takafol']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">وضعیت ایثارگری</label>
                    <span class="information"><?php echo $request['UserInformation']['namedIsargari']; ?></span>
                </div>
			</div>
			<div class="row row-margin">
                <div class="span3">
                    <label class="label-information">کد پستی منزل</label>
                    <span class="information"><?php echo $request['UserInformation']['postal_code']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">تلفن ثابت</label>
                    <span class="information"><?php echo $request['UserInformation']['telephone']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">تلفن همراه</label>
                    <span class="information"><?php echo $request['UserInformation']['mobile']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span12">
                    <label class="label-information">نشانی منزل</label>
                    <span class="information"><?php echo $request['UserInformation']['home_address']; ?></span>
                </div>
			</div>
		</div>
		<div id="work" class="tab-pane">
            <div style="float:left;">
                <?php echo $this->Upload->image($request, 'UserInformation.logo',array('style' => 'thumb')); ?>
            </div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">مکان</label>
                    <span class="information"><?php echo $request['Place']['name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">رسته صنفی</label>
                    <span class="information"><?php echo $request['Raste']['name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">درجه صنفی</label>
                    <span class="information"><?php echo $request['Degree']['name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">عنوان</label>
                    <span class="information"><?php echo $request['UserInformation']['market_name']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">عنوان تابلو</label>
                    <span class="information"><?php echo $request['UserInformation']['market_sign']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">تلفن</label>
                    <span class="information"><?php echo $request['UserInformation']['market_telephone']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">فاکس</label>
                    <span class="information"><?php echo $request['UserInformation']['market_fax']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">کد پستی</label>
                    <span class="information"><?php echo $request['UserInformation']['market_postal_code']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span12">
                    <label class="label-information">نشانی</label>
                    <span class="information"><?php echo $request['UserInformation']['market_address']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">شاغل در نهادهای دولتی</label>
                    <span class="information"><?php echo $request['UserInformation']['gov_employment']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">عضو سایر اتحادیه ها</label>
                    <span class="information"><?php echo $request['UserInformation']['reg_other_union']; ?></span>
                </div>
                <div class="span6">
                    <label class="label-information">دارای پروانه کسب از سایر اتحادیه ها</label>
                    <span class="information"><?php echo $request['UserInformation']['parvaneh_other_union']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">مشاغل قبل از تقاضا</label>
                    <span class="information"><?php echo $request['UserInformation']['latest_employment']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">مدت سابقه کار</label>
                    <span class="information"><?php echo $request['UserInformation']['history_duration']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">منطقه شهرداري</label>
                    <span class="information"><?php echo $request['UserInformation']['mantagheh_shahrdari']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">ناحيه شهرداري</label>
                    <span class="information"><?php echo $request['UserInformation']['nahiye_shahrdari']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">حوزه كلانتري</label>
                    <span class="information"><?php echo $request['UserInformation']['hozeh_kalantari']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">محل استقرار</label>
                    <span class="information"><?php echo $request['UserInformation']['namedMahaleEsteghrar']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">وضعیت مالکیت</label>
                    <span class="information"><?php echo $request['UserInformation']['namedVazeyatMalekiat']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">مساحت</label>
                    <span class="information"><?php echo $request['UserInformation']['market_masahat']. ' متر مربع'; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">وضعیت جغرافیایی</label>
                    <span class="information"><?php echo $request['UserInformation']['hozeh_kalantari']; ?></span>
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