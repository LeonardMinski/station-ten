<?php
get_header();
?>
<div class="station-page">
    <div data-tab-group>
        <section class="station-hero">
            <p class="station-eyebrow">Menu &amp; Drinks</p>
            <h1>Food for the table. Drinks for the night.</h1>
            <p class="station-lead">
                The wireframe menu flow translated into a static mobile-first page
                with grouped food and drinks.
            </p>
            <div class="station-tabs">
                <button class="station-tab station-tab-active" type="button" data-tab-button="food" aria-selected="true">Food</button>
                <button class="station-tab" type="button" data-tab-button="drinks" aria-selected="false">Drinks</button>
            </div>
        </section>

        <section id="food" class="station-section" data-tab-panel="food">
            <div class="station-section-head">
                <h2>Food</h2>
                <span>Mains</span>
            </div>
            <div class="station-stack">
                <?php stationten_render_menu_items('food'); ?>
            </div>
        </section>

        <section id="drinks" class="station-section" data-tab-panel="drinks" hidden>
            <div class="station-section-head">
                <h2>Drinks</h2>
                <span>Signatures</span>
            </div>
            <div class="station-stack">
                <?php stationten_render_menu_items('drinks'); ?>
            </div>
        </section>
    </div>
</div>
<?php
get_footer();
