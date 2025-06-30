<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Giriş ve Kayıt
$routes->get('/login', 'LoginController::login');
$routes->post('/login', 'LoginController::loginActions');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/register', 'RegisterController::index');
$routes->post('/register/submit', 'RegisterController::submit');


// Giriş Yapmış Tüm Kullanıcılar
$routes->group('', ['filter' => 'loginFilter'], function ($routes) {
    $routes->get('/', 'User\UserController::index'); // varsayılan yönlendirme
    $routes->get('projeekle', 'User\ProjectController::projeekle');
    $routes->post('save', 'User\ProjectController::save');
    $routes->get('duzenle/(:num)', 'User\ProjectController::edit/$1');
    $routes->post('duzenle', 'User\ProjectController::duzenle');

});


// Sadece Admin (role_id == 1) için route'lar
$routes->group('admin', ['filter' => ['loginFilter', 'roleFilter']], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');

    // Projeler
    $routes->get('projeler', 'Admin\ProjectController::projelist');
    $routes->get('projects/detay/(:num)', 'Admin\ProjectController::projectdetay/$1');

    // Kullanıcılar
    $routes->get('kullanicilar', 'Admin\AdminController::kullanicilar');
    $routes->get('kullanici/view/(:num)', 'Admin\AdminController::view/$1'); // JSON döner
    $routes->get('kullanici/edit/(:num)', 'Admin\AdminController::edit/$1');
    $routes->post('kullanici/delete/(:num)', 'Admin\AdminController::delete/$1');
    $routes->post('kullanici/update/(:num)', 'Admin\AdminController::update/$1');

    $routes->group('basvuru', ['filter' => 'loginFilter'], function ($routes) {
        $routes->get('getAppProcessesModal2/(:any)/(:any)', 'Admin\ProjectController::getAppProcessesModal2/$1/$2');
        $routes->POST('handleApplicationProcess/(:any)', 'Admin\ProjectController::handleApplicationProcess/$1');
    });
});


// Giriş yapan tüm kullanıcılar için kendi projeleri
$routes->group('user', ['filter' => 'loginFilter'], function ($routes) {
    $routes->get('projelerim', 'User\UserController::projelerimlist');
    $routes->get('projects/detay/(:num)', 'User\ProjectController::projectdetay/$1');

    $routes->group('basvuru', ['filter' => 'loginFilter'], function ($routes) {
        $routes->get('getAppProcessesModal2/(:any)/(:any)', 'User\ProjectController::getAppProcessesModal2/$1/$2');
        $routes->POST('handleApplicationProcess/(:any)', 'User\ProjectController::handleApplicationProcess/$1');
    });
});

$routes->post('process/action', 'ProcessController::action');


$routes->group('kitap', function ($routes) {
    $routes->get('basvuru', 'User\ApplicationController::kitapbasv');
    $routes->get('detay/(:any)', 'User\ApplicationController::basvkitapdetay/$1');
    $routes->get('list', 'User\ApplicationController::basvkitap');
    $routes->post('kaydet', 'User\ApplicationController::kitapKaydet');
    $routes->get('bolumleri/(:any)', 'User\ApplicationController::kitapBolumleri/$1');
    $routes->get('getAppProcessesModal2/(:any)/(:any)', 'User\ApplicationController::getAppProcessesModal2/$1/$2');
    $routes->POST('handleApplicationProcess/(:any)', 'User\ApplicationController::handleApplicationProcess/$1');
    $routes->POST('checkUser', 'User\ApplicationController::checkUser');
    $routes->get('basvduzenle/(:any)', 'User\ApplicationController::basvduzenle/$1');
    $routes->get('download/(:any)', 'UserController::download/$1');
    $routes->get('downloadFile/(:segment)', 'User\ApplicationController::downloadFile/$1');
});

$routes->post('/admin/islem-uygula', 'Admin\IslemController::islemUygula');
