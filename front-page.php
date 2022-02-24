<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://media-exp1.licdn.com/dms/image/C4D1BAQF9i8DMUsCcBw/company-background_10000/0/1560976153674?e=2159024400&v=beta&t=mLk8Yl5nFy4WMnzSQEWpZSM5dVN5Z5e-_118IjUtrOE">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Msg</h5>
                    <p>...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://media-exp1.licdn.com/dms/image/C4D1BAQF9i8DMUsCcBw/company-background_10000/0/1560976153674?e=2159024400&v=beta&t=mLk8Yl5nFy4WMnzSQEWpZSM5dVN5Z5e-_118IjUtrOE">
                <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php
get_footer();
