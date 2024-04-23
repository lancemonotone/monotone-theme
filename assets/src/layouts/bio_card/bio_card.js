import './bio_card.scss'

// Vanilla JS version of FancyBox
// https://github.com/biati-digital/glightbox
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css';

const lightbox = GLightbox({
    touchNavigation: true,
    loop           : false,
    autoplayVideos : false,
});
