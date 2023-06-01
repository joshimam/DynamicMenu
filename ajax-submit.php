<?php 
 include('core-class.php'); 
 $createobj= new Members();
 if(isset($_POST))
 {
   $name=$_POST['name'];
   $parent_id=$_POST['parent_name'];
 }
 $data_p= $createobj->InsertData($name,$parent_id);
 $new_data= $createobj->getchilds_parent($data_p,$parent_id);
  echo $new_data;die;

?>