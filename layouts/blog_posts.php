<?php namespace monotone;

// Fetch the term (category slug) from query vars or ACF fields
$term = get_query_var( 'category_name' );
if ( ! $term ) {
    $term_object = get_sub_field( 'terms' );
    if ( $term_object ) {
        $term = $term_object->slug;
    }
}

// Fetch posts_per_page from ACF fields or set default
$posts_per_page = intval( get_sub_field( 'posts_per_page' ) ) ?: 10;

// Fetch post IDs
$total_pages = 0;
$post_ids    = Blog::get_post_ids( $term, $posts_per_page, $total_pages );

$card[ 'acf_fc_layout' ] = 'blog_card';

$section_header        = get_sub_field( 'section_header' ) ?? '';
$heading_size          = get_sub_field( 'heading_size' ) ?? 'header-lg';
$link_author_name      = get_field( 'link_author_name', 'option' ) ?? false;
$first_post_full_width = get_sub_field( 'first_post_full_width' ) ? 'first-post-full-width' : '';
$hide_pagination       = get_sub_field( 'hide_pagination' ) ?? false;

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';
$count   = 0;
?>

    <div id="<?= $id ?>"
         class="<?= $classes ?> card-grid <?= $first_post_full_width ?>"
         style="<?= $styles ?>">

        <div class="inner">

            <?php if ( $section_header ) { ?>
                <h2 class="section-heading <?= $heading_size ?>"><?= $section_header; ?></h2>
            <?php } ?>

            <div class="card-container">
                <?php
                if ( ! empty( $post_ids ) ) {
                    foreach ( $post_ids as $post_id ) {
                        $card_id = $post_id . '-' . $count;

                        $card_classes   = [];
                        $card_classes[] = get_field( 'background_color', $post_id ) ?? 'has-background has-white-background-color';
                        $card_classes[] = str_replace( '_', '-', $card[ 'acf_fc_layout' ] ) ?? '';
                        $card_classes   = array_filter( $card_classes );

                        include( locate_template( 'layouts/cards/' . $card[ 'acf_fc_layout' ] . '.php' ) );
                        $count++;
                    }
                }
                ?>

            </div>

            <?php if ( ! $hide_pagination ) { ?>
                <?= Blog::paginate_posts_archive( $term, $total_pages ); ?>
            <?php } ?>

        </div>

    </div>

    <?php
// Restore original Post Data
wp_reset_postdata();
