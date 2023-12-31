<!-- ============================ Page Title Start================================== -->
<section class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">

				<div class="breadcrumbs-wrap">
					<h1 class="breadcrumb-title">
						<?php if (is_page()) {
							echo get_post_field('post_title');
						} else {
							echo 'آرشیو';
						}
						?>
					</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url() ?>">خانه</a></li>
							<li class="breadcrumb-item active" aria-current="page">
								<?php
								if(is_page('technology')){
									echo 'مطالب تکنولوژی';
								}elseif(is_page('post')){
									echo 'مطالب آموزشی';
								}elseif(is_page('contact')){
									echo 'تماس با ما';
								}
								else{
									if (is_year()) {
										echo get_the_date('Y  آرشیو مطالب سال');
									} elseif (is_month()) {
										echo get_the_date('آرشیو مطالب F ماه Y');
									} elseif (is_day()) {
										echo get_the_date(' آرشیو مطالب F j Y');
									}
								}

								?>
							</li>
						</ol>
					</nav>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->