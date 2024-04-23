<?php namespace monotone;

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
$post_id     = get_the_ID();
$kicker      = Blog::get_term_links( $post_id );
$post_name   = get_the_title();
$post_date   = Blog::get_post_date( $post_id );
$post_author = Blog::get_post_author( $post_id );
$content     = Blog::get_post_content( $post_id );
$excerpt     = strip_tags( Blog::get_excerpt( $post_id, 200 ) );

$links = [
    [
        'link'       => 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink( $post_id ),
        'icon_class' => 'facebook'
    ],
    [
        'link'       => 'https://twitter.com/intent/tweet?text=' . get_the_title( $post_id ) . '&url=' . get_permalink( $post_id ),
        'icon_class' => 'twitter'
    ],
    [
        'link'       => 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink( $post_id ) . '&title=' . get_the_title( $post_id ) . '&summary=' . $excerpt . '&source=' . get_bloginfo( 'name' ),
        'icon_class' => 'linkedin'
    ],
    [
        'link'       => 'mailto:?subject=' . get_the_title( $post_id ) . '&body=' . get_permalink( $post_id ) . '%0D%0A%0D%0A' . $excerpt,
        'icon_class' => 'email'
    ]
];

function get_social_link( $link, $icon_class ): string {
    return '<a href="' . $link . '" target="_blank" class="icon-social ' . $icon_class . '"></a>';
}

?>

    <?php get_header(); ?>

    <div class="layout blog-posts">
        <div class="inner">
            <div class="card card-single-post">
                <?php if ( $kicker ) { ?>
                    <div class="small-all-caps card-kicker"><?= $kicker ?></div>
                <?php } ?>

                <?php if ( $post_name ) { ?>
                    <h1 class="header-lg"><?= $post_name; ?></h1>
                <?php } ?>

                <div class="byline-social">
                    <div class="small-all-caps card-kicker"><?= $post_date ?><?= $post_author ?></div>
                    <div class="social-media-icon-wrapper">
                        <?php foreach ( $links as $link ) {
                            echo get_social_link( $link[ 'link' ], $link[ 'icon_class' ] );
                        } ?>
                    </div>
                </div>

                <?php if ( $content ) { ?>
                    <div class="card-content">
                        <div class="card-body"><?= $content ?></div>

                        <?php Blog::maybe_get_author_card( $post_id ); ?>
                    </div>

                    <div class="post-footer">
                        <?= get_field( 'about_monotone', 'option' ); ?>
                    </div>

                    <?= Blog::paginate_single_post(); ?>

                <?php } ?>

            </div>
        </div>
    </div>

    <?php get_footer();
