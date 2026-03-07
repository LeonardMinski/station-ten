<?php
get_header();
?>
<div class="station-page">
    <section class="station-hero">
        <p class="station-eyebrow"><?php the_title(); ?></p>
        <h1><?php the_title(); ?></h1>
    </section>
    <section class="station-info-card">
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
    </section>
</div>
<?php
get_footer();
