<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <style type="text/css">
    form > div {
            display: inline-block;
            vertical-align: middle;
            padding: 15px;
        }

        select {
            width: 200px;
        }





    </style>
    @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      @include('admin.navbar')
     
     
     <div class="container-fluid page-body-wrapper">
      
        <div class="container" align="center" >
          <div class="container-fluid page-body-wrapper"  style="padding-top: 50px">

            @if(session()->has('flashy_message'))
            <div class="alert alert-succes">
              <button type="button" class="close" data-dismiss="alert">
                
  
              </button>
              {{session()->get('flashy_message')}}
  
            </div>
            @endif
            <form  action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px">
                    <label >DOCTOR NAME</label>
                    <input type="text" name="name" style="color: black" placeholder="write the name" >
                </div>
                <div style="padding: 15px">
                    <label >PHONE </label>
                    <input type="number" name="phone" style="color: black" placeholder="enter the phone number" >
                </div>
                <div style="padding: 15px">
                    <label >Speciality</label>
                    <select color: black ; width:200px name="speciality" >
                        <option>--SELECT--</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>



                    </select>
                    <div style="padding: 15px">
                        <label >ROOM NO</label>
                        <input type="text" name="room" style="color: black" placeholder="write the room" >
                    </div>
                    <div style="padding: 15px">
                        <label >DOCTOR IMAGE</label>
                        <input type="file" name="file" style="color: black" placeholder="enter the image " >
                    </div>
                    <div style="padding: 15px">
                        <input type="submit" class="btn btn-success">
                    </div>


                </div>
            </form>

        </div>
     </div>  
        <!-- partial -->
     
     
    <!-- container-scroller -->
    <!-- plugins:js -->
     @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>