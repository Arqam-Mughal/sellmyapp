@extends('admin.layout.main')

@section('content')


<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <form action="" method='post' name='productForm' id='productForm'>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-header col-12">
                      <h4>Add Product</h4>
                      <a href="{{ route('admin.product.index') }}" class="btn btn-outline-success">View</a>
                    </div>

                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">

                                  <div class="mb-3">
                                      <label for="title">Title</label>
                                      <input type="text" name="title" id="title" class="form-control"
                                          placeholder="Title">
                                          <p class="error"></p>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="mb-3">
                                      <label for="slug">Slug</label>
                                      <input type="text" readonly name="slug" id="slug" class="form-control"
                                          placeholder="slug">
                                          <p class="error"></p>
                                  </div>
                              </div>

                              <div class="col-md-12">
                                  <div class="mb-3">
                                      <label for="description">Description</label>
                                      <textarea name="description" id="description" cols="30" rows="10"
                                          class="summernote" placeholder="Description"></textarea>
                                  </div>
                              </div>

                              <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Features">Features</label>
                                    <textarea name="features" id="features" cols="30" rows="10"
                                        class="summernote" placeholder="Features"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Updates">Updates</label>
                                    <textarea name="updates" id="updates" cols="30" rows="10"
                                        class="summernote" placeholder="Updates"></textarea>
                                </div>
                            </div>

                            <label for="">Framework</label>

                                <select multiple name="frameworks[]" id="frameworkSelect" class="frameworkSelect w-100">

                              </select>

                          </div>
                      </div>
                  </div>
                  <div class="card mb-3">
                      <div class="card-body">
                          <h2 class="h4 mb-3">Media</h2>
                          <div id="image" class="dropzone dz-clickable">
                              <div class="dz-message needsclick">
                                  <br>Drop files here or click to upload.<br><br>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row" id="product-gallery">

                  </div>
                  <div class="card mb-3">
                      <div class="card-body">
                          <h2 class="h4 mb-3">Pricing</h2>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="mb-3">
                                      <label for="price">Price</label>
                                      <input type="text" name="price" id="price" class="form-control"
                                          placeholder="Price">
                                          <p class="error"></p>
                                  </div>
                              </div>
                          </div>
                          <div class="pb-2 pt-2">
                            <button type="submit" id="sub" class="btn btn-primary">Create</button>
                        </div>
                      </div>



                  </div>

              </div>
              <div class="col-md-4">
                  <div class="card mb-3">
                      <div class="card-body">
                          <h2 class="h4 mb-3">Product status</h2>
                          <div class="mb-3">
                              <select name="status" id="status" class="form-control">
                                  <option value="1">Active</option>
                                  <option value="0">Block</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Platform</h2>
                        <div class="mb-3">
                            <select name="platform" id="platform" class="form-control">
                                <option value="">Select a Platform</option>

                                @if($platforms->isNotEmpty())
                                @foreach ($platforms as $item)

                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                @endforeach
                                @endif

                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                </div>
                  <div class="card">
                      <div class="card-body">
                          <h2 class="h4  mb-3">Product Template</h2>
                          <div class="mb-3">
                              <label for="template_type">Template-Type</label>
                              <select name="template_type" id="template_type" class="form-control">
                                  <option value="">Select a Category</option>

                                  @if($temptypes->isNotEmpty())
                                  @foreach ($temptypes as $items)

                                  <option value="{{ $items->id }}">{{ $items->name }}</option>

                                  @endforeach
                                  @endif

                              </select>
                              <p class="error"></p>
                          </div>
                          <div class="mb-3">
                              <label for="temptype_related_to">Template-Type-Related-To</label>
                              <select name="temptype_related_to" id="temptype_related_to" class="form-control">
                                  <option value="">Select a Subcategory</option>

                                  {{-- @if($TempTypesRelatedTo->isNotEmpty())
                                  @foreach ($TempTypesRelatedTo as $items)

                                  <option value="{{ $items->id }}">{{ $items->name }}</option>

                                  @endforeach
                                  @endif --}}
                              </select>
                              <p class="error"></p>
                          </div>
                      </div>
                  </div>

                  <div class="card mb-3">
                      <div class="card-body">
                          <h2 class="h4 mb-3">Featured product</h2>
                          <div class="mb-3">
                              <select name="is_featured" id="is_featured" class="form-control">
                                  <option value="No">No</option>
                                  <option value="Yes">Yes</option>
                              </select>
                          </div>
                      </div>
                  </div>

              </div>
          </div>


      </div>
  </form>
  <!-- /.card -->
