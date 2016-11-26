
<?php
 echo '<div class="col-md-12"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
Add User
</button></div><br/><br/>';
show_user_data();
 ?>
<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add User</h4>
      </div>
      <div class="modal-body">
            <h2>Add new users here</h2>
            <form method="post" action="functions/addUser.php">    
            <input class="form-control"type="text" name="u_name" placeholder="Email" value=""><br/>
            <input class="form-control"type="text" name="first_name" placeholder="First Name" value=""><br/>
            <input class="form-control"type="text-area" name="last_name" placeholder="Last Name" value=""><br/>
            <input class="form-control"type="text" name="phone" placeholder="Phone" value=""><br/>

            Permission <br/>
            <select class="form-control" name="permission">
             <option value="Customer">Customer</option>
            <option value="CS">CS</option>
            <option value="Admin">Admin</option>
             </select>
           <br/>

            <button type="submit" class="btn btn-default" name="Submit" value= "Submit">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
