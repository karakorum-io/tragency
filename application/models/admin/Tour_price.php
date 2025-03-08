<?php
class Tour_price extends CI_Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS = [
        '0' => "Inactive",
        '1' => "Active"
    ];

    const TABLE = "tour_price";
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
    
    public function getAdultbyOid($oid)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'option_id' => $oid,'type' => 'adult',
        ])->order_by('id', 'DESC')->get()->result();
    }
    public function getChildbyOid($oid)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'option_id' => $oid,'type' => 'child',
        ])->order_by('id', 'DESC')->get()->result();
    }
    public function get_option_price($id,$type,$cnt)
    {
        
        $sql = "SELECT * FROM " . self::TABLE . " WHERE option_id = $id and type = '$type' and ((max >= '$cnt' and min <= '$cnt')  or max = '$cnt' or min = '$cnt') ORDER BY id asc";

        $query = $this->db->query($sql);
        $query->result();
        if($query->num_rows()>0){
          return $query->result()[0]->price;
      }else{
         return '0';
      }
    }
    

    public function getById($id)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'id' => $id,
        ])->get()->row();
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
     public function deletebyOid($oid)
    {
        $this->db->where('option_id', $oid)->delete(self::TABLE);
        return;
    }

}

?>