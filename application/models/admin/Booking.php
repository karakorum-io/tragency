<?php
class Booking extends CI_Model
{

    const STATUS = [
        '0' => "Booked",
        '1' => "Confirmed",
        '2' => "Processed",
        '3' => "Completed",
        '4' => "Issues",
        '5' => "Cancelled",
        '6' => "Archived"
    ];
    
    const TABLE = "bookings";
    public function getAllCount()
    {
        return $this->db->select(' count(*) as records ')->from(self::TABLE)->order_by('id', 'DESC')->get()->row();
    }
    public function getAllCountByEmail($email)
    {
        return $this->db->select(' count(*) as records ')->from(self::TABLE)->where('email',$email)->order_by('id', 'DESC')->get()->row();
    }

    public function getAll($offset, $perPage)
    {
        return $this->db->select('*')->from(self::TABLE)->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }
    public function getAllByEmail($email,$offset, $perPage)
    {
        return $this->db->select('*')->from(self::TABLE)->where('email',$email)->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }
     public function getById($id)
    {
        return $this->db->select('*')->from(self::TABLE)->where('id', $id)->get()->row();
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
    
}

?>