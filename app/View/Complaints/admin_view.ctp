<?php
$this->Html->script('modal', false);
$this->Html->css('modal', null, array('inline' => false));
// Load Date Picker
$this->Html->script('jquery.datepicker',false);
$this->Html->css('jquery.datepicker',null,array('inline' => false));
?>
<!-- Modal Form -->
<form id="statusForm" method="post" action="<?php echo $this->Html->url(array('action' => 'changeStatus', $complaint['Complaint']['id'])) ?>" style="display: none;">
    <input type="hidden" name="status" value="" id="statusInput" />
    <p id="para">دلیل عدم تائید را بیان نمائید.</p>
    <textarea name="desc" style="width:320px;height:150px;"></textarea>
    <div class="clearfix"></div>
    <input type="submit" value="ارسال" class="btn btn-success" />
</form>
<!-- End Modal Form -->

<!-- Modal Form -->
<form id="commiteForm" method="post" action="<?php echo $this->Html->url(array('action' => 'changeStatus', $complaint['Complaint']['id'])) ?>" style="display: none;">
    <input type="hidden" name="status" value="" id="commiteStatusInput" />
    <p id="para">تاریخ تشکیل کمیته را مشخص نمائید.</p>
    <input name="commiteDate" id="datepicker"/>
    <div class="clearfix"></div>
    <input type="submit" value="ارسال" class="btn btn-success" />
</form>
<script>
    $(function(){
        $('#datepicker').datepicker({
            defaultDate: new JalaliDate(<?php Jalali::date('Y,m,d'); ?>),
            showButtonPanel: false,
            dateFormat: 'yy-mm-dd'
        });
    })
</script>
<!-- End Modal Form -->
<div class="row" id="toolbar-menu">
    <div class="title">اطلاعات شکایت شماره <?php echo $complaint['Complaint']['id']; ?> <?php echo $complaint['Complaint']['formattedStatus']; ?></div>
    <ul id="toolbar">
        <?php if($complaint['Complaint']['status'] == 0): ?>
        <li>
            <?php 
            // First OK
            echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-ok icon-white')),array('action' => 'changeStatus', $complaint['Complaint']['id']), array('data' => array('status' => 1), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'ارجاع به متشاکی', 'tooltip-place' => 'bottom'));
            ?>
        </li>
        <li>
            <span style="margin-right:5px;">|</span>
            <a onclick="$('#statusInput').val(-1);$('#para').html('دلیل حذف را بیان نمائید.');$('#statusForm').modal({overlayClose:true});" tooltip-place="bottom" data-original-title="حذف" rel="tooltip" class="btn btn-danger" href="#">
                <i class="icon-remove icon-white"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if($complaint['Complaint']['status'] == 2): ?>
        <li>
            <span style="margin-right:5px;">|</span>
            <a onclick="$('#commiteStatusInput').val(3);$('#commiteForm').modal({overlayClose:true});" tooltip-place="bottom" data-original-title="ارجاع به کمیسیون" rel="tooltip" class="btn btn-success" href="#">
                <i class="icon-user icon-white"></i>
            </a>
        </li>
        <?php endif; ?>
        <li>
            <span style="margin-right:5px;">|</span>
            <a onclick="$('#statusInput').val(4);$('#para').html('نتیجه را ذکر فرمائید.');$('#statusForm').modal({overlayClose:true});" tooltip-place="bottom" data-original-title="خاتمه" rel="tooltip" class="btn" href="#">
                <i class="icon-ok"></i>
            </a>
        </li>
        <li>
        <?php
        // Print
        echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-print icon-white')),array('action' => 'print', $complaint['Complaint']['id']), array('class' => 'btn btn-info popup-link', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'چاپ', 'tooltip-place' => 'bottom')); 
        ?>
        </li>
    </ul>
</div>
<div class="tabs-1 widget">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#profile" data-toggle="tab">اطلاعات شاکی و متشاکی</a></li>
        <li><a href="#complaint" data-toggle="tab">متن  شکایت</a></li>
        <li><a href="#commit" data-toggle="tab">کمیسیون</a></li>
        <li><a href="#other" data-toggle="tab">اطلاعات جانبی</a></li>
    </ul>
	<div class="tab-content">
		<div id="profile" class="tab-pane active">
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
		<div id="complaint" class="tab-pane">
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
        <div id="commit" class="tab-pane">
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
        <div id="other" class="tab-pane">
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
            <div class="row row-margin">
                <div class="span6">
                    <label class="label-information">تاریخچه</label>
                    <?php
                    $desc = unserialize($complaint['Complaint']['status_desc']);
                    if($desc):
                    ?>
                    <table class="table">
                        <tr>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                        </tr>
                        <?php foreach($desc as $descValue): ?>
                        <tr>
                            <td><?php echo $formattedStatus[$descValue['status']]; ?></td>
                            <td><?php echo Jalali::niceShort($descValue['date']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif;?>
                </div>
			</div>
        </div>
	</div>
</div>