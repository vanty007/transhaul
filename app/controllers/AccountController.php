<?php 

/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends SecureController{
	/**
     * Index Action
     * @return View
     */
	function index(){
		$db = $this->GetModel();
		$db->where ("id", USER_ID);
		$user = $db->getOne('user' , '*');
		render_json($user);
	}
	
	
	/**
     * Edit Record Action 
     * If Not $_POST Request, Display Edit Record Form View
     * @return View
     */
	function edit(){
		$db = $this->GetModel();
		if(is_post_request()){
			
			
			$modeldata=transform_request_data($_POST);
			 
			 
			
			$db->where('id' , USER_ID);
			$bool = $db->update('user',$modeldata);
			if($bool){
				$db->where ('id', USER_ID);
				$user = $db->getOne('user' , '*');
				set_session('user_data',$user);

				
				
				render_json(USER_ID);
			}
			else{
				render_error($db->getLastError());
			}
			return null;
		}
		else{
			$fields=array('id','phoneno','role_id','firstname','lastname','title','sex','profile_pics');
			$db->where('id' , USER_ID);
			$data = $db->getOne('user',$fields);
			
			if(!empty($data)){
				render_json($data);
			}
			else{
				if($db->getLastError()){
					render_error($db->getLastError());
				}
				else{
					render_error("Record not found",404);
				}
			}
		}
	}

	
	/**
     * Change Email Action
     * @return View
     */
	function change_email(){
		if(is_post_request()){
			
			$form_collection = $_POST;
			$email=trim($form_collection['email']);
			
			
			$db = $this->GetModel();
			
			$db->where ("id", USER_ID);
			$result = $db->update('user', array('email' => $email ));
			if($result){
				
				set_flash_msg("Email address changed successfully",'success');
				redirect_to_page("#/account");
			}
			else{
				$this->view->form_error="Email Not Changed ";
				$this->view->render("account/change_email.php" ,null,"default_layout.php");
			}
		}
		else{
			$this->view->render("account/change_email.php" ,null,"default_layout.php");
		}
	}
}
