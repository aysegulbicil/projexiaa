<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\user\ProjectModel;
use App\Models\user\ProjectEditorModel; // Editör modeli ekle
use Config\Processes;
use App\Helpers\EncryptHelper;
use App\Models\ProjectsProcessesModel;
use App\Models\ProjectProcessesValueModel;

class ProjectController extends BaseController
{
    public function projeekle()
    {
        return view('users/projeekle');
    }
    public function save()
    {
        $model = new ProjectModel();
        $editorModel = new ProjectEditorModel();
        $formDataModel = new \App\Models\FormDataModel();

        // Template kodu env'den çekiliyor
        $templateCode = getenv('APP_TEMPLATE') ?: 'default';

        // Dosya işlemi
        $file = $this->request->getFile('file');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);
        }

        // Session'dan user_id alınır
        $session = session();
        $userId = $session->get('user_id');

        // Proje verileri
        $data = [
            'user_id'              => $userId,
            'project_name'         => $this->request->getPost('project_name'),
            'unit'                 => $this->request->getPost('unit'),
            'location'             => $this->request->getPost('location'),
            'subject'              => $this->request->getPost('subject'),
            'subject_other'        => $this->request->getPost('subject_other'),
            'institutions'         => $this->request->getPost('institutions'),
            'target_audience'      => $this->request->getPost('target_audience'),
            'purpose'              => $this->request->getPost('purpose'),
            'topic'                => $this->request->getPost('topic'),
            'summary'              => $this->request->getPost('summary'),
            'activity_description' => $this->request->getPost('activity_description'),
            'expected_results'     => $this->request->getPost('expected_results'),
            'why_implement'        => $this->request->getPost('why_implement'),
            'documentation'        => $fileName,
            'start_date'           => $this->request->getPost('start_date'),
            'end_date'             => $this->request->getPost('end_date'),
        ];

        // Projeyi kaydet
        $projectId = $model->insert($data);

        if (!$projectId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Proje kaydı başarısız oldu!'
            ]);
        }

        // Form verilerini kaydet
        $formValues = [
            'project_name'         => ['type' => 'text'],
            'unit'                 => ['type' => 'text'],
            'location'             => ['type' => 'text'],
            'subject'              => ['type' => 'select'],
            'subject_other'        => ['type' => 'text'],
            'institutions'         => ['type' => 'select'],
            'target_audience'      => ['type' => 'select'],
            'purpose'              => ['type' => 'textarea'],
            'topic'                => ['type' => 'textarea'],
            'summary'              => ['type' => 'textarea'],
            'activity_description' => ['type' => 'textarea'],
            'expected_results'     => ['type' => 'textarea'],
            'why_implement'        => ['type' => 'textarea'],
            'start_date'           => ['type' => 'date'],
            'end_date'             => ['type' => 'date'],
        ];

        foreach ($formValues as $name => $meta) {
            $value = $this->request->getPost($name);
            $formDataModel->insert([
                'project_id'    => $projectId,
                'name'          => $name,
                'type'          => $meta['type'],
                'value'         => $value,
                'template_code' => $templateCode,
            ]);
        }

        if ($fileName) {
            $formDataModel->insert([
                'project_id'    => $projectId,
                'name'          => 'file',
                'type'          => 'file',
                'value'         => $fileName,
                'template_code' => $templateCode,
            ]);
        }

        // Editörleri kaydet ve form_data'ya yaz
        $emails = $this->request->getPost('editorEmail');
        $names = $this->request->getPost('editorName');
        $appellations = $this->request->getPost('editorAppellation');

        if (is_array($emails)) {
            foreach ($emails as $index => $email) {
                if (empty(trim($email)) && empty(trim($names[$index] ?? ''))) {
                    continue;
                }

                $editorData = [
                    'project_id'  => $projectId,
                    'email'       => $email,
                    'name'        => $names[$index] ?? null,
                    'appellation' => $appellations[$index] ?? null,
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                ];
                $editorModel->insert($editorData);

                $formDataModel->insert([
                    'project_id'    => $projectId,
                    'name'          => "editor_name_$index",
                    'type'          => 'text',
                    'value'         => $names[$index] ?? '',
                    'template_code' => $templateCode,
                ]);
                $formDataModel->insert([
                    'project_id'    => $projectId,
                    'name'          => "editor_email_$index",
                    'type'          => 'text',
                    'value'         => $email,
                    'template_code' => $templateCode,
                ]);
                $formDataModel->insert([
                    'project_id'    => $projectId,
                    'name'          => "editor_appellation_$index",
                    'type'          => 'text',
                    'value'         => $appellations[$index] ?? '',
                    'template_code' => $templateCode,
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Proje, form verileri ve editörler başarıyla kaydedildi!'
        ]);
    }




    public function edit($id)
{
    $model = new ProjectModel();
    $project = $model->find($id);
    if (!$project) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Proje bulunamadı.');
    }

    $editorModel = new ProjectEditorModel();
    $editors = $editorModel->where('project_id', $id)->findAll();

    return view('users/projeDuzenle', [
        'project' => $project,
        'editors' => $editors
    ]);
}

    public function duzenle()
{
    $model = new ProjectModel();
    $editorModel = new ProjectEditorModel();
    $formDataModel = new \App\Models\FormDataModel();

    $templateCode = getenv('APP_TEMPLATE') ?: 'default';

    $file = $this->request->getFile('file');
    $fileName = null;

    // Zorunlu: Güncellenecek projenin ID'si POST'tan gelmeli
    $projectId = $this->request->getPost('project_id');
    if (!$projectId) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Proje ID bulunamadı.'
        ]);
    }

    // Dosya yüklendiyse işle
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $fileName);
    }

    $session = session();
    $userId = $session->get('user_id');

    $data = [
        'user_id'              => $userId,
        'project_name'         => $this->request->getPost('project_name'),
        'unit'                 => $this->request->getPost('unit'),
        'location'             => $this->request->getPost('location'),
        'subject'              => $this->request->getPost('subject'),
        'subject_other'        => $this->request->getPost('subject_other'),
        'institutions'         => $this->request->getPost('institutions'),
        'target_audience'      => $this->request->getPost('target_audience'),
        'purpose'              => $this->request->getPost('purpose'),
        'topic'                => $this->request->getPost('topic'),
        'summary'              => $this->request->getPost('summary'),
        'activity_description' => $this->request->getPost('activity_description'),
        'expected_results'     => $this->request->getPost('expected_results'),
        'why_implement'        => $this->request->getPost('why_implement'),
        'start_date'           => $this->request->getPost('start_date'),
        'end_date'             => $this->request->getPost('end_date'),
    ];

    // Eğer yeni dosya geldiyse 'documentation' alanını güncelle, yoksa değiştirme
    if ($fileName) {
        $data['documentation'] = $fileName;
    }

    // Projeyi güncelle
    $updated = $model->update($projectId, $data);

    if (!$updated) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Proje güncelleme işlemi başarısız oldu!'
        ]);
    }

    // Önce eski form_data kayıtlarını sil (proje_id ve template_code bazlı)
    $formDataModel->where('project_id', $projectId)->where('template_code', $templateCode)->delete();

    // Form verilerini tekrar kaydet
    $formValues = [
        'project_name'         => ['type' => 'text'],
        'unit'                 => ['type' => 'text'],
        'location'             => ['type' => 'text'],
        'subject'              => ['type' => 'select'],
        'subject_other'        => ['type' => 'text'],
        'institutions'         => ['type' => 'select'],
        'target_audience'      => ['type' => 'select'],
        'purpose'              => ['type' => 'textarea'],
        'topic'                => ['type' => 'textarea'],
        'summary'              => ['type' => 'textarea'],
        'activity_description' => ['type' => 'textarea'],
        'expected_results'     => ['type' => 'textarea'],
        'why_implement'        => ['type' => 'textarea'],
        'start_date'           => ['type' => 'date'],
        'end_date'             => ['type' => 'date'],
    ];

    foreach ($formValues as $name => $meta) {
        $value = $this->request->getPost($name);
        $formDataModel->insert([
            'project_id'    => $projectId,
            'name'          => $name,
            'type'          => $meta['type'],
            'value'         => $value,
            'template_code' => $templateCode,
        ]);
    }

    if ($fileName) {
        $formDataModel->insert([
            'project_id'    => $projectId,
            'name'          => 'file',
            'type'          => 'file',
            'value'         => $fileName,
            'template_code' => $templateCode,
        ]);
    }

    // Editörleri güncelle
    // Önce eski editörleri sil
    $editorModel->where('project_id', $projectId)->delete();

    $emails = $this->request->getPost('editorEmail');
    $names = $this->request->getPost('editorName');
    $appellations = $this->request->getPost('editorAppellation');

    if (is_array($emails)) {
        foreach ($emails as $index => $email) {
            if (empty(trim($email)) && empty(trim($names[$index] ?? ''))) {
                continue;
            }

            $editorData = [
                'project_id'  => $projectId,
                'email'       => $email,
                'name'        => $names[$index] ?? null,
                'appellation' => $appellations[$index] ?? null,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
            $editorModel->insert($editorData);

            $formDataModel->insert([
                'project_id'    => $projectId,
                'name'          => "editor_name_$index",
                'type'          => 'text',
                'value'         => $names[$index] ?? '',
                'template_code' => $templateCode,
            ]);
            $formDataModel->insert([
                'project_id'    => $projectId,
                'name'          => "editor_email_$index",
                'type'          => 'text',
                'value'         => $email,
                'template_code' => $templateCode,
            ]);
            $formDataModel->insert([
                'project_id'    => $projectId,
                'name'          => "editor_appellation_$index",
                'type'          => 'text',
                'value'         => $appellations[$index] ?? '',
                'template_code' => $templateCode,
            ]);
        }
    }

    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Proje başarıyla güncellendi.',
        'redirect' => base_url('user/projects/detay/' . $projectId)
    ]);
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

        return view('users/projectDetail', [
            'project'       => $project,
            'members'       => $members,
            'files'         => $files,
            'formData'      => $formData,
            'actionDetails' => $actionDetails,
            'latestProcess' => $latestProcess,
            'project_id'        => $project_id, // <- Bunu ekle
        ]);
    }

    public function handleApplicationProcess($actionCode)
    {
        $processCode = $this->request->getVar('process_code');
        $actionCode = $this->request->getVar('action_code');
        $file = $this->request->getFile('dosya');
        $files = $this->request->getFileMultiple('dosya');
        $description = $this->request->getVar('aciklama');
        $appid = $this->request->getVar('appid');

        $processActionModel = new ProjectsProcessesModel();
        $applicationProcessValuesModel = new ProjectProcessesValueModel();

        if (empty($appid) || empty($processCode) || empty($actionCode)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => lang('Main.eksik_veri')
            ]);
        }

        $wordCount = str_word_count(strip_tags($description));

        if ($wordCount > 250) {
            return $this->response->setJSON([
                'success' => false,
                'message' => lang('Main.description_word_limit_exceeded')
            ]);
        }

        $processData = [
            'application_id' => $appid,
            'processes_code' => $processCode,
            'action_code' => $actionCode,
            'user_id' => session()->get('user_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];


        if ($actionCode == "duzeltmeok") {
            // Süreç kaydını oluştur
            $processActionModel->insert($processData);
            $processId = $processActionModel->getInsertID();
        
            $uploadDir = WRITEPATH . 'uploads/applications/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
        
            $filePaths = [];
        
            // Çoklu dosya kontrolü
            if (!empty($files)) {
                foreach ($files as $file) {
                    if (!$file->isValid() || $file->hasMoved() || $file->getExtension() !== 'docx') {
                        return $this->response->setJSON([
                            'success' => false,
                            'message' => lang('Main.geçersiz_taşınmış_dosya')
                        ]);
                    }
        
                    // Benzersiz isimle taşı
                    $fileName = uniqid('app_', true) . '.' . $file->getExtension();
                    $file->move($uploadDir, $fileName);
        
                    $filePaths[] = $fileName;
                }
            }
        
            // Dosya veya açıklama kayıtları
            // Eğer dosya yüklenmemişse file_path null olabilir
            if (empty($filePaths)) {
                $filePaths[] = null;
            }
        
            foreach ($filePaths as $filePath) {
                $data = [
                    'application_id' => $appid,
                    'user_id' => session()->get('user_id'),
                    'application_processes_id' => $processId,
                    'processes_code' => $processCode,
                    'action_code' => $actionCode,
                    'application_processes_values' => $description ?: null,
                    'file_path' => $filePath,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
        
                $applicationProcessValuesModel->insert($data);
            }

            log_message('debug', 'Gelen action_code: ' . $actionCode);

        
            return $this->response->setJSON([
                'success' => true,
                'message' => lang('Main.işlem_başarıyla_kaydedildi')
            ]);
        }
        
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
