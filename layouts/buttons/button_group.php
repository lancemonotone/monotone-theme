<?php namespace monotone;

$buttons = $card[ 'buttons' ] ?? $buttons ?? false;

if ( $buttons ) {
    $button_layout = $card[ 'button_layout' ] ?? $button_layout ?? ''; ?>

    <div class="card-buttons <?= $button_layout ?>">
        <?php foreach ( $buttons as $button ) {
            $link   = $button[ 'button_link' ][ 'url' ] ?? '#';
            $text   = $button[ 'button_text' ] ?? '';
            $target = ! empty( $button[ 'button_link' ][ 'target' ] ) ? 'target="_blank" rel="noopener noreferrer"' : '';
            $label  = ! empty( $heading ) ? $text . ' - ' . $heading : $text; ?>
            <a href="<?= $link ?>" class="button" <?= $target ?> aria-label="<?= $label ?>"><?= $text ?></a>
        <?php } ?>
    </div>

<?php }
