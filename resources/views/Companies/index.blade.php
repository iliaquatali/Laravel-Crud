
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>{{__('messages.Select Language')}} </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                    <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
                    <option value="ur" {{ session()->get('locale') == 'ur' ? 'selected' : '' }}>Urdu</option>
                    <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                    <option value="jp" {{ session()->get('locale') == 'jp' ? 'selected' : '' }}>Japanese</option>
                    <option value="ch" {{ session()->get('locale') == 'ch' ? 'selected' : '' }}>Chinese</option>

                </select>
            </div>
        </div>
    
     
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{__('messages.Company Details')}}</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> {{__('messages.Create Company')}}
                    </a>
                </div>
            </div>
        </div>

    </body>
      
    <script type="text/javascript">
      
        var url = "{{ route('changeLang') }}";
      
        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });
      
    </script>

        {{-- <form action="">
            <div class="form-group">
              <input type="search" name="search" id="search" class="form-control" placeholder="Search by Name and Email" >
              <button class="btn btn-primary" >Search</button>
            </div>
        </form> --}}

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{__('messages.S.No')}}</th>
                    <th>{{__('messages.Company Name')}}</th>
                    <th>{{__('messages.Company Email')}}</th>
                    <th>{{__('messages.Company Address')}}</th>
                    <th width="280px">{{__('messages.Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pag as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                                <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}">{{__('messages.Show')}}</a>
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">{{__('messages.Edit')}}</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('messages.Delete')}}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $pag->links() !!}
    </div>
</body>
</html>