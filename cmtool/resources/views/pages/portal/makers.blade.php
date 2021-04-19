@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div style="display: inline-block; width: 800px; border:1px solid black;">
        <h1 style="margin-top:20px; ">Maker List</h1>
        {{-- <h1 style="margin-top:20px; ">保守先一覧</h1> --}}
        <div style="float:left; padding:5px">
            <a href="{{ url("makers/create") }}" class="btn btn-success" 
                style="font-size:15px; width:100px; height: 100%">{{ __('Create') }}</a>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
            <tr>
                <th class="nameHeader">{{ __('Name') }}</th>
                <th class="nameHeader">{{ __('NamePIC') }}</th>
                <th class="telephoneHeader">{{ __('Telephone') }}</th>
                <th class="emailHeader">{{ __('Email') }}</th>
                <th class="buttonHeader"></th>
            </tr>
            </thead>
                    @foreach ($makers as $maker)
                    <tr>
                        <?php 
                            if (!empty($maker->maker_name)) 
                                $name = $maker->maker_name;
                            else 
                                $name = '';
                        ?>
                            <td>{{ $name }}</td>

                        <?php 
                            if (!empty($maker->maker_staff)) 
                                $namePIC = $maker->maker_staff;
                            else 
                                $namePIC = '';
                        ?>
                            <td>{{ $namePIC }}</td>
                            
                        <?php 
                            if (!empty($maker->maker_tel)) 
                                $telephoneNumber = $maker->maker_tel;
                            else 
                                $telephoneNumber = '';
                        ?>
                            <td>{{ $telephoneNumber }}</td>

                        <?php 
                            if (!empty($maker->maker_mail)) 
                                $email = $maker->maker_mail;
                            else 
                                $email = '';
                        ?>
                            <td>{{ $email }}</td>

                        <td>
                            <a href="{{ url("makers/update/" . $maker->maker_id) }}" 
                                class="btn btn-primary" style="font-size:15px; width:100%; height: 100%">{{ __('edit') }}</a>
                        </td>
                    </tr> 
                    @endforeach
        </table>
        <?php echo $makers->render(); ?>
        <br><br>
        <div style="margin-top:-10px; margin-bottom:10px">
            <a href={{ '/contactLanding' }} class="btn btn-link" 
                style="background-color: #f1f1f1; width: 100px; border: 1px solid black; font-size:15px;">{{ __('バック') }}</a>
        </div>
    </div>
<style>

    .nameHeader {
        text-align:center; 
        width:11%; 
        border: 1px solid black
    }

    .telephoneHeader {
        text-align:center; 
        width:5%; 
        border: 1px solid black
    }

    .emailHeader {
        text-align:center; 
        width:11%; 
        border: 1px solid black
    }

    .buttonHeader {
        text-align:center; 
        width:10%; 
        border: 1px solid black
    }

    td {
        text-align: center; 
    }

</style>

@endsection