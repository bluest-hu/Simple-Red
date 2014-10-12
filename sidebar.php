
	<ul class="widgets">
	<?php // 如果没有使用 Widget 才显示以下内容, 否则会显示 Widget 定义的内容
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :
	?>
	<!-- widget 1 -->
	<li class="widget">
		<h3>标题 1</h3>
		<ul>
			<li>条目 1.1</li>
			<li>条目 1.2</li>
			<li>条目 1.3</li>
		</ul>
	</li>
	<!-- widget 2 -->
	<li class="widget">
		<h3>标题 2</h3>
		<ul>
			<li>条目 2.1</li>
			<li>条目 2.2</li>
			<li>条目 2.3</li>
		</ul>
	</li>
	<?php endif; ?>
	</ul>
