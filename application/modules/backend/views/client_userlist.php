<!-- page stylesheets -->
<link rel="stylesheet" href="<?php echo asset_url();?>vendor/datatables/media/css/dataTables.bootstrap4.css">


<!-- page stylesheets -->
<style>
td{font-size:0.9em;padding:5px 5px 5px 5px !important;text-align:center}
th{text-align:center}
hr{margin-bottom:0rem}
.icon-arrow-left {
	color:black;
}
</style>
<div class="content-view">
<div class="card">
<div class="card-header no-bg b-a-0">
<div class="dropdown pull-left " style="padding:3px 5px 4px 5px">
<H2>List Of User</H2>
</div>
<a href="<?php echo base_url();?>admin/add_client_user"><button class="btn bg-primary btn-sm pull-right no-radius">
<i class="fa fa-plus" aria-hidden="true"> </i> Users
</button></a>
<br>
<br>
<div class="card-block">
<table class="table table-bordered datatable" >
<thead>
<tr>
<th>Sr.No</th>
<th>First Name</th>
<th>Last Name </th>
<th>Email</th>
<th>Mobile</th>
<th>Role</th>
<th>Created Date</th>
<th>Action </th>
</tr>
</thead>
<tbody >
<?php

$sr=0;
foreach($client_userlist as $row) {
	$sr++;


	?>
<tr>
<td><?php echo $sr ; ?> </td>
<td> <?php echo $row['first_name'];?> </td>
<td> <?php echo $row['last_name'];?> </td>
<td> <?php echo $row['email'];?> </td>
<td> <?php echo $row['mobile'];?> </td>
<td> <?php if($row['user_role']==4) { echo "Subadmin"; } else if ($row['user_role']==5) { echo "Dispatcher"; } else { echo "FieldWorker"; } ?> </td>
<td> <?php echo (isset($row['created_date']) && !empty($row['created_date']))?date("d-m-Y", strtotime($row['created_date'])):'';?> </td>
<td style="padding-left:5px !important">
<a href="<?php echo base_url();?>admin/edit_clientuser/<?php echo $row['id'];?>" class="bg-green" style="margin:2px">&nbsp;&nbsp;<i class="fa fa-pencil text-white"></i>&nbsp;Edit&nbsp;&nbsp;</a>
</td>

<?php }?>
</tbody>

</table>
</div>
</div>
</div>
</div>
<script type="text/javascript">

</script>

   <!-- page scripts -->
    <script src="<?php echo asset_url();?>vendor/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo asset_url();?>vendor/datatables/media/js/dataTables.bootstrap4.js"></script>
    <script src="<?php echo asset_url();?>vendor/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
   

<!-- initialize page scripts -->
<!-- initialize page scripts -->
<script type="text/javascript">
$('.datatable').DataTable();
</script>
<!-- end initialize page scripts -->