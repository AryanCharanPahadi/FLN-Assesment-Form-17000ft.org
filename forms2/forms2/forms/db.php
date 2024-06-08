<?php

/*******NOTE DO NOT CHANGE ANY CODE*********
 BY SOURAV GUPTA 
 For help contact
 Email:soorugupta999@gmail.com
 Number:8368877631
*/
date_default_timezone_set("Asia/Kolkata"); 


class database {
    private $mysqli;
//Database connection
  public  function connection(){
      //Set Your credencial for db
        $mysqli ='';
        $db_user_name = "root";
        $db_user_password = "";
        $db_name = "demo";
        $this->$mysqli =    mysqli_connect ("localhost",$db_user_name,$db_user_password,$db_name);

        if($this->$mysqli){
           // echo "connected";
      
        }else{
            echo "DB Error";
            if ($this->$mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $this->$mysqli -> connect_error;
                exit();
              }
        }
    }
    
 //select funcion take 4 arugment 'table attribute', 'table name', 'where condition(array)'(optional) 'console For debug'(optional)
    function select($select="",$table="",$where=[],$console=false){
        $this->connection();
        $mysqli ='';
        if(empty($select)){
            echo "<b>ARGUMENT ERROR</b> -> Attribute  Missing";
            exit();
        }
        if(empty($table)){
            echo "<b>ARGUMENT ERROR </b> -> Table Name  Missing";
            exit();
        }


        if(isset($where) && !$where == ''){
            $array = $where;
            
            foreach($array as $key => $val){
                $condition[]= '`'.$key.'`'.'='."'".filter_var($val,FILTER_SANITIZE_STRING)."' ";
            }
            $where = 'WHERE '.implode("AND",$condition);

        }else{ $where ='';}

            $query="SELECT $select FROM $table $where  ";
            
               
            $run= mysqli_query($this->$mysqli,$query);
            
            if($console){ return $query."<br>";}

        if($run){
            $arr = array();
            while($data = mysqli_fetch_assoc($run)){
                $arr[] = $data;
         
            }
              
            if(empty($arr)){ 
                        if($console){ echo "Data Not Found<br>";}else{return false;}
                        }
                 else{ return $arr;}
         }else{
                 if($console){ echo "SQL ERROR<br>";}else{return false;}
              }
         
              $this->$mysqli -> close();


    }
    
