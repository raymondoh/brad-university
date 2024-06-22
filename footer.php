<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */
?>

<footer class="site-footer">
    <div class="site-footer__inner container container--narrow">
        <div class="group">
            <div class="site-footer__col-one">
                <h1 class="school-logo-text school-logo-text--alt-color">
                    <a href="<?php echo site_url(''); ?>"><strong>Fictional</strong> University</a>
                </h1>
                <p><a class="site-footer__link" href="#">555.555.5555</a></p>
            </div>

            <div class="site-footer__col-two-three-group">
                <div class="site-footer__col-two">
                    <h3 class="headline headline--small">Explore</h3>
                    <nav class="nav-list">
                        <!-- <ul>
                            <li><a href="<?php //echo site_url('/about-us'); ?>">About Us</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Campuses</a></li>
                        </ul> -->
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_1'
                        ));
                        ?>
                    </nav>
                </div>

                <div class="site-footer__col-three">
                    <h3 class="headline headline--small">Learn</h3>
                    <nav class="nav-list">
                        <!-- <ul>
                            <li><a href="#">Legal</a></li>
                            <li><a href="<?php //cho site_url('/privacy-policy'); ?>">Privacy</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul> -->
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_2'
                        ));
                        ?>
                    </nav>
                </div>
            </div>

            <div class="site-footer__col-four">
                <h3 class="headline headline--small">Connect With Us</h3>
                <nav>
                    <ul class="min-list social-icons-list group">
                        <li>
                            <a href="https://www.facebook.com" target="_blank" class="social-color-linkedin"><i
                                    class="fab fa-facebook"></i>
                                Facebook</a>
                        </li>
                        <li>
                            <a class="social-color-twitter" href="https://www.twitter.com" target="_blank"><i
                                    class="fab fa-twitter"></i> Twitter</a>
                        </li>

                        <li>
                            <a class="social-color-linkedin" href="https://www.linkedin.com" target="_blank"><i
                                    class="fab fa-linkedin"></i>
                                Linkedin</a>
                        </li>
                        <li>
                            <a class="social-color-instagram" href="https://www.instagram.com" target="_blank"><i
                                    class="fab fa-instagram"></i>
                                Instagram</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>