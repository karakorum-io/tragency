<?php

if (!function_exists('respondSuccess')) {
    function respondSuccess($payload)
    {
        echo json_encode([
            'success' => true,
            'payload' => $payload
        ]);
        exit();
    }
}

if (!function_exists('respondError')) {
    function respondError($payload)
    {
        echo json_encode([
            'success' => false,
            'payload' => $payload
        ]);
        exit();
    }
}

if (!function_exists('getCountries')) {
    function getCountries($db)
    {
        $countires = $db->select('id, name')->from('countries')->order_by('name', 'ASC')->get()->result();
        return $countires;
    }
}

if (!function_exists('getCountryName')) {
    function getCountryName($db, $countryId)
    {
        $name = $db->select('name')->from('countries')->where(['id' => $countryId])->get()->row();
        return $name->name;
    }
}

if (!function_exists('getStates')) {
    function getCountryStates($db, $countryId)
    {
        $states = $db->select('id, name')->from('states')->where([
            'country_id' => $countryId
        ])->order_by('name', 'ASC')->get()->result();
        return $states;
    }
}

if (!function_exists('getStateName')) {
    function getStateName($db, $stateId)
    {
        $name = $db->select('name')->from('states')->where(['id' => $stateId])->get()->row();
        return $name->name;
    }
}

if (!function_exists('getUserNameById')) {
    function getUserNameById($db, $id)
    {
        if ($id) {
            $name = $db->select('name')->from('users')->where(['id' => $id])->get()->row();
            return $name->name;
        } else {
            return "";
        }
    }
}
if (!function_exists('getDesById')) {
    function getDesNameById($db, $id)
    {
        $name = $db->select('name')->from('destinations')->where(['id' => $id])->get()->row();
        if ($name) {
            return $name->name;
        } else {
            return "";
        }

    }
}
if (!function_exists('getDesById')) {
    function getDesById($db, $id)
    {
        $name = $db->select('*')->from('destinations')->where(['id' => $id])->get()->row();
        if ($name) {
            return $name;
        } else {
            return "";
        }

    }
}
if (!function_exists('getAllDestination')) {
    function getAllDestination($db)
    {

        return $db->select('*')->from('destinations')->where([
            'status' => 1,
        ])->order_by('id', 'DESC')->get()->result();


    }
}
if (!function_exists('convertPrice')) {
    function convertPrice($original, $rate)
    {
        $converted = $original * $rate;
        $converted = round($converted, 2);
        return $converted;


    }
}

if (!function_exists('getLeadSources')) {
    function getLeadSources($db)
    {
        $sources = $db->select('id,name')->from('lead_sources')->where(['status' => 1])->get()->result();
        return $sources;
    }
}

if (!function_exists('getSourceName')) {
    function getSourceName($db, $id)
    {
        if ($id) {
            $name = $db->select('name')->from('lead_sources')->where(['id' => $id])->get()->row();
            return $name->name;
        } else {
            return "";
        }
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($path, $file)
    {
        $uploadPath = base_url() . UPLOAD_PATH;
        echo $uploadPath;
        die("Here");
    }
}

if (!function_exists('getConfig')) {
    function getConfig($db, $configName)
    {
        if ($configName) {
            $value = $db->select('value')->from('configurations')->where(['key' => $configName])->get()->row();
            return $value->value;
        } else {
            return "";
        }
    }
}

if (!function_exists('getCMSMedia')) {
    function getCMSMedia($db, $id)
    {
        $medias = $db->select('*')->from('cms_media')->where(['cms_id' => $id, 'status' => 1])->get()->result();
        return $medias;
    }
}

if (!function_exists('deleteCMSMedia')) {
    function deleteCMSMedia($db, $id)
    {
        $db->query("DELETE FROM cms_media WHERE cms_id IN (" . $id . ")");
    }
}

if (!function_exists('getCMSMediaById')) {
    function getCMSMediaById($db, $id)
    {
        $media = $db->select('*')->from('cms_media')->where(['id' => $id, 'status' => 1])->get()->row();
        return $media;
    }
}

if (!function_exists('getcontentByNeedle')) {
    function getcontentByNeedle($db, $needle)
    {
        $cms = $db->select('*')->from('cms')->where(['needle' => $needle, 'status' => 1])->get()->result();
        
        $contents = [];
        $index = 0;
        foreach ($cms as $data) {
            $contents[$index]['title'] = $data->title;
            $contents[$index]['sub_title'] = $data->sub_title;
            $contents[$index]['short_description'] = $data->short_description;
            $contents[$index]['description'] = $data->description;
            $contents[$index]['media'] = getCMSMedia($db, $data->id);

            $index++;
        }

        if(!empty($contents) > 0){
            return $contents;
        }

        return [];
    }
}

if (!function_exists('sendCurlRequest')) {
    function sendCurlRequest()
    {
        echo "Send curl request function";
    }
}