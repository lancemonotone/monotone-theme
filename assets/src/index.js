/**
 * Theme Styles
 *
 * See vite.config.js for global scss styles.
 * Includes the following:
 * '../src/scss/utility/_normalize.scss';
 * '../src/scss/utility/_a11y.scss';
 * '../src/scss/utility/_theme.scss';
 * '../src/scss/utility/_print.scss';
 * '../src/scss/utility/_typography.scss';
 *
 * Edit: NOPE! ;) I keep changing my mind on how to do this.
 * I kept running into problems before with mixins not working,
 * but everything seems to be working now and these are all
 * being imported in index.scss.
 */

/**  Local Styles */
import './index.scss'

/** Components */
// Add class to populated inputs
import './components/select-populated-form-fields/select-populated-form-fields.js'

// Smooth scroll
import './components/smooth-scroll/smooth-scroll.js'

// Transform UPPERCASE titles to Title Case
import './components/title-case/title-case.js'

// Theme color toggle
import './components/theme-toggle/theme-toggle.js'

// Primary navigation
import './components/primary-navigation/primary-navigation.js'

// Expando
import './components/expando/expando.js'

// Accordion
import './components/accordion/accordion.js'

// Click to copy
import './components/click-to-copy/click-to-copy.js'

/**  Layouts */
// Intro Content
import './layouts/intro_content/intro_content.js'

// Blog
import './layouts/blog_posts/blog_posts.js'

// Divider
import './layouts/divider/divider.js'

// Spacer
import './layouts/spacer/spacer.js'

// Third Width Card Grid
import './layouts/third_width_card/third_width_card.js'

// Half Width Card Grid
import './layouts/card_grid/card_grid.js'

// Full Width Card Grid
import './layouts/full_width_card/full_width_card.js'

// Full Width Card Split
import './layouts/split_full_card/split_full_card.js'

// Full Width Content (Section Header)
import './layouts/full_width_content/full_width_content.js'

// External Link Card
import './layouts/external_link_card/external_link_card.js'

// Two Column Content
import './layouts/two_column_content/two_column_content.js'

// Accordion Content
import './layouts/accordion_content/accordion_content.js'

// Standard Full Card
import './layouts/standard_full_card/standard_full_card.js'

// Bio Card
import './layouts/bio_card/bio_card.js'

// Content with Image Card
import './layouts/content_w_image_card/content_w_image_card.js'

// Testimonial Card
import './layouts/testimonial_content/testimonial_content.js'

// Single Event Card
import './layouts/event_card/event_card.js'

// Event Cards (Automated)
import './layouts/events_group/events_group.js'

// Image
import './layouts/image/image.js'
