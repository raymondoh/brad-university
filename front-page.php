<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); ?>

<!-- Your custom code goes here  -->
<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url('<?php echo esc_url( get_theme_file_uri( '/dist/images/library-hero.jpg' ) ); ?>');">
    </div>

    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re
            interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

            <div class="event-summary">
                <a class="event-summary__date t-center" href="#">
                    <span class="event-summary__month">Mar</span>
                    <span class="event-summary__day">25</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="#">Poetry in the 100</a></h5>
                    <p>Bring poems you&rsquo;ve wrote to the 100 building this Tuesday for an open mic and snacks. <a
                            href="#" class="nu gray">Learn more</a></p>
                </div>
            </div>
            <div class="event-summary">
                <a class="event-summary__date t-center" href="#">
                    <span class="event-summary__month">Apr</span>
                    <span class="event-summary__day">02</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="#">Quad Picnic Party</a></h5>
                    <p>Live music, a taco truck and more can found in our third annual quad picnic day. <a href="#"
                            class="nu gray">Learn more</a></p>
                </div>
            </div>

            <p class="t-center no-margin"><a href="#" class="btn btn--blue">View All Events</a></p>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

            <div class="event-summary">
                <a class="event-summary__date event-summary__date--beige t-center" href="#">
                    <span class="event-summary__month">Jan</span>
                    <span class="event-summary__day">20</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="#">We Were Voted Best School</a>
                    </h5>
                    <p>For the 100th year in a row we are voted #1. <a href="#" class="nu gray">Read more</a></p>
                </div>
            </div>
            <div class="event-summary">
                <a class="event-summary__date event-summary__date--beige t-center" href="#">
                    <span class="event-summary__month">Feb</span>
                    <span class="event-summary__day">04</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="#">Professors in the National
                            Spotlight</a></h5>
                    <p>Two of our professors have been in national news lately. <a href="#" class="nu gray">Read
                            more</a></p>
                </div>
            </div>

            <p class="t-center no-margin"><a href="#" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
    </div>
</div>

<!-- <div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
            <div class="hero-slider__slide"
                style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/bus.jpg' ) ); ?>')">
            </div>

            <div class="hero-slider__interior container">
                <div class="hero-slider__overlay">
                    <h2 class="headline headline--medium t-center">Free Transportation</h2>
                    <p class="t-center">All students have free unlimited bus fare.</p>
                    <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="hero-slider__slide"
            style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/apples.jpg' ) ); ?>')">
        </div>

        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                <p class="t-center">Our dentistry program recommends eating apples.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide"
        style="background-image: url('<?php //echo esc_url( get_theme_file_uri( '/dist/images/bread.jpg' ) ); ?>')"></div>

    <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Free Food</h2>
            <p class="t-center">Fictional University offers lunch plans for those in need.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
        </div>
    </div>
</div> -->
<!-- </div> -->
<!-- <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div> -->
</div>
<div class="swiper-container hero-swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide hero-slider__slide"
            style="background-image: url('<?php echo esc_url( get_theme_file_uri( '/dist/images/bus.jpg' ) ); ?>')">
            <div class="overlay"></div>
            <div class="slide-content">
                <h2>Slide Title 1</h2>
                <p>Slide description goes here.</p>
                <a href="#" class="slide-button">Learn More</a>
            </div>
        </div>
        <div class="swiper-slide hero-slider__slide"
            style="background-image: url('<?php echo esc_url( get_theme_file_uri( '/dist/images/apples.jpg' ) ); ?>')">
            <div class="overlay"></div>
            <div class="slide-content">
                <h2>Slide Title 2</h2>
                <p>Slide description goes here.</p>
                <a href="#" class="slide-button">Learn More</a>
            </div>
        </div>
        <div class="swiper-slide hero-slider__slide"
            style="background-image: url('<?php echo esc_url( get_theme_file_uri( '/dist/images/bread.jpg' ) ); ?>')">
            <div class="overlay"></div>
            <div class="slide-content">
                <h2>Slide Title 3</h2>
                <p>Slide description goes here.</p>
                <a href="#" class="slide-button">Learn More</a>
            </div>
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next carousel-next"></div>
    <div class="swiper-button-prev carousel-prev"></div>
</div>



</div>

<?php get_footer(); ?>