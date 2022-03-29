<div class="side-title">
    <h3>Top Stories</h3>
</div>
<div class="side-posts">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'order' => 'DESC',
        'orderby' => 'publish_date',
        'meta_query' => array(
            array(
                'key' => 'top_stories',
                'value' => '1',
                'compare' => '=',
                'type' => 'NUMERIC',
            ),
        ),
    );
    $allposts = new WP_Query($args);

    while ($allposts->have_posts()) :
        $allposts->the_post();

        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    ?>

        <div class="side-card">
            <div class="row">
                <div class="side-card__img col-md-4">
                    <img src="<?php echo $thumb_url[0]; ?>" alt="">
                </div>
                <div class="side-card__info col-md-8">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <span class="topic">
                        <?php
                        $categories = get_the_terms($post->ID, 'category');

                        foreach ($categories as $category) {
                        ?>
                            <a href="<?php echo $category_link = get_category_link($category->term_id); ?>"><span><?php echo $category->name; ?></span></a>
                        <?php
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
</div>
<div class="side-advertisement">
    <?php
    // Side Query
    $adsargs = array(
        'post_type' => 'sideads',
        'post_status' => 'publish',
        'posts_per_page' => 2,
        'order' => 'ASC',
        'orderby' => 'menu_order',
    );
    $sideposts = new WP_Query($adsargs);
    // # Side Query

    while ($sideposts->have_posts()) :
        $sideposts->the_post();

        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    ?>
        <a href="<?php echo get_field('ads_link') ?>" target="_blank">
            <img src="<?php echo $thumb_url[0] ?>" alt="">
        </a>
    <?php
        $not_in_next_two_ads[] = get_the_ID();
    endwhile;

    wp_reset_postdata();
    ?>
</div>
<div class="side-title">
    <h3>Featured News</h3>
</div>
<div class="side-posts">
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'order' => 'DESC',
        'orderby' => 'publish_date',
        'meta_query' => array(
            array(
                'key' => 'main_slider_toggler',
                'value' => '1',
                'compare' => '=',
                'type' => 'NUMERIC',
            ),
        ),
    );
    $allposts = new WP_Query($args);

    while ($allposts->have_posts()) :
        $allposts->the_post();

        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    ?>

        <div class="side-card">
            <div class="row">
                <div class="side-card__img col-md-4">
                    <img src="<?php echo $thumb_url[0]; ?>" alt="">
                </div>
                <div class="side-card__info col-md-8">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <span class="topic">
                        <?php
                        $categories = get_the_terms($post->ID, 'category');

                        foreach ($categories as $category) {
                        ?>
                            <a href="<?php echo $category_link = get_category_link($category->term_id); ?>"><span><?php echo $category->name; ?></span></a>
                        <?php
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
    <?php
    endwhile;
    $not_in_next_main[] = get_the_ID();
    wp_reset_postdata();
    ?>
</div>
<div class="side-advertisement">
    <?php
    // Side Query
    $adsargs = array(
        'post_type' => 'sideads',
        'post_status' => 'publish',
        'posts_per_page' => 2,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post__not_in' => $not_in_next_two_ads,
    );
    $sideposts = new WP_Query($adsargs);
    // # Side Query

    while ($sideposts->have_posts()) :
        $sideposts->the_post();

        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    ?>
        <a href="<?php echo get_field('ads_link') ?>" target="_blank">
            <img src="<?php echo $thumb_url[0] ?>" alt="">
        </a>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
</div>