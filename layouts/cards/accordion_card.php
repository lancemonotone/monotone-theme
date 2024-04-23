<?php namespace monotone;

$accordion_label   = $card[ 'accordion_label' ] ?? '';
$accordion_content = $card[ 'accordion_content' ] ?? '';
$accordion_id = $card[ 'accordion_id' ] ?? '';
?>
<div id=<?=$accordion_id?> class="accordion-content">
    <div class="accordion">

        <input type="checkbox"
               id="accordion-toggle-<?= $card_id ?>"
               class="accordion-toggle visually-hidden"
               role="button"
               aria-expanded="false"/>

        <label for="accordion-toggle-<?= $card_id ?>"
               class="accordion-label">

            <h4 class="accordion-header"><?= $accordion_label ?></h4>

            <span class="drop-icon"></span>

        </label>

        <div class="accordion-content keep-closed" aria-labelledby="<?= $card_id; ?>">

            <?php foreach ( $accordion_content as $item ) {
                $classes = ! empty( $item[ 'right_content' ] ) ? ' two-column-content' : ''; ?>

                <div class="<?= $classes ?>">
                    <div class="row">
                        <div class="col">

                            <?= $item[ 'left_content' ] ?>

                        </div>

                        <?php if ( ! empty( $item[ 'right_content' ] ) ) { ?>
                            <div class="col">

                                <?= $item[ 'right_content' ] ?>

                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php } ?>

        </div>

    </div>
</div>
