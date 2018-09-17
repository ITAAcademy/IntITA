<?php 
	class UserHelper {
		public function prepareTeachersWithModules($teachers)
		{
			$tempId = null;
	        $result = [];
	        foreach ($teachers as $key => $teacher) {
	            if ($teacher['id'] === $tempId) {
	                if($teacher['moduleByAuthor'] !== null){
	                    $teacher['modules'] = $teacher['moduleByAuthor'];
	                } else if($teacher['moduleByConsultant'] !== null) {
	                    $teacher['modules'] = $teacher['moduleByConsultant'];
	                }
	                unset($teacher['moduleByAuthor']);
	                unset($teacher['moduleByConsultant']);
	                $result[$teacher['id']]['modules'][] = $teacher['modules'];
	            } else {
	                $tempId = $teacher['id'];
	                $teacher['modules'] = [];
	                if($teacher['moduleByAuthor'] !== null){
	                    $teacher['modules'][] = $teacher['moduleByAuthor'];
	                } else if($teacher['moduleByConsultant'] !== null) {
	                    $teacher['modules'][] = $teacher['moduleByConsultant'];
	                }
	                unset($teacher['moduleByAuthor']);
	                unset($teacher['moduleByConsultant']);
	                $result[$teacher['id']] = $teacher;
	            }
	        }   
	        return $result;
		}
	}
?>
