<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<?php
$ispage = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($ispage == 1) {
?>
    <main id="homePage">
        <section class="main-slider">
            <div class="container">
                <div class="carousel slide">
                    <div class="carousel-inner">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'order' => 'DESC',
                            'orderby' => 'publish_date',
                            'meta_query' => array(
                                array(
                                    'key' => 'main_news_highlight',
                                    'value' => '1',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                            ),
                        );
                        $allposts = new WP_Query($args);

                        while ($allposts->have_posts()) :
                            $allposts->the_post();
                            // For Image Call
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                        ?>
                            <!-- Loop Started -->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="carousel-info col-md-6">
                                        <h2><?php the_title(); ?></h2>
                                        <p>5th generation of iPad Pro launched in Nepal With an M1 chip on It. According to Apple, this ...</p>
                                        <span class="read-more">
                                            <a href="<?php the_permalink(); ?>">Read More</a>
                                        </span>
                                    </div>
                                    <img class="col-md-6" src="<?php echo $thumb_url[0] ?>">
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        <!-- Post Calling Loop Ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Main Slider Featured     -->
        <section class="featured-posts splide container">
            <div class="splide__track container">
                <div class="ow splide__list">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                        'orderby' => 'publish_date',
                        // 'post__not_in' => $not_in_next_main,
                        'meta_query' => array(
                            array(
                                'key' => 'main_slider_toggler',
                                'value' => '1',
                                'compare' => '=',
                                'type' => 'NUMERIC',
                            ),
                        ),
                    );
                    $sliderposts = new WP_Query($args);

                    while ($sliderposts->have_posts()) :
                        $sliderposts->the_post();

                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

                    ?>
                        <div class="splide__slide">
                            <div class="ft-card">
                                <a href="<?php the_permalink() ?>">
                                    <h3><?php //the_title(); 
                                        ?> Find unique Myspace Layouts Nowadyas in the present context.</h3>
                                </a>
                                <div class="bg-overlay"></div>
                                <img src="<?php echo $thumb_url[0]; ?>" alt="">
                            </div>
                        </div>
                    <?php

                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

        <section class="latest-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 main-container">
                        <div class="latest-title">
                            <h2>The Latest</h2>
                            <a href="" class="view-all">View All</a>
                        </div>
                        <div class="news-container">
                            <div class="big-news">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 3,
                                    'order' => 'DESC',
                                    'orderby' => 'publish_date',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'main_slider_toggler',
                                            'value' => '0',
                                            'compare' => '=',
                                            'type' => 'NUMERIC',
                                        ),
                                    )
                                );
                                $bigposts = new WP_Query($args);

                                while ($bigposts->have_posts()) :
                                    $bigposts->the_post();
                                    // For Image URL
                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                                ?>
                                    <!-- Looped -->
                                    <div class="news-card">
                                        <div class="news-info">
                                            <div class="topic">
                                                <?php
                                                $categories = get_the_terms($post->ID, 'category');

                                                foreach ($categories as $category) {
                                                ?>
                                                    <a href="<?php echo $category_link = get_category_link($category->term_id); ?>"><span><?php echo $category->name; ?></span></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <h1><?php //the_title(); 
                                                        ?>Find unique Myspace Layouts Nowadyas in the present context</h1>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="bg-overlay"></div>
                                        <img src="<?php echo $thumb_url[0] ?>" alt="">
                                    </div>
                                <?php
                                    $not_in_next_three[] = get_the_ID();
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <!-- List of Normal News -->
                            <div class="small-news">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 8,
                                    'order' => 'DESC',
                                    'orderby' => 'publish_date',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'main_slider_toggler',
                                            'value' => '0',
                                            'compare' => '=',
                                            'type' => 'NUMERIC',
                                        ),
                                    ),
                                    'post__not_in' => $not_in_next_three,
                                    'paged' => $paged
                                );
                                $bigposts = new WP_Query($args);

                                // Wide Query
                                $adsargs = array(
                                    'post_type' => 'wideads',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'order' => 'ASC',
                                    'orderby' => 'menu_order',
                                );
                                $wideposts = new WP_Query($adsargs);
                                // # Wide Query

                                $post_counter = 0;

                                while ($bigposts->have_posts()) :
                                    $bigposts->the_post();

                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                                    $post_counter++;
                                ?>
                                    <div class="news-card">
                                        <img src="<?php echo $thumb_url[0] ?>" alt="">
                                        <div class="news-info">
                                            <div class="topic">
                                                <?php
                                                $categories = get_the_terms($post->ID, 'category');

                                                foreach ($categories as $category) {
                                                ?>
                                                    <a href="<?php echo $category_link = get_category_link($category->term_id); ?>"><span><?php echo $category->name; ?></span></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="title">
                                                <h1><?php the_title(); 
                                                    ?>Yarsa Games: A Nepali Mobile Gaming App that Crossed 100 M+ Downloads</h1>
                                            </div>
                                            <p class="desc">
                                                Pros Durable build Decent display Huge Battery Good software optimization Cons Average camera Average performance…
                                            </p>
                                            <div class="pub-date">February 3, 2022</div>
                                        </div>
                                    </div>

                                    <?php

                                    if ($post_counter % 2 == 0) {
                                        if ($wideposts->have_posts()) {
                                            $wideposts->the_post();
                                            $thumb_id = get_post_thumbnail_id();
                                            $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

                                    ?>
                                            <img src="<?php echo $thumb_url[0] ?>" alt="" class="wide-ads">
                                <?php
                                        }
                                    }

                                endwhile;
                                pp_pagination_nav();
                                wp_reset_postdata();
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 side-container">
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
                                            <h3><?php //the_title(); 
                                                ?>Yarsa Games: A Nepali Mobile Gaming App that Crossed 100 M+ Downloads</h3>
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
                                'posts_per_page' => -1,
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
                                <img src="<?php echo $thumb_url[0] ?>" alt="">
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
} else {
?>
    <main id="nextPage">
        <section class="latest-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 main-container">
                        <div class="latest-title">
                            <h2>Else Part Ma xa Hai</h2>
                            <a href="" class="view-all">View All</a>
                        </div>
                        <div class="news-container">

                            <div class="small-news">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 10,
                                    'order' => 'DESC',
                                    'orderby' => 'publish_date',
                                    // 'post__not_in' => $not_in_next_three,
                                    'paged' => $paged,
                                    'meta_query' => array(
                                        array(
                                            'key' => 'main_slider_toggler',
                                            'value' => '0',
                                            'compare' => '=',
                                            'type' => 'NUMERIC',
                                        ),
                                    ),

                                );
                                $bigposts = new WP_Query($args);

                                while ($bigposts->have_posts()) :
                                    $bigposts->the_post();

                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

                                ?>
                                    <div class="news-card">
                                        <img src="<?php echo $thumb_url[0] ?>" alt="">
                                        <div class="news-info">
                                            <div class="topic"><span>Games</span></div>
                                            <div class="title">
                                                <h1><?php the_title(); ?></h1>
                                            </div>
                                            <p class="desc">
                                                Pros Durable build Decent display Huge Battery Good software optimization Cons Average camera Average performance…
                                            </p>
                                            <div class="pub-date">February 3, 2022</div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                pp_pagination_nav();
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 side-container"></div>
                </div>
            </div>
        </section>
    </main>
<?php
}
?>


<?php
get_footer();
