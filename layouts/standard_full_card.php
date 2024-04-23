<?php namespace monotone;

$kicker        = get_sub_field( 'kicker' ) ?? '';
$heading       = get_sub_field( 'heading' ) ?? '';
$content       = get_sub_field( 'content' ) ?? '';
$buttons       = get_sub_field( 'buttons' ) ?? '';
$button_layout = get_sub_field( 'button_layout' );
$is_h1         = get_sub_field( 'h1_heading' );
$is_small      = get_sub_field( 'smaller_heading' );

$heading_class = $content ? '' : 'only-heading';

$id      = $args[ 'id' ] ?? '';
$classes = $args[ 'classes' ] ?? '';
$styles  = $args[ 'styles' ] ?? '';

if( $is_small ) {
    $classes .= ' smaller-heading';
}
?>

<div id="<?= $id ?>"
     class=""
     style="<?= $styles ?>">

    <div class="inner">

        <div class="card <?= $classes ?>">

            <?php if ( $kicker ) { ?>
                <div class="small-all-caps card-kicker"><?= $kicker ?></div>
            <?php } ?>

            <?php if ( $heading ) { ?>

                <?php if ( $is_small ) { ?>
                    <div class="smaller-force">
                <?php } ?>

                    <?php if ( $is_h1 ) { ?>
                        <h1 class="header-md <?= $heading_class ?>">
                    <?php } else { ?>
                        <h3 class="header-md <?= $heading_class ?>">
                    <?php } ?>

                    <?= $heading ?>

                    <?php if ( ! $is_h1 ) { ?>
                        </h3>
                    <?php } else { ?>
                        </h1>
                    <?php } ?>

                <?php if ( $is_small ) { ?>
                    </div>
                <?php } ?>

            <?php } ?>

            <?php if ( $content ) { ?>
                <div class="card-content">

                    <div class="card-body"><?= $content ?></div>

                    <?php include( locate_template( 'layouts/buttons/button_group.php' ) ) ?>

                </div>
            <?php } ?>

        </div>

    </div>

</div>
