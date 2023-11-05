            <!-- Start Navigation -->
            <div class="header header-light">
                <div class="container">
                    <nav id="navigation" class="navigation navigation-landscape">
                        <div class="nav-header">
                            <a class="nav-brand" href="<?php echo site_url() ?>">
                                <img src="<?php echo get_template_directory_uri() . '/assets/image/logo.png' ?>" class="logo" alt="" />
                            </a>
                            <div class="nav-toggle"></div>
                        </div>
                        <div class="nav-menus-wrapper" style="transition-property: none;">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'top nav',
                                'container' => 'div',
                                //                                'container_class'   => 'nav-menus-wrapper',
                                //                                'menu_class' =>'nav-menu',
                                'items_wrap' => '<ul id="%1$s" class="nav-menu">%3$s</ul>',
                                'walker' => new WP_Bootstrap_Navwalker(),
                                'depth' => 2,
                            ));
                            ?>
                            <!-- <ul class="nav-menu">

                                <li class="active"><a href="#">خانه</a>

                                </li>


                                <li><a href="#">دوره های آموزشی<span class="submenu-indicator"></span></a>
                                    <ul class="nav-dropdown nav-submenu">
                                        <li><a href="course.html"> دوره طراحی وب </a></li>
                                        <li><a href="course.html"> دوره جاوااسکریپت </a></li>
                                        <li><a href="course.html"> دوره ری اکت </a></li>
                                        <li><a href="course.html"> دوره لاراول </a></li>
                                        <li><a href="course.html"> دوره PHP </a></li>
                                        <li><a href="course.html"> دوره پلاگین نویسی وردپرس </a></li>

                                        <li><a href="#"> دوره طراحی قالب وردپرس </a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">تماس با ما</a></li>
                            </ul> -->

                            <?php if (is_user_logged_in()) : ?>
                                <ul class="nav-menu align-to-left">

                                    <li class="active"><a href="#">
                                        <?php echo get_avatar(wp_get_current_user()->user_email, 30, '', wp_get_current_user()->display_name,['class'=>'circle']) ?>
                                         پروفایل<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="dashboard.html">پنل مدیریت<span class="submenu-indicator"></span></a>
                                                <ul class="nav-dropdown nav-submenu">
                                                    <li><a href="#">مدیریت دوره ها</a></li>
                                                    <li><a href="#">مدیریت تیکت ها</a></li>
                                                    <li><a href="#">مدیریت نظرات</a></li>
                                                    <li><a href="#">مدیریت مطالب</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">داشبورد</a></li>
                                            <li><a href="#">پروفایل من</a></li>
                                            <li><a href="#">دوره های من</a></li>
                                            <li><a href="<?php echo wp_logout_url(home_url()) ?>">خروج</a></li>


                                        </ul>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <ul class="nav-menu nav-menu-social align-to-left">

                                    <li class="login_click light">
                                        <a href="#" data-toggle="modal" data-target="#login">ورود</a>
                                    </li>
                                    <li class="login_click theme-bg">
                                        <a href="#" data-toggle="modal" data-target="#signup">ثبت نام</a>
                                    </li>

                                </ul>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Navigation -->
            <div class="clearfix"></div>
            <!-- ============================================================== -->