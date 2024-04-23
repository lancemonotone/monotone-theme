<?php namespace monotone;

function get_youtube_id_from_url( $url ) {
	$video_id = '';
	$patterns = [
		'/youtube\.com\/watch\?v=([^\&\?\/]+)/',
		'/youtube\.com\/embed\/([^\&\?\/]+)/',
		'/youtube\.com\/v\/([^\&\?\/]+)/',
		'/youtu\.be\/([^\&\?\/]+)/',
	];

	foreach ( $patterns as $pattern ) {
		if ( preg_match( $pattern, $url, $matches ) ) {
			$video_id = $matches[1];
			break;
		}
	}

	return $video_id;
}


// Load value.
$video_url = get_sub_field( 'video_url' );

if ( empty( $video_url ) ) {
	return;
}

// Outputs "xJes2vEHiuY"
$video_id = get_youtube_id_from_url( $video_url );

// Construct the video URL using the youtube-nocookie.com domain.
$video_url = 'https://www.youtube-nocookie.com/embed/' . $video_id;

// Add extra parameters to src.
$params = [
	'autoplay' => 1,
	// 'mute'     => 1,
	'controls' => 1,
	'hd'       => 1,
	'autohide' => 1,
	'rel'      => 0,
];

// Get the original src attribute and append the extra parameters to it.
$video_url .= '?' . http_build_query( $params );
?>

<div id="<?php echo $args['id']; ?>"
     class="fancybox-video">

    <div class="video-container">

        <div class="video-thumbnail">
			<?php echo Images::get_image( [
				'id'   => get_sub_field( 'video_thumbnail' ),
				'size' => 'video-thumbnail',
                'width' => 600,
			] ) ?>
        </div>

        <iframe class="video-iframe"
                data-src="<?php echo $video_url; ?>"
                allowfullscreen
                playsinline></iframe>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const thumbnail = document.querySelector('#<?php echo $args['id']?> .video-thumbnail');
        const iframe = document.querySelector('#<?php echo $args['id']?> .video-iframe');

        thumbnail.addEventListener('click', () => {
          thumbnail.style.display = 'none';
          iframe.style.display = 'block';
          iframe.src = iframe.dataset.src;
        });
      });
    </script>
</div>
