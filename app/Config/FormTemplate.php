<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class FormTemplate extends BaseConfig
{
    public function getAppTemplate()
    {
        return env("APP_TEMPLATE", "default");
    }

    public $default = [
        'name' => 'Proje Başvuru Formu',
        'elements' => [
            [
                'type' => 'text',
                'label' => 'Projenin Adı',
                'name' => 'project_name',
                'placeholder' => 'Projenin Adı',
                'rules' => 'required',
            ],
            [
                'type' => 'text',
                'label' => 'Birim',
                'name' => 'unit',
                'placeholder' => 'Birim',
                'rules' => 'required',
            ],
            [
                'type' => 'text',
                'label' => 'Projenin Uygulanacağı Yer(ler)',
                'name' => 'location',
                'placeholder' => 'Projenin Uygulanacağı Yer(ler)',
                'rules' => 'required',
            ],
            [
                'type' => 'select',
                'label' => 'Projenin Konusu',
                'name' => 'subject',
                'rules' => 'required',
                'options' => [
                    ['value' => 'Egitim', 'label' => 'Eğitim'],
                    ['value' => 'Kultur', 'label' => 'Kültür'],
                    ['value' => 'Sanat', 'label' => 'Sanat'],
                    ['value' => 'Spor', 'label' => 'Spor'],
                    ['value' => 'Saglik', 'label' => 'Sağlık'],
                    ['value' => 'Sosyal Destek', 'label' => 'Sosyal Destek'],
                    ['value' => 'Cevre', 'label' => 'Çevre'],
                    ['value' => 'Hayvan Haklari', 'label' => 'Hayvan Hakları'],
                    ['value' => 'Diger', 'label' => 'Diğer'],
                ]
            ],
            [
                'type' => 'select',
                'label' => 'Projeye Katkı Sağlayabilecek Kurum/Kuruluşlar',
                'name' => 'institutions',
                'rules' => 'required',
                'options' => [
                    ['value' => '', 'label' => 'Kurum/Kuruluş Seçiniz', 'disabled' => true, 'selected' => true],
                    ['value' => 'TUBITAK', 'label' => 'TÜBİTAK'],
                    ['value' => 'KOSGEB', 'label' => 'KOSGEB'],
                    ['value' => 'YOK', 'label' => 'YÖK (Yükseköğretim Kurulu)'],
                    ['value' => 'MEB', 'label' => 'Milli Eğitim Bakanlığı'],
                    ['value' => 'Tarim_Orman', 'label' => 'Tarım ve Orman Bakanlığı'],
                    ['value' => 'Sanayi_Teknoloji', 'label' => 'Sanayi ve Teknoloji Bakanlığı'],
                    ['value' => 'ISKUR', 'label' => 'İŞKUR'],
                    ['value' => 'UNICEF', 'label' => 'UNICEF'],
                    ['value' => 'Turk_Kizilay', 'label' => 'Türk Kızılay'],
                    ['value' => 'Belediyeler', 'label' => 'Belediyeler'],
                    ['value' => 'Universiteler', 'label' => 'Üniversiteler'],
                    ['value' => 'Ozel_Sektor', 'label' => 'Özel Sektör Kuruluşları'],
                    ['value' => 'STK', 'label' => "STK'lar (Sivil Toplum Kuruluşları)"],
                ]
            ],
            [
                'type' => 'select',
                'label' => 'Projenin Hedef Kitlesi',
                'name' => 'target_audience',
                'rules' => 'required',
                'options' => [
                    ['value' => '', 'label' => 'Hedef Kitle Seçiniz', 'disabled' => true, 'selected' => true],
                    ['value' => 'Universite_Ogrencileri', 'label' => 'Üniversite Öğrencileri'],
                    ['value' => 'Ilkokul_Ortaokul_Ogrencileri', 'label' => 'İlkokul / Ortaokul Öğrencileri'],
                    ['value' => 'Akademisyenler', 'label' => 'Akademisyenler'],
                    ['value' => 'Kirsal_Bolgede_Yasayan_Vatandaslar', 'label' => 'Kırsal Bölgede Yaşayan Vatandaşlar'],
                    ['value' => 'Engelli_Bireyler', 'label' => 'Engelli Bireyler'],
                    ['value' => 'Kadin_Girisimciler', 'label' => 'Kadın Girişimciler'],
                    ['value' => 'Genc_Issizler', 'label' => 'Genç İşsizler'],
                    ['value' => 'Kobi', 'label' => 'Küçük ve Orta Ölçekli İşletmeler (KOBİ)'],
                    ['value' => 'Tarim_ve_Hayvancilikla_Ugrasalar', 'label' => 'Tarım ve Hayvancılıkla Uğraşanlar'],
                    ['value' => 'Kamu_Kurumlarinda_Calisanlar', 'label' => 'Kamu Kurumlarında Çalışanlar'],
                    ['value' => 'Yerel_Yonetimler', 'label' => 'Yerel Yönetimler'],
                    ['value' => 'Sivil_Toplum_Kuruluslari', 'label' => 'Sivil Toplum Kuruluşları'],
                ]
            ],
            [
                'type' => 'textarea',
                'label' => 'Amaç',
                'name' => 'amac',
                'rows' => 1,
                'rules' => 'required',
            ],
            [
                'type' => 'textarea',
                'label' => 'Konu',
                'name' => 'konu',
                'rows' => 1,
                'rules' => 'required',
            ],
            [
                'type' => 'textarea',
                'label' => 'Özet',
                'name' => 'ozet',
                'rows' => 1,
                'rules' => 'required',
            ],
            [
                'type' => 'textarea',
                'label' => 'Faaliyetlerin Açıklaması',
                'name' => 'faaliyet_aciklamasi',
                'rows' => 1,
                'rules' => 'required',
            ],
            [
                'type' => 'textarea',
                'label' => 'Beklenen Sonuçlar/Somut Çıktılar',
                'name' => 'beklenen_sonuclar',
                'rows' => 1,
                'rules' => 'required',
            ],
            [
                'type' => 'textarea',
                'label' => 'Projenizi Neden Faaliyete Geçirmeliyiz?',
                'name' => 'neden_faaliyete_gecirilmeli',
                'rows' => 1,
                'rules' => 'required',
            ],
            [
                'type' => 'group',
                'label' => 'Yazarlar',
                'name' => 'yazarlar',
                'repeatable' => true,
                'fields' => [
                    [
                        'type' => 'select',
                        'label' => 'Yazar Unvanı',
                        'name' => 'unvan',
                        'rules' => 'required',
                        'options' => [
                            ['value' => 'Prof. Dr.', 'label' => 'Prof. Dr.'],
                            ['value' => 'Doç. Dr.', 'label' => 'Doç. Dr.'],
                            ['value' => 'Dr. Öğr. Üyesi', 'label' => 'Dr. Öğr. Üyesi'],
                            ['value' => 'Araş. Gör. Dr.', 'label' => 'Araş. Gör. Dr.'],
                            ['value' => 'Araş. Gör.', 'label' => 'Araş. Gör.'],
                            ['value' => 'Öğr. Gör. Dr.', 'label' => 'Öğr. Gör. Dr.'],
                            ['value' => 'Öğr. Gör.', 'label' => 'Öğr. Gör.'],
                            ['value' => 'Diğer', 'label' => 'Diğer'],
                        ]
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Yazar Adı Soyadı',
                        'name' => 'adi_soyadi',
                        'rules' => 'required',
                    ],
                    [
                        'type' => 'email',
                        'label' => 'Yazar Mail Adresi',
                        'name' => 'mail_adresi',
                        'rules' => 'required|valid_email',
                    ],
                ],
                'rules' => 'required',
            ],
            [
                'type' => 'file',
                'label' => 'Dokümantasyon',
                'name' => 'file',
                'rules' => 'required',
                'accept' => '.docx',
            ],
            [
                'type' => 'date',
                'label' => 'Başlangıç Tarihi',
                'name' => 'start_date',
                'rules' => 'required',
            ],
            [
                'type' => 'date',
                'label' => 'Bitiş Tarihi',
                'name' => 'end_date',
                'rules' => 'required',
            ],
        ]
    ];
}
