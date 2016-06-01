		<ul class="leftmenu">
		<?php if(is_page()){
		$ancestors = get_post_ancestors($post);
		$parent = $post->post_parent;
		//$grandparent = $parent->post_parent;

		if (count($ancestors) == 0) {
		$children = wp_list_pages("title_li=&include=".$post->ID."&echo=1");
		$children .= wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->ID."&echo=0");
		 //echo 'test0';
		}elseif (count($ancestors) == 1) {
		$parent = $ancestors[0];
		$children = wp_list_pages("title_li=&include=".$parent."&echo=1");
		$children .= wp_list_pages("sort_column=menu_order&title_li=&child_of=" .$parent. "&echo=0");
		//echo 'test1';
		}elseif (count($ancestors) == 2) {
		$parent = $ancestors[1];
		$children = wp_list_pages("title_li=&include=".$parent."&echo=1");
		$children .= wp_list_pages("sort_column=menu_order&title_li=&child_of=" .$parent. "&echo=0");
		//echo 'test2';
		}elseif (count($ancestors) == 3) {
		$parent = $ancestors[2];
		$children = wp_list_pages("title_li=&include=".$parent."&echo=1");
		$children .= wp_list_pages("sort_column=menu_order&title_li=&child_of=" . $parent. "&echo=0");
		//echo 'test3';
		}elseif (count($ancestors) == 4) {
		$parent = $ancestors[3];
		$children = wp_list_pages("title_li=&include=".$parent."&echo=1");
		$children .= wp_list_pages("sort_column=menu_order&title_li=&child_of=" . $parent . "&echo=0");
		//echo 'test4';
		}
		?>

		<?php if($children){ ?>
		<?php echo $children; ?>
		<?php }  }?>
		</ul>