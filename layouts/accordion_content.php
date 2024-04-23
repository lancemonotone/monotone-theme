<?php namespace monotone;

$section_header = get_sub_field( 'section_header' );
$content        = get_sub_field( 'accordion_content' );

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';

?>

<div id="<?= $id ?>"
     class="<?= $classes ?>"
     style="<?= $styles ?>">

    <div class="inner">

        <div class="accordion">

            <input type="checkbox"
                   id="accordion-toggle-<?= $id ?>"
                   class="accordion-toggle visually-hidden"
                   role="button"
                   aria-expanded="false"/>

            <label for="accordion-toggle-<?= $id ?>"
                   class="accordion-label">

                <h4 class="accordion-header"><?= $section_header ?></h4>

                <span class="drop-icon"></span>

            </label>

            <div class="accordion-content keep-closed" aria-labelledby="<?= $id; ?>">

                <?php foreach ( $content as $item ) {
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

</div>
