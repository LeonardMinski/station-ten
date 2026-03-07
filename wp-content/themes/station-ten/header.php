<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="station-shell">
    <header class="station-header">
        <div class="station-header-bar">
            <a class="station-logo" href="<?php echo esc_url(home_url('/')); ?>">
                <span class="station-logo-script">Station TEN</span>
                <span class="station-logo-meta">South London</span>
            </a>
            <?php stationten_render_nav('station-nav'); ?>
            <details class="station-mobile-nav-wrap">
                <summary aria-label="Open navigation">
                    <span class="station-burger"></span>
                </summary>
                <div class="station-mobile-panel">
                    <p class="station-mobile-title">Explore</p>
                    <?php stationten_render_nav('station-mobile-nav'); ?>
                </div>
            </details>
        </div>
    </header>
    <main class="station-main">
