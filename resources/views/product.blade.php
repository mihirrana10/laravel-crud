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
                                <h3 class="box-title" style="font-size:25px">Product List</h3>
                            </div>
                            <div class="col-md-3">
                              

                            </div>
                            <div class="col-md-3">
                                <label style="float:right">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New product</button>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="box-body table-responsive no-padding">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Image</th>
                                <th>Product Price</th>

                                <th>Action</th>
                            </thead>
                            <tbody>
                              
                                @foreach($proarr as $product)
                                <tr>
                                          <td scope="col">{{$product->id}}</td>
                                          <td scope="col">{{$product->product_name}}</td>
                                          <td scope="col">{{$product->product_des}}</td>
                                          

                                            <td>  <img src="{{ url('public/Image/'.$product->product_image) }}"
                                              style="height: 50px; width: 50px;"></td>
                                              <td scope="col">{{$product->product_price}}</td>
                                          <td>
                                        <a class="btn btn-success" class="btn btn-info" 
                                        data-toggle="modal" data-target="#editModal" onclick="{{$product->id}}">
                                          <em class="fa fa-pencil"></em></a>
                                        <a class="btn btn-danger confirm-delete" href="product_delete/{{$product->id}}"><em class="fa fa-trash-o"></em></a>
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
                <h4 class="modal-title">Add Product</h4>
            </div>
            <div class="modal-body">
                <!-- Add Modal Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box box-primary">
                                <form role="form" method="post" action="submitproduct" enctype="multipart/form-data" >
                                      @csrf
                                    <div class="box-body">
                                            <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input class="form-control" id="txt_product_name" name="txt_product_name">
                                            </div>
                                            <div class="form-group">
                                                        <label>Product Description</label>
                                                    <input class="form-control" id="txt_product_des" name="txt_product_des">
                                          </div>
                                          <div class="form-group">
                                            <label>Product Price</label>
                                        <input class="form-control" id="txt_product_price" name="txt_product_price">
                                       </div>
                                            <div class="form-group">
                                              <label >Add image</label>
                                              <input type="file" class="form-control"  name="txt_product_image">
                                            </div>
                                            <div class="form-group">
                                              <select name="cat_id">
                                                <option >Select Category</option>
                                                @foreach ($ecomarr as $item)

                                                <option value="{{$item->id}}">{{$item->category_name}}</option>

                                                    {{-- $sql = mysqli_query($conn, "SELECT * From category");  
                    
                                                    while($value = mysqli_fetch_array($sql))
                                                    {
                                                        echo "<option value='". $value['cat_id']."'>" .$value['cat_name'] ."</option>";  
                                                    }    --}}
                                                   
                                                 @endforeach
                                            </select>
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

    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Products</h4>
            </div>
            <div class="modal-body">
                <!-- Edit Modal Form -->
                    <div class="row">
                        <div class="col-lg-12" id="edit_div">
                          @foreach ($proarr as $hi)
                            <form method="post" action="../updateproduct/{{$hi->id}}"  enctype="multipart/form-data" >
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Name</label>
                    <input type="text" name="txt_product_name" class="form-control"  id="txt_product_name" 
                        placeholder="Name" value="{{$hi->product_name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Description</label>
                    <input type="text" name="txt_product_des" class="form-control"  id="txt_product_des" 
                         placeholder="Description" value="{{$hi->product_des}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Price</label>
                    <input type="text" name="txt_product_price" class="form-control"  id="txt_product_price" 
                         placeholder="Price" value="{{$hi->product_price}}">
                  </div>
                  <div class="form-group">
                  <img src="{{ url('public/Image/'.$hi->product_image) }}"
                                              style="height: 80px; width: 100px;">
                     <input type="file" class="form-control" name="txt_product_image"  >
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
    </div>
</body>
</html>

