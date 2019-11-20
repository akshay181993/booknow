<?php 

class Common_model extends CI_Model
{
	public function all_delete($id,$name)
    {
        $this->db->delete($name, array('id' => $id));
    	return true;
    }

    public function all_status($id,$name,$model)
    {
        if($name == 'active')
        {
            $data = array( 
                'status'      => 1,
            );

            $this->db->where('id', $id);

            $this->db->update($model, $data);
        }else{
            $data = array( 
                'status'      => 0,
            );

            $this->db->where('id', $id);
            $this->db->update($model, $data);
        }
        return true;
    }
}

?>