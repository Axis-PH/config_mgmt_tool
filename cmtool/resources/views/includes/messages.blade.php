@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
    <div class="row justify-content-center">
        <div class="alert alert-success col-md-5 col-lg-5 col-sm-5">
            {{session('success')}}
        </div>
    </div>
@endif


@if (session('error'))
    <div class="row justify-content-center">
        <div class="alert alert-danger col-md-5 col-lg-5 col-sm-5">
            {{session('error')}}
        </div>
    </div>
@endif

@if (session('errorMessages'))
    <div class="row justify-content-center">
        <div class="alert alert-danger col-md-5 col-lg-5 col-sm-5">
             @foreach (session('errorMessages') as $errorMessages)
                 {{ $errorMessages }}
                 <br>
             @endforeach
        </div>
    </div>
@endif

@if (session()->has('failures'))

    <table class ="table table-danger">
        <tr>
            <th>Row</th>
            <th>Attributes</th>
            <th>Errors</th>
            <th>Value</th>
        </tr>

        @foreach (session()->get('failures') as $validation)
            <tr>
                <td>{{ $validation->row() }}</td>
                <td>{{ $validation->attribute() }}</td>
                <td>
                    <ul>
                        @foreach ($validation->errors() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{ $validation->values()[$validation->attribute()] }}
                </td>
            </tr>
        @endforeach

    </table>
@endif