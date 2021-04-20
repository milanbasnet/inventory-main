@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Sale</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('sale.index')}}">Sale</a></li>
                      <li class="breadcrumb-item active">Update</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>

  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card card-outline card-primary">
                      <div class="card-header">
                          <h3 class="card-title">Update</h3>
                          <a href="{{route('sale.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
                      </div>
                      <div class="card-body text-muted">
                          <x-input-error />

                          <form action="{{route('sale.update',$sale)}}" method="POST" enctype="multipart/form-data">
                              @csrf @method('patch')

                              <div class="row">
                                  <div class="col-sm-6">
                                      
                                    <div class="form-group">
                                        <label>Customer Name <span class="text-danger">*</span></label>
                                        <select id="selectCustomer" name="customer_id" placeholder="Pick customer" class="form-control">
                                            @foreach($customers as $customer)
                                            <option value="{{$customer->id}}" {{$customer->id == $sale->customer->id?'selected':''}}>{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Details</label>
                                          <textarea cols="10" rows="1" class="form-control" name="details">{{$sale->details??old('details')}}</textarea>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-6">
                                    
                                  <div class="form-group">
                                      <label>Payment type <span class="text-danger">*</span></label>
                                      <select id="paymentType" name="payment_type" required class="form-control">
                                          <option value="cash" {{$sale->payment_type=='cash'?'selected':''}} >Cash</option>
                                          <option value="bank" {{$sale->payment_type=='bank'?'selected':''}} >Bank</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-sm-6" id="chqOption">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Chq no.</label>
                                                <input type="text" class="form-control" name="chq_no" value="{{$sale->chq_no??old('chq_no')}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Chq date</label>
                                                <input type="date" class="form-control" name="chq_date" value="">{{$sale->chq_date??old('chq_date')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                              <table class="table table-bordered table-hover" id="tab_logic">
                                  <thead>
                                      <tr>
                                          <th><input class='check_all' type='checkbox' onclick="select_all()" /></th>
                                          <th>S.No</th>
                                          <th>Name</th>
                                          <th>Qty</th>
                                          <th>Selling Price</th>
                                          <th>Total</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($sale->saleProducts as $key=>$product)
                                      @php
                                      $c= $key+1;
                                      @endphp
                                      <tr>
                                          <td><input type='checkbox' class='chkbox' /></td>
                                          <td><span id='sn'>{{$c}}.</span></td>
                                          <td>
                                              <input class="form-control autocomplete_txt" type='text' value="{{$product->title}}" data-type="title" id='{{'title_'.$c}}' name='title[]' />
                                          </td>
                                          <td><input class="form-control qty autocomplete_txt" type='number'  value="{{$product->qty}}" data-type="qty" id='{{'qty_'.$c}}' name='qty[]' /> </td>
                                          <td><input class="form-control price autocomplete_txt" type='number' value="{{$product->price}}" data-type="price" id='{{'price_'.$c}}' name='price[]' /> </td>
                                          <td><input class="form-control total autocomplete_txt" type='number'  value="{{$product->total}}" data-type="total" id='{{'total_'.$c}}' name='total[]' readonly /> </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>

                              <br>

                              <div class="row">
                                  <div class="col-md-12">
                                      <button type="button" class='btn btn-danger delete' id='delete_row'>- Delete</button>
                                      <button type="button" class='btn btn-success float-right addbtn'>+ Add More</button>
                                  </div>
                              </div>

                              <div class="row" style="margin-top:20px">
                                <div class="col-md-6"></div>
                                  <div class="float-right col-md-6">
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Sub Total</label>
                                          <div class="col-md-10">
                                              <input type="number" name='sub_total'  value="{{$sale->sub_total}}" placeholder='0.00' class="form-control" id="sub_total" readonly />
                                          </div>
                                      </div>
                        
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Discount</label>
                                          <div class="col-md-10">
                                              <input type="number" name="discount_rate" value="{{$sale->discount_rate}}" class="form-control" id="discount"  placeholder="0">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Discount Amount</label>
                                          <div class="col-md-10">
                                              <input type="number" name='discount_amount' id="discount_amount" value="{{$sale->discount_amount}}"  placeholder='0.00' class="form-control" readonly />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-form-label col-md-2">Tax</label>
                                        <div class="col-md-10">
                                            <input type="number" name='tax_rate' value="{{$sale->tax_rate}}"  class="form-control" id="tax" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Tax Amount</label>
                                        <div class="col-md-10">
                                            <input type="number" name='tax_amount' id="tax_amount"  value="{{$sale->tax_amount}}" placeholder='0.00' class="form-control" readonly />
                                        </div>
                                    </div>
                                    
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Grand Total</label>
                                          <div class="col-md-10">
                                              <input type="number" name='total_amount' id="total_amount" value="{{$sale->total_amount}}" placeholder='0.00' class="form-control" readonly />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Paid Amount</label>
                                          <div class="col-md-10">
                                              <input type="number" name='paid_amount' id="paid_amount" value="{{$sale->paid_amount}}" placeholder='0.00' class="form-control" />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Due Amount</label>
                                          <div class="col-md-10">
                                              <input type="number" name='due_amount' id="due_amount"  value="{{$sale->due_amount}}"  placeholder='0.00' class="form-control" readonly />
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-primary mt-4 float-right">Submit</button>

                          </form>
                      </div>
                      <!-- /.card-body -->
                  </div>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('#selectCustomer').selectize({
        sortField: 'text'
    });
    
    checkPayment()

    function checkPayment(){
        const val = document.getElementById('paymentType').value
        if(val == 'bank'){
            $('#chqOption').css('display','block')
        }else{
            $('#chqOption').css('display','none')
        }
    }
  
    $('#paymentType').change(function(){
        checkPayment()
    })

    // calulation
    
  $(".delete").on('click', function() {
      $('.chkbox:checkbox:checked').parents("tr").remove();
      $('.check_all').prop("checked", false);
      updateSerialNo();
      calc();
  });
  var i = $('table tr').length;
  $(".addbtn").on('click', function() {
      count = $('table tr').length;
      var data = "<tr><td><input type='checkbox' class='chkbox'/></td>";
      data += "<td><span id='sn" + i + "'>" + count + ".</span></td>";
      data += "<td><input class='form-control autocomplete_txt' type='text' data-type='title' id='title_" + i + "' name='title[]'/></td>";
      data += "<td><input class='form-control qty autocomplete_txt' type='number' data-type='qty' id='qty_" + i + "' name='qty[]'/></td>";
      data += "<td><input class='form-control price autocomplete_txt' type='number' data-type='price' id='price_" + i + "' name='price[]'/></td>";
      data += "<td><input class='form-control total autocomplete_txt' type='number' data-type='total' id='total_" + i + "' name='total[]'/></td></tr>";
      $('table').append(data);
      i++;
  });

  $('#tab_logic tbody').on('keyup change', function() {
      calc();
  });
  $('#tax').on('keyup change', function() {
      calc_total();
  });

  $('#discount').on('keyup change', function() {
      calc_total();
  });
  $('#paid_amount').on('keyup change', function() {
      calc_total();
  });


});

function select_all() {
  $('input[class=chkbox]:checkbox').each(function() {
      if ($('input[class=check_all]:checkbox:checked').length == 0) {
          $(this).prop("checked", false);
      } else {
          $(this).prop("checked", true);
      }
  });
}

function updateSerialNo() {
  obj = $('table tr').find('span');
  $.each(obj, function(key, value) {
      id = value.id;
      $('#' + id).html(key + 1);
  });
}
//autocomplete script
$(document).on('focus', '.autocomplete_txt', function() {
  type = $(this).data('type');

  if (type == 'title') autoType = 'title';
  if (type == 'qty') autoType = 'qty';
  if (type == 'price') autoType = 'price';

console.log(this)
  $(this).autocomplete({
      minLength: 0,
      source: function(request, response) {
          $.ajax({
              url: "{{ route('product.search') }}",
              dataType: "json",
              data: {
                  term: request.term,
                  type: type,
              },
              success: function(data) {
                  var array = $.map(data, function(item) {
                      return {
                          label: item[autoType],
                          value: item[autoType],
                          data: item
                      }
                  });
                  response(array)
              }
          });
      },
      select: function(event, ui) {
          var data = ui.item.data;
          id_arr = $(this).attr('id');
          id = id_arr.split("_");
          elementId = id[id.length - 1];
          $('#title_' + elementId).val(data.title);
          $('#qty_' + elementId).val(data.qty);
          $('#price_' + elementId).val(data.price);
      }
  });


});

function calc() {
  $('#tab_logic tbody tr').each(function(i, element) {
      var html = $(this).html();
      if (html != '') {
          var qty = $(this).find('.qty').val();
          var price = $(this).find('.price').val();
          $(this).find('.total').val(qty * price);

          calc_total();
      }
  });
}

function calc_total() {
  total = 0;
  $('.total').each(function() {
      total += parseInt($(this).val());
  });
  $('#sub_total').val(total.toFixed(2));
  discount_sum = total / 100 * $('#discount').val();
  tax_sum = (total-discount_sum) / 100 * $('#tax').val();
  $('#tax_amount').val(tax_sum.toFixed(2));
  $('#discount_amount').val(discount_sum.toFixed(2));
  $('#total_amount').val((tax_sum + total - discount_sum).toFixed(2));
  $('#due_amount').val(((tax_sum + total - discount_sum) - $('#paid_amount').val()).toFixed(2));
}
</script>
@endpush 