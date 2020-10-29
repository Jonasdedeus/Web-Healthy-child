<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('hc_model');
	}
	public $data = array(
  		"editprofile" => "Edit Profile",
  		"logo"=>"Healthy Child"
  	);

  //PAGE OF HOME..........................................................
	public function index()
	{
		 $this->load->view('home/page_header');
		 $this->load->view('home/page_index');
	}

	public function about(){
		$this->load->view('home/page_header');
		 $this->load->view('home/page_index_about');
		 $this->load->view('home/page_about');
	}

	public function loginmenu(){
		$this->load->view('home/page_header');
		$this->load->view('home/page_login');
	}

	public function register(){
		$this->load->view('home/page_register');
	}

	public function resetpass(){
		$this->load->view('home/page_header');
		$this->load->view('home/page_resetpw');
	}

	//PAGE OF PATIENT.......................................................

	public function pageMenu(){
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/page_indexDash');
	}

	public function consultation(){
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/page_consultation');
	}

	public function pharmacy()
	{
		$data_medicine = $this->hc_model->Getmedicine();
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/page_pharmacy',['data'=>$data_medicine]);
	}

	public function orderpharmacie()
	{
		$data_order = $this->hc_model->getorder();
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/order_page',['data'=>$data_order]);
	}

	public function history()
	{
		$data_order = $this->hc_model->gethistory();
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/page_history',['data'=>$data_order]);
	}

	public function payment()
	{
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/page_payment');
	}

	public function notification()
	{
		$data_feedback = $this->hc_model->getnotification();
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/notification_page',['data'=>$data_feedback]);
	}

	public function result(){

		$data['result_list'] = $this->hc_model->get_all_files();
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/result_list', $data);
	}

	public function editprofile(){
		$data_profile = $this->hc_model->getprofile();
		$this->load->view('view_patient/page_dashboards');
		$this->load->view('view_patient/page_editprofile',['data'=>$data_profile]);
	}

	//PAGE OF DOCTOR............................................................

	public function doctorpage()
	{
		$data_patient = $this->hc_model->getDataConsultation();
		$this->load->view('view_doctor/page_DoctorHeader');
		$this->load->view('view_doctor/Page_DoctorIndex',['data'=>$data_patient]);
		
	}

	public function form(){
		$this->load->view('view_doctor/page_DoctorHeader');
		$this->load->view('view_doctor/result_page');
	}

	public function pharmacydoctor()
	{
		$data_medicine = $this->hc_model->Getmedicine();
		$this->load->view('view_doctor/page_DoctorHeader');
		$this->load->view('view_doctor/pharmacypage_Doctor',['data'=>$data_medicine]);	
	}

	//FINISH PUBLIC FUNCTION........................................................................................
	
	//REGISTRATION FUNCTION FOR PATIENT (PARENTS) ONLY
	function register_user(){

		$email = $_POST["email"];
		$pass1 = $_POST['pw1'];
		$pass2 = $_POST['pw2'];
		$where = array('email'=>$email);
		$check = $this->hc_model->check_loging("user",$where)->num_rows();
		if($pass1!=$pass2){
			$this->session->set_flashdata('pass','<button type="button" class="btn btn-secondary" data-dismiss="modal"><h3>Sorry, password does not match</></button>');
			redirect('welcome/register');
		}else{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$this->session->set_flashdata('email','<button type="button" class="btn btn-secondary" data-dismiss="modal"><h3>Invalid email format</></button>');
			redirect('welcome/register');
			}else{
				if($check>0){
					$this->session->set_flashdata('email','<button type="button" class="btn btn-secondary" data-dismiss="modal"><h3>already has an account.Change email!</></button>');
					redirect('welcome/register');
				}else{
					$email = $this->input->post('email');
					$fullname = $this->input->post('fullname');
					$password = $this->input->post('pw1');
					$address = $this->input->post('address');
					$phone =$this->input->post('phone');
	 	
	 				$data = array(
						'email' => $email,
						'password' => $password,
						'phone'=>$phone,
						'fullname' => $fullname,
						'address' => $address
					);
					$this->hc_model->register_user($data,'user');
					$this->session->set_flashdata('success','<button type="button" class="bttn btn-primary" data-dismiss="modal">Congratulation! registered successfully. Please Login</button>');
					redirect('welcome/loginmenu');	

				}
			}
		}	
	}
	

	//LOGIN FUNCTION FOR PATIENT (PARENTS) AND DOCTOR....................................................................
	function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		
		$where = array(
			'email' => $email,
			'password' => $password
			);
		$check = $this->hc_model->check_loging("user",$where)->num_rows();
		$check1 = $this->hc_model->check_loging("doctor",$where)->num_rows();
		$query = $this->db->query("SELECT * FROM user where email = '$email'");
		$query1 = $this->db->query("SELECT * FROM doctor where email = '$email'");
		if($check > 0){
			foreach ($query->result() as $row){
				$data_session = array(
					'fullname' => $row->fullname,
					'address' => $row->address,
					'phone' =>$row->phone,
					'email' => $email,
					'status'=>"sign in"
					);
			}
 
			$this->session->set_userdata($data_session);
 
			redirect('welcome/pageMenu');

		}elseif ($check1 > 0) {
			foreach ($query1->result() as $row){
				$data_session = array(
					'fullname' => $row->fullname,
					'email' => $email,
					'status'=>"sign in"
					);
			}
 
			$this->session->set_userdata($data_session);

			redirect('welcome/doctorpage');
 
		}else{
			$this->session->set_flashdata('info', '<button type="button" class="bttn btn-secondary" data-dismiss="modal">wrong username and/or password !</></button>');
			redirect('Welcome/loginmenu');
		}
		
	}

	//FORGET PASSWORD FUNCTION FOR PATIENT(PARENT) ONLY...........................................................

	function forgetpw(){

		$pass1 = $_POST['pw1'];
		$pass2 = $_POST['pw2'];
		$email = $this->input->post('email');
		$where = array('email'=>$email);
		$check = $this->hc_model->check_loging("user",$where)->num_rows();
		if($check > 0){
			if($pass1==$pass2){
				$pw1 = $this->input->post('pw1');
				$data = array(
					'password' => $this->input->post('pw1'),);
				$this->hc_model->reset_password($email,$data);
				$this->session->set_flashdata('info', '<button type="button" class="bttn btn-secondary" data-dismiss="modal">Update successfully!Please Login</></button>');
				redirect('welcome/loginmenu');
				
			}else{
				$this->session->set_flashdata('info', '<button type="button" class="bttn btn-secondary" data-dismiss="modal">Password does not match! Fill again</></button>');
				redirect('welcome/resetpass');
			}
		}else{
			$this->session->set_flashdata('info', '<button type="button" class="bttn btn-secondary" data-dismiss="modal">Email Invalid! Please register</></button>');
			redirect('welcome/resetpass');
		}
	}

	//CONSULTATION FOR PATIENT (PARENTS) WHO WANT TO DO CHECK UP FOR THEIR CHILDREN................................

	function consultation_patient(){
		$fullname = $this->input->post('fullname');
		$gender = $this->input->post('gender');
		$dob = $this->input->post('dob');
		$weight = $this->input->post('weight');
		$doa = $this->input->post('doa');
		$description = $this->input->post('description');

		$data = array(
			'fullname' => $fullname,
			'gender' =>$gender,
			'dob'=>$dob,
			'weight' => $weight,
			'doa' => $doa,
			'description' =>$description
		);
		$this->hc_model->consultation($data,'consultation');
		$this->session->set_flashdata('info', '<button type="button" class="bttn btn-secondary" data-dismiss="modal">Submitted. Thank you</></button>');
		redirect('welcome/consultation');
	}

	//ADD ORDER FOR THE MEDICINE THAT RECOMMENDED BY DOCTOR TO BUY..................................................

	function addorder()
	{

		$data = array(
			'generic_name' => $this->input->post('genericname'),
			'strength' => $this->input->post('strength'),
			'form' => $this->input->post('form'),
			'price' => $this->input->post('price'),
		);
	
		$this->hc_model->add_order($data,'orderpharmacie');
		$this->hc_model->add_history($data,'history');
		$this->session->set_flashdata('info', '<button type="button" class="btn btn-primary" data-dismiss="modal">Order added to basket</button>');
		redirect('welcome/pharmacy');

	}
	
	//DELETE ORDER FUNCTION FROM BASKET THAT HAVE ORDER BEFORE..........................................................

	function deleteorder($id){
		$this->hc_model->delete_order($id);
		$this->hc_model->delete_history($id);
		
		redirect('welcome/orderpharmacie','refresh');
	}

	//DELETE ORDER FUNCTION FROM HISTORY..................................................................................

	function deletehistory($id){
		$this->hc_model->delete_history($id);
		
		redirect('welcome/history','refresh');
	}


	//DELETE RESULT FUNCTION FROM HISTORY..................................................................................

	function deleteresult($id){
		$this->hc_model->delete_result($id);
		
		redirect('welcome/result','refresh');
	}

	//DELETE CONSULTATION FUNCTION FROM HISTORY..................................................................................

	function deletecons($id){
		$this->hc_model->delete_consultation($id);
		
		redirect('welcome/doctorpage','refresh');
	}

	//DROP TABLE ORDER FUNCTION FROM BASKET AFTER PAYMENT............................................................

	function deleteallorder(){
		$this->hc_model->delete_ordertable();
		$this->session->set_flashdata('msg', '<h2>Thank you!</h2>');
		redirect('welcome/pharmacy','refresh');
	}

	//DROP TABLE HISTORY FUNCTION FROM BASKET AFTER PAYMENT............................................................

	function deleteallhistory(){
		$this->hc_model->delete_historytable();
		redirect('welcome/history','refresh');
	}

	//DROP TABLE RESULT FUNCTION FROM BASKET AFTER PAYMENT............................................................

	function deleteallresult(){
		$this->hc_model->delete_resulttable();
		redirect('welcome/result','refresh');
	}

	//DROP TABLE CONSULTATION FUNCTION FROM BASKET AFTER PAYMENT............................................................

	function deleteallcons(){
		$this->hc_model->delete_constable();
		redirect('welcome/doctorpage','refresh');
	}

	//DELETE NOTIFICATION FUNCTION FROM BASKET THAT HAVE ORDER BEFORE..........................................................

	function deletenotification($id){
		$this->hc_model->delete_notification($id);
		
		redirect('welcome/notification','refresh');
	}

	//CHECK ORDER FUNCTION FROM BASKET BEFORE DO THE PAYMENT..............................................................
	function checkOrder(){

		$check = $this->hc_model->check_order("orderpharmacie",$id)->num_rows();
		if($check > 0){
			redirect('welcome/payment');
		}else{
			$this->session->set_flashdata('info', '<button type="button" class="form-control" data-dismiss="modal" style="background-color:red; color:white;">Your basket is empty</button>');
			redirect('welcome/orderpharmacie');
		}
		
	}

	//CHECK PATIENT DATA AFTER UPLOAD A FILE...............................................................................
	function checkpatient(){
		$name = $_POST['fullname'];
		$where = array('fullname'=>$name);
		$check = $this->hc_model->check_patient("consultation",$where)->num_rows();
		if($check > 0){
			$this->form_validation->set_rules('fullname', 'dos', 'required');
			 if ($this->form_validation->run() == FALSE){
				$this->load->view('result_page');
			}else{
			
			//get the form values
			$data['fullname'] = $this->input->post('fullname', TRUE);
			$data['dos'] = $this->input->post('dos', TRUE);

			//file upload code 
			//set file upload settings 
			$config['upload_path']          = APPPATH. '../assets/uploads/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 1000000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('result_page', $error);
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();

				//get the uploaded file name
				$data['file'] = $upload_data['file_name'];

				//store file data to the db
				$this->hc_model->store_file_data($data);
				$this->session->set_flashdata('info', 'Message has sent!');
				redirect('welcome/form');
			}
		}
		}else{
			$this->session->set_flashdata('info', '<button type="button" class="form-control" data-dismiss="modal" style="background-color:red; color:white;">The name is not registered</button>');
			redirect('welcome/form');
		}
		
	}

	//FUNCTION EDIT PROFILE FOR PATIENT(PARENT..........................................................................

	 function editprofiles($id)
	{

		$data = array(
			'password' => $this->input->post('pw'),
			'fullname' => $this->input->post('fname'),
			'email' => $this->input->post('useremail'),
			'phone' => $this->input->post('userphone'),
			'address' => $this->input->post('useraddress'),
		);
	
		$this->hc_model->edit_profile($id,$data);
		
		redirect('welcome/editprofile');
		
	}
	
	//ADD MEDICINE FUNCTION FROM PHARMACY IN DOCTOR PAGE...........................................................

	function addmedicine()
	{

		$data = array(
			'generic_name' => $this->input->post('genericname'),
			'strength' => $this->input->post('strength'),
			'form' => $this->input->post('form'),
			'price' => $this->input->post('price'),
		);
	
		$this->hc_model->add_medicine($data,'pharmacie');
		redirect('welcome/pharmacydoctor');

	}

	//EDIT MEDICINE FUNCTION FROM PHARMACY IN DOCTOR PAGE...........................................................

	function editmedicine($id)
	{

		$data = array(
			'generic_name' => $this->input->post('genericname'),
			'strength' => $this->input->post('strength'),
			'form' => $this->input->post('form'),
			'price' => $this->input->post('price'),
		);
	
		$this->hc_model->edit_medicine($id,$data);
		
		redirect('welcome/pharmacydoctor','refresh');
		
	}

	//DELETE MEDICINE FUNCTION FROM PHARMACY IN DOCTOR PAGE...........................................................

	function deletemedicine($id)
	{

		$this->hc_model->delete_medicine($id);
		
		redirect('welcome/pharmacydoctor','refresh');

	}

	// FEEDBACK FUNCTION FROM DOCTOR TO PATIENT.......................................................................

	 function feedbacks()
	{

		$data = array(
			'fullname' => $this->input->post('fullname'),
			'doa' => $this->input->post('doa'),
			'description' => $this->input->post('description'),
			'message' => $this->input->post('message'),
		);
	
		$this->hc_model->feedback_data($data,'feedback');
		$this->session->set_flashdata('info', '<button type="button" class="bttn btn-primary" data-dismiss="modal">Message is sent</button>');
		redirect('welcome/doctorpage');

	}

	//LOGOUT OUT FUNCTION FOR PATIENT AND DOCTOR............................................................... 

	function logout(){
		$this->session->sess_destroy();
		redirect('Welcome/loginmenu');
	}

	//THANK YOU SO MUCH.................................GOD BLESSED YOU.............................................

}
