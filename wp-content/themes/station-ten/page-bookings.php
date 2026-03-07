<?php
get_header();
$data = stationten_data();
?>
<div class="station-page">
    <section class="station-hero">
        <p class="station-eyebrow">Bookings</p>
        <h1>Book with Station TEN.</h1>
        <p class="station-lead">
            A static booking flow for event hire, co-working, and private hire,
            matching the mobile concept screen.
        </p>
    </section>

    <section class="station-grid station-grid-three">
        <?php foreach ($data['booking_types'] as $slug => $type) : ?>
            <article class="station-booking-card">
                <div class="station-booking-media" aria-hidden="true"></div>
                <span class="station-pill"><?php echo esc_html($type['label']); ?></span>
                <h3><?php echo esc_html($type['title']); ?></h3>
                <p><?php echo esc_html($type['description']); ?></p>
                <a class="station-button" href="<?php echo esc_url(stationten_page_url($slug)); ?>">Start booking</a>
            </article>
        <?php endforeach; ?>
    </section>
</div>
<?php
get_footer();
