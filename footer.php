			<div class="clear"></div>
		</div><!-- #content -->
		<footer id="footer" role="contentinfo">
			<div id="copyright">
				<?=sprintf( 
					__( '%1$s %2$s %3$s. All Rights Reserved.', 'threetwotwosix' ), 
					'&copy;', 
					date( 'Y' ), 
					esc_html( get_bloginfo( 'name' ) )
				);  ?>
			</div>
		</footer>
	</div><!-- #pagewrap -->
	<? wp_footer(); ?>
</body>
</html>