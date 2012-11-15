<?php
//$homeLinks = $this->requestAction('/links/getHomeLink',array('return'));
?>
<div class="center-wrap tt-relative">
    <div class="footer-content clearfix">
        <div class="footer-default-one">
            <div class="sidebar-widget">
                <div class="textwidget">
                    <h4 class="foot-heading">آخرین مطالب</h4>
                    <?php echo $this->requestAction(array('controller' => 'contents', 'action' => 'latestContents'), array('return')); ?>
                    </p>
                </div>
                <!-- END textwidget -->
            </div>
            <!-- END sidebar-widget -->
        </div>
        <!-- END footer-default-one -->


        <div class="footer-default-two">
            <div class="sidebar-widget">
                <h4 class="foot-heading">وبسایت های مرتبط</h4>
                <table>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/miras.png'), 'http://ichto.ir/', array('escape' => false, 'title' => 'سازمان میراث فرهنگی و گردشگری')) ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/farmandari.png'), 'http://khorasan.ir', array('escape' => false, 'title' => 'استانداری خراسان رضوی')) ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/miras.png'), 'http://razavi-chto.ir/', array('escape' => false, 'title' => 'سازمان میراث فرهنگی خراسان رضوی')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/farmandari.png'), 'http://khorasan.ir/mashhad', array('escape' => false, 'title' => 'فرمانداری مشهد')) ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/mashhad.png'), 'http://mashhad.ir', array('escape' => false, 'title' => 'شهرداری مشهد')) ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/jahad.png'), 'http://itor.ir', array('escape' => false, 'title' => 'پژوهشکده گردشگری جهاددانشگاهی ')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/ehkh.png'), 'http://ehkh.ir', array('escape' => false, 'title' => 'اتحادیه هتل داران خراسان')) ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/mosafer.png'), 'http://mosafer-behesht.ir', array('escape' => false, 'title' => 'مسافر بهشت - سیستم جامع مدیریت یکپارچه زائر')) ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($this->Html->image('footer-logo/madan.png'), 'http://khcorg.ir/', array('escape' => false, 'title' => 'سازمان صنعت، معدن و تجارت خراسان رضوی')) ?>
                        </td>
                    </tr>
                </table>
                <!-- END mc_embed_signup -->
            </div>
            <!-- END sidebar-widget -->
        </div>
        <!-- END footer-default-two -->


        <div class="footer-default-three">
            <div class="sidebar-widget">
                <h4 class="foot-heading">اطلاعات تماس</h4>
                <p class="tt-icon icon-home">
                    مشهد، خیابان آخوند خراسانی، بین آخوند خراسانی 25 و 27، ساختمان دهقان، واحد 5
                </p>
                <p class="tt-icon icon-cellphone">
                    0511-8593508<br />
                    0511-8551018
                </p>
            </div>
            <!-- END sidebar-widget -->
        </div>
        <!-- END footer-default-three -->
    </div>
    <!-- END footer-content -->
</div>
<div class="footer-copyright clearfix">
    <div class="center-wrap clearfix">
        <div class="foot-copy">
            <p><a href="mailto:1razzaghi@gmail.com">Powered By Gilas CMS</a></p>
        </div>
        <!-- END foot-copy -->
        <a class="link-top" id="scroll_to_top" href="#">پرش به بالا</a>
        <?php echo SettingsController::read('Site.FootNote') ?>
    </div>
    <!-- END center-wrap -->
</div>
<div class="shadow top"></div>
<div class="tt-overlay"></div>


