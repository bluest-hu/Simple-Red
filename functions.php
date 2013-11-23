<?php 
	if (function_exists('register_sidebar')) { 
		register_sidebar(array( 
			'name' => 'sidebar', // 侧边栏 1 的名称 
			'before_widget' => '<li class="widgets-list">', // widget 的开始标签 
			'after_widget' => '</li>', // widget 的结束标签 
			'before_title' => '<h3 class="widget-title">', // 标题的开始标签 
			'after_title' => '</h3>'// 标题的结束标签
		));

} 

/* Mini Gavatar Cache by Willin Kan. Modify by zwwooooo 
 *头像缓存
 */
 function my_avatar( $email, $size = '50', $default = '', $alt = false ) {
     $alt = (false === $alt) ? '' : esc_attr( $alt );
     $f = md5( strtolower( $email ) );
     $w = home_url(); //$w = get_bloginfo('url');
     $a = $w. '/avatar/'. $f . '.jpg';
     $e = preg_replace('/wordpress\//', '', ABSPATH) . 'avatar/' . $f . '.jpg';
     $t = 604800; //设定7天, 单位:秒
     if ( empty($default) ) $default = $w. '/avatar/default.jpg';
     if ( !is_file($e) || (time() - filemtime($e)) > $t ){ //当头像不存在或者文件超过7天才更新
         $r = get_option('avatar_rating');
         $g = sprintf( "http://www.gravatar.com", ( hexdec( $f{0} ) % 2 ) ). '/avatar/'. $f. '?s='. $size. '&d='. $default. '&r='. $r;
         copy($g, $e);
     }
     if (filesize($e) < 500) copy($default, $e);
     $avatar = "<img title='{$alt}' alt='{$alt}' src='{$a}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
     return apply_filters('my_avatar', $avatar, $email, $size, $default, $alt);
 }


// /* PageNavi */
function par_pagenavi($range = 9){
	global $paged, $wp_query;

	if (!$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}

	if ($max_page > 1) {
		if (!$paged) {
			$paged = 1;
		}

		if($paged != 1) {
			echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 返回首页 </a>";
		}

		previous_posts_link(' 上一页 ');

    	if ($max_page > $range) {
			if ($paged < $range){ 
				for ($i = 1; $i <= ($range + 1); $i++) {
					echo "<a href='" . get_pagenum_link($i) ."'";
					if ( $i == $paged) {
						echo " class='current'";echo ">$i</a>";
					}
				}
			} elseif ($paged >= ($max_page - ceil(($range/2)))) {
				for ($i = $max_page - $range; $i <= $max_page; $i++) {
					echo "<a href='" . get_pagenum_link($i) ."'";
					if ($i == $paged) {
						echo " class='current'";echo ">$i</a>";
					}
				}
			} elseif ($paged >= $range && $paged < ($max_page - ceil(($range/2)))) {
				for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if ($i==$paged) {
						echo " class='current'";echo ">$i</a>";
					}
				}
			}
		} else {
			for ($i = 1; $i <= $max_page; $i++) {
				echo "<a href='" . get_pagenum_link($i) ."'";
			    if ($i==$paged) {
			    	echo " class='current'";echo ">$i</a>";
			    }
			}
		}
		next_posts_link(' 下一页 ');
		
    	if ($paged != $max_page) {
    		echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后一页 </a>";
    	}
    }
}

// ?>