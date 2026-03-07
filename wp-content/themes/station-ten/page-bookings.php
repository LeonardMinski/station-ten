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

    <section class="station-grid station-grid-two station-booking-layout">
        <div class="station-stack">
            <?php foreach ($data['booking_types'] as $type) : ?>
                <article class="station-info-card">
                    <span class="station-pill"><?php echo esc_html($type['label']); ?></span>
                    <h3><?php echo esc_html($type['label']); ?></h3>
                    <p><?php echo esc_html($type['description']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <aside class="station-stack">
            <section class="station-form-card">
                <div class="station-section-head">
                    <h2>Select a date</h2>
                    <span>July 2026</span>
                </div>
                <div class="station-calendar">
                    <span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span><span>S</span>
                    <span class="station-day">4</span>
                    <span class="station-day">5</span>
                    <span class="station-day">6</span>
                    <span class="station-day">7</span>
                    <span class="station-day">8</span>
                    <span class="station-day">9</span>
                    <span class="station-day">10</span>
                    <span class="station-day">11</span>
                    <span class="station-day">12</span>
                    <span class="station-day station-day-active">13</span>
                    <span class="station-day">14</span>
                    <span class="station-day">15</span>
                    <span class="station-day">16</span>
                    <span class="station-day">17</span>
                    <span class="station-day">18</span>
                    <span class="station-day">19</span>
                    <span class="station-day">20</span>
                    <span class="station-day">21</span>
                    <span class="station-day">22</span>
                    <span class="station-day">23</span>
                    <span class="station-day">24</span>
                </div>
            </section>

            <section class="station-form-card">
                <div class="station-section-head">
                    <h2>Select a time</h2>
                </div>
                <div class="station-time-row">
                    <span>6</span>
                    <span>10</span>
                </div>
            </section>

            <section class="station-form-card station-notes-card">
                <div class="station-section-head">
                    <h2>Additional requirements</h2>
                </div>
                <p>Space for AV, dietary needs, guest count, and private-hire notes.</p>
            </section>

            <a class="station-button" href="mailto:hello@stationten.co.uk">Make booking</a>
        </aside>
    </section>
</div>
<?php
get_footer();
