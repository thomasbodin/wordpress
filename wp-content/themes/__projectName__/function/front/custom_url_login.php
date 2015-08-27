<?php

    /**
     * siteurl du login
     */
    function custom_url_login() {
        return get_bloginfo( 'siteurl' );
    }
    add_filter('login_headerurl', 'custom_url_login');