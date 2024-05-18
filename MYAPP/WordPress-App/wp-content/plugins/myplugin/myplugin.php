<?php
/*
Plugin Name: MyPlugin
Description: A simple WordPress plugin.
Version: 1.0
Author: Your Name
*/

function myplugin_hello_world() {
    echo '<p>Hello, WordPress!</p>';
}

add_action('admin_notices', 'myplugin_hello_world');
