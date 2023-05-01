<?php
class Setting extends CI_Model
{
    const TABLE = "settings";

    public function getAll()
    {
        return $this->db->select('*')->from(self::TABLE)->get()->row();
    }
     public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update(self::TABLE, $data);
        return;
    }
}

?>