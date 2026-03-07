<?php
get_header();
?>
<div class="station-page">
    <section class="station-hero">
        <p class="station-eyebrow">Events</p>
        <h1>Upcoming nights and recent moments.</h1>
        <p class="station-lead">
            A look ahead at upcoming live sets and a quick recap grid for past
            nights and private functions.
        </p>
        <div class="station-tabs">
            <span class="station-tab station-tab-active">Upcoming</span>
            <span class="station-tab">Past</span>
        </div>
    </section>

    <section class="station-section">
        <div class="station-section-head">
            <h2>Upcoming</h2>
            <span>Featured dates</span>
        </div>
        <div class="station-stack">
            <?php stationten_render_event_cards(); ?>
        </div>
    </section>

    <section class="station-section">
        <div class="station-section-head">
            <h2>Past</h2>
            <span>Recaps</span>
        </div>
        <div class="station-gallery-grid">
            <?php stationten_render_past_events(); ?>
        </div>
    </section>
</div>
<?php
get_footer();
