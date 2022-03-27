<?php

/**
 * Template Name: Top Stories Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="nextPage">
    <section class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-md-9 main-container">
                    <!-- <div class="latest-title">
                            <h2>Else Part Ma xa Hai</h2>
                            <a href="" class="view-all">View All</a>
                        </div> -->
                    <div class="news-container">

                        <div class="small-news">
                            <?php
                            $nextpaged = get_query_var('paged');
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
get_footer();
