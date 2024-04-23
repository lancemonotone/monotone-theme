<?php
namespace monotone;

$utility_corp = get_field( 'corporate_utility_nav_extra_links', 'option' );
$utility_help = get_field( 'helpline_utility_nav_extra_links', 'option' );
?>

<div id="utility-bar">
    <div class="inner">
        <div class="toggle"></div>

        <?php
        if( is_page_template('template-flex-page-helpline.php') ) {
            if( $utility_help ) {
                echo '<div class="extra">';
                foreach( $utility_help as $row ) {
                    $link = $row['nav_link'];
                    $link_url = $link['url'];
                    $link_text = $link['title'];
                    $link_target = $link['target'];
                    echo '<a href="' . $link_url . '" target="' . $link_target . '">' . $link_text . '</a>';
                }
                echo '</div>';
            }
        } else {
            if( $utility_corp ) {
                echo '<div class="extra">';
                foreach( $utility_corp as $row ) {
                    $link = $row['nav_link'];
                    $link_url = $link['url'];
                    $link_text = $link['title'];
                    $link_target = $link['target'];
                    echo '<a href="' . $link_url . '" target="' . $link_target . '">' . $link_text . '</a>';
                }
                echo '</div>';
            }
        }
        ?>
    </div>
</div>
