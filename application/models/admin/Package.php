<?php
class Package extends CI_Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS = [
        '0' => "Inactive",
        '1' => "Active"
    ];

    const TABLE = "packages";
    public function getAllCount()
    {
        return $this->db->select(' count(*) as records ')->from(self::TABLE)->order_by('id', 'DESC')->get()->row();
    }

    public function getAll($offset, $perPage)
    {
        return $this->db->select('*')->from(self::TABLE)->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }

    public function getById($id)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'id' => $id,
        ])->get()->row();
    }
    public function getActiveRec($offset, $perPage)
    {
        return $this->db->select('*')->from(self::TABLE)->where(['status' => 1])->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }
    public function get_data($where = "")
    {
        
        $sql = "SELECT * FROM " . self::TABLE . " WHERE 1=1" . " " . $where . " ";

        $query = $this->db->query($sql);
        
            return $query->result();
        
    }
    public function get_banner($where = "")
    {
        
        $sql = "SELECT image FROM " . self::TABLE . " WHERE 1=1" . " " . $where . " ORDER BY  RAND() LIMIT 5";

        $query = $this->db->query($sql);
        
            return $query->result();
        
    }
    public function get_duration()
    {
        
        return $this->db->select('DISTINCT(duration)')->from(self::TABLE)->where(['status' => 1])->order_by('duration', 'DESC')->get()->result();
        
    }
    public function getBySlug($slug)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'slug' => $slug,
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