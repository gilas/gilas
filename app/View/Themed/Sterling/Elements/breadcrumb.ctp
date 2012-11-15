<?php
$first_page = false;
if ($this->request->here(false) == '/')
    $first_page = true;
if (!$first_page):
    $crumbs = $this->Html->getCrumbs('&ac;', 'صفحه اصلی');
    if (empty($crumbs)) {
        return;
    }
    $crumbs = explode('&ac;', $crumbs);
endif;
?>
<section class="small_banner">
    <div class="center-wrap">
        <?php if(!$first_page): ?>
        <div id="banner-search">
            <form onsubmit="if($('input[name=q]').val()) return true;return false;" action="<?php echo $this->Html->url(array('controller' => 'contents', 'action' => 'search', 'admin' => false)) ?>" class="searchform">
                <fieldset>
                    <input type="text" name="q" value="<?php echo @$this->request->query['q'] ?>" />
                </fieldset>
            </form>
        </div>
        <?php endif; ?>
        <!-- END banner-search -->

        <div class="breadcrumbs">
            <?php
            if (!$first_page):
                foreach ($crumbs as $k => $crumb) {
                    if (isset($crumbs[$k + 1])) {
                        echo $crumb . ' &larr; ';
                    } else {
                        echo $crumb;
                    }
                }
            endif;
            ?>
        </div>
        <!-- END breadcrumbs -->
        <?php
// Show slider only in home page
        if ($first_page):
            $sliderItems = $this->requestAction('/SliderItems/getSlides');
            if (!empty($sliderItems)):
                App::uses('UploadHelper', 'UploadPack.View/Helper');
                $this->Upload = new UploadHelper($this);
                echo $this->Html->script('slides.min.jquery');
                ?>
                <div id="slides">
                    <div class="slides_container">
                        <?php foreach ($sliderItems as $sliderItem): ?>
                            <div class="clearfix home-slider-post">
                                <div class="one_half">
                                    <h2><?php echo $sliderItem['SliderItem']['title']; ?></h2>
                                    <p><?php echo $sliderItem['SliderItem']['description']; ?></p>
                                    <p><a href="<?php echo $this->Html->url($sliderItem['SliderItem']['link']) ?>" class="small green button" target="_self"> ادامه &larr;</a></p>
                                </div>
                                <div class="one_half">
                                    <p><?php echo $this->Upload->image($sliderItem, 'SliderItem.image') ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function(){
                        jQuery('#slides').slides({
                            preload: false,
                            //preloadImage: 'preloader url here',
                            autoHeight: true,
                            effect: 'slide',
                            slideSpeed: 500,
                            play: 0,
                            randomize: false,
                            hoverPause: false,
                        });
                    });
                </script>
                <?php
            endif;
        endif;
        ?>
    </div>
    <!-- END center-wrap -->
    <div class="shadow top"></div>
    <div class="shadow bottom"></div>
    <div class="tt-overlay"></div>
</section>