   //insert funcion take 3 arugment  'table name','table data(array)'console For debug'(optional) 
    function insert($table="",$array_data=[],$console=false){
        $this->connection();
        $mysqli='';
        if(empty($array_data)){
            echo "<b>ARGUMENT ERROR</b> -> Data  Missing";
            exit();
        }
        if(empty($table)){
            echo "<b>ARGUMENT ERROR </b> -> Table Name  Missing";
            exit();
        }
        $keys = $array_data;
        foreach( array_keys($keys) as $key){
            $array[] ='`'.$key.'`';
        
        } 
        foreach( $keys as $value){
            $key_value[] ="'$value'";
        
        }
        $user_data = implode(',',$key_value);
        

        $attribute = implode(',',$array);
        $query ="INSERT INTO `$table`($attribute) VALUES ($user_data) ";
        //For Print Query on Page
        if($console){ echo $query."<br>";}
        $run= mysqli_query($this->$mysqli,$query);
        if($run){
          
            if($console){ echo "Data Insert<br>";}else{return true;}
             }else{
               
                if($console){ echo "SQL ERROR<br>";}else{return false;}
             }
        
             $this->$mysqli -> close();
    }
    //Update funcion take 4 arugment  'table name','Data for Upadte (array)''where condition(array)'(optional)console For debug'(optional)
    function update($table="",$set="",$where=[],$console=false){
        $this->connection();
        $mysqli='';
        if(empty($set)){
            echo "<b>ARGUMENT ERROR</b> -> Data  Missing";
            exit();
        }
        if(empty($table)){
            echo "<b>ARGUMENT ERROR </b> -> Table Name Missing";
            exit();
        }
        if(empty($where)){
            echo "<b>ARGUMENT ERROR </b> -> Where Condition Missing";
            exit();
        }
         $set = $set;
         foreach($set as $key => $val){
             $sets[]= '`'.$key.'`'.'='."'".filter_var($val,FILTER_SANITIZE_STRING)."'";
         }
         $set = implode(",",$sets);

        if(isset($where) && !$where == ''){
            $array = $where;
            foreach($array as $key => $val){
                $condition[]= '`'.$key.'`'.'='."'".$val."' ";
            }
            $where = 'WHERE '.implode("AND",$condition);  
            } else{ $where ='';}
           $query="UPDATE `$table` SET $set $where";
           if($console){ echo $query."<br>";}
            $run= mysqli_query($this->$mysqli,$query);
            if($run){
          
                if($console){ echo "Data Update<br>";}else{return true;}
                 }else{
                   
                    if($console){ echo "SQL ERROR<br>";}else{return false;}
                 }
                 $this->$mysqli -> close();
       }
       //Delete funcion take 3 arugment  'table name','where condition(array)'(optional)console For debug'(optional)
       function delete($table,$where=[],$console=false){
        $this->connection();
        $mysqli ='';
        if(empty($table)){
            echo "<b>ARGUMENT ERROR </b> -> Table Name Missing";
            exit();
        }
        // if(empty($where)){
        //     echo "<b>ARGUMENT ERROR </b> -> Where Condition Missing";
        //     exit();
        // }
        if(isset($where) && !$where == ''){
            $array = $where;
            foreach($array as $key => $val){
                $condition[]= '`'.$key.'`'.'='."'".$val."' ";
            }
            $where = 'WHERE '.implode("AND",$condition);
            } else{ $where ='';}
             $query ="DELETE FROM `$table` $where";
             if($console){ echo $query."<br>";}
            $run= mysqli_query($this->$mysqli,$query);
            if($run){
          
                if($console){ echo "Data Deleted<br>";}else{return true;}
                 }else{
                   
                    if($console){ echo "SQL ERROR<br>";}else{return false;}
                 }
                 $this->$mysqli -> close();
       }
       //Is_Duplicate function take 3 arugment  'table name','where condition(array)'(optional),console For debug'(optional)
       function Is_Duplicate($table="",$where=[],$console=false){
        if(empty($table)){
            echo "<b>ARGUMENT ERROR </b> -> Table Name Missing";
            exit();
        }
        if(empty($where)){
            echo "<b>ARGUMENT ERROR </b> -> Where Condition Missing";
            exit();
        }
            if($this->select('*',$table,$where,$console)){
                    if($console){ 
                       echo $this->select('*',$table,$where,$console);
                    }else{return true;}
            }else{
                if($console){ echo "Data Not Found<br>";}else{return false;}
            }
   
    }
    //set_session function take 1 arugment  array for set seesion
    function set_session($session){
         if($session == 'Array ( )' || $session =='' ){ return false;}
            $count =0; 
            foreach($session as $key => $val ){ 
                $item_array[$count] = array(
                   $key => $val 
                );
                $count++;
                }
               
            $_SESSION["user_data"] = $item_array;
            return true;
            
            
        }
         //custom_select function take 2 arugment  String Query, console For debug'(optional)
        function custom_select($string="",$console=false){
            $this->connection();
            $mysqli='';
        if(empty($string)){
            echo "<b>ARGUMENT ERROR</b> -> String  Missing";
            exit();
        }
       
           $query = $string;
           
           $run= mysqli_query($this->$mysqli,$query);
           
            if($console){ echo $query."<br>";}

        if($run){
            $arr = array();
            while($data = mysqli_fetch_assoc($run)){
                $arr[] = $data;
         
            }
                
            if(empty($arr)){ 
                        if($console){ echo "Data Not Found<br>";}else{return false;}
                        }
                 else{ return $arr;}
         }else{
                 if($console){ echo "SQL ERROR<br>";}else{return false;}
              }
              $this->$mysqli -> close();
       }

       //search function in db
       function search($table,$keys,$val){
       
        foreach($keys as $key ){
            $data = $this->custom_select("SELECT * FROM `$table` WHERE $key'$val'");
            
           if(empty($data)){continue;}
           
           
            $values = array();
            foreach($data as $item){
                $values[] = $item;
            }
        }
        return $values;   
    }

    //random function take lenght of random string you want
            function random($length_of_string){

                $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                return substr(str_shuffle($str_result),0, $length_of_string);
        } 
// advance version of header function take 3 argument Page name,variable name(Optional) And message(Optional)
        function header($page='',$var='',$message=''){
            if(empty($page)){
                echo "<b>ARGUMENT ERROR </b> -> Page Name Missing";
                exit();
            }
            if(!empty($var)){
                if(empty($message)){
                    echo "<b>ARGUMENT ERROR </b> -> Message Missing";
                    exit();
                }
                $var = '?'.$var.'='.$message;
            }
            header('location:'.$page.'.php'.$var);
        }
        
        //remove duplicate value in array on specific attribute
        function unique_multidim_array($array, $key) {
            $temp_array = array();
            $i = 0;
            $key_array = array();
           
            foreach($array as $val) {
                if (!in_array($val[$key], $key_array)) {
                    $key_array[$i] = $val[$key];
                    $temp_array[$i] = $val;
                }
                $i++;
            }
            return $temp_array;
          }
        
