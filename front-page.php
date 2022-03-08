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
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                        );
                        $allposts = new WP_Query($args);
                        $i = true;

                        while ($allposts->have_posts()) :
                            $allposts->the_post();

                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

                            if (get_field('main_slider_toggler') == '1') {
                        ?>
                                <!-- Loop Started -->
                                <div class="carousel-item <?php if ($i == '1') {
                                                                echo 'active';
                                                            } ?>">
                                    <div class="row">
                                        <div class="carousel-info col-md-6">
                                            <h2><?php the_title(); ?></h2>
                                            <p>5th generation of iPad Pro launched in Nepal With an M1 chip on It. According to Apple, this ...</p>
                                            <span class="read-more">
                                                <a href="">Read More</a>
                                            </span>
                                        </div>
                                        <img class="col-md-6" src="<?php echo $thumb_url[0] ?>">
                                    </div>
                                </div>
                            <?php
                                $i = false;
                            }
                            ?>
                        <?php

                        endwhile;
                        wp_reset_postdata();
                        ?>
                        <!-- Post Calling Loop Ends -->
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-posts">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="ft-card">
                            <h3>Find Unique Myspace Layoutrs Nowadays</h3>
                            <div class="bg-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1645584616771-e3180ff32aa8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="ft-card">
                            <h3>Find Unique Myspace Layoutrs Nowadays</h3>
                            <div class="bg-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1645584616771-e3180ff32aa8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="ft-card">
                            <h3>Find Unique Myspace Layoutrs Nowadays</h3>
                            <div class="bg-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1645584616771-e3180ff32aa8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="ft-card">
                            <h3>Find Unique Myspace Layoutrs Nowadays</h3>
                            <div class="bg-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1645584616771-e3180ff32aa8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="trending-slider">
            <div class="container">
                <div class="row">
                    <div class="col-md-1 tr-topic">
                        <p>Trending</p>
                    </div>
                    <div class="col-md-11 tr-slide">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Loop Started -->
                                <div class="carousel-item active">
                                    <div class="carousel-info">
                                        <h2>Apple iPad Pro M1(2021) launched in Nepal</h2>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-info">
                                        <h2>Hello</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> -->
                        </div>
                    </div>
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
                                );
                                $bigposts = new WP_Query($args);

                                while ($bigposts->have_posts()) :
                                    $bigposts->the_post();

                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

                                ?>

                                    <div class="news-card">
                                        <div class="news-info">
                                            <div class="topic"><span> <?php
                                                                        // echo get_the_tag_list(
                                                                        //     '<ul class="my-tags-list"><li>',
                                                                        //     '</li><li>',
                                                                        //     '</li></ul>',
                                                                        //     get_queried_object_id()
                                                                        // );
                                                                        ?></span></div>
                                            <div class="title">
                                                <h1><?php the_title(); ?></h1>
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
                            <div class="small-news">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 10,
                                    'order' => 'DESC',
                                    'orderby' => 'publish_date',
                                    'post__not_in' => $not_in_next_three,
                                    'paged' => $paged

                                );
                                $bigposts = new WP_Query($args);

                                while ($bigposts->have_posts()) :
                                    $bigposts->the_post();

                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);



                                ?>
                                    <?php $tags = get_tags(); ?>
                                    <div class="tags">
                                        <?php //foreach ($tags as $tag) { 
                                        ?>
                                        <a href="<?php //echo get_tag_link($tag->term_id); 
                                                    ?> " rel="tag"><?php //echo $tag->name; 
                                                                    ?></a>
                                        <?php //} 
                                        ?>




                                    </div>

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
} else {
?>
    <section class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-md-9 main-container">
                    <div class="latest-title">
                        <h2>The Latest</h2>
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
                                'paged' => $paged

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
<?php
}
?>


<?php
get_footer();
