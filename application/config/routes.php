<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['data_beasiswa/beasiswa/(:num)/mahasiswa/(:num)'] = 'data_beasiswa/beasiswa/detailMahasiswaPenerimaBeasiswa/$1/$2';
$route['data_beasiswa/beasiswa/check-tambah/(:num)'] = 'data_beasiswa/beasiswa/check_tambah/$1';
$route['bsw/(:num)/mahasiswa/(:num)'] = 'bsw/detail_mahasiswa_penerima/$1/$2';

// routes untuk mendaftar beasiswa
$route['daftar-beasiswa'] = 'daftar_beasiswa';
$route['daftar-beasiswa/daftar'] = 'daftar_beasiswa/daftar';
$route['daftar-beasiswa/daftar/(:any)'] = 'daftar_beasiswa/daftar/$1';


// routes untuk edit profile
$route['akun/edit-profile'] = 'akun/edit_profile';
$route['akun/ubah-password'] = 'akun/ubah_password';

// pemisah menu
$route['konfigurasi/pemisah-menu'] = 'konfigurasi/pemisah_menu';
$route['konfigurasi/pemisah-menu/hapus'] = 'konfigurasi/pemisah_menu/hapus';
$route['konfigurasi/pemisah-menu/edit'] = 'konfigurasi/pemisah_menu/edit';
$route['konfigurasi/pemisah-menu/index'] = 'konfigurasi/pemisah_menu/index';
$route['konfigurasi/pemisah-menu/index/(:num)'] = 'konfigurasi/pemisah_menu/index/$1';



$route['mbeasiswa/master_beasiswa/del/(:num)'] = 'mbeasiswa/master_beasiswa/del/$1';

// routes untuk penetapan
$route['penetapan-mahasiswa'] = 'penetapan_mahasiswa';
$route['penetapan-mahasiswa/(:any)/(:any)/tetapkan'] = 'penetapan_mahasiswa/tetapkan/$1/$2';
$route['penetapan-mahasiswa/(:any)/(:any)/batalkan'] = 'penetapan_mahasiswa/batalkan/$1/$2';
$route['penetapan-mahasiswa/get_ajax/(:any)'] = 'penetapan_mahasiswa/get_ajax/$1';
$route['penetapan-mahasiswa/detail/(:any)'] = 'penetapan_mahasiswa/detail/$1';
$route['penetapan-mahasiswa/detail-mahasiswa/(:any)/(:num)'] = 'penetapan_mahasiswa/detail_mahasiswa/$1/$2';

$route['historis-pendaftaran'] = 'historis_pendaftaran';

$route['validasi/detail-mahasiswa/(:num)/(:num)'] = 'validasi/detail_mahasiswa/$1/$2';
$route['validasi/(:any)/(:any)/calonkan'] = 'validasi/calonkan/$1/$2';
$route['validasi/(:any)/(:any)/batalkan'] = 'validasi/batalkan/$1/$2';

$route['valfakultas/detail-mahasiswa/(:num)/(:num)'] = 'valfakultas/detail_mahasiswa/$1/$2';
$route['valfakultas/(:any)/(:any)/calonkan'] = 'valfakultas/calonkan/$1/$2';
$route['valfakultas/(:any)/(:any)/batalkan'] = 'valfakultas/batalkan/$1/$2';
$route['valfakultas/(:any)/(:any)/(:any)/tolak'] = 'valfakultas/tolak/$1/$2/$3';
$route['valfakultas/(:any)/(:any)/(:any)/batalkanPenolakan'] = 'valfakultas/batalkanPenolakan/$1/$2/$3';

$route['mpersyaratan/setup-persyaratan'] = 'mpersyaratan/setup_persyaratan';
$route['mpersyaratan/setup-persyaratan/index/(:num)'] = 'mpersyaratan/setup_persyaratan';
$route['mpersyaratan/setup-persyaratan/index'] = 'mpersyaratan/setup_persyaratan';
$route['mpersyaratan/setup-persyaratan/tambahpersyaratan'] = 'mpersyaratan/setup_persyaratan/tambahpersyaratan';
$route['mpersyaratan/setup-persyaratan/tambahpersyaratanWajib'] = 'mpersyaratan/setup_persyaratan/tambahpersyaratanWajib';
$route['mpersyaratan/setup-persyaratan/edit/(:num)'] = 'mpersyaratan/setup_persyaratan/edit/$1';

$route['panduan-pendaftaran'] = 'panduan_pendaftaran';

$route['status-pendaftaran'] = 'status_pendaftaran';
$route['status-pendaftaran/index'] = 'status_pendaftaran/index';

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;