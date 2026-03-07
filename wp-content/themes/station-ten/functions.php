<?php

function stationten_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
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

    wp_enqueue_script(
        'stationten-script',
        get_template_directory_uri() . '/script.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
}

add_action('wp_enqueue_scripts', 'stationten_enqueue_assets');

function stationten_register_post_types()
{
    register_post_type(
        'station_event',
        array(
            'labels' => array(
                'name' => 'Events',
                'singular_name' => 'Event',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-calendar-alt',
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
        )
    );

    register_post_type(
        'station_menu_item',
        array(
            'labels' => array(
                'name' => 'Menu Items',
                'singular_name' => 'Menu Item',
                'add_new_item' => 'Add New Menu Item',
                'edit_item' => 'Edit Menu Item',
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-food',
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
        )
    );
}

add_action('init', 'stationten_register_post_types');

function stationten_seed_pages()
{
    $pages = array(
        'events' => 'Events',
        'menu' => 'Menu & Drinks',
        'bookings' => 'Bookings',
        'event-hire' => 'Event Hire',
        'co-working' => 'Co-Working',
        'private-hire' => 'Private Hire',
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
}

add_action('init', 'stationten_seed_pages');

function stationten_default_data()
{
    return array(
        'events' => array(
            array(
                'date' => 'Fri 12 Jan',
                'title' => 'Live Jazz Night',
                'description' => 'Live jazz with guest horns, late cocktails, and a room built for long sets.',
                'status' => 'upcoming',
            ),
            array(
                'date' => 'Fri 19 Jan',
                'title' => 'Soul & R&B Sessions',
                'description' => 'Resident selectors, smooth soul, and warm lighting for a slower Friday crowd.',
                'status' => 'upcoming',
            ),
            array(
                'date' => 'Fri 26 Jan',
                'title' => 'Open Mic & Guest Performers',
                'description' => 'A rotating line-up of local performers, spoken word, and first-time artists.',
                'status' => 'upcoming',
            ),
            array(
                'date' => '12/2025',
                'title' => 'Jazz night',
                'description' => 'A packed room and a late finish.',
                'status' => 'past',
            ),
            array(
                'date' => '02/2026',
                'title' => 'Soul night',
                'description' => 'Selectors, guests, and a full floor.',
                'status' => 'past',
            ),
            array(
                'date' => '01/2026',
                'title' => 'Open mic',
                'description' => 'Local talent and first-time performers.',
                'status' => 'past',
            ),
            array(
                'date' => '12/2025',
                'title' => 'Private hire',
                'description' => 'Private celebration with drinks and music.',
                'status' => 'past',
            ),
        ),
        'menu_items' => array(
            array(
                'group' => 'food',
                'title' => 'Curry Goat',
                'price' => '£15.00',
                'description' => 'Slow-cooked goat, coconut gravy, rice and peas.',
            ),
            array(
                'group' => 'food',
                'title' => 'Jerk Chicken Bowl',
                'price' => '£14.00',
                'description' => 'Charred jerk chicken, slaw, pickles, and seasoned rice.',
            ),
            array(
                'group' => 'food',
                'title' => 'Plantain & Pepper Stew',
                'price' => '£12.50',
                'description' => 'Sweet plantain, braised peppers, herbs, and cassava crisps.',
            ),
            array(
                'group' => 'drinks',
                'title' => 'Station House',
                'price' => '£11.00',
                'description' => 'Dark rum, pineapple, lime, bitters, and smoked orange.',
            ),
            array(
                'group' => 'drinks',
                'title' => 'Late Platform',
                'price' => '£10.50',
                'description' => 'Gin, elderflower, cucumber, and sparkling apple.',
            ),
            array(
                'group' => 'drinks',
                'title' => 'No.10 Spritz',
                'price' => '£9.50',
                'description' => 'Aperitif blend, blood orange, soda, and rosemary.',
            ),
        ),
    );
}

function stationten_data()
{
    return array(
        'booking_types' => array(
            'event-hire' => array(
                'label' => 'Event Hire',
                'title' => 'Book live music nights, launches, and ticketed events.',
                'description' => 'Ideal for promoters, label nights, community events, and brand activations.',
            ),
            'co-working' => array(
                'label' => 'Co-Working',
                'title' => 'Book a desk or private daytime work space.',
                'description' => 'Flexible daytime use for solo work, small meetings, or creative sessions.',
            ),
            'private-hire' => array(
                'label' => 'Private Hire',
                'title' => 'Plan birthdays, celebrations, and private gatherings.',
                'description' => 'Suitable for parties, dinners, receptions, and intimate private functions.',
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
        'socials' => array(
            array(
                'label' => 'Facebook',
                'slug' => 'facebook',
                'url' => '#',
            ),
            array(
                'label' => 'X',
                'slug' => 'x',
                'url' => '#',
            ),
            array(
                'label' => 'Instagram',
                'slug' => 'instagram',
                'url' => '#',
            ),
            array(
                'label' => 'WhatsApp',
                'slug' => 'whatsapp',
                'url' => '#',
            ),
            array(
                'label' => 'Snapchat',
                'slug' => 'snapchat',
                'url' => '#',
            ),
        ),
        'address' => '10 Sydenham Station Approach, London SE26 5EU',
        'email' => 'hello@stationten.co.uk',
        'phone' => '020 0000 0010',
    );
}

function stationten_seed_editable_content()
{
    if (get_option('stationten_seeded_content')) {
        return;
    }

    $defaults = stationten_default_data();

    if (!get_posts(array('post_type' => 'station_event', 'posts_per_page' => 1, 'fields' => 'ids'))) {
        foreach ($defaults['events'] as $index => $event) {
            $post_id = wp_insert_post(
                array(
                    'post_type' => 'station_event',
                    'post_status' => 'publish',
                    'post_title' => $event['title'],
                    'post_excerpt' => $event['description'],
                    'menu_order' => $index,
                )
            );

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'stationten_event_date_label', $event['date']);
                update_post_meta($post_id, 'stationten_event_status', $event['status']);
            }
        }
    }

    if (!get_posts(array('post_type' => 'station_menu_item', 'posts_per_page' => 1, 'fields' => 'ids'))) {
        foreach ($defaults['menu_items'] as $index => $item) {
            $post_id = wp_insert_post(
                array(
                    'post_type' => 'station_menu_item',
                    'post_status' => 'publish',
                    'post_title' => $item['title'],
                    'post_excerpt' => $item['description'],
                    'menu_order' => $index,
                )
            );

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'stationten_menu_group', $item['group']);
                update_post_meta($post_id, 'stationten_menu_price', $item['price']);
            }
        }
    }

    update_option('stationten_seeded_content', 1);
}

add_action('init', 'stationten_seed_editable_content');

function stationten_add_meta_boxes()
{
    add_meta_box(
        'stationten-event-details',
        'Event Details',
        'stationten_render_event_meta_box',
        'station_event',
        'side'
    );

    add_meta_box(
        'stationten-menu-details',
        'Menu Item Details',
        'stationten_render_menu_meta_box',
        'station_menu_item',
        'side'
    );
}

add_action('add_meta_boxes', 'stationten_add_meta_boxes');

function stationten_render_event_meta_box($post)
{
    wp_nonce_field('stationten_save_meta', 'stationten_meta_nonce');

    $date_label = get_post_meta($post->ID, 'stationten_event_date_label', true);
    $status = get_post_meta($post->ID, 'stationten_event_status', true);
    ?>
    <p>
        <label for="stationten_event_date_label"><strong>Date label</strong></label><br>
        <input id="stationten_event_date_label" name="stationten_event_date_label" type="text" value="<?php echo esc_attr($date_label); ?>" style="width:100%;">
    </p>
    <p>
        <label for="stationten_event_status"><strong>Status</strong></label><br>
        <select id="stationten_event_status" name="stationten_event_status" style="width:100%;">
            <option value="upcoming" <?php selected($status, 'upcoming'); ?>>Upcoming</option>
            <option value="past" <?php selected($status, 'past'); ?>>Past</option>
        </select>
    </p>
    <p>Use the featured image for past-event gallery visuals. Use Excerpt for the short card description.</p>
    <?php
}

function stationten_render_menu_meta_box($post)
{
    wp_nonce_field('stationten_save_meta', 'stationten_meta_nonce');

    $group = get_post_meta($post->ID, 'stationten_menu_group', true);
    $price = get_post_meta($post->ID, 'stationten_menu_price', true);
    ?>
    <p>
        <label for="stationten_menu_group"><strong>Group</strong></label><br>
        <select id="stationten_menu_group" name="stationten_menu_group" style="width:100%;">
            <option value="food" <?php selected($group, 'food'); ?>>Food</option>
            <option value="drinks" <?php selected($group, 'drinks'); ?>>Drinks</option>
        </select>
    </p>
    <p>
        <label for="stationten_menu_price"><strong>Price</strong></label><br>
        <input id="stationten_menu_price" name="stationten_menu_price" type="text" value="<?php echo esc_attr($price); ?>" style="width:100%;">
    </p>
    <p>Use the featured image for the menu thumbnail. Use Excerpt for the short menu description.</p>
    <?php
}

function stationten_save_meta($post_id)
{
    if (!isset($_POST['stationten_meta_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['stationten_meta_nonce'])), 'stationten_save_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $post_type = get_post_type($post_id);

    if ('station_event' === $post_type) {
        update_post_meta(
            $post_id,
            'stationten_event_date_label',
            sanitize_text_field(wp_unslash($_POST['stationten_event_date_label'] ?? ''))
        );
        update_post_meta(
            $post_id,
            'stationten_event_status',
            sanitize_text_field(wp_unslash($_POST['stationten_event_status'] ?? 'upcoming'))
        );
    }

    if ('station_menu_item' === $post_type) {
        update_post_meta(
            $post_id,
            'stationten_menu_group',
            sanitize_text_field(wp_unslash($_POST['stationten_menu_group'] ?? 'food'))
        );
        update_post_meta(
            $post_id,
            'stationten_menu_price',
            sanitize_text_field(wp_unslash($_POST['stationten_menu_price'] ?? ''))
        );
    }
}

add_action('save_post', 'stationten_save_meta');

function stationten_event_columns($columns)
{
    $columns['stationten_event_date_label'] = 'Date';
    $columns['stationten_event_status'] = 'Status';

    return $columns;
}

add_filter('manage_station_event_posts_columns', 'stationten_event_columns');

function stationten_menu_columns($columns)
{
    $columns['stationten_menu_group'] = 'Group';
    $columns['stationten_menu_price'] = 'Price';

    return $columns;
}

add_filter('manage_station_menu_item_posts_columns', 'stationten_menu_columns');

function stationten_render_admin_columns($column, $post_id)
{
    if ('stationten_event_date_label' === $column) {
        echo esc_html(get_post_meta($post_id, 'stationten_event_date_label', true));
    }

    if ('stationten_event_status' === $column) {
        echo esc_html(ucfirst(get_post_meta($post_id, 'stationten_event_status', true)));
    }

    if ('stationten_menu_group' === $column) {
        echo esc_html(ucfirst(get_post_meta($post_id, 'stationten_menu_group', true)));
    }

    if ('stationten_menu_price' === $column) {
        echo esc_html(get_post_meta($post_id, 'stationten_menu_price', true));
    }
}

add_action('manage_station_event_posts_custom_column', 'stationten_render_admin_columns', 10, 2);
add_action('manage_station_menu_item_posts_custom_column', 'stationten_render_admin_columns', 10, 2);

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

function stationten_nav_items()
{
    return array(
        array(
            'slug' => 'home',
            'label' => 'Home',
            'url' => home_url('/'),
        ),
        array(
            'slug' => 'events',
            'label' => 'Events',
            'url' => stationten_page_url('events'),
        ),
        array(
            'slug' => 'menu',
            'label' => 'Menu & Drinks',
            'url' => stationten_page_url('menu'),
        ),
        array(
            'slug' => 'bookings',
            'label' => 'Bookings',
            'url' => stationten_page_url('bookings'),
        ),
        array(
            'slug' => 'opening-times',
            'label' => 'Opening Times',
            'url' => home_url('/#opening-times'),
        ),
        array(
            'slug' => 'find-us',
            'label' => 'Find Us',
            'url' => home_url('/#find-us'),
        ),
    );
}

function stationten_render_nav($class_name = '')
{
    $current = stationten_current_nav();
    $items = stationten_nav_items();

    echo '<nav class="' . esc_attr($class_name) . '" aria-label="Primary">';

    foreach ($items as $item) {
        $is_current = in_array($current, array($item['slug'], 'event-hire', 'co-working', 'private-hire'), true)
            && 'bookings' === $item['slug'];

        if ($item['slug'] === $current) {
            $is_current = true;
        }

        $classes = $is_current ? 'is-current' : '';

        echo '<a class="' . esc_attr($classes) . '" href="' . esc_url($item['url']) . '">';
        echo esc_html($item['label']);
        echo '</a>';
    }

    echo '</nav>';
}

function stationten_get_event_entries($status)
{
    $query = new WP_Query(
        array(
            'post_type' => 'station_event',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_key' => 'stationten_event_status',
            'meta_value' => $status,
            'orderby' => array(
                'menu_order' => 'ASC',
                'date' => 'DESC',
            ),
            'order' => 'ASC',
        )
    );

    $entries = array();

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            $entries[] = array(
                'date' => get_post_meta($post->ID, 'stationten_event_date_label', true),
                'title' => get_the_title($post),
                'description' => get_the_excerpt($post),
                'image' => get_the_post_thumbnail_url($post, 'medium_large'),
            );
        }

        wp_reset_postdata();

        return $entries;
    }

    $defaults = stationten_default_data();

    foreach ($defaults['events'] as $event) {
        if ($event['status'] === $status) {
            $entries[] = $event;
        }
    }

    return $entries;
}

function stationten_render_event_cards()
{
    $events = stationten_get_event_entries('upcoming');

    foreach ($events as $event) {
        echo '<article class="station-card">';
        echo '<div class="station-event-media" aria-hidden="' . (empty($event['image']) ? 'true' : 'false') . '">';

        if (!empty($event['image'])) {
            echo '<img src="' . esc_url($event['image']) . '" alt="">';
        }

        echo '</div>';
        echo '<div class="station-event-copy">';
        echo '<span class="station-pill">' . esc_html($event['date']) . '</span>';
        echo '<h3>' . esc_html($event['title']) . '</h3>';
        echo '<p>' . esc_html($event['description']) . '</p>';
        echo '<a class="station-button" href="' . esc_url(stationten_page_url('event-hire')) . '">View details</a>';
        echo '</div>';
        echo '</article>';
    }
}

function stationten_render_past_events()
{
    $events = stationten_get_event_entries('past');

    foreach ($events as $event) {
        $style = '';

        if (!empty($event['image'])) {
            $style = ' style="background-image: linear-gradient(180deg, rgba(32, 36, 32, 0.08), rgba(32, 36, 32, 0.32)), url(' . esc_url($event['image']) . ');"';
        }

        echo '<article class="station-gallery-card"' . $style . '>';
        echo '<span>' . esc_html($event['date']) . '</span>';
        echo '<strong>' . esc_html($event['title']) . '</strong>';
        echo '</article>';
    }
}

function stationten_get_menu_entries($group)
{
    $query = new WP_Query(
        array(
            'post_type' => 'station_menu_item',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_key' => 'stationten_menu_group',
            'meta_value' => $group,
            'orderby' => array(
                'menu_order' => 'ASC',
                'date' => 'ASC',
            ),
            'order' => 'ASC',
        )
    );

    $entries = array();

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            $entries[] = array(
                'title' => get_the_title($post),
                'price' => get_post_meta($post->ID, 'stationten_menu_price', true),
                'description' => get_the_excerpt($post),
                'image' => get_the_post_thumbnail_url($post, 'thumbnail'),
            );
        }

        wp_reset_postdata();

        return $entries;
    }

    $defaults = stationten_default_data();

    foreach ($defaults['menu_items'] as $item) {
        if ($item['group'] === $group) {
            $entries[] = $item;
        }
    }

    return $entries;
}

