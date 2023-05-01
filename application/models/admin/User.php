<?php
class User extends CI_Model
{

    const STATUS_ONBOARD = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_EXIT = 2;
    const STATUS_INACTIVE = 4;
    const STATUS = [
        self::STATUS_ONBOARD => "Onboarded",
        self::STATUS_ACTIVE => "Active",
        self::STATUS_EXIT => "Exited",
        self::STATUS_INACTIVE => "In Active"
    ];

    const TABLE = "users";
    const TYPE = 2;

    public function __construct()
    {
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

    public function getAll()
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'type' => self::TYPE,
            'is_deleted' => 0
        ])->get()->result();
    }

    public function getUserByCreds($username, $password)
    {
        return $this->db->select('*')
            ->from(self::TABLE)
            ->group_start()
            ->where('email', $username)
            ->or_where('phone', $username)
            ->group_end()
            ->where('password', md5($password))
            ->get()->result();
    }

    public function getById($id)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'id' => $id,
            'type' => self::TYPE
        ])->get()->row();
    }
    public function getByEmail($email)
    {
        return $this->db->select('*')->from(self::TABLE)->where([
            'email' => $email
        ])->get()->row();
    }

    public function activate_deactivate($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update(self::TABLE, ['status' => $status]);
        return;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update(self::TABLE, ['is_deleted' => 1]);
        return;
    }
}

?>