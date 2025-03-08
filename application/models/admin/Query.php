<?php
class Query extends CI_Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS = [
        '0' => "Un Answered",
        '1' => "Answered"
    ];
    const TYPE = [
        '1' => "General",
        '3' => "Personalized Tour"
    ];
    const TABLE = "queries";

    public function getAllCount()
    {
        return $this->db->select(' count(*) as records ')->from(self::TABLE)->order_by('id', 'DESC')->get()->row();
    }

    public function getAll($offset, $perPage)
    {
        return $this->db->select('*')->from(self::TABLE)->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }
    public function create($data)
    {
        $this->db->insert(self::TABLE, $data);
        return $this->db->insert_id();
    }
    public function getbyid($id)
    {
        return $this->db->select('*')->from(self::TABLE)->where('id', $id)->get()->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete(self::TABLE);
        return;
    }

    public function activate_deactivate($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update(self::TABLE, ['status' => $status]);
        return;
    }
}

?>