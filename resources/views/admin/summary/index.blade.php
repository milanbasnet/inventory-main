@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Summary</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Summary</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <x-input-error/>
      <x-alert-msg/>

      <div class="row">
        <div class="col-md-6 order-2">
          <div class="card  card-info">
            <div class="card-header">
              <h3 class="card-title">This year summary</h3>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered">
                <tr>
                  <th>Sales this year</th>
                  <th>{{number_format($totalSales)}}</th>
                </tr>
                <tr>
                  <th>Revenue Collected:</th>
                  <th>{{number_format($revenue)}}</th>
                </tr>
                <tr>
                  <th>Purchase</th>
                  <th>{{number_format($purchase)}}</th>
                </tr>
                <tr>
                  <th>Expenses</th>
                  <th>{{number_format($totalExpense)}}</th>
                </tr>
                <tr>
                  <th>Incomes</th>
                  <th>{{number_format($income)}}</th>
                </tr>
                <tr class="table-info">
                  <th>Profit</th>
                  <th>{{number_format($revenue+$income-$totalExpense-$purchase)}}</th>
                </tr>
               
              </table>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card  card-info shadow">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Sales Details</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">Rs {{number_format($totalSales)}}</span>
                  <span>Sales Over Time</span>
                </p>
                
              </div>
              <!-- /.d-flex -->
        
              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
              </div>
        
              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-info"></i> This year
                </span>
        
                <span>
                  <i class="fas fa-square text-gray"></i> Last year
                </span>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@push('css')
@endpush

@push('js')
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#17A2B8',
          borderColor    : '#17A2B8',
          data           : {!! json_encode($thisYearSales) !!}
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : {!! json_encode($lastYearSales) !!}
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return '' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

})
</script>
@endpush