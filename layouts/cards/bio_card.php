<?php namespace monotone;

/**
 * This card extends the split-full-card layout by using
 * the .split-full-card.image-left class to reverse the
 * order of the image and content.
 */

$kicker        = $card[ 'kicker' ] ?? '';
$heading       = $card[ 'heading' ] ?? '';
$content       = $card[ 'content' ] ?? '';
$button_text   = $card[ 'button_text' ] ?? '';
$card_image    = $card[ 'card_image_part' ] ?? '';
$heading_class = $content ? '' : 'only-heading';
$button_label  = $heading ? $button_text . ' - ' . $heading : '';

$card_classes = implode( ' ', (array)$card_classes );
$card_classes .= empty( $card_image ) ? ' no-image' : '';
?>

<div class="card split-full-card image-left <?= $card_classes ?>">

    <div class="content-part <?= $card_classes ?>">

        <?php if ( $kicker ) { ?>
            <div class="card-kicker small-all-caps"><?= $kicker ?></div>
        <?php } ?>

        <?php if ( $heading ) { ?>
            <h3 class="card-heading <?= $heading_class ?>"><?= $heading ?></h3>
        <?php } ?>

        <?php if ( $content ) { ?>

            <div class="card-body visually-hidden"><?= $content ?></div>

            <div class="bio-button">
                <a href="#<?= $card_id ?>-template"
                   aria-label="<?= $button_label ?>"
                   data-glightbox='{"type": "inline"}'
                   data-gallery="group-<?= $id ?>"
                   aria-role="button"
                   class="glightbox">
                    <?= $button_text; ?>
                </a>
            </div>

        <?php } ?>

    </div>

    <?php if ( $card_image ) { ?>
        <div class="image-part">
            <?= Images::get_background_image( $card_image, 500 ) ?>
        </div>
    <?php } ?>

</div>

<?php if ( $content ) { ?>
    <div id="<?= $card_id ?>-template" class="split-full-card <?= $card_classes ?>" style="display:none;">

        <div class="card split-full-card image-left <?= $card_classes ?>">

            <div class="content-part <?= $card_classes ?>">

                <?php if ( $kicker ) { ?>
                    <div class="card-kicker small-all-caps"><?= $kicker ?></div>
                <?php } ?>

                <?php if ( $heading ) { ?>
                    <h3 class="card-heading <?= $heading_class ?>"><?= $heading ?></h3>
                <?php } ?>

                <?php if ( $content ) { ?>
                    <div class="card-body"><?= $content ?></div>
                <?php } ?>

            </div>

            <?php if ( $card_image ) { ?>
                <div class="image-part">
                    <?= Images::get_background_image( $card_image, 500 ) ?>
                </div>
            <?php } ?>

        </div>

    </div>

<?php } ?>
