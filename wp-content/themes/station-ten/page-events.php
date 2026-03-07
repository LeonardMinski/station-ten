<?php
get_header();
?>
<div class="station-page">
    <div data-tab-group>
        <section class="station-hero">
            <p class="station-eyebrow">Events</p>
            <h1>Upcoming nights and recent moments.</h1>
            <p class="station-lead">
                A look ahead at upcoming live sets and a quick recap grid for past
                nights and private functions.
            </p>
            <div class="station-tabs">
                <button class="station-tab station-tab-active" type="button" data-tab-button="upcoming" aria-selected="true">Upcoming</button>
                <button class="station-tab" type="button" data-tab-button="past" aria-selected="false">Past</button>
            </div>
        </section>

        <section class="station-section" data-tab-panel="upcoming">
            <div class="station-section-head">
                <h2>Upcoming</h2>
                <span>Featured dates</span>
            </div>
            <div class="station-stack">
                <?php stationten_render_event_cards(); ?>
            </div>
        </section>

        <section class="station-section" data-tab-panel="past" hidden>
            <div class="station-section-head">
                <h2>Past</h2>
                <span>Recaps</span>
            </div>
            <div class="station-gallery-grid">
                <?php stationten_render_past_events(); ?>
            </div>
        </section>
    </div>
</div>
<?php
get_footer();
