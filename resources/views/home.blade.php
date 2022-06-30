@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>

                <h4 class="row justify-content-center fw-bolder">Your Referral Link</h4>
                @foreach($refreall_link as $refreall_links)
                    <h4 class="row justify-content-center">{{$refreall_links->link}} </h4>
                @endforeach
            </div>
            <div class="card">
                <h4 class="row justify-content-center">{{ __('Registered By You') }}</h4>
                <table class="table table-hover">
                    <thead>
                        <th>name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($refreall as $refrealles)
                        <td>{{$refrealles->name}}</td>
                        <td>{{$refrealles->phone_number}}</td>
                        <td>{{$refrealles->email}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <p class=" row justify-content-center">Total User Registered By you :  {{$count}}</p>
                <div class="d-flex justify-content-center" >
                {{$refreall->links()}}
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div id="chart" style="height: 300px;"></div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
    });
</script>
@endsection
