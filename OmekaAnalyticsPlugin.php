<?php

/**
 * Google Analytics for Omeka Plugin
 *
 * @package GoogleAnalytics
 */

class OmekaAnalyticsPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'install',
        'uninstall',
        'public_head',
        'config',
        'config_form',
    );

    public function hookInstall()
    {
        set_option( 'analytics_key', ' ' );
    }

    public function hookUninstall()
    {
        delete_option( 'analytics_key' );
    }

    public function hookPublicHead()
    {
            $analyticsKey = get_option( 'analytics_key' ); //camelcase to use in JS

            $analytics_script = <<<ANALYTICS
                  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                  ga('create', '$analyticsKey', 'auto')
                  ga('send', 'pageview');
ANALYTICS;

            queue_js_string( $analytics_script );
    }

    public function hookConfig()
    {
        set_option( 'analytics_key', ( $_POST['analytics_key'] ) );
    }

    public function hookConfigform()
    {
        require dirname(__FILE__) . '/config_form.php';
    }


}
