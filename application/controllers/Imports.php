<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/ExpeditionSaga.php');

class Imports extends ExpeditionSaga
{
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "experimental";
        $this->load->helper('general');
    }

    public function csv($table = NULL, $fileName = "")
    {
        if ($table && $fileName) {
            $file = UPLOAD_PATH . "/imports/" . $fileName;
            if (file_exists($file)) {
                $file_handle = fopen($file, "r");
                while (($data = fgetcsv($file_handle, 1000, ",")) !== FALSE) {
                    $corporate = trim($data[0]);
                    $name = preg_replace('/[^a-zA-Z0-9\s]/', '', $data[1]);
                    $email = trim($data[2]);
                    $phone = trim($data[3]);

                    if ($name != "NULL") {
                        if (!strpos($name, "test") !== false) {
                            $this->db->insert("leads", [
                                'source_id' => 2,
                                'corporate' => $corporate,
                                'name' => $name,
                                'email' => trim($email),
                                'phone' => $phone
                            ]);
                        }
                    }
                }

                echo "Imported All your data!";
            } else {
                echo "There is no such file";
            }
        }
    }
}