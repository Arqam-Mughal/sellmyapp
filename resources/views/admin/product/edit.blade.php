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
                      <h4>Edit Product</h4>
                    </div>

                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                
                                  <div class="mb-3">
                                      <label for="title">Title</label>
                                      <input type="text" name="title" value="{{ $product->title }}" id="title" class="form-control"
                                          placeholder="Title">
                                          <p class="error"></p>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="mb-3">
                                      <label for="slug">Slug</label>
                                      <input type="text" value="{{ $product->slug }}" readonly name="slug" id="slug" class="form-control"
                                          placeholder="slug">
                                          <p class="error"></p>
                                  </div>
                              </div>

                              <div class="col-md-12">
                                  <div class="mb-3">
                                      <label for="description">Description</label>
                                      <textarea name="description" id="description" cols="30" rows="10"
                                          class="summernote" placeholder="Description">{{ $product->description }}</textarea>
                                  </div>
                              </div>

                              <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Features">Features</label>
                                    <textarea name="features" id="features" cols="30" rows="10"
                                        class="summernote" placeholder="Features">{{ $product->features }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Updates">Updates</label>
                                    <textarea name="updates" id="updates" cols="30" rows="10"
                                        class="summernote" placeholder="Updates">{{ $product->updates }}</textarea>
                                </div>
                            </div>
                            {{-- @dd($frameworks) --}}
{{-- @die(); --}}
                            <label for="">Framework</label>
                            <select class="frameworkSelect w-100 text-gray" name="frameworks[]" multiple="multiple" placeholder="Select Framework">
                                @if(!empty($frameworks))
                                
                                @foreach ($frameworks as $framework)

                                    <option selected value="{{ $framework }}">{{ $framework }}</option>

                                @endforeach
                                @endif
                                {{-- <option value="IOS 10.8">IOS 10.8</option>
                                <option value="Andriod 3.4X">Andriod 3.4X</option>
                                <option value="Unity 5.5">Unity 5.5</option> --}}
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
                    @if($productImages->isNotEmpty())
                          @foreach ($productImages as $image)

                          <div class="col-md-3" id="image-row-{{ $image->id }}" >
                            <div class="card">
                            <input type="hidden" name="image_array[]" value="{{ $image->id }}" >
                            <img src="{{ asset('uploads/product/small/'.$image->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="javascript:void(0)" onclick="deleteImage({{ $image->id }})" class="btn btn-danger">Delete</a>
                            </div>
                            </div>
                        </div>   

                          @endforeach
                        @endif
                  </div>
                  <div class="card mb-3">
                      <div class="card-body">
                          <h2 class="h4 mb-3">Pricing</h2>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="mb-3">
                                      <label for="price">Price</label>
                                      <input type="text" value="{{ $product->price }}" name="price" id="price" class="form-control"
                                          placeholder="Price">
                                          <p class="error"></p>
                                  </div>
                              </div>
                          </div>
                          <div class="pb-2 pt-2">
                            <button type="submit" id="sub" class="btn btn-primary">Update</button>
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
                                  <option {{ ($product->status == 1)? 'selected' : '' }} value="1">Active</option>
                                  <option {{ ($product->status == 0)? 'selected' : '' }} value="0">Block</option>
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
                                @foreach ($platforms as $items)

                                <option {{ ($product->platform_id == $items->id) ? 'selected' : '' }} value="{{ $items->id }}">{{ $items->name }}</option>
                                    
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

                                  <option {{ ($product->temp_type_id == $items->id) ? 'selected' : '' }} value="{{ $items->id }}">{{ $items->name }}</option>                                    
                                  
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

                                  <option {{ ($product->temp_types_related_to_id == $items->id) ? 'selected' : '' }} value="{{ $items->id }}">{{ $items->name }}</option>                                    
                                  
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
                                  <option {{ ($product->is_featured == 'No') ? 'selected' : '' }} value="No">No</option>
                                  <option  {{ ($product->is_featured == 'Yes') ? 'selected' : '' }} value="Yes">Yes</option>
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


    function fetchSubcategories() {
        var temptype_id = $('#template_type').val();
        var platform_id = $('#platform').find("option:selected").val();
        var selectedId = @json($product->temp_types_related_to_id); 
        // alert(selectedId);

        $.ajax({
            url: '{{ route("admin.product-subcategory-get") }}',
            method: 'get',
            data: {
                temptype_id: temptype_id,
                platform_id: platform_id
            },
            dataType: 'json',
            success:function(response) {
                $('#temptype_related_to').find("option").not(":first").remove();
                $.each(response["TempTypesRelatedTo"], function(key, item){
                    var selected = (item.id == selectedId) ? 'selected' : '';
                    $("#temptype_related_to").append(`<option ${selected} value='${item.id}'>${item.name}</option>`);
                });
            },
            error: function() {
                console.log("Something Went Wrong!");
            }
        });
    }

    // Function to fetch categories based on platform
    function platformFetch() {
        var platform_id = $('#platform').val();
        var temp_id = $('#template_type').find("option:selected").val();
        var selectedId = @json($product->temp_types_related_to_id); 
        // alert(selectedId);

        $.ajax({
            url: '{{ route("admin.product-category-get") }}',
            method: 'get',
            data: {
                platform_id: platform_id,
                temp_id: temp_id
            },
            dataType: 'json',
            success:function(response) {
                $('#temptype_related_to').find("option").not(":first").remove();
                $.each(response["TempTypesRelatedTo"], function(key, item){
                    // alert(item.id);
                    // alert(selectedId);
                    var selected = (item.id == selectedId) ? 'selected' : '';
 
                    $("#temptype_related_to").append(`<option ${selected} value='${item.id}'>${item.name}</option>`);
                });
            },
            error: function() {
                console.log("Something Went Wrong!");
            }
        });
    }

    // Run the function on page load
    fetchSubcategories();
    platformFetch();

    // Run the function when the template_type value changes
    $('#template_type').on('change', function() {
        fetchSubcategories();
    });

    // Run the function when the platform value changes
    $('#platform').on('change', function() {
        platformFetch();
    });

    // Form submission handling
    $('#productForm').submit(function(e) {
        e.preventDefault();
        var element = $(this);
        $("#sub").prop('disabled', true);

        $.ajax({
            url: '{{ route("admin.product.update", $product->id) }}',
            type: 'put',
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
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'success',
                        title: res['message']
                    });

                    setTimeout(() => {
                        window.location.href= "{{ route('admin.product.index') }}";
                    }, 1000);
                } else {
                    if(res['notFound'] == true){
                        window.location.href="{{ route('admin.product.index') }}";
                    }

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

    // Slug generation based on title change
    $('#title').change(function(){
        $('#sub').prop('disabled', true);
        var title = $(this).val();

        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: title},
            dataType: 'json',
            success: function(res) {
                $('#sub').prop('disabled', false);
                $('#slug').val(res['slug']);
            },
            error: function(jqXHR, exception){
                console.log("Something went wrong!");
            }
        });
    });

    // Disable submit button on image click
    $('#image').on('click', function(){
        $("#sub").prop('disabled', true);
    });

    // Dropzone configuration for image upload
    Dropzone.autoDiscover = false;
    const dropzone = $('#image').dropzone({
        url:  "{{ route('admin.product-images.update') }}",
        maxFiles: 10,
        paramName: 'image',
        params: {'product_id': '{{ $product->id }}'},
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response){
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

    // Function to delete image
    function deleteImage(id){
        $('#image-row-' + id).remove();

        if(confirm('Are You Sure')){
            $.ajax({
                url: '{{ route("admin.product-images.delete") }}',
                type: 'delete',
                data: {id: id},
                success: function(response){
                    if(response['status'] == true){
                        alert(response['message']);
                    } else {
                        alert(response['message']);
                    }
                }
            });
        }
    }

    $(document).ready(function(){
    $('.frameworkSelect').select2({
    ajax: {
        url: '{{ route("admin.getFrameworks") }}',
        dataType: 'json',
        tags: true,
        multiple: true,
        minimumInputLength: 3,
        processResults: function (res) {
            return {
                results: res.tags
            };
        }
    }
}); 
});
</script> 
@endsection
