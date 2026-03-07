<?php
get_header();
$data = stationten_data();
?>
<div class="station-page station-home">
    <section class="station-hero">
        <p class="station-eyebrow">Station Ten</p>
        <h1>Live music. Great drinks. Big nights.</h1>
        <p class="station-lead">
            A static WordPress MVP shaped directly from the mobile concepts:
            events, menu, bookings, past nights, map, and opening times.
        </p>
        <div class="station-actions">
            <a class="station-button" href="<?php echo esc_url(stationten_page_url('events')); ?>">
                View events
            </a>
            <a
                class="station-button station-button-secondary"
                href="<?php echo esc_url(stationten_page_url('bookings')); ?>"
            >
                Book event space
            </a>
        </div>
    </section>

    <section id="whats-on" class="station-section">
        <div class="station-section-head">
            <h2>What’s On</h2>
            <span>Upcoming</span>
        </div>
        <div class="station-stack">
            <?php stationten_render_event_cards(); ?>
        </div>
    </section>

    <section class="station-section">
        <div class="station-section-head">
            <h2>Menu &amp; Drinks</h2>
            <a class="station-chip-link" href="<?php echo esc_url(stationten_page_url('menu')); ?>">Open page</a>
        </div>
        <div class="station-link-grid">
            <a class="station-link-card" href="<?php echo esc_url(stationten_page_url('menu') . '#food'); ?>">
                <div class="station-link-media" aria-hidden="true"></div>
                <span class="station-pill">Food</span>
                <strong>Mains and small plates</strong>
            </a>
            <a class="station-link-card" href="<?php echo esc_url(stationten_page_url('menu') . '#drinks'); ?>">
                <div class="station-link-media" aria-hidden="true"></div>
                <span class="station-pill">Drinks</span>
                <strong>Cocktails and signatures</strong>
            </a>
        </div>
    </section>

    <section class="station-section">
        <div class="station-section-head">
            <h2>Past Events</h2>
            <a class="station-chip-link" href="<?php echo esc_url(stationten_page_url('events')); ?>">View all</a>
        </div>
        <div class="station-gallery-grid">
            <?php stationten_render_past_events(); ?>
        </div>
    </section>

    <section id="opening-times" class="station-section">
        <div class="station-section-head">
            <h2>Opening Times</h2>
        </div>
        <div class="station-info-card">
            <div class="station-hours">
                <?php stationten_render_hours(); ?>
            </div>
            <a class="station-button" href="<?php echo esc_url(stationten_page_url('bookings')); ?>">Contact</a>
        </div>
    </section>

    <section id="find-us" class="station-section">
        <div class="station-section-head">
            <h2>Find Us</h2>
        </div>
        <div class="station-contact-grid">
            <div class="station-map-card">
                <div class="station-map-placeholder"></div>
            </div>
            <div class="station-info-card">
                <p class="station-address"><?php echo esc_html($data['address']); ?></p>
                <p class="station-contact-copy">
                    Near Sydenham Station with easy access for daytime co-working,
                    evening events, and private bookings.
                </p>
                <div class="station-socials">
                    <?php stationten_render_social_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
