<?php
/**
 * RK Collection — Luxury SVG Icon Set
 * High-definition, bolder stroke weights and balanced luxury silhouettes
 */

function rk_icon($name, $size = 22, $stroke = 1.85)
{
    $paths = array(
        'search' =>
            '<circle cx="11" cy="11" r="7"/>'
          . '<line x1="21" y1="21" x2="16.2" y2="16.2" stroke-width="' . ($stroke * 1.08) . '"/>',

        'globe' =>
            '<circle cx="12" cy="12" r="9"/>'
          . '<line x1="3" y1="12" x2="21" y2="12"/>'
          . '<path d="M12 3a14.2 14.2 0 0 0 0 18 14.2 14.2 0 0 0 0-18Z"/>',

        'help' =>
            '<circle cx="12" cy="12" r="9"/>'
          . '<path d="M9.2 9a3 3 0 0 1 5.6 1.4c0 1.8-2.8 2.3-2.8 3.6"/>'
          . '<circle cx="12" cy="16.8" r="0.75" fill="currentColor" stroke="none"/>',

        'pin' =>
            '<path d="M12 21.5S5 14.5 5 9.5a7 7 0 1 1 14 0c0 5-7 12-7 12Z"/>'
          . '<circle cx="12" cy="9.5" r="2.6" fill="currentColor" stroke="none"/>',

        'user' =>
            '<circle cx="12" cy="7.2" r="4.2"/>'
          . '<path d="M4.5 20.8c0-3.8 3.4-6.3 7.5-6.3s7.5 2.5 7.5 6.3"/>',

        'heart' =>
            '<path d="M20.8 4.6a5.4 5.4 0 0 0-7.7 0L12 5.7l-1.1-1.1a5.4 5.4 0 0 0-7.7 7.6l1.1 1.1L12 21l7.7-7.7 1.1-1.1a5.4 5.4 0 0 0 0-7.6Z"/>',

        'arrow-right' =>
            '<line x1="4" y1="12" x2="19" y2="12"/>'
          . '<polyline points="12.5 5 19.5 12 12.5 19"/>',

        'arrow-left' =>
            '<line x1="20" y1="12" x2="5" y2="12"/>'
          . '<polyline points="11.5 5 4.5 12 11.5 19"/>',

        'chevron-left' =>
            '<path d="M15 5 8 12l7 7"/>',

        'chevron-right' =>
            '<path d="M9 5l7 7-7 7"/>',

        'curve-left' =>
            '<path d="M9 14 4 9l5-5"/>'
          . '<path d="M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5v0a5.5 5.5 0 0 1-5.5 5.5H11"/>',

        'curve-right' =>
            '<path d="m15 4 5 5-5 5"/>'
          . '<path d="M20 9H9.5A5.5 5.5 0 0 0 4 14.5v0A5.5 5.5 0 0 0 9.5 20H13"/>',

        'bag' =>
            '<path d="M6 3 3.5 7v13a2 2 0 0 0 2 2h13a2 2 0 0 0 2-2V7L18 3Z"/>'
          . '<line x1="3.5" y1="7" x2="20.5" y2="7"/>'
          . '<path d="M16 10.5a4 4 0 0 1-8 0"/>',

        'whatsapp' =>
            '<path fill="#25D366" stroke="none" d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z"/>'
          . '<path fill="#FFFFFF" stroke="none" d="M17.53 14.37C17.23 14.22 15.75 13.49 15.48 13.39C15.2 13.29 15 13.24 14.8 13.54C14.6 13.84 14.03 14.51 13.85 14.71C13.68 14.91 13.5 14.94 13.2 14.79C12.9 14.64 11.94 14.33 10.8 13.31C9.91 12.52 9.31 11.54 9.14 11.24C8.96 10.94 9.12 10.78 9.27 10.63C9.41 10.49 9.58 10.27 9.73 10.1C9.88 9.93 9.93 9.8 10.03 9.6C10.13 9.4 10.08 9.22 10.01 9.07C9.93 8.92 9.33 7.44 9.08 6.84C8.84 6.26 8.59 6.34 8.41 6.33C8.24 6.32 8.04 6.32 7.84 6.32C7.64 6.32 7.32 6.4 7.04 6.7C6.77 7 6 7.72 6 9.18C6 10.64 7.06 12.05 7.21 12.25C7.36 12.45 9.3 15.45 12.27 16.73C12.98 17.04 13.54 17.23 13.97 17.37C14.68 17.6 15.33 17.57 15.84 17.49C16.41 17.4 17.6 16.77 17.85 16.07C18.1 15.37 18.1 14.77 18.02 14.64C17.95 14.51 17.83 14.45 17.53 14.37Z"/>',
    );

    if (!isset($paths[$name])) {
        return '';
    }

    if ($name === 'whatsapp') {
        return '<svg class="rk-icon rk-icon--whatsapp" width="' . $size . '" height="' . $size . '"'
             . ' viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">'
             . $paths[$name]
             . '</svg>';
    }

    return '<svg class="rk-icon" width="' . $size . '" height="' . $size . '"'
         . ' viewBox="0 0 24 24" fill="none" stroke="currentColor"'
         . ' stroke-width="' . $stroke . '" stroke-linecap="round"'
         . ' stroke-linejoin="round" aria-hidden="true" focusable="false">'
         . $paths[$name]
         . '</svg>';
}
