<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class CsvImportComponent extends Component {
/**
 * Returns a list of keys representing the columns of the CSV file
 *
 * @param string $modelname CSV取り込み先テーブルのモデル名
 * @param string $filename     path to the CSV file
 * @throws RuntimeException if $file does not exists
 * @return mixed boolean indicating the success of the operation or list of saved records
 */
	public function importCSV($modelname, $filename) {
        $return_value = true;

        //文字化け対応
        setlocale(LC_ALL, 'ja_JP.UTF-8');
    
        $this->Models = TableRegistry::get($modelname);
		$this->Models->deleteAll('1=1');
		$tmpModel = $this->Models->newEntity();

            
        $handle = fopen($filename, "r");
        //1行目を読み込む　CSVタイトル＝テーブルカラム名ならこちらのみでOK
        $header = fgetcsv($handle);
        
        //CSVタイトル<>テーブルカラム名の時は、モデルよりカラム名取得。
        $header= $this->Models->schema()->columns();
        //CSVにない項目を削除 (id, created, modified)
        $header = array_values(array_diff($header,array("id","created","modified")));

        // $return = array(
        //     'messages' => array(),
        //     'errors' => array(),
        // );

        $i = 1;
        while (($row = fgetcsv($handle)) !== FALSE) {
            $i++; /* This is line 38 */
            $data = array();
            $tempModel = $this->Models->newEntity();
            mb_convert_variables("UTF-8", "SJIS", $row);
            // for each header field
            foreach ($header as $k => $head) {
                // get the data field from Model.field
                if (strpos($head, '.') !== false) {
                    $h = explode('.', $head);
                    $data[$h[0]][$h[1]] = (isset($row[$k])) ? $row[$k] : "";
                }
                // get the data field from field
                else {
                    $data[$head] = (isset($row[$k])) ? $row[$k] : "";
                }
            }

            $tempModel = $this->Models->patchEntity($tempModel, $data);
            if (!$this->Models->save($tempModel)) {
                //$message[$i] = "Error:".implode(",", $data);
                $this->log("CSVImportError:".$modelname.": ".implode("/", $row));
                $return_value = false;
            }

            /*　デバッグ用
            try {
                $this->TempPosts->saveOrFail($tempPost, $data);
            } catch (\Cake\ORM\Exception\PersistenceFailedException $e) {
            //    echo $e;
            //  echo $e->getEntity();
                $user_arr[$i] = strval($i).$user_arr[$i].$tempPost;
            }
           */ 
        }
        return $return_value;

	}

}