        // For return respones in json API
        function api($data){
         $status =  $data?1:0;
         $data =  $data?$data:NULL;
            $response = json_encode(array('status'=>$status,'data'=>$data));
            header('Content-Type: application/json');
        	return $response;
        }
        function alert($message){
           $script ='<script> alert("'.$message.'"); </script> ';
            echo $script;
            
        }
        function now($format=''){
            if(empty($format)){
                $dateFormat = date('Y-m-d');    
            }else{
                $date =date('Y-m-d');
                $dateFormat = date($format,strtotime($date));
            }
               return $dateFormat;
            
        }
        
        function Check_TourBudget_AND_TourDa($tourid){
   
    $tourBudgetTotal=$tourDatotal=0;
     $TB = $this->select('`datefrom`,`dateto`,`daily_allowance`,`vist_staff`','tour_budget',array('tour_id'=>$tourid));
      $TD = $this->select('`tour_start_date`,`tour_end_date`,`total_tour_da`,`emp_name`','tour_da',array('tourid'=>$tourid));
     
     $TBEN = explode(',',$TB[0]['vist_staff']);
     $fullName=array();
     foreach($TBEN as $id){
        $empname = array();
        $firstName=$midName=$lastName='';
        $empname =   $this->select('*','employee_details',array('employee_id'=>$id));
        $EMP = $empname[0];
        $firstName  = !empty($EMP['first_name'])?' '.$EMP['first_name']:'';
        $midName    = !empty($EMP['middle_name'])?' '.$EMP['middle_name']:'';
        $lastName   = !empty($EMP['last_name'])?' '.$EMP['last_name']:'';
        $TDfullName[]   = $firstName.$midName.$lastName;
     }
     foreach($TD as $val){
         $TDfullName[] = $val['emp_name'];
     }
    $TDfullName = array_unique($TDfullName);
     foreach($TB as $val){
         $tourBudgetTotal += $val['daily_allowance'];
     }
     foreach($TD as $val){
         $tourDatotal = $val['total_tour_da'];
     }
    
    
    $MATCH = false;
    // check match for Tour id
    if($TB[0]['tour_id']==$TD[0]['tour_id']){ $MATCH = true;}else{  $MATCH = false; }
    // check match for emplyes
    if(array_intersect($TDfullName,$TDfullName)){$MATCH = true;}else{$MATCH = false;}
    // check match for date
    if(($TB[0]['datefrom']==$TD[0]['tour_start_date']) and ($TB[0]['dateto']==$TD[0]['tour_end_date'])){$MATCH = true;}else{$MATCH = false;}
    // check match for DA
    if($tourDatotal==$tourBudgetTotal){$MATCH = true;}else{$MATCH = false;}
    
    
    if($MATCH){
        return "Matched";
    }else{
        return "Not Matched";
    }

}

function getEmpolyeeNameById($empId,$table="employee_table"){
         $emp = $this->select('*',$table,['employee_id'=>$empId]);
           $first = !empty($emp[0]['first_name'])?' '.$emp[0]['first_name']:'';
           $mid = !empty($emp[0]['middle_name'])?' '.$emp[0]['middle_name'].' ':'';
           $last = !empty($emp[0]['last_name'])?' '.$emp[0]['last_name']:'';
           $full = $first.$mid.$last; 
           $cleanedString = preg_replace('/\s+/', ' ', $full);
           return $cleanedString;
    }
    function getFunderNameById($funderId){
       $name =  $this->select('`entity_name`','funder_master',['funder_id'=>$funderId]); 
           return $name[0]['entity_name'];
    }
    function getSchoolById($id){
       $name =  $this->select('`SCHOOL_NAME`','school_basic',['school_pid'=>$id]); 
           return $name[0]['SCHOOL_NAME'];
    }
    function getProgramById($id){
       $name =  $this->select('`program`','program_master',['program_id'=>$id]); 
           return $name[0]['program'];
    }
    
    function printer(array $arr,$exit=false){
        echo "<pre>";
        print_r($arr);
        $exit?exit:'';
    }
    
    function validate(array $collection,$array){
       
        foreach($array as $key){
            if(empty($collection[$key])){
                return json_encode(['message'=>"$key is required *"]);
            }else{
                return true;                      
            }
        }
    }
    
    function custom_mail($to,$cc='',$bcc='',$subject='',$message=''){
       
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <mis_admin@17000ft.org>' . "\r\n";
        if(!empty($cc)){ 
             $headers .= "Cc: $cc" . "\r\n";
        }
        if(!empty($bcc)){ 
             $headers .= "Bcc: $bcc" . "\r\n";
        }
        try{
             if(mail($to , $subject , $message, $headers)){
                
                    return true;
             }else{
                 return false;
             }
        }catch(Exception $e){
            return false;
        }
    }
    
    function searchQuery($fields, $searchTerm) {
            $whereClauses = [];
            foreach ($fields as $field) {
                $whereClauses[] = "$field LIKE '%$searchTerm%'";
            }
            $whereClause = implode(' OR ', $whereClauses);
            return $whereClause;
        }
   
    }
    

 

 $obj = new database();
 ?>
