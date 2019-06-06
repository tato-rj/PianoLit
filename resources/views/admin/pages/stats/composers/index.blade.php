@extends('admin.layouts.app')

@section('head')
@endsection

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
  @include('admin.components.breadcrumb', [
    'title' => 'Composers statistics',
    'description' => 'Charts and graphs on the composers'])

    <div class="row">
      <div class="col-lg-6 col-md-6 col-12 p-3">
        @include('admin.pages.stats.composers.birthdays')
      </div>    
      <div class="col-lg-6 col-md-6 col-12 p-3">
        @include('admin.pages.stats.composers.deathdays')
      </div>    
    </div>

    <div class="row"> 
      @include('admin.pages.stats.row', [
        'title' => 'Composers',
        'subtitle' => 'Number of pieces each of the ' . $composersCount . ' composers have in the database.',
        'footer' => 'Composers with 3 or less pieces: ' . arrayToSentence($composersWithFewPieces),
        'id' => 'composersChart',
        'col' => '12',
        'data' => $composersStats])
    </div>

  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.js"></script>

<script type="text/javascript">
var colors = ['#5eb58a', '#f5c86d', '#f3686f', '#9a40d5', '#e3342f', '#f6993f', '#38c172', '#4dc0b5', '#3490dc', '#6574cd', '#9561e2', '#f66d9b'];
function getRandom(arr, n = 1) {
    var requests = n;
    var result = new Array(n),
        len = arr.length,
        taken = new Array(len);
    if (n > len)
        throw new RangeError("getRandom: more elements taken than available");
    while (n--) {
        var x = Math.floor(Math.random() * len);
        result[n] = arr[x in taken ? taken[x] : x];
        taken[x] = --len in taken ? taken[len] : len;
    }

    return requests == 1 ? result[0] : result;
}

function getElements(arr, n) {
    return arr.slice(0, n);
}

</script>

<script type="text/javascript">
let composersRecords = JSON.parse($('#composersChart').attr('data-records'));
let composers = [];
let composers_pieces_count = [];
let composers_count = composersRecords.length;

for (var i=0; i < composers_count; i++) {
  composers.push(composersRecords[i].short_name);
  composers_pieces_count.push(composersRecords[i].pieces_count);
}

var composersChartElement = document.getElementById("composersChart").getContext('2d');
var composersChart = new Chart(composersChartElement, {
    type: 'bar',
    data: {
        labels: composers,
        datasets: [{
            data: composers_pieces_count,
            backgroundColor: getRandom(colors)
        }]
    },
    options: {
        legend: {
          display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: getStepSize(composers_pieces_count)
                }
            }],
            xAxes: [{
                ticks: {
                  autoSkip: false
                }
            }]
        },
        layout: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
            }
        }
    }
});
</script>
@endsection
