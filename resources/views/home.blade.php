@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html>
<head>
<title>Laravel Currency Exchange Rate Calculator - Tutsmake.com</title> 
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 
</head>
<body>
<div class="container mt-5">
<div class="card">
<div class="card-header">
Laravel Calcular moeda semanal
</div>
<div class="card-body">
<form id="currency-exchange-rate" action="#" method="post" class="form-group">
<div class="row mb-3">
<div class="col-md-4">
<input type="text" name="amount" class="form-control" value="1"> 
</div>
<div class="col-md-4">
<select name="from_currency" class="form-control"> 
<option value='AUD'>AUD</option>
<option value='BGN'>BGN</option>
<option value='BRL'>BRL</option>
<option value='CAD'>CAD</option>
<option value='CHF'>CHF</option>
<option value='CNY'>CNY</option>
<option value='CZK'>CZK</option>
<option value='DKK'>DKK</option>
<option value='EUR'>EUR</option>
<option value='GBP'>GBP</option>
<option value='HKD'>HKD</option>
<option value='HRK'>HRK</option>
<option value='HUF'>HUF</option>
<option value='IDR'>IDR</option>
<option value='ILS'>ILS</option>
<option value='INR'>INR</option>
<option value='ISK'>ISK</option>
<option value='JPY'>JPY</option>
<option value='KRW'>KRW</option>
<option value='MXN'>MXN</option>
<option value='MYR'>MYR</option>
<option value='NOK'>NOK</option>
<option value='NZD'>NZD</option>
<option value='PHP'>PHP</option>
<option value='PLN'>PLN</option>
<option value='RON'>RON</option>
<option value='RUB'>RUB</option>
<option value='SEK'>SEK</option>
<option value='SGD'>SGD</option>
<option value='THB'>THB</option>
<option value='TRY'>TRY</option>
<option value='USD'>USD</option>
<option value='ZAR'>ZAR</option>
</select>
</div>
<div class="col-md-4">
<select name="to_currency" class="form-control">
<option value='AUD'>AUD</option>
<option value='BGN'>BGN</option>
<option value='BRL'>BRL</option>
<option value='CAD'>CAD</option>
<option value='CHF'>CHF</option>
<option value='CNY'>CNY</option>
<option value='CZK'>CZK</option>
<option value='DKK'>DKK</option>
<option value='EUR'>EUR</option>
<option value='GBP'>GBP</option>
<option value='HKD'>HKD</option>
<option value='HRK'>HRK</option>
<option value='HUF'>HUF</option>
<option value='IDR'>IDR</option>
<option value='ILS'>ILS</option>
<option value='INR'>INR</option>
<option value='ISK'>ISK</option>
<option value='JPY'>JPY</option>
<option value='KRW'>KRW</option>
<option value='MXN'>MXN</option>
<option value='MYR'>MYR</option>
<option value='NOK'>NOK</option>
<option value='NZD'>NZD</option>
<option value='PHP'>PHP</option>
<option value='PLN'>PLN</option>
<option value='RON'>RON</option>
<option value='RUB'>RUB</option>
<option value='SEK'>SEK</option>
<option value='SGD'>SGD</option>
<option value='THB'>THB</option>
<option value='TRY'>TRY</option>
<option value='USD'>USD</option>
<option value='ZAR'>ZAR</option>
</select>
</div>
</div> 
<div class="row">
<div class="col-md-4">
<input type="submit" name="submit" id="btnSubmit" class="btn btn-primary " value="Clique Aqui para calcular a moeda">
</div>
</div>
</form> 
</div>
<div class="card-footer">
 
</div>
</div>
</div>
<script>
$(document).ready(function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$("#btnSubmit").click(function (event) {
//stop submit the form, we will post it manually.
event.preventDefault();
// Get form
var form = $('#currency-exchange-rate')[0];
// Create an FormData object 
var data = new FormData(form);
// disabled the submit button
$("#btnSubmit").prop("disabled", true);
$.ajax({
type: "POST",
url: "{{ url('currency') }}",
data: data,
processData: false,
contentType: false,
cache: false,
timeout: 800000,
success: function (data) {
$("#output").html(data);
$("#btnSubmit").prop("disabled", false);
},
error: function (e) {
$("#output").html(e.responseText);
console.log("ERROR : ", e);
$("#btnSubmit").prop("disabled", false);
}
});
});
});
</script>
</body>
</html>
@endsection
