<!-- ========================== post tech Section =============================== -->
<section class="min-sec">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-12">
				<div class="sec-heading2 sec-heading-flex">
					<div class="sec-left">
						<h2 class="pl-2">آخرین اخبار دنیای تکنولوژی</h2>
					</div>
					<div class="sec-right">
						<select id="change-post-type" class="form-control form-control-sm bg-light text-dark">
							<option value="new_tech">نمایش بر اساس : جدیدترین ها</option>
							<option value="popular">محبوب ترین ها</option>
							<option value="hot">داغ ترین ها</option>
							<option value="video">مطالب ویدئویی</option>
						</select>
						<!-- <a href="javascript:void(0);" class="btn-br-more">همه مطالب</a> -->
					</div>
				</div>
			</div>
		</div>
		<div class="position-relative">
			<div class="tech-loading position-absolute"><i class="fa fa-spin fa-spinner"></i></div>
			<div id="ajax-load-content" class="row">

				<!-- Single Article -->
				<?php get_template_part('loop/index/tech-loop', 'tech-loop') ?>
			</div>
			<p class="text-center"><a href="<?php echo site_url('technology') ?>">همه مطالب</a></p>
		</div>
	</div>
</section>

<!-- ========================== post tech Section =============================== -->