<div class="field">
    <div class="two columns alpha">
        <?php echo get_view()->formLabel('analytics_key', __('Your Google Analytics Key is:')); ?>
    </div>
    <div class="inputs five columns omega">
        <p class="explanation">
            <?php echo __('Enter your key from Google Analytics.'); ?>
        </p>
        <?php echo get_view()->formText( 'analytics_key', get_option('analytics_key' )); ?>
    </div>
</div>