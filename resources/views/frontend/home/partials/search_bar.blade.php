
<x-frontend.card>
<div class="d-flex align-items-center justify-center flex-column home_search_bar">
    <h1>
        Find your interest
    </h1>
    <div>We take your preferences seriously and help you find the information you want</div>
    <form class="input-group mb-3 docSearch_byModel_own" action="#"  method="GET" data-toggle="modal"
    data-target="#docSearch_byModel_own">
        @csrf
        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
            aria-describedby="basic-addon1">
        <div class="input-group-append" >
            <button type="button" class="input-group-text btn btn-primary" id="basic-addon1"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>
</x-frontend.card>


@push('styles')
    <style>
        .home_search_bar{
            padding: 60px 0;
            background-size:contain;
            background-position:left center;
            background-image: url('{{ static_asset('frontend/search_bar/search_img.png') }}');
            background-repeat:no-repeat;
        }
        .home_search_bar form{
            max-width: 650px;
            margin: 10px auto;

        }

        .home_search_bar form input{
            padding: 30px;
            border-radius: 70px 0 0 70px !important
        }
        .home_search_bar form button{
            padding: 0 30px;
            border-radius:0 70px 70px 0!important
        }
        .home_search_bar h1{
            font-weight: 900;
            text-transform: capitalize;
            font-style: normal;
            font-size: 3rem;
        }
    </style>
@endpush