</section>

@endsection

@section('customJs')

<script>
  $('#productForm').submit(function(e) {
    e.preventDefault();
    var element = $(this);
    $("#sub").prop('disabled', true);

    $.ajax({
      url: '{{ route("admin.product.store") }}',
      type: 'post',
      data: element.serialize(),
      dataType: 'json',
      success: function(res) {

        $("#sub").prop('disabled', false);
        if(res['status'] == true){

          $('.error').removeClass('text-danger').html('');
          $('input[type="text"], input[type="number"], select').removeClass('is-invalid');

          const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 1000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
					})

					Toast.fire({
					icon: 'success',
						title: res['message']
					});

            setTimeout(() => {
						window.location.href= "{{ route('admin.product.index') }}";
					}, 1000);
        }else{
          var errors = res['errors'];

          $('.error').removeClass('text-danger').html('');
          $('input[type="text"], select').removeClass('is-invalid');

                $.each(errors, function(key, value){
                    $(`#${key}`).addClass('is-invalid').siblings('p').addClass('text-danger').html(value);
                });

        }
      },
      error: function(jqXHR, exception) {
        $("#sub").prop('disabled', false);
        console.log("Something went wrong!");
      }
    });
  });

  $('#platform').change(function(){
    var platform_id = $(this).val();
    var temp_id = $('#template_type').find("option:selected").val();

    // alert(temp_id);
$.ajax({
        url: '{{ route("admin.product-category-get") }}',
        method: 'get',
        data: {platform_id: platform_id, 'temp_id': temp_id},
        dataType: 'json',
        success:function(response) {

            $('#temptype_related_to').find("option").not(":first").remove();

            $.each(response["TempTypesRelatedTo"], function(key, item){
                $("#temptype_related_to").append(`<option value='${item.id}'>${item.name}</option>`)
            });

        }, error: function(){
            console.log("Something Went Wrong!");
        }
    });
});


  $('#template_type').on('change',function(){
    var temptype_id = $(this).val();
    var platform_id = $('#platform').find("option:selected").val();
            // alert(plat);
$.ajax({
        url: '{{ route("admin.product-subcategory-get") }}',
        method: 'get',
        data: {temptype_id: temptype_id, platform_id: platform_id},
        dataType: 'json',
        success:function(response) {

            // console.log(response);

            $('#temptype_related_to').find("option").not(":first").remove();


            $.each(response["TempTypesRelatedTo"], function(key, item){
                $("#temptype_related_to").append(`<option value='${item.id}'>${item.name}</option>`)
            });

        }, error: function(){
            console.log("Something Went Wrong!");
        }
    });
});



  $('#title').change(function(){
    $('#sub').prop('disabled', true);
    var title = $(this).val();

    $.ajax({
      url: '{{ route("getSlug") }}',
      type: 'get',
      data: {title:title},
      dataType: 'json',
      success: function(res){

    $('#sub').prop('disabled', false);

        $('#slug').val(res['slug']);
      }, error: function(jqXHR, exception){
        console.log("Something went wrong!");
      }
    });
  });

  $('#image').on('click', function(){
    $("#sub").prop('disabled', true);
});

  Dropzone.autoDiscover = false;
        const dropzone = $('#image').dropzone({
            // init: function(){
            // this.on('addedfile', function(file) {
            //     if(this.files.length > 1) {
            //     this.removeFile(this.files(0));
            //     }
            // });
            // },
            url:  "{{ route('admin.temp-images.create') }}",
            maxFiles: 10,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, success: function(file, response){
                $("#sub").prop('disabled', false);


                var html = `<div class="col-md-3" id="image-row-${response.image_id}" >
                    <div class="card">
                    <input type="hidden" name="image_array[]" value="${response.image_id}" >
                    <img src="${response.imagePath}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">Delete</a>
                    </div>
                    </div>
                </div>`;

                $('#product-gallery').append(html);
            },

            complete: function(file){
                this.removeFile(file);
            }
    });

    function deleteImage(id){
        $('#image-row-' + id).remove();
    }

$(document).ready(function(){
    $('.frameworkSelect').select2({
    ajax: {
        url: '{{ route("admin.getFrameworks") }}',
        dataType: 'json',
        tags: true,
        multiple: true,
        minimumInputLength: 3,
        minimumResultsForSearch: 10,
        processResults: function (data) {
            // console.log(data);
            return {
                results: data.tags
            };

        }
    }

});

});



</script>
@endsection

@section('title', 'Product')
