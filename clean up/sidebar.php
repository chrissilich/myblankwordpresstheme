<aside id="sidebar" role="complementary">
<? if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
<div id="primary" class="widget-area">
<ul class="xoxo">
<? dynamic_sidebar( 'primary-widget-area' ); ?>
</ul>
</div>
<? endif; ?>
</aside>