<?php

return [
    'show_warnings' => false, // Throw an Exception on warnings from dompdf
    'orientation' => 'portrait',
    'default_font' => 'sans-serif',
    'dpi' => 96,
    'font_height_ratio' => 1.1,
    'isHtml5ParserEnabled' => true,
    'isPhpEnabled' => false,
    'isRemoteEnabled' => true,
    'chroot' => realpath(base_path()),
];
