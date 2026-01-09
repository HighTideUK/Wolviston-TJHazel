<?php

use App\Block;

function getContentArea($slug)
{
    $block = Block::whereSlug($slug)->first();
    if ($block) {
        return displayWysiwyg($block->content);
    }
    return '';
}

function bodyClass()
{

    $segments = parse_url(url()->current());
    if (!empty($segments['path'])) {
        $path = str_replace('/', '-', $segments['path']);
    } else {
        $path = '-home';
    }

    return 'page'.$path;
}

function displayWysiwyg($string)
{
    // remove style attributes
    $string = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $string);
    $string = strip_tags($string, '<p><a><img><b><i><em><h1><h2><h3><h4><h5><h6><ul><li><ol><blockquote><code>');
    return stripslashes($string);
}

if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        return '&pound;'.number_format($price);
    }
}

if (!function_exists('image_placeholder')) {
    function image_placeholder() {
        return '/images/image-placeholder2.png';
    }
}

function getAdminSectionIcon($key) {
    $icons = [
        'home' => 'fa-home',
        'vacancies' => 'fa-building',
        'people' => 'fa-users',
        'users' => 'fa-user',
        'industries' => 'fa-industry',
        'locations' => 'fa-map-marker-alt',
        'resources' => 'fa-arrow-to-bottom',
        'news' => 'fa-newspaper',
        'registrations' => 'fa-user-friends',
        'expertise' => 'fa-trophy',
        'casestudies' => 'fa-file-alt',
        'pages' => 'fa-file',
        'blocks' => 'fa-puzzle-piece'
    ];
    if (isset($icons[$key])) {
        return $icons[$key];
    } else {
        return '';
    }
}

function getAdminNav() {
    return [
        /*
        [
            'route' => route('admin.home'), 
            'label' => 'Dashboard', 
            'key' => 'home',
            'items' => []
        ],
        */
        [
            'route' => route('admin.people'), 
            'label' => 'People', 
            'key' => 'people', 
            'items' => [
                [
                    'route' => route('admin.people'), 
                    'label' => 'All People', 
                    'key' => 'list'
                ],
                [
                    'route' => route('admin.person.new'), 
                    'label' => 'Add Person', 
                    'key' => 'add'
                ],
                [
                    'route' => route('admin.people_categories'), 
                    'label' => 'All People Categories', 
                    'key' => 'list_categories'
                ],
                [
                    'route' => route('admin.people_categories.new'), 
                    'label' => 'Add People Category', 
                    'key' => 'add_category'
                ]
            ]
        ],
        [
            'route' => route('admin.industries'), 
            'label' => 'Industries', 
            'key' => 'industries', 
            'items' => [
                [
                    'route' => route('admin.industries'), 
                    'label' => 'All Industries', 
                    'key' => 'list'
                ],
                [
                    'route' => route('admin.industry.new'), 
                    'label' => 'Add Industry', 
                    'key' => 'add'
                ],
            ]
        ],
        [
            'route' => route('admin.resources'), 
            'label' => 'Downloads', 
            'key' => 'resources', 
            'items' => [
                [
                    'route' => route('admin.resources'), 
                    'label' => 'All Downloads', 
                    'key' => 'list'
                ],
                [
                    'route' => route('admin.resource.new'), 
                    'label' => 'Add Download', 
                    'key' => 'add'
                ],
            ],
        ],
        [
            'route' => route('admin.expertise'), 
            'label' => 'Services', 
            'key' => 'expertise', 
            'items' => [
                [
                    'route' => route('admin.expertise'), 
                    'label' => 'All Services', 
                    'key' => 'list'
                ],
                [
                    'route' => route('admin.expertise.new'), 
                    'label' => 'Add Service', 
                    'key' => 'add'
                ],
            ]
        ],
        [
            'route' => route('admin.casestudies'), 
            'label' => 'Casestudies', 
            'key' => 'casestudies', 
            'items' => [
                [
                    'route' => route('admin.casestudies'), 
                    'label' => 'All Casestudies', 
                    'key' => 'list'
                ],
                [
                    'route' => route('admin.casestudies.new'), 
                    'label' => 'Add Casestudy', 
                    'key' => 'add'
                ],
            ]
        ],
        [
            'route' => route('admin.news'), 
            'label' => 'News', 
            'key' => 'news', 
            'items' => [
                [
                    'route' => route('admin.news'), 
                    'label' => 'All News Articles', 
                    'key' => 'list'
                ],
                [
                    'route' => route('admin.news.new'), 
                    'label' => 'Add News Article', 
                    'key' => 'add'
                ],
                [
                    'route' => route('admin.news_categories'), 
                    'label' => 'All News Categories', 
                    'key' => 'list_categories'
                ],
                [
                    'route' => route('admin.news_category.new'), 
                    'label' => 'Add News Category', 
                    'key' => 'add_category'
                ],
            ],
        ],
        [
            'route' => route('admin.pages'), 
            'label' => 'Pages', 
            'key' => 'pages', 
            'items' => []
        ],
        [
            'route' => route('admin.blocks'), 
            'label' => 'Blocks', 
            'key' => 'blocks', 
            'items' => []
        ],
        [
            'route' => route('admin.users'), 
            'label' => 'Admin Users', 
            'key' => 'users', 
            'items' => []
        ],
    ];
}

if (!function_exists('nl2p')) {

    function nl2p($string, $line_breaks = true, $xml = true) {

        $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);

        // It is conceivable that people might still want single line-breaks
        // without breaking into a new paragraph.
        if ($line_breaks == true) {
            return '<p>'.preg_replace(array("/([\n]{2,})/i", "/([^>])\n([^<])/i"), array("</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'), trim($string)).'</p>';
        } else {
            return '<p>'.preg_replace(
                array("/([\n]{2,})/i", "/([\r\n]{3,})/i","/([^>])\n([^<])/i"),
                array("</p>\n<p>", "</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'),
                trim($string)).'</p>';
        }
    }
}


if (!function_exists('format_date_picker')) {
    function format_date_for_picker($date, $format = 'd-m-Y') {
        $d = new \DateTime($date);
        return $d->format($format);
    }
}


?>