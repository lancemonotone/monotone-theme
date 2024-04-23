<?php namespace monotone;

$heading      = $card[ 'heading' ] ?? '';
$content      = $card[ 'content' ] ?? '';
$link_url     = $card[ 'card_link' ][ 'url' ] ?? '';
$link_target  = ! empty( $card[ 'card_link' ][ 'target' ] ) ? 'target="_blank" rel="noopener noreferrer"' : '';
$link_aria    = $link_aria ?? ! empty( $card[ 'heading' ] ) ? __( 'Click to' ) . ' ' . $card[ 'heading' ] : '';
$heading_size = $card[ 'heading_size' ] ?? 'header-sm';

$card_classes = implode( ' ', $card_classes );
?>

<?php if ( $link_url ) { ?>
<a href="<?= $link_url ?>" class="card <?= $card_classes; ?>" <?= $link_target; ?> aria-label="<?= $link_aria; ?>">
    <?php } else { ?>
    <div class="card <?= $card_classes; ?>">
        <?php } ?>

        <div class="card-content-container">
            <?php if ( $heading ) { ?>
                <h3 class="card-heading <?= $heading_size; ?>">
                    <?= $heading ?>
                </h3>
            <?php } ?>

            <?php if ( $content ) { ?>
                <div class="card-content">
                    <div class="card-body"><?= $content ?></div>
                </div>
            <?php } ?>
        </div>

        <div class="card-link-icon">
            <svg width="54" height="52" viewBox="0 0 54 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.0612793" y="0.5" width="53" height="51" rx="25.5" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M33.0613 19.5L33.0613 29.25L30.8946 29.25L30.8946 23.1987L21.9106 32.1827C21.4876 32.6058 20.8016 32.6058 20.3786 32.1827C19.9555 31.7596 19.9555 31.0737 20.3786 30.6506L29.3625 21.6667L23.3113 21.6667L23.3113 19.5L33.0613 19.5Z"
                      fill="#00A3DA"/>
            </svg>
        </div>
        <?php if ( $link_url ) { ?>
</a>
<?php } else { ?>
    </div>
<?php } ?>
