<?php
class User extends CI_Model {

    public $name;
    public $gender;
    public $phone;
    public $email;
	
	private $genders = array('M'=>'Masculino','F'=>'Feminino','O'=>'Outro');

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getAll(){
        $query = $this->db->get('users');
        $results = $query->result();
		
		if ($results){
			foreach ($results as $result){
				if ($result->gender){
					$result->gender = $this->genders[$result->gender];
				}
			}
		}
		return $results;
    }
	
    function getById($id){
		$id = filter_var($id,FILTER_VALIDATE_INT);
		if ($id){
			return $this->db->query("select * from users where id = {$id}")->row();
		} else {
			throw new Exception("Contato inválido");
		}
    }

    function insert($data){
		$this->name = filter_var($data->name,FILTER_SANITIZE_STRING);
		$this->gender = filter_var($data->gender,FILTER_SANITIZE_STRING);
		$this->phone = filter_var($data->phone,FILTER_SANITIZE_STRING);
		$this->email = filter_var($data->email,FILTER_VALIDATE_EMAIL);
		
		$errors = array();
		
		if (!$this->name){
			$errors[] = "Nome em branco ou inválido";
		}
		if (!$this->gender || !isset($this->genders[$this->gender])){
			$errors[] = "Sexo em branco ou inválido";
		}
		if (!$this->phone){
			$errors[] = "Telefone em branco ou inválido";
		}
		if (!$this->email){
			$errors[] = "Email em branco ou inválido";
		}
		
		if ($errors){
			throw new Exception(implode(", ",$errors));
		}
		
        if ($this->db->insert('users', $this)){
			return $this->db->insert_id;
		} else {
			throw new Exception("Erro ao inserir contato");
		}
    }

    function update($data)
    {
		$id = filter_var($data->id,FILTER_VALIDATE_INT);
		$this->name = filter_var($data->name,FILTER_SANITIZE_STRING);
		$this->gender = filter_var($data->gender,FILTER_SANITIZE_STRING);
		$this->phone = filter_var($data->phone,FILTER_SANITIZE_STRING);
		$this->email = filter_var($data->email,FILTER_VALIDATE_EMAIL);

		$errors = array();
		
		if (!$id){
			$errors[] = "Contato inválido";
		}
		if (!$this->name){
			$errors[] = "Nome em branco ou inválido";
		}
		if (!$this->gender || !isset($this->genders[$this->gender])){
			$errors[] = "Sexo em branco ou inválido";
		}
		if (!$this->phone){
			$errors[] = "Telefone em branco ou inválido";
		}
		if (!$this->email){
			$errors[] = "Email em branco ou inválido";
		}
		
		if ($errors){
			throw new Exception(implode(", ",$errors));
		}
		
        if ($this->db->update('users', $this, array('id' => $id))){
			return true;
		} else {
			throw new Exception("Erro ao atualizar contato");
		}
    }
	
	function remove($id){
		$id = filter_var($id,FILTER_VALIDATE_INT);
		
		$errors = array();
		
		if (!$id){
			$errors[] = "Contato inválido";
		}
		
		if ($errors){
			throw new Exception(implode(", ",$errors));
		}
		
        if ($this->db->where('id',$id)->delete("users")){
			return true;
		} else {
			throw new Exception("Erro ao deletar contato");
		}
	}

}