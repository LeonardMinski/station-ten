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

    <section class="station-section">
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
        </div>
        <div class="station-grid station-grid-two">
            <article class="station-info-card">
                <span class="station-pill">Cocktails</span>
                <h3>Night service starts early</h3>
                <p>Signature drinks, low-intervention wine, and easy classics for live sets and private bookings.</p>
                <a class="station-button" href="<?php echo esc_url(stationten_page_url('menu')); ?>">View drinks</a>
            </article>
            <article class="station-info-card">
                <span class="station-pill">Food</span>
                <h3>Comfort food with weight behind it</h3>
                <p>Bowls, small plates, and mains that work for daytime co-working and late-night crowds.</p>
                <a class="station-button" href="<?php echo esc_url(stationten_page_url('menu')); ?>">View details</a>
            </article>
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

    <section class="station-section">
        <div class="station-section-head">
            <h2>Find Us</h2>
        </div>
        <div class="station-map-card">
            <div class="station-map-placeholder"></div>
        </div>
    </section>

    <section class="station-section">
        <div class="station-section-head">
            <h2>Opening Times</h2>
        </div>
        <div class="station-info-card">
            <div class="station-hours">
                <?php stationten_render_hours(); ?>
            </div>
            <a class="station-button" href="<?php echo esc_url(stationten_page_url('bookings')); ?>">Contact</a>
            <p class="station-address"><?php echo esc_html($data['address']); ?></p>
            <div class="station-socials">
                <?php foreach ($data['socials'] as $social) : ?>
                    <span><?php echo esc_html($social); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
