<?php
$api_url = 'https://jsonplaceholder.typicode.com/posts'; // Replace with your API URL.

// Fetch data from the API.
$response = wp_safe_remote_get($api_url);

// Check if the request was successful.
if (is_wp_error($response)) {
    echo 'Failed to fetch data from the API.';
} else {
    $data = wp_remote_retrieve_body($response);
    $posts = json_decode($data);

    // Display the data as a list.
    if (!empty($posts)) {
        echo '<ul>';
        foreach ($posts as $post) {
            echo '<li>' . esc_html($post->title) . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No data available.';
    }
}
?>
