<?php
if(! isset($complaint)){
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
    <div class="title">اطلاعات شکایت شماره <?php echo $complaint['Complaint']['id']; ?> <?php echo $complaint['Complaint']['formattedStatus']; ?></div>
</div>
<div class="tabs-1 widget">
    <ul class="tabs">
        <li class="active"><a href="#profile" data-toggle="tab">اطلاعات شاکی و متشاکی</a></li>
        <li><a href="#complaint" data-toggle="tab">متن  شکایت</a></li>
        <li><a href="#commit" data-toggle="tab">کمیسیون</a></li>
        <li><a href="#other" data-toggle="tab">اطلاعات جانبی</a></li>
    </ul>
	<div class="tab_container">
		<div id="profile" class="tab_content">
            <h2>شاکی</h2>
			<div class="row row-margin">
                <div class="span3">
                    <label class="label-information">نام</label>
                    <span class="information"><?php echo $complaint['Complaint']['comp_name']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">نام خانوادگی</label>
                    <span class="information"><?php echo $complaint['Complaint']['comp_family']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">تلفن همراه</label>
                    <span class="information"><?php echo $complaint['Complaint']['comp_mobile']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">نشانی</label>
                    <span class="information"><?php echo $complaint['Complaint']['comp_address']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">پست اکترونیک</label>
                    <span class="information"><?php echo $complaint['Complaint']['comp_email']; ?></span>
                </div>
			</div>
		</div>
		<div id="complaint" class="tab_content">
            <div class="row row-margin">
                <div class="span9">
                    <label class="label-information">موضوع</label>
                    <span class="information"><?php echo $complaint['Complaint']['subject']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span9">
                    <label class="label-information">متن شکایت</label>
                    <span class="information"><?php echo $complaint['Complaint']['content']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span9">
                    <label class="label-information">ضمیمه</label>
                    <span class="information"><?php if(! empty($complaint['Complaint']['attachment_file_name'])) echo $this->Upload->link($complaint['Complaint']['attachment_file_name'],$complaint, 'Complaint.attachment',array('style' => 'thumb')); ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span9">
                    <label class="label-information">دفاعیه متشاکی</label>
                    <span class="information"><?php echo $complaint['Complaint']['user_defence']; ?></span>
                </div>
			</div>
		</div>
        <div id="commit" class="tab_content">
            <div class="row row-margin">
                <div class="span9">
                    <label class="label-information">تاریخ تشکیل کمیسیون</label>
                    <span class="information"><?php echo $complaint['Complaint']['commit_date']; ?></span>
                </div>
			</div>
            <div class="row row-margin">
                <div class="span9">
                    <label class="label-information">نتیجه نهایی</label>
                    <span class="information"><?php echo $complaint['Complaint']['commit_vote']; ?></span>
                </div>
			</div>
		</div>
        <div id="other" class="tab_content">
            <div class="row row-margin">
                <div class="span3">
                    <label class="label-information">تاریخ ارسال درخواست</label>
                    <span class="information"><?php echo Jalali::niceShort($complaint['Complaint']['created']); ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">کد رهگیری</label>
                    <span class="information"><?php echo $complaint['Complaint']['code_rahgiri']; ?></span>
                </div>
			</div>
        </div>
	</div>
</div>