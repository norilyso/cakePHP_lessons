<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

//use \SplFileObject;

class CsvImportComponent extends Component {

//     protected function _getCSVLine(SplFileObject $handle) {
// 		if ($handle->eof()) {
// 			return false;
// 		}
// 		return $handle->fgetcsv(
//             0,
//             '\ t',  //tab
//             ' '
//         );
// 	}
//     public function importCSV($modelname, $file) { 
//         $this->Models = TableRegistry::get($modelname);
// 		$this->Models->deleteAll('1=1');
//         $tmpModel = $this->Models->newEntity();
        
        
//         $handle = new SplFileObject($file, 'rb');
        
//         $header = $this->_getCSVLine($handle);
// 		//CSVタイトル<>テーブルカラム名の時は、モデルよりカラム名取得。
//         $header= $this->Models->schema()->columns();
//         //CSVにない項目を削除 (id, created, modified)
//         $header = array_values(array_diff($header,array("id","created","modified")));

//         $i = 1;

//         //while (($row = fgetcsv($handle)) !== FALSE) {
//         while (($row = $this->_getCSVLine($handle)) !== false) {
//             $i++; /* This is line 38 */
//             $data = array();
//             $tempModel = $this->Models->newEntity();
//             mb_convert_variables("UTF-8", "SJIS", $row);
//             // for each header field
//             foreach ($header as $k => $head) {
//                 // get the data field from Model.field
//                 if (strpos($head, '.') !== false) {
//                     $h = explode('.', $head);
//                     $data[$h[0]][$h[1]] = (isset($row[$k])) ? $row[$k] : "";
//                 }
//                 // get the data field from field
//                 else {
//                     $data[$head] = (isset($row[$k])) ? $row[$k] : "";
//                 }
//             }

//             $tempModel = $this->Models->patchEntity($tempModel, $data);
// /*            if (!$this->Models->save($tempModel)) {
//                 //$message[$i] = "Error:".implode(",", $data);
//                 $this->log("CSVImportError:".$modelname.": ".implode("/", $row));
//                 $return_value = false;
//             }
// */
//             //　デバッグ用
//             try {
//                 $this->Models->saveOrFail($tempModel, $data);
//             } catch (\Cake\ORM\Exception\PersistenceFailedException $e) {
//                 $this->log($e);
//                 $this->log($e->getEntity()) ;
//                 $return_value = false;
//             //    $user_arr[$i] = strval($i).$user_arr[$i].$tempPost;
//             }
            
//         }
//         return $return_value;

// 		// while (($row = $this->_getCSVLine($handle)) !== false) {
// 		// 	$data = array();
// 		// 	foreach ($header as $k => $col) {
// 		// 		// get the data field from Model.field
// 		// 		if (strpos($col, '.') !== false) {
// 		// 			$keys = explode('.', $col);
// 		// 			if (isset($keys[2])) {
// 		// 				$data[$keys[0]][$keys[1]][$keys[2]]= (isset($row[$k])) ? $row[$k] : '';
// 		// 			} else {
// 		// 				$data[$keys[0]][$keys[1]]= (isset($row[$k])) ? $row[$k] : '';
// 		// 			}
// 		// 		} else {
// 		// 			$data[$Model->alias][$col]= (isset($row[$k])) ? $row[$k] : '';
// 		// 		}
// 		// 	}
// 		// 	$data = Set::merge($data, $fixed);
// 		// 	$Model->create();
// 		// 	$Model->id = isset($data[$Model->alias][$Model->primaryKey]) ? $data[$Model->alias][$Model->primaryKey] : false;
// 		// 	//beforeImport callback
// 		// 	if (method_exists($Model, 'beforeImport')) {
// 		// 		$data = $Model->beforeImport($data);
// 		// 	}
// 		// 	$error = false;
// 		// 	$Model->set($data);
// 		// 	if (!$Model->validates()) {
// 		// 		$this->errors[$Model->alias][$i]['validation'] = $Model->validationErrors;
// 		// 		$error = true;
// 		// 		$this->_notify($Model, 'onImportError', $this->errors[$Model->alias][$i]);
// 		// 	}
// 		// 	// save the row
// 		// 	if (!$error && !$Model->saveAll($data, array('validate' => false,'atomic' => false))) {
// 		// 		$this->errors[$Model->alias][$i]['save'] = sprintf(__d('utils', '%s for Row %d failed to save.'), $Model->alias, $i);
// 		// 		$error = true;
// 		// 		$this->_notify($Model, 'onImportError', $this->errors[$Model->alias][$i]);
// 		// 	}
// 		// 	if (!$error) {
// 		// 		$this->_notify($Model, 'onImportRow', $data);
// 		// 		if ($returnSaved) {
// 		// 			$saved[] = $i;
// 		// 		}
// 		// 	}
// 		// 	$i++;
// 		// }
// 		// $success = empty($this->errors);
// 		// if (!$returnSaved && !$success) {
// 		// 	$db->rollback($Model);
// 		// 	return false;
// 		// }
// 		// $db->commit($Model);
// 		// if ($returnSaved) {
// 		// 	return $saved;
// 		// }
// 		// return true;
// 	}


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
/*            if (!$this->Models->save($tempModel)) {
                //$message[$i] = "Error:".implode(",", $data);
                $this->log("CSVImportError:".$modelname.": ".implode("/", $row));
                $return_value = false;
            }
*/
            //　デバッグ用
            try {
                $this->Models->saveOrFail($tempModel, $data);
            } catch (\Cake\ORM\Exception\PersistenceFailedException $e) {
                $this->log($e);
                $this->log($e->getEntity()) ;
                $return_value = false;
            //    $user_arr[$i] = strval($i).$user_arr[$i].$tempPost;
            }
            
        }
        return $return_value;

	}

}
