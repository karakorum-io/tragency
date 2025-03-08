<?php
class Customer extends CI_Model
{
    const STATUS_ONBOARD = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_EXIT = 2;
    const STATUS_INACTIVE = 4;
    const TYPE = 1;
    const TABLE = "users";

    const STATUS = [
        self::STATUS_ONBOARD => "Onboarded",
        self::STATUS_ACTIVE => "Active",
        self::STATUS_EXIT => "Exited",
        self::STATUS_INACTIVE => "In Active"
    ];

    public function getAllCount()
    {
        return $this->db->select(' count(*) as records ')->from(self::TABLE)->order_by('id', 'DESC')->get()->row();
    }

    public function getAll($offset, $perPage)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'type' => self::TYPE,
            'is_deleted' => 0
        ])->order_by('id', 'DESC')->limit($offset, $perPage)->get()->result();
    }
}

?>