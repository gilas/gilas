<aside id="sidebar" class="one-fourth last clearfix">
    <div class="widget widget_search clearfix">
        <h4 class="widget-title">
            جستجو
            <div class="hr"></div>
        </h4>

        <form  action="<?php echo $this->Html->url(array('controller' => 'contents', 'action' => 'search', 'admin' => false)) ?>">
            <input type="text" name="q" value="<?php echo @$this->request->query['q'] ?>"/>
        </form>
    </div>	

    <div class="widget widget_categories clearfix">
        <h4 class="widget-title">
             دسته ها
            <div class="hr"></div>
        </h4>
        <?php $categories = $this->requestAction(array('controller' => 'ContentCategories', 'action' => 'getList')); ?>
        <?php if ($categories): ?>
            <ul class="list two-col icon-forward-circle">
                <?php foreach ($categories as $category): ?>
                    <li><?php echo $this->Html->link($category['ContentCategory']['name'], array('controller' => 'contents', 'action' => 'category', $category['ContentCategory']['id'] . '-' . $category['ContentCategory']['name'])) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif;
        unset($categories);
        ?>
    </div>

    <div class="widget clearfix">
        <h4 class="widget-title">
            رزومه
            <div class="hr"></div>
        </h4>
        <?php echo $this->Html->link('دریافت رزومه', '/files/Mohammad_Razzaghi.pdf', array('class' => 'button')); ?>

    </div>

    <div class="widget clearfix">
        <h4 class="widget-title">
    ارتباطات
            <div class="hr"></div>
        </h4>
        <h4 class="icon">
            <a href="http://facebook.com/1razzaghi"><span class="icon-facebook"></span></a>
            <a href="http://twitter.com/1razzaghi"><span class="icon-twitter"></span></a>
            <a href="http://plus.google.com/u/0/103516082204681561427"><span class="icon-google"></span></a>
            <a href="mailto:1razzaghi@gmail.com"><span class="icon-mail"></span></a>
        </h4>

    </div>
</aside>