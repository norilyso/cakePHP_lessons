<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{
    const COLUMN_DISP_NAME =[ 'project_number' => 'No.',
        'segment' => 'セグメント',
        'orderer' => '発注者',
        'project_name' => '案件名称',
        'staff' => '担当者',
        'team'=>'チーム',
        'contract_amount'=>'契約金額',
        'estimate_amount' =>'予測金額',
        'order_planed_month'=>'受注予定月',
        'completion_planed_month'=>'完成予定月',
        'completion_planed_term' => '完成予定月2',
        'probability_orders' => '受注確度'
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
        $this->set('arr_disp_name', self::COLUMN_DISP_NAME);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);

        $this->set('project', $project);
        $this->set('arr_disp_name', self::COLUMN_DISP_NAME);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('project'));
        $this->set('arr_disp_name', self::COLUMN_DISP_NAME);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('project'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function exportExcel()
    {

        //案件情報の取得
        $projects = $this->Projects->find();

        $reader = new Reader();
        $spreadsheet = $reader->load('C:\workspace\temp\project_infomation.xlsx');        
        $sheet = $spreadsheet->getActiveSheet();
        $rowcnt = 2;

        foreach ($projects as $project) {
            $sheet->setCellValue('A'.$rowcnt, $project->project_number);
            $sheet->setCellValue('B'.$rowcnt, $project->segment);
            $sheet->setCellValue('C'.$rowcnt, $project->orderer);
            $sheet->setCellValue('D'.$rowcnt, $project->project_name);
            $sheet->setCellValue('E'.$rowcnt, $project->estimate_amount);
            $sheet->setCellValue('F'.$rowcnt, $project->order_planed_month->format('Y年m月'));
            $sheet->setCellValue('G'.$rowcnt, $project->completion_planed_month->format('Y年m月'));
            $sheet->setCellValue('H'.$rowcnt, $project->probability_orders);
            $rowcnt++;
        }
                
        
        $writer = new Writer($spreadsheet);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="anken.xlsx"');
        header('Cache-Control: max-age=0');

        
       $writer->save('php://output');
//        $writer->save('C:\workspace\temp\project_infomation_2.xlsx');
        exit;

    }
}
