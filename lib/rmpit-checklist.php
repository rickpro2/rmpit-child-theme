<?php
// Function to initialize default checklist items
function rmpit_initialize_checklist_items() {
    $default_items = [
        ['task' => 'Activate Solid Security Pro', 'completed' => false],
        ['task' => 'Install Pro Demo', 'completed' => false],
        ['task' => 'Delete Website Checklist Plugin', 'completed' => false]
    ];
    if (false === get_option('rmpit_checklist_items')) {
        update_option('rmpit_checklist_items', $default_items);
    }
}
add_action('after_setup_theme', 'rmpit_initialize_checklist_items');

// Add the dashboard widget
function rmpit_add_checklist_widget() {
    if (current_user_can('manage_options')) { // Only for admins
        wp_add_dashboard_widget(
            'rmpit_checklist_widget', // Widget ID
            'Website Development Checklist', // Widget Title
            'rmpit_display_checklist_widget' // Callback to display content
        );

        // Reposition the widget to the top
        global $wp_meta_boxes;

        $widget = $wp_meta_boxes['dashboard']['normal']['core']['rmpit_checklist_widget'];
        unset($wp_meta_boxes['dashboard']['normal']['core']['rmpit_checklist_widget']);
        $wp_meta_boxes['dashboard']['side']['high']['rmpit_checklist_widget'] = $widget;
    }
}
add_action('wp_dashboard_setup', 'rmpit_add_checklist_widget');

// Display the checklist widget
function rmpit_display_checklist_widget() {
    $checklist_items = get_option('rmpit_checklist_items', []);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rmpit_checklist'])) {
        $checklist_items = array_map(function($item) {
            return [
                'task' => sanitize_text_field($item['task']),
                'completed' => isset($item['completed']) ? true : false
            ];
        }, $_POST['rmpit_checklist']);
        update_option('rmpit_checklist_items', $checklist_items);
    }

    if (!empty($_POST['rmpit_new_task'])) {
        $new_task = sanitize_text_field($_POST['rmpit_new_task']);
        $checklist_items[] = ['task' => $new_task, 'completed' => false];
        update_option('rmpit_checklist_items', $checklist_items);
    }

    echo '<form method="post" id="rmpit-checklist-form">';
    echo '<ul style="list-style-type: none; padding: 0;">';
    foreach ($checklist_items as $index => $item) {
        $checked = $item['completed'] ? 'checked' : '';
        $style = $item['completed'] ? 'text-decoration: line-through; color: gray;' : '';
        echo '<li>';
        echo '<label style="' . esc_attr($style) . '">';
        echo '<input type="checkbox" name="rmpit_checklist[' . $index . '][completed]" value="1" ' . $checked . ' />';
        echo '<input type="hidden" name="rmpit_checklist[' . $index . '][task]" value="' . esc_attr($item['task']) . '" />';
        echo ' ' . esc_html($item['task']);
        echo '</label>';
        echo '</li>';
    }
    echo '</ul>';
    echo '<p>';
    echo '<input type="text" name="rmpit_new_task" placeholder="Add a new task" style="width: 100%;" />';
    echo '</p>';
    echo '<p>';
    echo '<button type="submit" class="button button-primary">Save Checklist</button>';
    echo '</p>';
    echo '</form>';
}

// Enqueue scripts and styles for the dashboard widget
function rmpit_checklist_widget_assets($hook) {
    if ('index.php' !== $hook || !current_user_can('manage_options')) return;
    wp_enqueue_script('rmpit-checklist-script', get_stylesheet_directory_uri() . '/rmpit-checklist.js', ['jquery'], null, true);
    wp_enqueue_style('rmpit-checklist-style', get_stylesheet_directory_uri() . '/rmpit-checklist.css');
}
add_action('admin_enqueue_scripts', 'rmpit_checklist_widget_assets');