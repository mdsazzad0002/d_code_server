@extends('profile.layouts.master')
@section('title',$user->name)

@section('content')
<x-card.card>

@if(auth()?->user()?->id == $user->id)
    <button type="button" class="btn btn-primary btn-sm float-right form markdown"
    data-toggle="modal"
    data-target="#modal_setup"
    data-title="Details Edit"
    data-action="{{ route('profile.profile_details.update', $user->id ) }}"
    data-socuce="{{ route('profile.profile_details.edit', $user->id  ) }}"
    data-method="put"
    >
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
    </button>
@endif
{!! $user->details?->details ? Str::markdown($user->details?->details): '🤣 '. $user->name .' ❤ Welcome to '.
general_setting('site_title')!!}
</x-card.card>


<div id="paginated_content">
    @include('profile.partials.post')
</div>




    {{-- <x-card.card>
      <div id="chart"></div>
    </x-card.card> --}}
@endsection


@push('script')

{{-- <script src="{{ static_asset('plugins/apexcharts/apexcharts.js') }}"></script> --}}

{{-- <script>

    var options = {
          series: [
          {
            name: "Post - 2013",
            data: [28, 29, 33, 36, 32, 32, 33]
          },
          {
            name: "Comment - 2013",
            data: [12, 11, 14, 18, 17, 13, 13]
          },
          {
            name: "Vote - 2013",
            data: [1, 21, 4, 8, 7, 3, 1]
          }
        ],
          chart: {
          height: 350,
          type: 'line',
          foreColor: '#ccc',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        tooltip: {
            theme: 'dark'
        },
        colors: ['#77B6EA', '#545454','#000'],
        dataLabels: {
          enabled: true,
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Your Contribute Rate',
          align: 'left'
        },
        grid: {
          borderColor: "#535A6C",
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        markers: {
          size: 1
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
          title: {
            text: 'Month'
          }
        },
        yaxis: {
          title: {
            text: ''
          },
          min: 5,
          max: 40
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script> --}}
@endpush

