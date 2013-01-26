<?php
$this->Html->script('tagit/jquery-ui', false); 
$this->Html->script('tagit/tagit-themeroller', false);
$this->Html->css('tagit/tagit', null, array('inline' => false));
$this->Html->addCrumb('ثبت شکایت');
$this->Validator->addRule('Complaint');
$this->Validator->defaultParams['errorClass'] = 'error-message';
echo $this->Validator->validate(true); 
echo $this->Form->create('Complaint',array(
	'inputDefaults' => array(
		'div' => array('class' => 'input text')
	),
	'class' => 'form-list',
    'type' => 'file',
));
?>
<h4>اطلاعات شاکی</h4>
<?php
echo $this->Form->input('comp_name', array('label' => 'نام'));
echo $this->Form->input('comp_family', array('label' => 'نام خانوادگی'));
echo $this->Form->input('comp_email', array('label' => 'پست الکترونیک'));
echo $this->Form->input('comp_mobile', array('label' => 'شماره همراه'));
echo $this->Form->input('comp_address', array('label' => 'آدرس'));
?>
<h4>اطلاعات متشاکی</h4>
<?php if(count($users) == 1): ?>
    <div class="input text"><label for="ComplaintUserId">نام واحد صنفی</label><input type="hidden" id="ComplaintUserId" name="data[Complaint][user_information_id]" value="<?php echo $users[0]['UserInformation']['id'] ?>"><span><?php echo $users[0]['UserInformation']['market_name'].' ('.$users[0]['UserInformation']['first_name'].' '.$users[0]['UserInformation']['last_name'].')' ?></span></div>
<?php else:?>
<div class="input text required tagit-div"><label for="ComplaintSubject">نام واحد صنفی</label><ul id="demo8" name="data[Complaint][user_information_id]"></ul></div>
<?php endif;?>
<?php
    echo $this->Form->input('subject', array('label' => 'موضوع شکایت'));
    echo $this->Form->input('content', array('label' => 'متن شکایت', 'type' => 'textarea'));
?>
<div class="input text"><label for="ComplaintAttachment">ضمیمه</label><input type="file" id="ComplaintAttachment" name="data[Complaint][attachment]"><?php echo $this->Form->error('Complaint.attachment'); ?></div>
<a class="button red small" style="width: 50px">لغو</a>	
<input type="submit" value="ارسال" class="button green small"  style="width: 70px;float:left"/>
<?php echo $this->Form->end();?>
<?php 
$availableUsers = array();
foreach($users as $user){
    $availableUsers[] = array(
        'label' => $user['UserInformation']['market_name'],
        'value' => $user['UserInformation']['id'],
        'img' => $this->upload->image($user, 'UserInformation.avatar',array('style' => 'thumb')),
        'name' => $user['UserInformation']['first_name'].' '.$user['UserInformation']['last_name'],
    );
}
?>
<script>
    $(function () {
	var availableTagsCustom = <?php echo json_encode($availableUsers) ?>;
	$('#demo8').tagit({select:true, allowNewTags:false, maxTags: 1,triggerKeys:['enter','tab'], tagSource:function (request, response) {
		//setup the search to search the label and the imgription
		var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
		response($.grep(availableTagsCustom, function (value) {
			return matcher.test(value.label) || matcher.test(value.name);
		}));
	}});
	//get a reference to the autocomplete object
	var ac = $('#demo8').tagit('autocomplete');

	//add a custom class for themeing
	ac.menu.element.addClass('custom-ac');

	//attach the autocomplete to the bottom left of the tag list
	ac.options.position = {    my:"right top", at:"right bottom", collision:"none", of:$('#demo8').data('tagit').element };

	//overwrite the autocomplete _renderItem function!
	ac._renderItem = function (ul, item) {

		//highlight the matching terms
		var re = new RegExp(this.term, "gi");
		var label = item.label.replace(re, '<span class="highlight">' + "$&" + "</span>");
        var name = item.name.replace(re, '<span class="highlight">' + "$&" + "</span>");

		//render the entry
		var rendered = '<a><div class="ui-widget-header">' + label + " ("+ name +")</div>" +
			'<div class="ui-widget-content">' + item.img + '</div></a>';

		return $('<li class="ac-item ui-corner-all"></li>')
			.data("item.autocomplete", item)
			.append(rendered)
			.appendTo(ul);
	};
});
</script>