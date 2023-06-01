
<?php
include('core-class.php');

$createobj= new Members();
$id=null;
 $list="<ul id=0>";
$data_p= $createobj->getById($id);
foreach($data_p as $data_val=>$val)
{
   $list.="<li id=".$val['Id'].">".$val['Name'];
    $list.= $createobj->getchilds($val['Id']);
       $list.="</li>";
}
  $list.="</ul>";

  echo $list;
?>
<html>
<title>The Test</title>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>
  $(document).ready(function () {
    $("#save-change").click(function(ev) {
            var form = $("#member-data");
            var url = form.attr('action');
            var current_id= $('#parent').find(":selected").val();
            var letters = /^[A-Za-z]+$/;
            if($('#name').val()=='')
            {
              alert('The Field is Empty');
              return false;
            }
            else
            {
              if($('#name').val().match(letters))
              {
                 $.ajax({
                      type: "POST",
                      url: url,
                      data: form.serialize(),
                      success: function(data) {
                        console.log(data);
                        alert(data);
                            $('#'+current_id).append(data);
                            $('#myModal').modal('hide');
                      },
                      error: function(data) {
                          alert("There is some Problem");
                      }
                  });
                }
                else
                {
                  alert('Accept only string');
                  return false;
                }
        }
        });
  
});
   </script>
  </head>
<body>
<div><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Add Member</button>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Member</h4>
        </div>
        <div class="modal-body">
          <form action="ajax-submit.php" id="member-data" method="POST">
            <div class="form-group">
            <label>Parent</label>
            <select class="form-control form-control-sm" id="parent" name="parent_name">
              <option value="">--Members
              </option>
              <?php foreach($createobj->getAll()  as $member=>$member_val)
              {?>
                <option value="<?php echo $member_val['Id']?>"><?php echo $member_val['Name']?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
              <label>Name:</label>
              <input type="text" name="name" value="" class="form-control form-control-sm" id="name" required />
            </div>
            
          </form>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="save-change">Save Changes</button>
        </div>
      </div>
      
    </div>
  </div>

</div>

  </body>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>