<?php
$social_facebook  = get_field( 'facebook_link', 'option' );
$social_twitter  = get_field( 'twitter_link', 'option' );
$social_instagram  = get_field( 'instagram_link', 'option' );
$social_linkedin  = get_field( 'linkedin_link', 'option' );
?>

<div class="social-media-icon-wrapper">
    <?php
    if ($social_facebook) {
        echo '<a href="' . $social_facebook . '" class="icon-social facebook" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Facebook"><span class="visually-hidden">Follow us on Facebook</span></a>';    
    }

    if ($social_twitter) {
        echo '<a href="' . $social_twitter . '" class="icon-social twitter" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Twitter"><span class="visually-hidden">Follow us on Twitter</span></a>';    
    }

    if ($social_instagram) {
        echo '<a href="' . $social_instagram . '" class="icon-social instagram" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Instagram"><span class="visually-hidden">Follow us on Instagram</span></a>';    
    }

    if ($social_linkedin) {
        echo '<a href="' . $social_linkedin . '" class="icon-social linkedin" target="_blank" rel="noopener noreferrer" aria-label="Follow us on LinkedIn"><span class="visually-hidden">Follow us on LinkedIn</span></a>';    
    }
    ?>
</div>
