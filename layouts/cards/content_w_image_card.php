<?php namespace monotone;

/**
 * This card extends the split-full-card layout by using
 * the .split-full-card.image-left class to reverse the
 * order of the image and content.
 */

$kicker               = $card[ 'kicker' ] ?? '';
$heading              = $card[ 'heading' ] ?? '';
$content              = $card[ 'content' ] ?? '';
$card_image           = $card[ 'card_image_part' ] ?? '';
$image_size           = $card[ 'image_size' ] ?? '';
$show_image_on_mobile = $card[ 'show_image_on_mobile' ] ?? '';
$image_alignment      = $card[ 'image_alignment' ] ?? 'align-center';
$heading_class        = $content ? '' : 'only-heading';

$is_expando        = $card[ 'is_expando' ] ?? '';
$expand_text       = $card[ 'expando_expand_text' ] ?? '';
$collapse_text     = $card[ 'expando_collapse_text' ] ?? '';
$expando_limit     = $card[ 'expando_limit' ] ?? '';
$card_body_classes = $is_expando ? ' expando' : '';
$card_link         = $card[ 'card_link' ] ?? false;

$card_classes [] = $image_size ? 'image-' . $image_size : '';
$card_classes [] = $image_alignment ?? '';
$card_classes [] = $card_image ? '' : 'no-image';
$card_classes [] = ! empty( $card[ 'image_left' ] ) ? 'image-left' : '';
$card_classes [] = $show_image_on_mobile ? 'show-image-on-mobile' : '';
$card_classes    = implode( ' ', (array)$card_classes );
?>

<?php if ( $card_link ) { ?>
<a href="<?= $card_link['url'] ?>" class="card split-full-card <?= $card_classes ?>" target="<?= $card_link['target'] ?>">
    <?php } else { ?>
    <div class="card split-full-card <?= $card_classes ?>">
        <?php } ?>

        <div class="content-part <?= $card_classes ?>">

            <?php if ( $kicker ) { ?>
                <div class="card-kicker"><?= $kicker ?></div>
            <?php } ?>

            <?php if ( $heading ) { ?>
                <h3 class="card-heading <?= $heading_class ?>"><?= $heading ?></h3>
            <?php } ?>

            <?php if ( $content ) { ?>
                <div class="card-content">

                    <div class="card-body<?= $card_body_classes ?>"
                         data-expandolimit="<?= $expando_limit ?>"
                         data-expandtext="<?= $expand_text ?>"
                         data-collapsetext="<?= $collapse_text ?>">
                        <?= $content ?>
                    </div>

                    <?php include( locate_template( 'layouts/buttons/button_group.php' ) ); ?>

                </div>
            <?php } ?>

        </div>

        <?php if ( $card_image ) { ?>
            <div class="image-part">
                <?= Images::get_background_image( $card_image, 500 ) ?>
            </div>
        <?php } ?>

        <?php if ( $card_link ) { ?>
</a>
<?php } else { ?>
    </div>
<?php } ?>
