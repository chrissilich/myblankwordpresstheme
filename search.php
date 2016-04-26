<? get_header(); ?>


<div class="results">

	<h1 >
		Search results for: <em><?=get_search_query() ?></em>
	</h1>

	<?
	global $wp_query;
	$wp_query->query_vars["posts_per_page"] = 100;
	$wp_query->get_posts();
	?>


	<? if ( have_posts() ) : ?>
	
		<? //get_search_form(); ?>
	
		<ul>
			<? while ( have_posts() ) : the_post();
				
				// for WC only
				//$prod = new WC_Product_Factory(); 
				//if ($post->post_type == "product") {
				//	$prod = $prod->get_product($post->ID);
				//}

				

				if ($post->post_type == "page" ||
					($post->post_type == "product" && $prod->is_in_stock())): ?>
				
				<li>

					<a href="<?=get_permalink();?>">
					<? if ($post->post_type == "page"): ?>

					<? elseif ($post->post_type == "product"): ?>

					<? endif; ?>
					</a>


					<div class="clearfix"></div>

				</li>

				<? endif; 
			endwhile; ?>
		</ul>




	<? else : ?>
		<ul>
			Nothing found.
		</ul>
		
	<? endif; ?>

	<? get_search_form(); ?>

</div>


<div class="clearfix"></div>


<? get_footer(); ?>

