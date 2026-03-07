<?php
$booking_type = stationten_booking_type('event-hire');
$submitted = 'POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['stationten_booking_nonce'])
    && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['stationten_booking_nonce'])), 'stationten_booking');

get_header();
?>
<div class="station-page">
    <section class="station-hero">
        <p class="station-eyebrow"><?php echo esc_html($booking_type['label']); ?></p>
        <h1><?php echo esc_html($booking_type['title']); ?></h1>
        <p class="station-lead"><?php echo esc_html($booking_type['description']); ?></p>
    </section>

    <section class="station-booking-detail">
        <div class="station-info-card">
            <h2>What this covers</h2>
            <p>Use this form for live music nights, launches, ticketed parties, and one-off event programming.</p>
            <ul class="station-feature-list">
                <li>Venue hire request</li>
                <li>Date and time selection</li>
                <li>Guest count and notes</li>
            </ul>
        </div>

        <form class="station-booking-form" method="post">
            <?php wp_nonce_field('stationten_booking', 'stationten_booking_nonce'); ?>
            <div class="station-form-grid">
                <label>
                    <span>Name</span>
                    <input type="text" name="name" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required>
                </label>
                <label>
                    <span>Date</span>
                    <input type="date" name="booking_date" required>
                </label>
                <label>
                    <span>Time</span>
                    <input type="time" name="booking_time" required>
                </label>
                <label>
                    <span>Guests</span>
                    <input type="number" name="guest_count" min="1" step="1" placeholder="80">
                </label>
                <label>
                    <span>Phone</span>
                    <input type="tel" name="phone" placeholder="020 0000 0010">
                </label>
            </div>
            <label class="station-form-full">
                <span>Additional requirements</span>
                <textarea name="requirements" rows="6" placeholder="AV setup, ticketing, artist requirements, or access needs"></textarea>
            </label>
            <button class="station-button" type="submit">Submit booking request</button>
            <?php if ($submitted) : ?>
                <p class="station-form-success">Booking request captured for <?php echo esc_html($booking_type['label']); ?>. Connect this form to email or CRM next.</p>
            <?php endif; ?>
        </form>
    </section>
</div>
<?php
get_footer();
