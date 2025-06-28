<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Processes extends BaseConfig
{
    public function getApplicationProcesses()
    {
        return env("APP_PROCESSES_TEMPLATE", "default");
    }

    public function getProcesses()
    {
        if ($this->getApplicationProcesses() == 'default') {
            return $this->default;
        } else {
            return [];
        }
    }


    public function firstProcesses()
    {
        $processes = $this->getProcesses();

        foreach ($processes as $key => $item) {
            if (isset($item['first']) && $item['first'] == true) {
                return $item;
            }
        }

        return [];
    }



    public function nextProcesses($processes_code, $action_code)
    {
        $processes = $this->getProcesses();
        if (isset($processes[$processes_code])) {
            $result = [];
            foreach ($processes[$processes_code]['action'] ?? [] as $item) {
                if ($item['action_code'] == $action_code) {
                    $nextProcessCode = $item['next'];

                    if (isset($processes[$nextProcessCode])) {
                        $result = $processes[$nextProcessCode];
                    } else {
                        return null;
                    }
                }
            }
            if (count($result) > 0) {
                return $result;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }




    #--------------------------------------------------------------------
    # Default Processes
    #--------------------------------------------------------------------


    public $default = [
        'on_inceleme' => [
            'name' => 'Ön İnceleme',
            'icon' => 'fa fa-user-plus',
            'color' => 'primary',
            'visible_role' => [1],
            'action_role' => [1],
            'first' => true,
            'action' => [
                ['name' => 'Düzeltme', 'icon' => 'fa fa-eye', 'color' => 'outline-primary', 'action_code' => 'duzeltme', 'next' => 'duzeltmeok', 'process_code' => 'on_inceleme'],
                ['name' => 'Red', 'icon' => 'fa fa-times', 'color' => 'outline-danger', 'action_code' => 'red', 'next' => 'end', 'process_code' => 'on_inceleme'],
                ['name' => 'Onay', 'icon' => 'fa fa-check', 'color' => 'outline-success', 'action_code' => 'onay', 'next' => 'basvurudosyasi', 'process_code' => 'on_inceleme'],
            ],
        ],
        'duzeltmeok' => [
            'name' => 'Düzeltme',
            'icon' => 'fa fa-user-edit',
            'color' => 'warning',
            'visible_role' => [1],
            'action_role' => [1],
            'action' => [
                ['name' => 'Başvuruyu Düzenle', 'icon' => 'fa fa-check', 'color' => 'outline-success', 'action_code' => 'duzeltmeok', 'next' => 'on_inceleme', 'process_code' => 'duzeltmeok'],
            ],
        ],
        'basvurudosyasi' => [
            'name' => 'Kitap Dosyası',
            'icon' => 'fa fa-user-edit',
            'color' => 'warning',
            'visible_role' => [1],
            'action_role' => [1],
            'action' => [
                ['name' => 'Kitabı Yükle', 'icon' => 'fa fa-check', 'color' => 'outline-primary', 'action_code' => 'basvurudosyasi', 'next' => 'guncelle', 'process_code' => 'basvurudosyasi'],
            ],
        ],

        'guncelle' => [
            'name' => 'Güncelle',
            'icon' => 'fa fa-user-edit',
            'color' => 'warning',
            'visible_role' => [1],
            'action_role' => [1],
            'action' => [
                ['name' => 'Başvuruyu Güncelle', 'icon' => 'fa fa-check', 'color' => 'outline-success', 'action_code' => 'guncelle', 'next' => 'on_inceleme', 'process_code' => 'guncelle'],
            ],
        ],

    ];
}
