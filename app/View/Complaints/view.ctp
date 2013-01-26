
<?php
if($complaint['Complaint']['status'] == 1):
$this->Html->script('modal', false);
$this->Html->css('modal', null, array('inline' => false));
?>
<!-- Modal Form -->
<form id="statusForm" method="post" action="<?php echo $this->Html->url(array('action' => 'addReply', $complaint['Complaint']['id'])) ?>" style="display: none;">
    <p>دفاعیه خود را بنویسید.</p>
    <textarea name="defence" style="width:320px;height:150px;"></textarea>
    <div class="clearfix"></div>
    <input type="submit" value="ارسال" class="btn btn-success" />
</form>
<!-- End Modal Form -->
<p>
لطفا دفاعیه خود را در مورد شکایت مطرح شده عنوان فرمائید.
</p>
<div class="row" id="toolbar-menu">
    <div class="title">اطلاعات شکایت شماره <?php echo $complaint['Complaint']['id']; ?> <?php echo $complaint['Complaint']['formattedStatus']; ?></div>
    <ul id="toolbar">
        <li>
            <a onclick="$('#statusForm').modal({overlayClose:true});" tooltip-place="bottom" data-original-title="ثبت دفاعیه" rel="tooltip" class="btn btn-primary" href="#">
                ثبت دفاعیه
            </a>
        </li>
    </ul>
</div>
<?php elseif($complaint['Complaint']['status'] == 4): ?>
<p>
نظر کمیسیون اعلام گردید.
</p>
<div class="row" id="toolbar-menu">
    <div class="title">اطلاعات شکایت شماره <?php echo $complaint['Complaint']['id']; ?> <?php echo $complaint['Complaint']['formattedStatus']; ?></div>
</div>
<?php else: ?>
<p>
دفاعیه شما ثبت گردید. نتیجه کمیسیون متعاقبا اعلام می گردد.
</p>
<div class="row" id="toolbar-menu">
    <div class="title">اطلاعات شکایت شماره <?php echo $complaint['Complaint']['id']; ?> <?php echo $complaint['Complaint']['formattedStatus']; ?></div>
</div>
<?php endif; ?>
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