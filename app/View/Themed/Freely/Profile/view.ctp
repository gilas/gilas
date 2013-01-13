<?php
$this->Html->addCrumb('لیست اعضا',array('controller' => 'Certificates','action' => 'index'));
$this->Html->addCrumb('درباره اعضا');
?>
<div class="profile-info">
    <div class="profile-pic">
        <?php echo $this->Html->image('profile/manager/sample.jpg', array('style' => 'width:100px;height:133px')); ?>
    </div>
    <div class="profile-info-item">
        <label>نام و نام خانوادگی :</label>
        <span><?php echo $info['UserInformation']['first_name'].' '.$info['UserInformation']['last_name']; ?></span>
    </div>
    <div class="profile-info-item">
        <label>رسته :</label>
        <span><?php echo $info['Raste']['name']; ?></span>
    </div>
    <div class="profile-info-item">
        <label>درجه :</label>
        <span><?php echo $info['Degree']['name']; ?></span>
    </div>
    <div class="profile-info-item">
        <label>آدرس :</label>
        <span><?php echo $info['UserInformation']['market_address']; ?></span>
    </div>
    <div class="profile-info-item">
        <label>تلفن :</label>
        <span><?php echo $info['UserInformation']['market_telephone']; ?></span>
    </div>
    <div class="profile-info-item">
        <label>وبسایت :</label>
        <span><?php echo @$info['UserInformation']['website']; ?></span>
    </div>
    <div class="profile-info-item">
        <label>پست الکترونیک :</label>
        <span><?php echo @$info['UserInformation']['email']; ?></span>
    </div>
</div>
<div class="profile-logo">
    <?php echo $this->Html->image('profile/logo/logo.png', array('style' => 'width:100px;height:100px;')); ?>
</div>
<div class="profile-menu">
    <ul class="menu">
        <li class="<?php if(empty($requestedURL)) echo 'active'; ?>">
            <?php echo $this->Html->link('خانه','/~'.$this->request['username']); ?>
        </li>
        <li class="<?php if(@$requestedURL['controller'] == 'Contents' and @$requestedURL['action'] == 'category') echo 'active'; ?>">
            <?php echo $this->Html->link('لیست مجموعه ها','#'); ?>
            <?php if($categories): ?>
            <ul>
                <?php foreach($categories as $category): ?>
                <li class="<?php if(@$requestedURL['controller'] == 'Contents' and @$requestedURL['action'] == 'category' and in_array($category['ContentCategory']['id'], $requestedURL)) echo 'active'; ?>">
                    <?php echo $this->Profile->link($category['ContentCategory']['name'],array('controller' => 'Contents', 'action' => 'category', $category['ContentCategory']['id'])); ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </li>
        <li>
            <?php echo $this->Html->link('ثبت شکایت','#'); ?>
        </li>
    </ul>
</div>
<div class="profile-about">
    <h4 class="profile-about-title">درباره</h4>
    <div class="profile-about-content">
    <?php echo $about; ?>
    </div>
</div>
<hr class="line" />
<?php 
$newLink = 'href="'.$this->Html->url('/').'~'. $this->request['username'].'/';
$pastLink = 'href="'.$this->Html->url('/');
$content = str_replace($pastLink, $newLink, $content);
$newLink = 'action="'.$this->Html->url('/').'~'. $this->request['username'].'/';
$pastLink = 'action="'.$this->Html->url('/');
$content = str_replace($pastLink, $newLink, $content);
echo $content; 
?>