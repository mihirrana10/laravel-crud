<!DOCTYPE html>
<html>

@include('hederfile')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('hedar')
  <!-- Left side column. contains the logo and sidebar -->
@include('sidemenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <a type="button" class="close" href="/">Back</a>
              <h4 class="modal-title">Edit Category</h4>
          </div>
          <div class="modal-body">
              <!-- Edit Modal Form -->
                  <div class="row">
                      <div class="col-lg-12" id="edit_div"> 
                        {{-- @foreach ($ecomarr as $ecom)   --}}
                          <form method="post" action="../update/{{$ecomarr->id}}"  enctype="multipart/form-data" >
                            @csrf
                            
                <div class="form-group">
                  <label > Category Name</label>
                  <input type="text" name="txt_category_name" class="form-control"  id="txt_category_name" 
                  placeholder="Name" value="{{$ecomarr->category_name}}">
                </div>
                <div class="form-group">
                  <label > Category Description</label>
                  <input type="text" name="txt_category_des" class="form-control"  id="txt_category_des" 
                placeholder="Description" value="{{$ecomarr->category_des}}">
                </div>
  
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </form>
              {{-- @endforeach --}}

                      </div>
                  </div>
              <!-- Edit Modal Form Ends -->
          </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>

   
</div>
<!-- /.content-wrapper -->
@include('footer')

<!-- Control Sidebar -->
@include('layout')

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('footerfile')