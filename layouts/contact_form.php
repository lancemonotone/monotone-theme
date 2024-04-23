<?php namespace monotone;

$form_id      = get_sub_field( 'select_form' );
$form_heading = get_sub_field( 'primary_form_heading' );
$form_str     = '';

if ( have_rows( 'options', 'option' ) ) {
	while ( have_rows( 'options', 'option' ) ) {
		the_row();

		// Check if the current layout is the 'contact_forms' layout
		if ( get_row_layout() == 'contact_forms' ) {

			$portal_id   = get_sub_field( 'portal_id' );
			$script_tags = get_sub_field( 'embed_script_tag' );

			$form_str = str_replace( [ '{{portalId}}', '{{formId}}' ], [ $portal_id, $form_id ], $script_tags );
		}
	}
} ?>


<div class="rw-form-box form-contact_form">
	<?php if ( $form_heading ) { ?>
        <p class="form-heading header-sm text-center"><?php echo $form_heading; ?></p>
	<?php } ?>
    <div class="form-wrap">
		<?php echo $form_str ?>
    </div>
</div>
