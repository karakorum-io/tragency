<?php
class Tour_option extends CI_Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS = [
        '0' => "Inactive",
        '1' => "Active"
    ];

    const TABLE = "availability";
    public function getAllCount()
    {
        return $this->db->select(' count(*) as records ')->from(self::TABLE)->order_by('id', 'DESC')->get()->row();
    }

    public function getAll($tour_id)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'tourid' => $tour_id,
        ])->order_by('id', 'DESC')->get()->result();
    }
    public function getAll_active($tour_id)
    {
         return $this->db->select('*')->from(self::TABLE)->where([
            'tourid' => $tour_id,'status' => 1
        ])->order_by('id', 'DESC')->get()->result();
    }
    public function getActiveRec($offset, $perPage)
    {
        return $this->db->select('*')->from(self::TABLE)->where(['status' => 1])->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }

    public function getById($id)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'id' => $id,
        ])->get()->row();
    }

    public function activate_package($id, $status)
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