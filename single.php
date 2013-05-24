	<!-- Head -->
	<?php get_header(url);?>
<!-- Meun -->
	<body>
  <!--Header-->
	    <header class="header">

	    	<!--Title $ subTitle -->
	    	<h1><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></h1>
	  		<h2><?php bloginfo('description');?></h2>
			<!--Title $ subTitle End -->

			<!-- Nav -->
	  		<nav class="nav">
		        <ul id="menu">
			        <!-- To show "current" on the home page -->
		        	<li<?php 
		                if (is_home()) {
			                echo " id=\"current\"";
			                }?>>
			                <a href="<?php bloginfo('url') ?>">Home</a>
			        </li>
			        <!-- To show "current" on the Archive Page (a listing of all months and categories), individual posts, but NOT individual posts in category 10 -->
			        <li<?php 
		                if (is_page('Archive') || is_single() && !in_category('10')) { 
			                echo " id=\"current\"";
		                }?>>
			                <a href="<?php bloginfo('url') ?>/archive">Archive</a>
			        </li>

			        <!-- To show "current" on any posts in category 10, called Design -->
			        <li<?php
		                if (is_category('Design') || in_category('10') && !is_single()) {
			                echo " id=\"current\""; 
		                }?>>
			                <a href="<?php bloginfo('url') ?>/category/design">Design</a>
			        </li>

			        <!-- To show "current" on the About Page -->
			        <li<?php 
		                if (is_page('About')) { 
			                echo " id=\"current\"";
		                }?>>
			                <a href="<?php bloginfo('url') ?>/about">About</a>
			        </li>
				</ul>
			</nav><!--End Nav -->

	    </header>

		<div class="main" >
			<article class="post" >
					<?php if(have_posts()):?>
						<?php while (have_posts()):the_post();?>
				<article class="article" id="post-<?php the_ID();?>">
					<h1>
						<a href="<?php the_permalink();?>" title="<?php the_title();?>">
							<?php the_title(); ?>
						</a>
					</h1>

					<div class="post-meta">
						<div class="article-author">
							<p>
								<?php _e('By:'); ?>
								<?php the_author_posts_link(); ?>
							</p>
						</div>
						<div class="colum colum-top"> 
							<time class="article-time">
									<?php the_time('Y年m月d日') ?>
							</time>
							<div class="article-category">
								<?php the_category(',') ?>
							</div>
							<div class="article-comment">
								<?php comments_popup_link('木有评论', '1 条评论', '% 条评论'); ?>
							</div>
						</div>
					</div>

					<!-- Blog Entry -->
					<div class="entry">
							<?php the_content("Read More >>"); ?>
					</div>
					<!-- End Blog Entry -->
					<div class="post-meta">
						<div class="article-tags">
							<?php the_tags('Tags:',','); ?>
						</div>
					</div>
					<!-- Author Info-->
					<div class="author-info">
						<div class="author-avatar">
							<?php echo get_avatar( get_the_author_email(), 60 ); ?>
						</div>
				
						<div class="author-descr">
							<p class="author-name">
								<a href="<?php the_author_url(); ?>" alt="<?php the_author_nickname(); ?>的主页">
									<?php the_author_nickname(); ?>
								</a>
							</p>
							<p>
								<?php the_author_description(); ?>
							</p>
						</div>
					
						<div class="author_contact">
							<ul>
								<li><a href="mailto:<?php the_author_email(); ?>">邮箱</a></li>
							</ul>
						</div>
					</div><!-- Author Info End -->
				</article>

				<nav class="article-nav">
					<!--Previous-->
					<?php
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
						<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="previous-article">
							&lt;&lt; <?php echo $prev_post->post_title; ?> 
						</a>
					<?php endif; ?>
					<!-- Next -->
					<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>
  						<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next-article">
  							<?php echo $next_post->post_title; ?> &gt;&gt;
  						</a>
					<?php endif; ?>
				</nav>

				<article class="article-comment">
						<?php comments_template(); ?>
				</article><!-- comment End -->


						<?php endwhile;?>

					<?php else:?>

							<div>
								<h2><?php_e("Not Found");?></h2> 
							</div>
					
				<?php endif;?>
			</article>
			<aside class="siderbar">
				<?php get_sidebar();?>
			</aside>
		</div>
	

		<!-- Footer Start-->
		<?php get_footer();?>
		<!-- Footer End -->
	</body>
</html>