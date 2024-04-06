 
@extends('layouts.app')
  
  @section('content')
  @include('layouts.navbar.topnav')
  <style>
  #selected-images-container {
      list-style: none;
      padding: 0;
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
  }
  
  .image-preview {
      position: relative;
      margin-right: 10px;
      margin-bottom: 10px;
  }
  
  .image-preview img {
      object-fit: cover;
  }
  
  .remove-image {
      position: absolute;
      top: 5px;
      right: 5px;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      border: none;
      border-radius: 20%;
      padding: 6px;
      cursor: pointer;
  }
  
  </style>
   <div class="content-body ">
              <div class="container-fluid">
      <!-- Add Project -->
  
  
      <!-- row -->
      <div class="row">
          <div class="col-xl-8 col-xxl-8">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Add Product</h4>
                      <a class="add-project-sidebar btn btn-primary" href="{{route('dashboard')}}">Product List</a>
                  </div>
                  <div class="card-body">
                      <form action="" method="POST" id="form" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                          <div class="col-lg-12 mb-2">
                              <div class="form-group">
                                  <label for="name">
                                      Name<span  style = "color:red;"> *</span>
                                  </label>
                                  <input type="text" class = "form-control" name="name" id="name" required>
                              </div>
                          </div>
                          <div class="col-lg-12 mb-2">
                              <div class="form-group">
                                  <label for="price">
                                      Price<span  style = "color:red;"> *</span>
                                  </label>
                                  <input type="text" class = "form-control" name="price" id="price" required>
                              </div>
                          </div>
                          <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                  <label for="sku">
                                      SKU<span  style = "color:red;"> *</span>
                                  </label>
                                  <input type="text" class = "form-control" name="sku" id="sku" required>
                                </div>
                          </div>
                          <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                  <label for="name">
                                      Description<span  style = "color:red;"> *</span>
                                  </label>
                                  <textarea type="text" class = "form-control" name="description" id="description" rows = "4" required></textarea>
                                </div>
                          </div>
                          <div class="col-lg-12 mb-2">
                              <div class="form-group">
                              <input type="file" name="images[]" id="image-upload-input" accept="image/jpeg,image/png" multiple required style="position: absolute; left: -9999px;">
                                  <label for="image-upload-input" id="image-upload-label">
                                      <i class="fas fa-upload"></i> Choose Images<span style = "color:red;"> *</span>
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg-12 mb-2">
                              <div class="form-group float-end" >
                                  <button type="submit" class="btn btn-primary btn-md">Create</button>
                              </div>
                          </div>             
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-xxl-4">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Selected Images</h4>
                  </div>
                  <div class="card-body" id = "selected-images-container" style = "padding:5px;">
                  </div>
                  
              </div>
          </div>    
      </div>
  </div>
          </div>
  
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
      
      document.addEventListener('DOMContentLoaded', function(){
            document.getElementById('image-upload-input').addEventListener('change', function() {
                const container = document.getElementById('selected-images-container');
                container.innerHTML = '';
                Array.from(this.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const listItem = document.createElement('li');
                        listItem.className = 'image-preview';
                        listItem.setAttribute('style', 'min-height:130px;max-height:130px');
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.setAttribute('style', 'min-width:210px;min-height:120px;max-width:210px;max-height:120px');
                        listItem.appendChild(img);
                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'remove-image';
                        removeBtn.innerHTML = '&times;';
                        removeBtn.addEventListener('click', function() {
                            listItem.remove();
                        });
                        listItem.appendChild(removeBtn);
            
                        container.appendChild(listItem);
                    };
                    reader.readAsDataURL(file);
                });
            });
        });

        $(document).ready(function() {
            $('#form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: '{{route("addProduct")}}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response.message);
                        if(response.code == 200){
                            // Redirect to product.index with success alert
                            window.location.href = '{{ route("dashboard") }}';        
                        } else{
                            Alert('Request failed:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

</script>