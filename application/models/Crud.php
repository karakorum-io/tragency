<?php
   class Crud extends CI_Model
   {


      function get($tbl,$whr)
      {
          $this->db->select('*');
         $this->db->from($tbl);
          $this->db->where($whr);
         return $query = $this->db->get();
      }
      
      function insert($tbl,$data)
      {
       return $q=$this->db->insert($tbl,$data);
      }
      
      function update($tbl,$data,$wher)
	  {
		return $this->db->where($wher)->update($tbl,$data);
	  }
	  
	  function delete($tablnm,$where)
      {
      return $this->db->delete($tablnm, $where);
      }
        function sendsms($mob,$messg)
      {
    $url = "http://a2pservices.in/api/mt/SendSMS?user=info@investalley.in&password=123456&senderid=INVALY&channel=Trans&DCS=0&flashsms=0&number=$mob&text=$messg&route=3&PEId=1201162451687950041";
   $url = preg_replace("/ /", "%20", $url);
    return $response = file_get_contents($url);
      }
      
    public function get_data($table = "", $and = "", $columns = "*", $return_arr = "full", $join = "", $groupby = "", $orderby = "", $limit = "")
    {
        // $orderby = "DESC";
        $columns = ($columns == "" ? "*" : $columns);
        $sql = "SELECT " . $columns . " FROM " . $table . " " . $join . " WHERE 1=1" . " " . $and . " " . $groupby . " " . $orderby . " " . $limit;

        $query = $this->db->query($sql);
        
            return $query;
        
    }
     
    public function add_data($table, $data)
    {
        $this->db->insert($table, $data);
        $InsId = $this->db->insert_id();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
        } else {
            return $InsId;
        }
    }
     public function tour_price($id,$type)
    {
         $sql = "SELECT * FROM tour_price WHERE option_id = '$id' and type = '$type' ORDER BY id asc";
        $query = $this->db->query($sql);
            return $query;
    }
      public function tour_type_price($id,$type,$cnt)
    {
          $query = $this->db->query("SELECT * FROM tour_price WHERE option_id = $id and type = '$type' and ((max >= '$cnt' and min <= '$cnt')  or max = '$cnt' or min = '$cnt') ORDER BY id asc");
      if($query->num_rows()>0){
          return $query->result()[0]->price;
      }else{
         return 'not_found';
      }
      
    }
    public function destination($id)
    {
          $query = $this->db->query("SELECT name,latitude,longitude FROM category WHERE id = $id ");
      if($query->num_rows()>0){
          return $query->result()[0];
      }else{
         return '';
      }
      
    }
     
    public function money($num)
    {
     
$explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
} 

   
   
   }