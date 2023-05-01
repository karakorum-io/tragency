<?php
class Lead extends CI_Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS = [
        '0' => "Dead",
        '1' => "Alive",
        '2' => "Emailed",
        '3' => "Called / Chat",
        '4' => "In Process",
        '5' => "Postponded",
        '6' => "Converted",
        '7' => "Not Interested"
    ];

    const TABLE = "leads";
    public function getAllCount($search_by="", $search="", $filter="")
    {
        $where = [];

        if($search_by !="" && $search !=""){
            $where[$search_by] = $search;
        }

        if($filter !=""){
            $where['status'] = $filter;
        }

        return $this->db->select(' count(*) as records ')->from(self::TABLE)->where($where)->order_by('id', 'DESC')->get()->row();
    }

    public function getAll($search_by="", $search="", $filter="", $offset, $perPage)
    {
        $where = [];

        if($search_by !="" && $search !=""){
            $where[$search_by] = $search;
        }

        if($filter !=""){
            $where['status'] = $filter;
        }
        
        return $this->db->select('*')->from(self::TABLE)->where($where)->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }

    public function getById($id)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'id' => $id,
        ])->get()->row();
    }

    public function activate_deactivate($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update(self::TABLE, ['status' => $status]);
        return;
    }

    public function create($data)
    {
        $this->db->insert(self::TABLE, $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update(self::TABLE, $data);
        return;
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id)->delete(self::TABLE);
        return;
    }

}

?>