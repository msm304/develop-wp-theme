<!-- Row -->
<div class="row">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<?php
		global $wp_query;
		?>
		<!-- Row -->
		<div class="row align-items-center mb-3">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<strong><?php echo $wp_query->found_posts ?></strong> مطلب بایگانی شده
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 ordering">
				<div class="filter_wraps">
					<div class="dl">
						<div id="main2">
							<a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2"><span><i class="fas fa-arrow-alt-circle-right"></i></span>باکس فیلتر</a>
						</div>
					</div>
					<div class="dropdown show">
						<a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							دوره های آموزشی
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">پرمخاطب</a>
							<a class="dropdown-item" href="#">جدید</a>
							<a class="dropdown-item" href="#">ویژه</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->

		<!-- <div class="row"> -->

		<?php get_template_part('loop/archive/archive-loop', 'archive-loop') ?>

		<!-- </div> -->

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<!-- Pagination -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 text-center">
						<button type="button" class="btn btn-loader"><i class="ti-reload ml-3"></i> فهرست کامل آموزش ها</button>
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