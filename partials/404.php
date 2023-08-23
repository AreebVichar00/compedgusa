<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Erica
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<main class="site-main" role="main">
  <div class="default-404-content">
      <div class="default-404-content-container">
          <div class="container">
              <div class="lakit-row">
                  <div class="lakit-col default-404-content--content">
                      <div class="default-404-content--inner">
                          <h4><?php echo esc_html_x('404. Page not found.', 'front-end', 'erica') ?></h4>
                          <p><?php echo esc_html_x("Sorry, we couldn’t find the page you where looking for. We suggest that you return to homepage.", 'front-end', 'erica'); ?></p>
                          <div class="button-wrapper"><a class="button" href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html_x('Back to homepage', 'front-view','erica')?></a></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
