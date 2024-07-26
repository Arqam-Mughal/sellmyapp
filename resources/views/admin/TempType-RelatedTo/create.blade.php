@extends('admin.layout.main')

@section('content')

<section class="section">
  <div class="section-body">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <form action="" method="post" name="tempTypeRelatedToForm" id="tempTypeRelatedToForm">
            @csrf
            <div class="card-header col-12">
              <h4>Add Template-Type-Related-To</h4>
              <a href="{{ route('admin.temp-type-related-to.index') }}" class="btn btn-outline-success">View</a>
            </div>

            <div class="card-body">

              <div class="form-group">
                <label>Platform</label>
                <select name="platform_id" id="platform_id" class="form-control">
                  @if($platforms->isNotEmpty())
                  @foreach ($platforms as $item)
                    
                  <option value="{{ $item->id }}">{{ $item->name }}</option>

                  @endforeach
                  @else

                  <option value="">No Platform added</option>

                  @endif
                  
                </select>
              </div>

              <div class="form-group">
                <label>TempType</label>
                <select name="temptype_id" id="temptype_id" class="form-control">
                  @if($temptypes->isNotEmpty())
                  @foreach ($temptypes as $item)
                    
                  <option value="{{ $item->id }}">{{ $item->name }}</option>

                  @endforeach
                  @else

                  <option value="">No TempType added</option>

                  @endif
                  
                </select>
              </div>

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" placeholder="--Template-Type-Related-To--" class="form-control">
                <p></p>
              </div>
              
              <div class="form-group">
                <label>Slug</label>
                <input type="text" readonly name="slug" placeholder="slug" id="slug" class="form-control">
                <p></p>
              </div>

              <div class="form-group mb-0">
                <label>Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="1">Active</option>
                  <option value="0">Block</option>
                </select>
              </div>

            </div>
            <div class="card-footer text-right">
              <button type="submit" id="sub" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('customJs')

<script>
  $('#tempTypeRelatedToForm').submit(function(e) {
    e.preventDefault();
    var element = $(this);
    $("#sub").prop('disabled', true);

    $.ajax({
      url: '{{ route("admin.temp-type-related-to.store") }}',
      type: 'post',
      data: element.serialize(),
      dataType: 'json',
      success: function(res) {

        $("#sub").prop('disabled', false);
        if(res['status'] == true){

        $('temptype_id').removeClass('is-invalid').siblings('p').removeClass('text-danger').html("");
        $('#name').removeClass('is-invalid').siblings('p').removeClass('text-danger').html("");
        $('#slug').removeClass('is-invalid').siblings('p').removeClass('text-danger').html("");

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
						window.location.href= "{{ route('admin.temp-type-related-to.index') }}";
					}, 1000);
        }else{
          var errors = res['errors'];
      if(errors['name']){
        $('#name').addClass('is-invalid').siblings('p').addClass('text-danger').html(errors['name']);
        
      }else{
  
        $('#name').removeClass('is-invalid').siblings('p').removeClass('text-danger').html("");
      }

      if(errors['slug']){
        $('#slug').addClass('is-invalid').siblings('p').addClass('text-danger').html(errors['slug']);
      }else{

        $('#slug').removeClass('is-invalid').siblings('p').removeClass('text-danger').html("");

      }

      if(errors['temptype_id']){
        $('temptype_id').addClass('is-invalid').siblings('p').addClass('text-danger').html(errors['temptype_id']);
      }else{

        $('temptype_id').removeClass('is-invalid').siblings('p').removeClass('text-danger').html("");

      }
        }
      },
      error: function(jqXHR, exception) {
        $("#sub").prop('disabled', false);
        console.log("Something went wrong!");
      }
    });
  });

  $('#name').change(function(){
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
</script> 
@endsection

@section('title', 'Template-Type-Related-To')
