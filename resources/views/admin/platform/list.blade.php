@extends('admin.layout.main')

@section('content')

<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">

          @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissable">
            {{ Session::get('error') }}
          </div>
          @endif
          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissable">
            {{ Session::get('success') }}
          </div>
          @endif

          <div class="card-header">
            <h4>View Platform</h4>
            <a href="{{ route('admin.platform.create') }}"  class="btn btn-outline-warning">Add New</a>
            
          </div>
          
          <form action="" method="get">
            <div class="card-header">
              <div class="card-tools">
                <div class="input-group input-group" style="width: 250px;">
                  <input type="text" name="keyword" value="{{ Request::get('keyword') }}" class="form-control float-right" placeholder="Search">
        
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                  </div>
                  </div>

              </div>
              <a href="{{ route('admin.platform.index') }}" class="btn btn-success ml-auto">Reset</a>

            </div>
          </form>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @if($platforms->isNotEmpty())
                  @foreach ($platforms as $item)
                
                  <tr>
                    
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>

                      @if($item->status == 1)
                      <div class="badge badge-info">Active</div>
                      @else
                      <div class="badge badge-danger">Not Active</div>
                      @endif   
                      
                    </td>
                   
                    <td><a href="{{ route('admin.platform.edit', $item->id) }}" class="btn btn-outline-primary">Update</a></td>

                    <td><button class="delete btn btn-outline-danger" onclick="platformDelete({{ $item->id }})" type="button">Delete</button></td> 
                </tr>  
                     
                @endforeach
                @else

                <tr>
                  <td colspan="5">Records Not Found</td>
                </tr>
  
                @endif
                </tbody>

                
              </table>
            </div>
              {{ $platforms->links() }}
      
              {{-- <ul class="pagination pagination m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
              </ul> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
  
@endsection

@section('customJs')
<script>

function platformDelete(id){
  var url = '{{ route("admin.platform.delete", "ID") }}';
    newUrl = url.replace("ID", id);
    // alert(newUrl);

    if(confirm("Are You Sure You Want To Delete!")){
      $.ajax({
    url: newUrl,
    type: 'delete',
    data: {},
    dataType: 'json',
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    success:function(response){
        window.location.href="{{ route('admin.platform.index') }}";
    }
    });
    }
}

</script>  
@endsection