<!-- Head -->
	<?php get_header(url);?>
	<body>
		<!-- Header Begain-->
	    <header class="header">
	    	<!-- Title&subTitle -->
	    	<div class="title">
	    		<h1>
	    			<a href="<?php echo bloginfo('url');?>"><?php bloginfo('name');?></a>
	    		</h1><!-- Title Ends -->
	  			<h2><?php bloginfo('description');?></h2><!-- Sub Title Ends -->
	    	</div>
			<!-- Title&subTitle End -->

			<!-- Nav Begain -->
	  		<nav class="nav">
		        <ul id="menu">
			        <!-- To show "current" on the home page -->
		        	<li<?php 
		                if (is_home()) {
			                echo " id=\"current\"";
			            };
			            ?>>
			                <a href="<?php bloginfo('url') ?>">Home</a>
			        </li>
			        <!-- To show "current" on the Archive Page (a listing of all months and categories), individual posts, but NOT individual posts in category 10 -->
			        <li<?php 
		                if (is_page('Archive') || is_single() && !in_category('10')) { 
			                echo " id=\"current\"";
		                };
		                ?>>
			                <a href="<?php bloginfo('url') ?>/archive">Archive</a>
			        </li>
			        <!-- To show "current" on any posts in category 10, called Design -->
			        <li<?php
		                if (is_category('Design') || in_category('10') && !is_single()) {
			                echo " id=\"current\""; 
		                };
		                ?>>
			                <a href="<?php bloginfo('url') ?>/category/design">Design</a>
			        </li>

			        <!-- To show "current" on the About Page -->
			        <li<?php 
		                if (is_page('About')) { 
			                echo " id=\"current\"";
		                };
		                ?>>
			                <a href="<?php bloginfo('url') ?>/about">About</a>
			        </li>
				</ul><!-- Menu Ends -->
			</nav><!--End Nav -->
	    </header><!-- Header Ends -->

		<div class="main" >
			<div class="post" >
			<?php if(have_posts()):?>
				<?php while (have_posts()):the_post();?>
				<article class="article" id="post-<?php the_ID();?>">
					<h1 class="article-title">
						<a href="<?php the_permalink();?>" title="<?php the_title();?>">
							<?php the_title(); ?>
						</a>
					</h1><!-- Article Title End -->

					<div class="post-meta">
						<div class="article-author">
							<span class="article-author-info">
								<?php _e('By:'); ?>
								<?php the_author_posts_link(); ?>
							</span>
						</div><!-- Article Author -->
						<div class="column column-top"> 
							<time class="article-time">
									时间：<?php the_time('Y年m月d日') ?>
							</time><!--Article End-->
							<div class="article-category">
								分类：<?php the_category('，') ?>
							</div><!--Category End -->
							<div class="article-comment">
								<?php comments_popup_link('木有评论', '1 条评论', '% 条评论'); ?>
							</div><!-- Comments End -->
						</div><!-- Colum Top End-->
					</div>

					<!-- Blog Entry -->
					<div class="entry">
							<?php the_content("Read More >>"); ?>
					</div><!-- End Blog Entry -->
					<div class="post-meta">
						<div class="colum column-bottom">
							<div class="article-tags">
								<?php the_tags(); ?>
							</div><!-- Article Tags End -->
						</div><!-- Column Bottom Ends -->
					</div>
				</article><!-- Post Meat End -->
						<?php endwhile;?>
					<?php else:?>
							<div>
								<h2><?php_e("Not Found");?></h2> 
							</div>
				<?php endif;?>
		 		<nav class="page-navigation">
					<?php par_pagenavi(8); ?> 
				</nav> <!-- Navigation Ends-->
			</div><!-- Post End -->
			<aside class="siderbar">
				<?php get_sidebar();?>
			</aside><!-- SiderBar End -->

		</div><!-- Mian End -->

		<!-- Footer Start-->
		<?php get_footer();?>
		<!-- Footer End -->
	</body>
</html>