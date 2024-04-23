<?php namespace monotone; ?>

<?php get_header(); ?>

<div class="split-home-wrapper">

    <div class="part part-left">
        <a href="/help-treatment/" aria-label="Click to navigate to the Helpline homepage." class="inner-wrap">
            <div class="logo-wrap">
                <?php
                $helplinelogo = '';
                if ( file_exists( THEME_ASSETS_PATH . '/build/images/logo-split-home-800.svg' ) ) {
                    $helplinelogo = THEME_ASSETS_URI . '/build/images/logo-split-home-800.svg';
                }
                ?>
                <img src="<?php echo $helplinelogo; ?>" alt="1-800-GAMBLER : Help for Problem Gambling" />
            </div>

            <div class="copy-wrap">
                <p>For Individuals, Families <br>and Loved Ones</p>
            </div>

            <div class="button-wrap">
                <span class="button white">Visit Site</span>
            </div>
        </a>

        <div class="arrow-wrap">
            <button id="mobile-expand-800" class="mobile-expand" aria-label="Click to expand to read more about 1-800-GAMBLER">
                <?php
                $homeArrow1 = '';
                if ( file_exists( THEME_ASSETS_PATH . '/build/images/icon-home-arrow-down.svg' ) ) {
                    $homeArrow1 = THEME_ASSETS_URI . '/build/images/icon-home-arrow-down.svg';
                }
                ?>
                <img src="<?php echo $homeArrow1; ?>" alt="" />
            </button>
        </div>
    </div>

    <div class="part part-right">
        <div class="arrow-wrap">
            <button id="mobile-expand" class="mobile-expand" aria-label="Click to expand to read more">
                <?php
                $homeArrow2 = '';
                if ( file_exists( THEME_ASSETS_PATH . '/build/images/icon-home-arrow-up.svg' ) ) {
                    $homeArrow2 = THEME_ASSETS_URI . '/build/images/icon-home-arrow-up.svg';
                }
                ?>
                <img src="<?php echo $homeArrow2; ?>" alt="" />
            </button>
        </div>

        <a href="/" class="inner-wrap" aria-label="Click to navigate to the homepage.">
            <div class="logo-wrap">
                <?php
                $logo = '';
                if ( file_exists( THEME_ASSETS_PATH . '/build/images/logo-split-home.svg' ) ) {
                    $logo = THEME_ASSETS_URI . '/build/images/logo-split-home.svg';
                }
                ?>
                <img src="<?php echo $logo; ?>" alt="Primary Logo" />
            </div>

            <div class="copy-wrap">
                <p>For Advocates, Members <br>and Stakeholders</p>
            </div>

            <div class="button-wrap">
                <span class="button">Visit Site</span>
            </div>
        </a>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const splitHomeWrapper = document.querySelector('.split-home-wrapper');
    const partLeft = document.querySelector('.split-home-wrapper .part-left');
    const partRight = document.querySelector('.split-home-wrapper .part-right');
    const mobileExpand800 = document.getElementById('mobile-expand-800');
    const mobileExpand = document.getElementById('mobile-expand');

    function updateInteraction() {
        if (window.innerWidth < 960) {
            // Mobile interaction: Click event for part-left
            mobileExpand800.addEventListener('click', () => {
                splitHomeWrapper.classList.add('open-left');
                splitHomeWrapper.classList.remove('open-right');
            });

            // Mobile interaction: Click event for part-right
            mobileExpand.addEventListener('click', () => {
                splitHomeWrapper.classList.add('open-right');
                splitHomeWrapper.classList.remove('open-left');
            });
        } else {
            // Desktop interaction: Hover event for part-left
            partLeft.addEventListener('mouseenter', () => {
                splitHomeWrapper.classList.add('open-left');
            });
            partLeft.addEventListener('mouseleave', () => {
                splitHomeWrapper.classList.remove('open-left');
            });

            // Desktop interaction: Hover event for part-right
            partRight.addEventListener('mouseenter', () => {
                splitHomeWrapper.classList.add('open-right');
            });
            partRight.addEventListener('mouseleave', () => {
                splitHomeWrapper.classList.remove('open-right');
            });
        }
    }

    updateInteraction();
    window.addEventListener('resize', updateInteraction);
});
</script>

<?php get_footer(); ?>
