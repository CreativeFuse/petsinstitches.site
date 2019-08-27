/**
 * The main script file for our application.
 * This script will be loaded globally.
 */
import '../scss/app.scss';

/**
 * Handle SVG Icons
 */
import './app/icons';


/**
 * Import Project Libraries
 */

 // Allows direct reference to svg `#` identifier in our codebase without breaking things
import './app/libs/svg-poyfill';

// Slider Library
import './app/libs/unslider';

 // Tab builder + tab animation library. (modified from original codebase)
 import './app/libs/tabtab';

/**
 * Import Project Patterns
 */

 // Accordions
 import './app/components/accordion--simple';
 import './app/components/accordion--fancy';

  // c-box
  import './app/components/c-box';

 // Flip  Card
 import './app/components/flip-card';

 // Menus
 import './app/components/mega-menu';
 import './app/components/mobile-menu';

 // Action Bars
 import './app/components/sticky-action-bar';
 import './app/components/sticky-action-panel';

// Tabs
 import './app/components/tabs';

// Slider
 import './app/components/slider';
