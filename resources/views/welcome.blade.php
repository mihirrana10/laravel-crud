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
  
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title" style="font-size:25px">Category List</h3>
                            </div>
                            <div class="col-md-3">
                              
                                
                            </div>
                            <div class="col-md-3">
                                <label style="float:right">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New Category</button>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="box-body table-responsive no-padding">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($ecomarr as $ecom)
                                <tr>
                                          <td scope="col">{{$ecom->id}}</td>
                                          <td scope="col">{{$ecom->category_name}}</td>
                                          <td scope="col">{{$ecom->category_des}}</th>
                                            <td>  <img src="{{ url('public/user/img/'.$ecom->category_image)}}"
                                              style="height: 80px; width: 100px;"></td>
                                          <td>
                                        <a class="btn btn-success" class="btn btn-info" 
                                         href="edit/{{$ecom->id}}">
                                          <em class="fa fa-pencil"></em></a>
                                        <a class="btn btn-danger confirm-delete" href="ecom_delete/{{$ecom->id}}"><em class="fa fa-trash-o"></em></a>
                                    </td>
                                        </tr>
                                    
                                  
                                  @endforeach() 

                          
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- /.container-fluid -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('footer')

  <!-- Control Sidebar -->
@include('layout')

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('footerfile')

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <!-- Add Modal Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box box-primary">
                                <form role="form" method="post" action="submit"  enctype="multipart/form-data" >
                                      @csrf
                                    <div class="box-body">
                                            <div class="form-group">
                                                        <label>Category Name</label>
                                                        <input class="form-control" id="txt_category_name" name="txt_category_name">
                                            </div>
                                            <div class="form-group">
                                                        <label>Category Description</label>
                                                    <input class="form-control" id="txt_category_des" name="txt_category_des">
                                            </div>
                                            <div class="image">
                                              <label >Add image</label>
                                              <input type="file" class="form-control" name="txt_category_image"  required >
                                            </div>
                                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </form>
                            </div></div>
                        
                    </div>
                <!-- Add Modal Form Ends -->
            </div>
          <!--<div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>-->
        </div>

      </div>
    </div>

    {{-- <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
                <!-- Edit Modal Form -->
                    <div class="row">
                        <div class="col-lg-12" id="edit_div">
                          @foreach ($ecomarr as $ecom)  
                            <form method="post" action="../update/{{$ecom->id}}"  enctype="multipart/form-data" >
                              @csrf
                              
                  <div class="form-group">
                    <label > Category Name</label>
                    <input type="text" name="txt_category_name" class="form-control"  id="txt_category_name" 
                    placeholder="Name" value="{{$ecom->category_name}}">
                  </div>
                  <div class="form-group">
                    <label > Category Description</label>
                    <input type="text" name="txt_category_des" class="form-control"  id="txt_category_des" 
                  placeholder="Description" value="{{$ecom->category_des}}">
                  </div>
    
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach

                        </div>
                    </div>
                <!-- Edit Modal Form Ends -->
            </div>
          <!--<div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>-->
        </div>

      </div>
    </div> --}}
</body>
</html>

