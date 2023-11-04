<!-- Row -->
<div class="row">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<?php
		global $wp_query;
		?>
		<!-- Row -->
		<div class="row align-items-center mb-3 justify-content-between">
			<div class="d-flex justify-content-between">
				<?php
				if (is_page('technology')) {
					echo '
					<div class="col-lg-6 col-md-6 col-sm-12 d-flex find-post-num-title" style="flex:0 0 100%; max-width: 100%; align-items: center;">
						کل مطالب اخبار تکنولوژی
					</div>
					<strong><span class="find-post-num" style="font-weight: bold; font-size: 18px;">' . get_option('_dwt_tech_post_num') . '</span></strong>
					';
				} elseif (is_page('post')) {
					echo '
					<div class="col-lg-6 col-md-6 col-sm-12 d-flex find-post-num-title" style="flex:0 0 100%; max-width: 100%; align-items: center;">
						کل مطالب آموزشی
					</div>
					<strong><span class="find-post-num" style="font-weight: bold; font-size: 18px;">' . get_option('_dwt_post_num') . '</span></strong>
					';
				} else {
					echo '
					<div class="col-lg-6 col-md-6 col-sm-12 d-flex find-post-num-title" style="flex:0 0 100%; max-width: 100%; align-items: center;">
						تعداد مطالب بایگانی شده
					</div>
					<strong><span class="find-post-num" style="font-weight: bold; font-size: 18px;">' . $wp_query->found_posts . '</span></strong>
					';
				} ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 ordering">
				<div class="filter_wraps">
					<div class="dl">
						<div id="main2">
							<a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2"><span><i class="fas fa-arrow-alt-circle-right"></i></span>باکس فیلتر</a>
						</div>
					</div>
					<!-- <div class="dropdown show">
						<a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							دوره های آموزشی
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">پرمخاطب</a>
							<a class="dropdown-item" href="#">جدید</a>
							<a class="dropdown-item" href="#">ویژه</a>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!-- /Row -->
		<?php if (is_page('technology')) {
			get_template_part('loop/archive/archive-all-tech-loop', 'archive-all-tech-loop');
		} elseif (is_page('post')) {
			get_template_part('loop/archive/archive-all-post-loop', 'archive-all-post-loop');
		} else {
			get_template_part('loop/archive/archive-loop', 'archive-loop');
		} ?>
		<!-- <div class="row"> -->

		<!-- </div> -->

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<!-- Pagination -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center">
						<button id="load-more" type="button" class="btn btn-loader"><i class="fa fa-spin fa-spinner ml-2 load-more-loading"></i>نمایش مطالب بیشتر</button>
					</div>
				</div>

			</div>
		</div>
		<!-- /Row -->

	</div>

</div>
<!-- Row -->
</div>
</section>