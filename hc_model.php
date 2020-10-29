<?php 
 
class hc_model extends CI_Model{

	//INSERT THE PATIENT DATA TO DATABASE
	public function register_user($data,$table){
		$this->db->insert($table,$data);
	}

	//GET PATIENT DATA FROM DATABASE
	public function get_user(){
		return $this->db->get('user');
	}

	//GET DETAIL DATA FROM USER PATIENT
	public function detail_user($email){		
		return $this->db->query("SELECT * FROM user where email = '$email'");
	}

	//GET THE DATA TO CHECK THE LOGIN FOR PATIENT AND DOCTOR
	public function check_loging($table,$where){		
		return $this->db->get_where($table,$where);	
	}

	//GET THE DATA TO CHECK ORDER FOR PATIENT
	public function check_order($table,$where){		
		return $this->db->get_where($table,$where);	
	}

	//GET THE DATA TO CHECK PATIENT FOR PATIENT
	public function check_patient($table,$where){		
		return $this->db->get_where($table,$where);	
	}

	//UPDATE PASSWORD (FORGOT PASSWORD) FOR PATIENT
	public function reset_password($email,$data)
	{
		$this->db->where('email',$email);
		$this->db->update('user',$data);
	}
		
	//INSERT DATA OF CONSULTATION TO THE DATABASE 				
	public function consultation($data,$table){
		$this->db->insert($table,$data);
	}

	//GET MEDICINE FROM DATABASE
	public function Getmedicine(){
		$this->db->select('*');
		$this->db->from('pharmacie');
		$query = $this->db->get();
		return $query->result();
	}

	//GET DATA ORDER FROM DATABASE
	public function getorder(){
		$this->db->select('*');
		$this->db->from('orderpharmacie');
		$query = $this->db->get();
		return $query->result();
	}

	//GET DATA HISTORY FROM DATABASE
	public function gethistory(){
		$this->db->select('*');
		$this->db->from('history');
		$query = $this->db->get();
		return $query->result();
	}

	//INSERT DATA ORDER TO THE DATABASE
	public function add_order($data,$table){
		$this->db->insert($table,$data);
	}

	//INSERT DATA ORDER TO THE HISTORY
	public function add_history($data,$table){
		$this->db->insert($table,$data);
	}

	//DELETE ORDER FROM DATABASE
	public function delete_order($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('orderpharmacie');
	}

	//DELETE HISTORY FROM DATABASE
	public function delete_history($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('history');
	}

	//DELETE RESULT FROM DATABASE
	public function delete_result($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('result');
	}

	//DELETE CONSULTATION FROM DATABASE
	public function delete_consultation($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('consultation');
	}

	//DELETE ALL ORDER FROM DATABASE
	public function delete_ordertable(){		
		return $this->db->empty_table('orderpharmacie');
	}	

	//DELETE ALL HISTORY FROM DATABASE
	public function delete_historytable(){		
		return $this->db->empty_table('history');
	}

	//DELETE ALL HISTORY FROM DATABASE
	public function delete_resulttable(){		
		return $this->db->empty_table('result');
	}

	//DELETE ALL HISTORY FROM DATABASE
	public function delete_constable(){		
		return $this->db->empty_table('consultation');
	}

	//GET NOTIFICATION FROM DATABASE
	public function getnotification(){
		$this->db->select('*');
		$this->db->from('feedback');
		$query = $this->db->get();
		return $query->result();
	}

	//DELETE NOTIFICATION FROM DATABASE IN PATIENT PAGE
	public function delete_notification($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('feedback');
	}

	//GET RESULT FORM DOCTOR BY PDF FILE
	public function get_all_files(){
		$all_pics = $this->db->get('result');
		return $all_pics->result();
	}

	//GET DATA CONSULTATION FROM PATIENT
	public function getDataConsultation(){
		$this->db->select('*');
		$this->db->from('consultation');
		$query = $this->db->get();
		return $query->result();
	}	


	//INSERT FEEDBACK DATA TO DATABASE
	public function feedback_data($data,$table){
		$this->db->insert($table,$data);
	}

	//GET PROFILE DATA FROM DATABASE
	public function getprofile(){
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}

	//EDIT PROFILE FOR PATIENT
	public function edit_profile($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	//GET DATA OF DOCTOR FROM DATABASE
	public function get_doctor(){
		return $this->db->get('doctor');
	}

	//DELETE DATA OF MEDICINE FROM FARMACY
	public function delete_medicine($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pharmacie');
	}


	//EDIT MEDICINE IN PHARMACY
	public function edit_medicine($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('pharmacie', $data);
	}


	//INSERT MEDICINE DATA TO DATABASE
	public function add_medicine($data)
	{
		$this->db->insert('pharmacie', $data);
	}


	//INSERT RESULT OF PATIENT TO DATABASE AND FOLDER
	public function store_file_data($data){
		$insert_data['fullname'] = $data['fullname'];
		$insert_data['dos'] = $data['dos'];
		$insert_data['file'] = $data['file'];

		$query = $this->db->insert('result', $insert_data);
	}

}
