<!-- Searchbard -->
<div class="single_widgets widget_search">
    <h4 class="title">آرشیو مطالب</h4>
    <select class="form-control form-control-sm bg-light text-dark" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
        <option value="">آرشیو مطالب بر اساس ...</option>
        <?php
        $args = [
            'format' => 'option',
            'show_post_count' => true,
            'post_type' => 'post',
        ];
        wp_get_archives($args);
        ?>
    </select>
</div>