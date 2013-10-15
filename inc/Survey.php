<?php
class Survey {
	function __construct() {
		if (!$link = mysql_connect('localhost', 'root', '')) {
			echo 'Could not connect to mysql';
			return false;
		}

		if (!mysql_select_db('survey', $link)) {
			echo 'Could not select database';
			return false;
		}
	}

	function logout() {
		unset($_SESSION['username']);
		header('location:admin.php');
		header('location:admin.php');
	}
	
	function add( $table, $data = array() ) {
		$op	= false;
		if( !empty($data) ){
			
			foreach($data as $f => $v) {
				$fields[] = $f;
				$values[] = $v;
			}
			$insertq = "INSERT INTO `$table` (". implode( $fields ,', ') .") VALUES ('	". implode( $values ,'\', \'') ."')";
			echo $insertq;
			$op = mysql_query($insertq);
		}
		return $op;
	}
	
	function edit( $table, $data = array(),$id = false ) {
		$op	= false;
		if($id) {
			if( !empty($data) ){
				foreach($data as $field => $values) {
					$update[] = "`$field` = '$values'";
				}
				$updateq = "UPDATE `$table` SET " . implode($update, ', ');
				if(is_numeric($id)) {
					$updateq .= " WHERE id = $id";
				} else {
					$updateq .= " WHERE `id` = `$id`";
				}
				$op = mysql_query($updateq);
				if($op) {
					echo "Data Updated";
				} else {
					echo "Data Updated failed :(" .$updateq;
				}
			} else {
				echo 'Data not set';
			}
		} else {
			echo 'ID not given.';
		}
		return $op;
	}
	
	function query( $q ) {
		$op	= false;
		$result =  mysql_query($q);
		if($result) {
			while($entry = mysql_fetch_assoc($result)) {
				$op[] = $entry;
			}
		}
		return $op;
	}
	
	function get_options( $q ) {
		$op	= false;
		$result =  mysql_query($q);
		if($result) {
			while($entry = mysql_fetch_assoc($result)) {
				$op[$entry['id']] = $entry['opt_title'];
			}
		}
		return $op;
	}
	
	function get( $table, $id = false ) {
		$op	= false;
		$select = "SELECT * FROM $table";
		if($id) {
			if(is_numeric($id)) {
				$select .= " WHERE id = $id";
			} else {
				$select .= " WHERE `id` = `$id`";
			}
		}
		$result =  mysql_query($select);
		if($result) {
			while($entry = mysql_fetch_assoc($result)) {
				$op[] = $entry;
			}
		}
		return $op;
	}
		
	function delete( $table, $id = false ) {
		$op	= false;
		if($id) {
			$delete = "DELETE FROM $table WHERE `id` = $id";
			$op = mysql_query($delete);
		} else {
			echo 'ID not given.';
		}
		return $op;
	}
	
	
	function save_answers() {
		//Saving answers 
		//echo "<pre>";print_r($_POST);echo "</pre>";
		$u_id = $_POST['u_id'];
		foreach($_POST['q_id'] as $q_id => $opt_id) {
			$values[] = " ($u_id,$q_id,$opt_id)";
		}
		$insert = "INSERT INTO `survey`.`answers` (`u_id`, `q_id`, `opt_id`) VALUES " . implode($values,', ');
		return mysql_query($insert);
		//echo $insert;
	}

	function get_all_quesions($edit = false) {
		$qts = $this->get('questions');
		$html = '<ol class="questions">';
		if(!empty($qts)) {
			foreach ($qts as $q) {
				$html .= '<li>'
						.'<div class="question">'. $q['title'] .'</div>';
				$options = json_decode($q['options']);
				if(!empty($options)) {
					foreach ($options as $key => $option) {
						if(!empty($option)) {
							$html .= '<div class="options">'
										.'<label>'
											.'<input type="radio" name="q_id['. $q['id'] .']" value="'. $key .'">'. $option
										.'</label>'
									.'</div>';
						}
					}
				}
				if($edit) {
					$html .='<div class="actions"><a href="admin.php?task=edit&id='. $q['id'] .'" class="button">Edit</a> <a href="admin.php?task=delete&id='. $q['id'] .'" class="button">Delete</a></div>';
				}
				$html .= '</li>';
			}
		}
		$html .= '</ol>';
		return $html;
	}

	function process($task = 'empty') {
		$op = false;
		switch($task) {
			case "get_all_front":
				echo '<form action="index.php?task=save_answers" method="post">';
				echo $this->get_all_quesions();
				echo '<input type="hidden" name="u_id" value="123"><button>Submit</button></form>';
				break;
			case "save_answers" :
					if($this->save_answers()){
						$_SESSION['flash_message'] = "Saved successfuly";
					} else {
						$_SESSION['flash_message'] = "Can't save at this moment..";
					}
					header('location:index.php');
				break;
			case "get_all":
					echo $this->get_all_quesions(true);
				break;
			case "logout": 
					unset($_SESSION['username']);
					header('location:login.php');
				break;
			case "login":
					if(isset($_SESSION['username'])) {
						$_SESSION['username'] = 'Admin';
						header('location:admin.php');
					}
					if(isset($_POST['pwd']) && $_POST['pwd']=='hello123' ) {
						$_SESSION['username'] = 'Admin';
						header('location:admin.php');
					}
				break;
			case "edit":
				$qts = $this->get('questions',$_GET['id']);
				foreach ($qts as $question) {
					$question['options'] = json_decode($question['options']);
					include "inc/form.php";
				}
			
				break;
			case "add_new":
				$question = false;
				include "inc/form.php";
				break;
			case "save":
					$data = $_POST;
					$data['options'] = json_encode($data['options']);
					//echo '<pre>'; print_r($data); echo '</pre>';
					if(isset($data['id']) && $data['id']=='new'){
						unset($data['id']);
						$this->add('questions', $data);
					} else {
						$this->edit('questions', $data, $data['id']);
					}
					header('location:admin.php');
			break;
			
			case 'delete' :
					echo $task;
					$this->delete('questions',$_GET['id']);
					header('location:admin.php');
				break;
			default:
				echo "Undefined Action";
		}

		return $op;
	}
}
