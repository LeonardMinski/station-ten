<?php

function stationten_setup()
{
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        array('search-form', 'gallery', 'caption', 'style', 'script')
    );
}

add_action('after_setup_theme', 'stationten_setup');

function stationten_enqueue_assets()
{
    wp_enqueue_style(
        'stationten-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'stationten_enqueue_assets');

function stationten_seed_pages()
{
    if (get_option('stationten_seeded_pages')) {
        return;
    }

    $pages = array(
        'events' => 'Events',
        'menu' => 'Menu',
        'bookings' => 'Bookings',
    );

    foreach ($pages as $slug => $title) {
        if (get_page_by_path($slug)) {
            continue;
        }

        wp_insert_post(
            array(
                'post_title' => $title,
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
            )
        );
    }

    update_option('stationten_seeded_pages', 1);
}

add_action('init', 'stationten_seed_pages');

function stationten_data()
{
    return array(
        'events' => array(
            array(
                'date' => 'Fri 12 Jan',
                'title' => 'Live Jazz Night',
                'description' => 'Live jazz with guest horns, late cocktails, and a room built for long sets.',
            ),
            array(
                'date' => 'Fri 19 Jan',
                'title' => 'Soul & R&B Sessions',
                'description' => 'Resident selectors, smooth soul, and warm lighting for a slower Friday crowd.',
            ),
            array(
                'date' => 'Fri 26 Jan',
                'title' => 'Open Mic & Guest Performers',
                'description' => 'A rotating line-up of local performers, spoken word, and first-time artists.',
            ),
        ),
        'past_events' => array(
            array(
                'label' => '12/2025',
                'title' => 'Jazz night',
            ),
            array(
                'label' => '02/2026',
                'title' => 'Soul night',
            ),
            array(
                'label' => '01/2026',
                'title' => 'Open mic',
            ),
            array(
                'label' => '12/2025',
                'title' => 'Private hire',
            ),
        ),
        'menu' => array(
            'food' => array(
                array(
                    'title' => 'Curry Goat',
                    'price' => '£15.00',
                    'description' => 'Slow-cooked goat, coconut gravy, rice and peas.',
                ),
                array(
                    'title' => 'Jerk Chicken Bowl',
                    'price' => '£14.00',
                    'description' => 'Charred jerk chicken, slaw, pickles, and seasoned rice.',
                ),
                array(
                    'title' => 'Plantain & Pepper Stew',
                    'price' => '£12.50',
                    'description' => 'Sweet plantain, braised peppers, herbs, and cassava crisps.',
                ),
            ),
            'drinks' => array(
                array(
                    'title' => 'Station House',
                    'price' => '£11.00',
                    'description' => 'Dark rum, pineapple, lime, bitters, and smoked orange.',
                ),
                array(
                    'title' => 'Late Platform',
                    'price' => '£10.50',
                    'description' => 'Gin, elderflower, cucumber, and sparkling apple.',
                ),
                array(
                    'title' => 'No.10 Spritz',
                    'price' => '£9.50',
                    'description' => 'Aperitif blend, blood orange, soda, and rosemary.',
                ),
            ),
        ),
        'booking_types' => array(
            array(
                'label' => 'Event Hire',
                'description' => 'Live music, ticketed nights, and special events.',
            ),
            array(
                'label' => 'Co-Working',
                'description' => 'Book a desk or private space during the daytime.',
            ),
            array(
                'label' => 'Private Hire',
                'description' => 'Birthdays, gatherings, celebrations, and private functions.',
            ),
        ),
        'hours' => array(
            'Monday' => 'Closed',
            'Tuesday' => '12:00 - 22:00',
            'Wednesday' => '12:00 - 22:00',
            'Thursday' => '12:00 - 23:00',
            'Friday' => '12:00 - Late',
            'Saturday' => '12:00 - Late',
            'Sunday' => '12:00 - 20:00',
        ),
        'socials' => array('FB', 'X', 'IG', 'WA', 'SC'),
        'address' => '10 Sydenham Station Approach, London SE26 5EU',
    );
}

function stationten_page_url($slug)
{
    $page = get_page_by_path($slug);

    if ($page) {
        return get_permalink($page);
    }

    return home_url('/' . $slug . '/');
}

function stationten_current_nav()
{
    if (is_front_page()) {
        return 'home';
    }

    $id = get_queried_object_id();

    if (!$id) {
        return '';
    }

    return get_post_field('post_name', $id);
}

function stationten_render_nav($class_name = '')
{
    $items = array(
        'home' => array(
            'label' => 'Home',
            'url' => home_url('/'),
        ),
        'events' => array(
            'label' => 'Events',
            'url' => stationten_page_url('events'),
        ),
        'menu' => array(
            'label' => 'Menu',
            'url' => stationten_page_url('menu'),
        ),
        'bookings' => array(
            'label' => 'Bookings',
            'url' => stationten_page_url('bookings'),
        ),
    );

    $current = stationten_current_nav();

    echo '<nav class="' . esc_attr($class_name) . '" aria-label="Primary">';

    foreach ($items as $slug => $item) {
        $classes = $slug === $current ? 'is-current' : '';

        echo '<a class="' . esc_attr($classes) . '" href="' . esc_url($item['url']) . '">';
        echo esc_html($item['label']);
        echo '</a>';
    }

    echo '</nav>';
}

function stationten_render_event_cards()
{
    $data = stationten_data();

    foreach ($data['events'] as $event) {
        echo '<article class="station-card">';
        echo '<span class="station-pill">' . esc_html($event['date']) . '</span>';
        echo '<h3>' . esc_html($event['title']) . '</h3>';
        echo '<p>' . esc_html($event['description']) . '</p>';
        echo '<a class="station-button" href="' . esc_url(stationten_page_url('bookings')) . '">View details</a>';
        echo '</article>';
    }
}

function stationten_render_past_events()
{
    $data = stationten_data();

    foreach ($data['past_events'] as $item) {
        echo '<article class="station-gallery-card">';
        echo '<span>' . esc_html($item['label']) . '</span>';
        echo '<strong>' . esc_html($item['title']) . '</strong>';
        echo '</article>';
    }
}

function stationten_render_menu_items($group)
{
    $data = stationten_data();

    foreach ($data['menu'][$group] as $item) {
        echo '<article class="station-menu-card">';
        echo '<div class="station-menu-thumb" aria-hidden="true"></div>';
        echo '<div class="station-menu-copy">';
        echo '<h3>' . esc_html($item['title']) . '</h3>';
        echo '<p>' . esc_html($item['description']) . '</p>';
        echo '</div>';
        echo '<div class="station-menu-price">' . esc_html($item['price']) . '</div>';
        echo '</article>';
    }
}

function stationten_render_hours()
{
    $data = stationten_data();

    foreach ($data['hours'] as $day => $hours) {
        echo '<div class="station-hours-row">';
        echo '<span>' . esc_html($day) . '</span>';
        echo '<strong>' . esc_html($hours) . '</strong>';
        echo '</div>';
    }
}
