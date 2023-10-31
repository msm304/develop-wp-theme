<!-- ============================ Full Width Courses  ================================== -->
<section class="pt-0">
	<div class="container">
		<!-- Onclick Sidebar -->
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div id="filter-sidebar" class="filter-sidebar">
					<div class="filt-head">
						<h4 class="filt-first">جستجوی پیشرفته</h4>
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">بستن <i class="ti-close"></i></a>
					</div>
					<div class="show-hide-sidebar">

						<!-- Find New Property -->
						<div class="sidebar-widgets">

							<!-- Search Form -->
							<form class="form-inline addons mb-3">
								<input class="form-control" type="search" placeholder="جستجو دوره" aria-label="Search">
								<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
							</form>
							<form id="archive-filter">
								<h4 class="side_title">نویسنده</h4>
								<ul class="no-ul-list mb-3">
									<?php
									$args = [
										'role__in' => ['administrator', 'author'],
										'fields' => ['ID', 'display_name']
									];
									$users = new WP_User_Query($args);
									$users->get_results();
									if ($users->get_results()) :
										foreach ($users->get_results() as $user) :
									?>
											<li>
												<input id="user_id_<?php echo $user->ID ?>" class="checkbox-custom user-id" name="user_id_<?php echo $user->ID ?>" type="checkbox" value="<?php echo $user->ID ?>">
												<label for="user_id_<?php echo $user->ID ?>" class="checkbox-custom-label"><?php echo $user->display_name ?></label>
											</li>
										<?php endforeach; ?>
									<?php else : ?>
										<div class="alert alert-warning">کاربری یافت نشد ابتدا یک کاربر جدید ایجاد نمایید</div>
									<?php endif; ?>
								</ul>

								<h4 class="side_title">دسته بندی مطالب</h4>
								<ul class="no-ul-list mb-3">
									<?php
									$args = [
										'taxonomy' => ['category']
									];
									$terms = get_terms($args);

									if (!empty($terms) && is_array($terms)) :
										foreach ($terms as $term) :
									?>
											<li>
												<input id="post-term-id-<?php echo $term->term_id ?>" class="checkbox-custom post-term-id" name="<?php echo $term->term_id ?>" type="checkbox" value="<?php echo $term->term_id ?>">
												<label for="post-term-id-<?php echo $term->term_id ?>" class="checkbox-custom-label"><?php echo $term->name ?></label>
											</li>
										<?php endforeach; ?>
									<?php else : ?>
										<div class="alert alert-warning">دسته بندی برای مطالب اصلی وجود ندارد</div>
									<?php endif; ?>

									<?php
									$args = [
										'taxonomy' => ['tech']
									];
									$terms = get_terms($args);
									if (!empty($terms) && is_array($terms)) :
										foreach ($terms as $term) :
									?>
											<li>
												<input id="tech-term-id-<?php echo $term->term_id ?>" class="checkbox-custom tech-term-id" name="<?php echo $term->term_id ?>" type="checkbox" value="<?php echo $term->term_id ?>">
												<label for="tech-term-id-<?php echo $term->term_id ?>" class="checkbox-custom-label"><?php echo $term->name ?></label>
											</li>
										<?php endforeach; ?>
									<?php else : ?>
										<div class="alert alert-warning">دسته بندی برای اخبار تکنولوژي وجود ندارد</div>
									<?php endif; ?>
								</ul>

								<h4 class="side_title">نوع مطلب</h4>
								<ul class="no-ul-list mb-3">
									<li>
										<input id="a-10" class="checkbox-custom" name="post-type" type="radio" checked>
										<label for="a-10" class="checkbox-custom-label">همه</label>
									</li>
									<li>
										<input id="a-11" class="checkbox-custom post-type" name="post-type" type="radio" value="1">
										<label for="a-11" class="checkbox-custom-label">مقاله</label>
									</li>
									<li>
										<input id="a-12" class="checkbox-custom post-type" name="post-type" type="radio" value="2">
										<label for="a-12" class="checkbox-custom-label">ویدیو</label>
									</li>
									<li>
										<input id="a-13" class="checkbox-custom post-type" name="post-type" type="radio" value="3">
										<label for="a-13" class="checkbox-custom-label">پادکست</label>
									</li>
								</ul>

								<button type="submit" class="btn btn-theme full-width mb-2">فیلتر کن</button>
								<input type="hidden" class="filter-post-query">
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>