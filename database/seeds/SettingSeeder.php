<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
            'id_setting' => '1',
            'no_akun' => '211',
            'nm_transaksi' => 'Retur',
        ]);
        $setting = Setting::create([
            'id_setting' => '2',
            'no_akun' => '500',
            'nm_transaksi' => 'Pembelian',
        ]);
        $setting = Setting::create([
            'id_setting' => '3',
            'no_akun' => '101',
            'nm_transaksi' => 'Kas',
        ]);
    }
}
