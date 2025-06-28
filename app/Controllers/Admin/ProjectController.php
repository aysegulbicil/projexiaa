<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\user\ProjectModel;
use Config\Processes;
use App\Helpers\EncryptHelper;
use App\Models\ProjectsProcessesModel;
use App\Models\ProjectProcessesValueModel;

class ProjectController extends BaseController
{

    public function projelist()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->findAll(); // Tüm projeleri çek

        return view('admin/projeler', $data);  // $data değişkenini view'e yolla
    }

    public function projectdetay($project_id)
    {
        $projectModel       = new ProjectModel();
        $formDataModel      = new \App\Models\FormDataModel();
        $templateFieldModel = new \App\Models\FormDataModel();
        $processModel       = new \App\Models\ProjectsProcessesModel();
        $authModel          = new \App\Models\RoleModel();
        $config             = new \Config\Processes();

        // Proje verisi
        $project = $projectModel->find($project_id);
        if (!$project) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Proje bulunamadı.');
        }

        // Aktif şablon kontrolü
        $activeTemplateCode = env('APP_TEMPLATE', 'default');
        if ($project['template_code'] !== $activeTemplateCode) {
            echo "Proje yanlış şablona bağlı. Beklenen: {$activeTemplateCode}";
            return;
        }

        // Form verisi ve şablon kontrolü
        $formData       = $formDataModel->where('project_id', $project_id)->findAll();
        $templateFields = $templateFieldModel->where('template_code', $project['template_code'])->findAll();

        $expectedFields  = array_column($templateFields, 'field_key');
        $submittedFields = array_column($formData, 'field_key');

        $missing = array_diff($expectedFields, $submittedFields);
        $extra   = array_diff($submittedFields, $expectedFields);

        if (!empty($missing) || !empty($extra)) {
            echo "Form verileri şablonla uyumsuz.<br>";
            if (!empty($missing)) {
                echo "Eksik alanlar: " . implode(', ', $missing) . "<br>";
            }
            if (!empty($extra)) {
                echo "Fazla alanlar: " . implode(', ', $extra) . "<br>";
            }
            return;
        }

        // Süreç ve Aksiyonlar
        $userId        = session()->get('user_id');
        $role          = $authModel->getRoleIdByUserId($userId);
        $latestProcess = $processModel->where('project_id', $project_id)->orderBy('id', 'DESC')->first();

        $actionDetails = [];

        if ($latestProcess) {
            $processActions = $config->nextProcesses($latestProcess['proccesses_code'], $latestProcess['action_code']);

            if ($processActions) {
                foreach ($processActions['action'] as $action) {
                    $actionDetails[] = [
                        'name'         => $action['name'] ?? '',
                        'action_code'  => $action['action_code'] ?? '',
                        'icon'         => $action['icon'] ?? '',
                        'color'        => $action['color'] ?? '',
                        'next'         => $action['next'] ?? '',
                        'process_code' => $action['process_code'] ?? '',
                    ];
                }
            }
        } else {
            $processActions = $config->firstProcesses();

            if ($processActions) {
                foreach ($processActions['action'] as $action) {
                    $actionDetails[] = [
                        'name'         => $action['name'] ?? '',
                        'action_code'  => $action['action_code'] ?? '',
                        'icon'         => $action['icon'] ?? '',
                        'color'        => $action['color'] ?? '',
                        'next'         => $action['next'] ?? '',
                        'process_code' => $action['process_code'] ?? '',
                    ];
                }
            }
        }

        // Ekip ve dosya bilgileri
        $members = $projectModel->getMembersByProjectId($project_id);
        $files   = $projectModel->getFilesByProjectId($project_id);

        return view('admin/projectDetail', [
            'project'       => $project,
            'members'       => $members,
            'files'         => $files,
            'formData'      => $formData,
            'actionDetails' => $actionDetails,
            'latestProcess' => $latestProcess,
            'project_id'        => $project_id, // <- Bunu ekle
        ]);
    }


    public function handleApplicationProcess($project_id)
    {
        //$project_id = EncryptHelper::decrypt($project_id);


        if (!$project_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Geçersiz başvuru ID'
            ]);
        }

        $processCode = $this->request->getPost('process_code');
        $actionCode = $this->request->getPost('action_code');

        $bookModel = new ProjectModel();
        $user = $bookModel->where('project_id', $project_id)->first();

        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Başvuru bulunamadı.'
            ]);
        }

        $booksProcessModel = new ProjectsProcessesModel();
        $data = [
            'project_id' => $project_id,
            'proccesses_code' => $processCode,
            'action_code' => $actionCode,
            'user_id' => $user['user_id'],
            'admin_id' => session()->get('user_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (in_array($actionCode, ['onay', 'red'])) {
            if ($booksProcessModel->customInsert($data)) {
                $correctionNote = $this->request->getPost('correction_note');

                // Dosya işlemi
                $uploadDir = WRITEPATH . 'uploads/books/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $filePaths = [];
                $files = $this->request->getFiles()['dosya'] ?? [];

                if (!empty($files)) {
                    if (is_array($files)) {
                        foreach ($files as $file) {
                            if ($file->isValid() && !$file->hasMoved() && $file->getExtension() === 'docx') {
                                $fileName = uniqid('books_', true) . '.' . $file->getExtension();
                                $file->move($uploadDir, $fileName);
                                $filePaths[] = $fileName;
                            }
                        }
                    } else {
                        if ($files->isValid() && !$files->hasMoved() && $files->getExtension() === 'docx') {
                            $fileName = uniqid('books_', true) . '.' . $files->getExtension();
                            $files->move($uploadDir, $fileName);
                            $filePaths[] = $fileName;
                        }
                    }
                }

                if (empty($filePaths)) {
                    $filePaths[] = null;
                }

                // Dosya + açıklama kayıt işlemi
                foreach ($filePaths as $filePath) {
                    $booksProcessesValueModel = new ProjectProcessesValueModel();

                    $processData = [
                        'project_processes_id' => $booksProcessModel->getInsertID(),
                        'project_id' => $project_id,
                        'processes_value' => $correctionNote ?: null,
                        'user_id' => $user['user_id'],
                        'admin_id' => session()->get('user_id'),
                        'file_path' => $filePath,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];

                    if (!$booksProcessesValueModel->customInsert($processData)) {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => 'Dosya/açıklama kaydı başarısız oldu.'
                        ]);
                    }
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Başvuru başarıyla işlem gördü.'
                ]);
            }

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Başvuru işlenirken bir hata oluştu.'
            ]);
        }

        if ($actionCode === 'duzeltme') {
            if ($booksProcessModel->customInsert($data)) {
                $correctionNote = $this->request->getPost('correction_note');

                // Dosya işlemi
                $uploadDir = WRITEPATH . 'uploads/books/';  // Dosya yükleme dizini
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);  // Eğer dizin yoksa oluşturuluyor
                }

                $filePaths = [];
                $files = $this->request->getFiles()['dosya'] ?? [];  // Dosyaları alıyoruz

                if (!empty($files)) {
                    // Çoklu dosya gönderimi kontrolü
                    if (is_array($files)) {
                        foreach ($files as $file) {
                            if ($file->isValid() && !$file->hasMoved() && $file->getExtension() === 'docx') {
                                $fileName = uniqid('books_', true) . '.' . $file->getExtension();
                                $filePath = WRITEPATH . 'uploads/books/' . $fileName;
                                $file->move($uploadDir, $fileName);  // Dosyayı yüklüyoruz
                                $filePaths[] = $fileName;  // Dosya adını listeye ekliyoruz
                            }
                        }
                    } else {
                        // Tek dosya varsa
                        if ($files->isValid() && !$files->hasMoved() && $files->getExtension() === 'docx') {
                            $fileName = uniqid('books_', true) . '.' . $files->getExtension();
                            $files->move($uploadDir, $fileName);
                            $filePaths[] = $fileName;
                        }
                    }
                }

                // Eğer dosya yüklenmemişse null ekliyoruz
                if (empty($filePaths)) {
                    $filePaths[] = null;
                }

                // Düzeltme notu ve dosyaları kaydediyoruz
                foreach ($filePaths as $filePath) {
                    $booksProcessesValueModel = new ProjectProcessesValueModel();
                    $processData = [
                        'project_processes_id' => $booksProcessModel->getInsertID(),
                        'project_id' => $project_id,
                        'processes_value' => $correctionNote ?: null,
                        'user_id' => $user['user_id'],
                        'admin_id' => session()->get('user_id'),
                        'file_path' => $filePath,  // Dosya yolu burada kaydediliyor
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];

                    // Veri kaydetme işlemi
                    if (!$booksProcessesValueModel->customInsert($processData)) {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => 'Düzeltme kaydedilemedi.'
                        ]);
                    }
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Başvuru düzeltmeye gönderildi.'
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Geçersiz işlem türü'
        ]);
    }


    public function processeslist($project_id)
    {
        $bookprcmodel = new ProjectsProcessesModel();
        $bookprcsvalmodel = new ProjectProcessesValueModel();

        $processes = $bookprcmodel->where('project_id', $project_id)
            ->orderBy('id', 'DESC')
            ->findAll();

        $processCodes = [];
        $actionCodes = [];
        $createdAt = [];
        $processValues = [];
        $filePaths = [];

        foreach ($processes as $process) {
            $processCodes[] = $process['proccesses_code'];
            $actionCodes[] = $process['action_code'];
            $createdAt[] = $process['created_at'];

            $processValue = $bookprcsvalmodel->where('books_processes_id', $process['id'])->first();

            if ($processValue) {
                $processValues[] = $processValue['processes_value'];
                $filePaths[] = $processValue['file_path'];
            } else {
                $processValues[] = null;
                $filePaths[] = null;
            }
        }

        return [
            'process_codes' => $processCodes,
            'action_codes' => $actionCodes,
            'created_at' => $createdAt,
            'process_values' => $processValues,
            'file_paths' => $filePaths,
        ];
    }


    public function getAppProcessesModal($processes_code, $actionCode)
    {

        $sectionName = 'default.' . $processes_code . '.' . $actionCode;

        $processes = new Processes();

        return view('partials/projects', [
            'content' => $processes->getApplicationProcesses() . '.' . $processes_code . '.' . $actionCode,
            'section' => $sectionName,
        ]);
    }


    public function getAppProcessesModal2($processes_code, $actionCode)
    {

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Modal içeriği başarıyla alındı.',
            'modalContent' => $this->getAppProcessesModal($processes_code, $actionCode)
        ]);
    }
}
