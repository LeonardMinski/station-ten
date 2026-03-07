<?php
$result = stationten_process_contact_submission();
$data = stationten_data();

get_header();
?>
<div class="station-page">
    <section class="station-hero">
        <p class="station-eyebrow">Contact</p>
        <h1>Get in touch with Station Ten.</h1>
        <p class="station-lead">
            Use this page for general enquiries, partnerships, and venue questions.
            For bookings, you can also use the dedicated booking pages.
        </p>
    </section>

    <section class="station-booking-detail">
        <div class="station-info-card">
            <h2>Contact details</h2>
            <p class="station-address"><?php echo esc_html($data['address']); ?></p>
            <p><?php echo esc_html($data['email']); ?></p>
            <p><?php echo esc_html($data['phone']); ?></p>
            <div class="station-socials">
                <?php stationten_render_social_links(); ?>
            </div>
        </div>

        <form class="station-booking-form" method="post">
            <?php wp_nonce_field('stationten_contact', 'stationten_contact_nonce'); ?>
            <div class="station-form-grid">
                <label>
                    <span>Name</span>
                    <input type="text" name="name" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required>
                </label>
                <label class="station-form-full">
                    <span>Subject</span>
                    <input type="text" name="subject" required>
                </label>
            </div>
            <label class="station-form-full">
                <span>Message</span>
                <textarea name="message" rows="7" required></textarea>
            </label>
            <button class="station-button" type="submit">Send enquiry</button>
            <?php if ($result['submitted']) : ?>
                <p class="station-form-success <?php echo $result['success'] ? 'is-success' : 'is-error'; ?>">
                    <?php echo esc_html($result['message']); ?>
                </p>
            <?php endif; ?>
        </form>
    </section>
</div>
<?php
get_footer();
