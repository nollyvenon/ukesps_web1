<?php
class DbClass {
    private $user_data;
      
   	public function fetch_jobs($id) {
    	global $db_handle;
		
		$query = "SELECT * from applications INNER JOIN jobs ON applications.job_id = jobs.jobs_id
        where applications.applicant_code = '$id'";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		
		return $content;
    }
    public function fetch_application_by_appl_code($id) {
        global $db_handle;
				
		$query = "SELECT * from applications INNER JOIN jobs ON applications.job_id = jobs.jobs_id
         where applications.applicant_code = '$id'";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		return $content;
    }
    public function get_job_sub_categories($job_cat) {
		global $db_handle;		
		$query = "SELECT * FROM job_sub_categories where category_parent = '$job_cat'";
        $result = $db_handle->runQuery($query);
		
		$job_categories = $db_handle->fetchAssoc($result);
		return $job_categories;
		
	}
    public function fetch_course_by_id($id) {
        global $db_handle;
				
		$query = "SELECT * from courses where course_id = '$id'";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		return $content;
    }
    public function fetch_course_by_category($cat) {
        global $db_handle;
				
		$query = "SELECT * from courses where course_category = '$cat'";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		return $content;
    }
    public function View_course($user_id, $course_id) {
        global $db_handle;
        
        //check if exist
        $query = "SELECT * From viewed_courses where course_id = '$course_id' and user_id = '$user_id' ";
        $check = $db_handle->numRows($query);
        if($check > 0){
           return false;
        }else{
            $query = "INSERT INTO viewed_courses( user_id, course_id) values('$user_id','$course_id') ";
            $result = $db_handle->runQuery($query);		
            if($result){
                return true;
            }
            else{
                return false;
            }
        }
		
    }
    public function fetch_courses() {
    	global $db_handle;
		
		$query = "SELECT * from courses";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		
		return $content;
    }
    public function fetch_viewed_courses($id) {
    	global $db_handle;
		
		$query = "SELECT *
          from Viewed_courses INNER JOIN courses ON
          viewed_courses.course_id = courses.course_id where viewed_courses.user_id = '$id'  ";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		
		return $content;
    }

	public function fetch_viewed_jobs($id) {
    	global $db_handle;
		
		$query = "SELECT *
          from viewed_jobs INNER JOIN jobs ON
          viewed_jobs.jobs_id = jobs.jobs_id where viewed_jobs.user_id = '$id'  ";
		
        $result = $db_handle->runQuery($query);		
		$content = $db_handle->fetchAssoc($result);
		
		return $content;
    }


}
