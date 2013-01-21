<?php
$this->Html->script('modal', false);
$this->Html->css('modal', null, array('inline' => false));
?>
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
            <?php 
            // First Remove
            echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-remove icon-white')),array('action' => 'changeStatus', $complaint['Complaint']['id']), array('data' => array('status' => -1), 'class' => 'btn btn-danger', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'حذف', 'tooltip-place' => 'bottom'));
            ?>
        </li>
        <?php endif; ?>
        <?php if($complaint['Complaint']['status'] == 1): ?>
        <li>
        <span style="margin-right:5px;">|</span>
        <?php 
        // Doc OK
        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-file icon-white')),array('action' => 'changeStatus', $complaint['Complaint']['id']), array('data' => array('status' => 2), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'تائید مدارک', 'tooltip-place' => 'bottom'));
        ?>
        </li>
        <?php endif; ?>
        <?php if($complaint['Complaint']['status'] == 2): ?>
        <li>
        <?php 
        // Warden OK
        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-user icon-white')),array('action' => 'changeStatus', $complaint['Complaint']['id']), array('data' => array('status' => 3), 'class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'تائید بازرس', 'tooltip-place' => 'bottom')); 
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
        echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-print icon-white')),array('action' => 'print', $complaint['Complaint']['id']), array('class' => 'btn btn-info popup-link', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'چاپ', 'tooltip-place' => 'bottom')); 
        ?>
        </li>
    </ul>
</div>
<div class="tabs-1 widget">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#profile" data-toggle="tab">اطلاعات شاکی و متشاکی</a></li>
        <li><a href="#complaint" data-toggle="tab">متن  شکایت</a></li>
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
                <div class="span3">
                    <label class="label-information">موضوع</label>
                    <span class="information"><?php echo $complaint['Complaint']['subject']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">متن شکایت</label>
                    <span class="information"><?php echo $complaint['Complaint']['content']; ?></span>
                </div>
                <div class="span3">
                    <label class="label-information">ضمیمه</label>
                    <span class="information"><?php echo $this->Upload->link($complaint['Complaint']['attachment_file_name'],$complaint, 'Complaint.attachment',array('style' => 'thumb')); ?></span>
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