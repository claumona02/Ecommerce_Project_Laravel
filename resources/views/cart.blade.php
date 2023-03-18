@extends('layoutcos')
@section('title', 'Cart')
@section('content')
 <table id="cart" class="table table-hover table-condensed">
 <thead>
 <tr>
 <th style="width:50%">Product</th>
 <th style="width:10%">Price</th>
 <th style="width:8%">Quantity</th>
 <th style="width:22%" class="text-center">Subtotal</th>
 <th style="width:10%"></th>
 </tr>
 </thead>
 <tbody>
 <?php $total = 0 ?>
 @if(session('cart'))
 @foreach(session('cart') as $id => $details)
 <?php $total += $details['price'] * $details['quantity'] ?>
 <tr>
 <td data-th="Product">
 <div class="row">
 <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}"
width="100" height="100" class="img-responsive"/></div>
 <div class="col-sm-9">
 <h4 class="nomargin">{{ $details['name'] }}</h4>
 </div>
 </div>
 </td>
 <td data-th="Price">{{ $details['price'] }} RON</td>
 <td data-th="Quantity">
 <input type="number" value="{{ $details['quantity'] }}" class="form-control
quantity" />
 </td>
 <td data-th="Subtotal" class="text-center">{{ $details['price'] *
$details['quantity'] }} RON</td>
 <td class="actions" data-th="">
 <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
class="fa fa-refresh"></i> UPDATE </button>
 <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
class="fa fa-trash-o"></i>REMOVE</button>
 </td>
 </tr>
 @endforeach
 @endif
 </tbody>
 <tfoot>
 <tr class="visible-xs">
 <td class="text-center"><strong>Total {{ $total }}</strong></td>
 </tr>
 <tr>
 <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
Continue Shopping</a></td>

 <td colspan="2" class="hidden-xs"></td>
 <td class="hidden-xs text-center"><strong>Total {{ $total }} RON</strong></td>
 </tr>
 </tfoot>

 </table>
 <td><a href="{{ url('/checkout') }}" class="btn btn-danger"><i class="fa fa-angle-left"></i>
    Checkout</a></td>
@section('scripts')
 <script type="text/javascript">
 $(".update-cart").click(function (e) {
 e.preventDefault();
 var ele = $(this);
 $.ajax({
 url: '{{ url('update-cart') }}',
 method: "patch",
 data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity:
ele.parents("tr").find(".quantity").val()},
 success: function (response) {
 window.location.reload();
 }
 });
 });
 $(".remove-from-cart").click(function (e) {
 e.preventDefault();
 var ele = $(this);
 if(confirm("Do you want to remove this item?")) {
 $.ajax({
 url: '{{ url('remove-from-cart') }}',
 method: "DELETE",
 data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
 success: function (response) {
 window.location.reload();
 }
 });
 }
 });
 </script>
@endsection
 <script type="text/javascript">

 $(".update-cart").click(function (e) {
 e.preventDefault();
 var ele = $(this);
 $.ajax({
 url: '{{ url('update-cart') }}',
 method: "patch",
 data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity:
ele.parents("tr").find(".quantity").val()},
 success: function (response) {
 window.location.reload();
 }
 });
 });
 $(".remove-from-cart").click(function (e) {
 e.preventDefault();
 var ele = $(this);
 $.ajax({
 url: '{{ url('remove-from-cart') }}',
 method: "DELETE",
 data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
 success: function (response) {
 window.location.reload();
 }
 });
 });
 </script>
@endsection