function stationten_render_menu_items($group)
{
    $items = stationten_get_menu_entries($group);

    foreach ($items as $item) {
        echo '<article class="station-menu-card">';
        echo '<div class="station-menu-thumb" aria-hidden="true">';

        if (!empty($item['image'])) {
            echo '<img src="' . esc_url($item['image']) . '" alt="">';
        }

        echo '</div>';
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

function stationten_booking_type($slug = '')
{
    $data = stationten_data();
    $slug = $slug ? $slug : get_post_field('post_name', get_queried_object_id());

    if (isset($data['booking_types'][$slug])) {
        return $data['booking_types'][$slug];
    }

    return null;
}

function stationten_render_social_icon($slug)
{
    $icons = array(
        'facebook' => '<path d="M14.5 5.5h2.8V1.2c-.5-.1-2.1-.2-4-.2-4 0-6.7 2.4-6.7 6.9v3.8H2v5.1h4.6V29h5.6V16.8h4.7l.7-5.1h-5.4V8.4c0-1.5.4-2.9 2.9-2.9z"/>',
        'x' => '<path d="M22.2 3H27l-10.5 12 12.3 15h-9.6l-7.5-9.2L3.6 30H-1l11.2-12.8L-1.6 3h9.9l6.8 8.6L22.2 3zm-1.7 24h2.7L7 5.8H4.1L20.5 27z" transform="translate(2 0) scale(.8)"/>',
        'instagram' => '<path d="M15 3c3.9 0 4.4 0 6 .1 1.5.1 2.3.3 2.8.5.7.3 1.2.6 1.8 1.2.6.6.9 1.1 1.2 1.8.2.5.4 1.3.5 2.8.1 1.6.1 2.1.1 6s0 4.4-.1 6c-.1 1.5-.3 2.3-.5 2.8-.3.7-.6 1.2-1.2 1.8-.6.6-1.1.9-1.8 1.2-.5.2-1.3.4-2.8.5-1.6.1-2.1.1-6 .1s-4.4 0-6-.1c-1.5-.1-2.3-.3-2.8-.5-.7-.3-1.2-.6-1.8-1.2-.6-.6-.9-1.1-1.2-1.8-.2-.5-.4-1.3-.5-2.8C3 19.4 3 18.9 3 15s0-4.4.1-6c.1-1.5.3-2.3.5-2.8.3-.7.6-1.2 1.2-1.8.6-.6 1.1-.9 1.8-1.2.5-.2 1.3-.4 2.8-.5C10.6 3 11.1 3 15 3zm0 2.7c-3.8 0-4.2 0-5.8.1-1.1.1-1.8.2-2.2.4-.5.2-.8.4-1.2.8-.4.4-.6.7-.8 1.2-.2.4-.3 1.1-.4 2.2-.1 1.6-.1 2-.1 5.8s0 4.2.1 5.8c.1 1.1.2 1.8.4 2.2.2.5.4.8.8 1.2.4.4.7.6 1.2.8.4.2 1.1.3 2.2.4 1.6.1 2 .1 5.8.1s4.2 0 5.8-.1c1.1-.1 1.8-.2 2.2-.4.5-.2.8-.4 1.2-.8.4-.4.6-.7.8-1.2.2-.4.3-1.1.4-2.2.1-1.6.1-2 .1-5.8s0-4.2-.1-5.8c-.1-1.1-.2-1.8-.4-2.2-.2-.5-.4-.8-.8-1.2-.4-.4-.7-.6-1.2-.8-.4-.2-1.1-.3-2.2-.4-1.6-.1-2-.1-5.8-.1zm0 4.6A7.7 7.7 0 1 1 7.3 18 7.7 7.7 0 0 1 15 10.3zm0 12.7A5 5 0 1 0 10 18a5 5 0 0 0 5 5zm8-14.8a1.8 1.8 0 1 1-1.8-1.8A1.8 1.8 0 0 1 23 8.2z"/>',
        'whatsapp' => '<path d="M24.4 5.6A14.4 14.4 0 0 0 2.8 24.3L1 30l5.9-1.7A14.4 14.4 0 0 0 30 15.9 14.3 14.3 0 0 0 24.4 5.6zm-9.1 21.9a12 12 0 0 1-6.1-1.7l-.4-.2-3.5 1 1-3.4-.2-.4a12 12 0 1 1 9.2 4.7zm6.6-9c-.4-.2-2.3-1.1-2.6-1.2-.4-.1-.6-.2-.9.2l-.8 1c-.2.2-.4.3-.8.1a10.3 10.3 0 0 1-3-1.8 11.5 11.5 0 0 1-2.1-2.6c-.2-.4 0-.6.1-.8l.6-.7.4-.7c.1-.2.1-.5 0-.7l-1.2-2.9c-.3-.7-.6-.6-.9-.6h-.8a1.5 1.5 0 0 0-1 .5 4.4 4.4 0 0 0-1.4 3.2c0 1.9 1.4 3.7 1.6 4a16.7 16.7 0 0 0 6.4 5.6c3.9 1.5 3.9 1 4.6 1s2.3-.9 2.6-1.8.3-1.7.2-1.8-.4-.2-.8-.4z"/>',
        'snapchat' => '<path d="M15.2 2.2c-3.8 0-6.8 2.8-6.8 6.5 0 .9.2 1.8.5 2.8-.3.1-.8.3-1.3.3-.5.1-1.1-.2-1.5.2-.3.3-.2.7 0 1 .5.7 1.6 1.1 2.6 1.4.3.1.4.3.5.5.7 1.4 1.7 2.4 3.1 3 .1.1.2.2.2.4-.1.6-.3 1.1-.5 1.5-.2.4-.6.6-1 .8-.4.1-.8.2-1.2.4-.4.2-.6.6-.5 1 .1.4.5.7.9.7 2.3 0 3.9-1.2 4.6-1.8.2-.1.4-.2.6-.2s.4.1.6.2c.8.6 2.4 1.8 4.6 1.8.4 0 .8-.3.9-.7.1-.4-.1-.8-.5-1-.4-.2-.8-.3-1.2-.4-.4-.2-.8-.4-1-.8-.2-.4-.4-.9-.5-1.5 0-.2.1-.4.2-.4 1.4-.6 2.4-1.6 3.1-3 .1-.2.3-.4.5-.5 1-.3 2.1-.7 2.6-1.4.2-.3.3-.7 0-1-.4-.4-1-.1-1.5-.2-.5 0-1-.2-1.3-.3.3-1 .5-1.9.5-2.8 0-3.7-3-6.5-6.8-6.5z"/>',
    );

    if (!isset($icons[$slug])) {
        return;
    }

    echo '<svg viewBox="0 0 30 30" aria-hidden="true" focusable="false">';
    echo $icons[$slug];
    echo '</svg>';
}

function stationten_render_social_links()
{
    $data = stationten_data();

    foreach ($data['socials'] as $social) {
        echo '<a href="' . esc_url($social['url']) . '" aria-label="' . esc_attr($social['label']) . '">';
        stationten_render_social_icon($social['slug']);
        echo '</a>';
    }
}
