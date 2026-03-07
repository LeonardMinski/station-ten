<?php
get_header();
?>
<div class="station-page">
    <section class="station-hero">
        <p class="station-eyebrow">Menu &amp; Drinks</p>
        <h1>Food for the table. Drinks for the night.</h1>
        <p class="station-lead">
            The wireframe menu flow translated into a static mobile-first page
            with grouped food and drinks.
        </p>
        <div class="station-tabs">
            <span class="station-tab station-tab-active">Food</span>
            <span class="station-tab">Drinks</span>
        </div>
    </section>

    <section class="station-section">
        <div class="station-section-head">
            <h2>Food</h2>
            <span>Mains</span>
        </div>
        <div class="station-stack">
            <?php stationten_render_menu_items('food'); ?>
        </div>
    </section>

    <section class="station-section">
        <div class="station-section-head">
            <h2>Drinks</h2>
            <span>Signatures</span>
        </div>
        <div class="station-stack">
            <?php stationten_render_menu_items('drinks'); ?>
        </div>
    </section>
</div>
<?php
get_footer();
