<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filterauth'    => \App\Filters\FilterAuth::class,
        'throttle'      => \App\Filters\Throttle::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'filterauth' => [
				'except'=> [
					'home', 'home/*',
					'auth', 'auth/*',
					'kategori', 'kategori/*',
					'keranjang', 'keranjang/*',
					'/'
				]
            ],
            'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'filterauth' => [
				'except'=> [
					'admin', 'admin/*',
					'customer', 'customer/*',
					'home', 'home/*',
					'kategori', 'kategori/*',
                    'keranjang', 'keranjang/*',
					'checkout', 'checkout/*',
					'nota', 'nota/*',
					'pembayaran', 'pembayaran/*',
					'lihatpembayaran', 'lihatpembayaran/*',
					'riwayat', 'riwayat/*',
                    '/',				
				]
			],
            'toolbar',
            'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [
        // 'get'  => ['csrf'],
        // 'post' => ['throttle', 'csrf'],
    ];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
