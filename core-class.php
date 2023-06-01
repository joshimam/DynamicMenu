<?php class Members {
  private $db;

  public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=mamta', 'root', '');
  }

  public function getAll() {
    $stmt = $this->db->query('SELECT * FROM members');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

   public function InsertData($name=null,$parent_id=null) {
    $created_date=date('Y-m-d H:i:s');
    $sql = "INSERT INTO members (Name, ParentId,CreatedDate) VALUES (?,?,?)";
    $stmt= $this->db->prepare($sql);
    $status= $stmt->execute([$name,$parent_id,$created_date]);
    if ($status) {
    //echo 'It worked!';
    $id = $this->db->lastInsertId();
    return $id;
    } else {
    //echo 'It failed!';
    }
  }

  public function getById($id) {
    $stmt = $this->db->prepare('SELECT * FROM members WHERE ParentId <=> :fieldName;');
    $stmt->execute(['fieldName' => $id]);
    $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
    $list='';
    foreach($data as $key=>$val)
    {
       $list.="<li id=".$val['Id'].">".$val['Name'];
      $list.="</li>";
    }
    return $data;

     
  }
  public function getchilds($id) {
    $stmt = $this->db->prepare('SELECT * FROM members WHERE ParentId <=> :fieldName;');
    $stmt->execute(['fieldName' => $id]);
    $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
    $list='<ul id="'.$id.'">';
    if(count($data)>0) 
    {
     foreach($data as $key=>$val)
   
    {

       $list.="<li id=".$val['Id'].">".$val['Name'];
       $list.= $this->getchilds($val['Id']);
      $list.="</li>";
    }
  }
  $list.="</ul>";
    return $list;
}
  public function getchilds_parent($last_id=null,$parent_id=null) 
  {
    $stmt = $this->db->prepare('SELECT * FROM members WHERE ParentId <=> :fieldName AND Id <=> :id ');
    $stmt->execute(['fieldName' => $parent_id,'id'=>$last_id]);
    $data= $stmt->fetch(PDO::FETCH_ASSOC);
    $list='<ul id="'.$last_id.'">';
    if(count($data)>0) 
    {
     
       $list.="<li id=".$data['Id'].">".$data['Name'];
       $list.="</li>";
    }
  
    $list.="</ul>";
     echo $list;
     
  }

}
?>