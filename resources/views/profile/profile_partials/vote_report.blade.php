<x-card.card>
    <div id="vote_chart"></div>
  </x-card.card>

@push('script')


<script>

    var options = {
          series: [
          {
            name: "Last 30 Days Vote",
            data: {{ $vote_array_values }}
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
          text: "{{ $user->name }}'s Vote Contribute Rate",
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
          categories: {{ $vote_array_key }},
          title: {
            text: 'Date'
          }
        },
        yaxis: {
          title: {
            text: 'Vote'
          },
          //min: 5,
          //max: 40
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
        };

        var chart = new ApexCharts(document.querySelector("#vote_chart"), options);
        chart.render();
</script>
@endpush

