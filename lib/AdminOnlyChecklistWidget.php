<?php
/**
 * Plugin Name: RMPIT Checklist Widget
 * Plugin URI: https://yourwebsite.com
 * Description: A dashboard widget that provides a checklist for website development tasks, visible only to administrators.
 * Version: 1.1
 * Author: Rickie M. Proctor II
 * Author URI: https://yourwebsite.com
 * License: GPL2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Function to initialize default checklist items
function rmpit_initialize_checklist_items() {
    $default_items = [
        ['task' => 'Activate Solid Security Pro', 'completed' => false],
        ['task' => 'Install Pro Demo', 'completed' => false],
        ['task' => 'Delete Website Checklist Plugin', 'completed' => false]
    ];
    // Only set the default items if the option doesn't already exist
    if (false === get_option('rmpit_checklist_items')) {
        update_option('rmpit_checklist_items', $default_items);
    }
}
register_activation_hook(__FILE__, 'rmpit_initialize_checklist_items');

// Add the dashboard widget
function rmpit_add_checklist_widget() {
    // Only add the widget for administrators
    if (current_user_can('manage_options')) {
        wp_add_dashboard_widget(
            'rmpit_checklist_widget', // Widget ID
            'Website Development Checklist', // Widget Title
            'rmpit_display_checklist_widget' // Callback to display content
        );
    }
}
add_action('wp_dashboard_setup', 'rmpit_add_checklist_widget');

// Display the checklist widget
function rmpit_display_checklist_widget() {
    // Get saved checklist items
    $checklist_items = get_option('rmpit_checklist_items', []);

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rmpit_checklist'])) {
        // Sanitize and save the checklist items
        $checklist_items = array_map(function($item) {
            return [
                'task' => sanitize_text_field($item['task']),
                'completed' => isset($item['completed']) ? true : false
            ];
        }, $_POST['rmpit_checklist']);
        update_option('rmpit_checklist_items', $checklist_items);
    }

    // Add a new task if provided
    if (!empty($_POST['rmpit_new_task'])) {
        $new_task = sanitize_text_field($_POST['rmpit_new_task']);
        $checklist_items[] = ['task' => $new_task, 'completed' => false];
        update_option('rmpit_checklist_items', $checklist_items);
    }

    // Display the form
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

// Enqueue admin scripts and styles
function rmpit_checklist_widget_scripts($hook) {
    if ('index.php' !== $hook || !current_user_can('manage_options')) return; // Only load for admin users on the dashboard
    wp_enqueue_script('rmpit-checklist-script', plugin_dir_url(__FILE__) . 'rmpit-checklist.js', ['jquery'], null, true);
    wp_enqueue_style('rmpit-checklist-style', plugin_dir_url(__FILE__) . 'rmpit-checklist.css');
}
add_action('admin_enqueue_scripts', 'rmpit_checklist_widget_scripts');
