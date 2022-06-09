@extends('layouts.app')

@section('content')

<div class="container">

  <form id="payment-form" action="/route/on/your/server" method="post">
    <div id="dropin-container" class="d-flex justify-content-center"></div>
    <div class="d-flex justify-content-center">
      <button id="submit-payment-button" class="btn btn-success">
        Submit payment
      </button>
    </div>
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
    <input type="hidden" id="token" value="{{ $token }}"/>
  </form>

  
</div>

<script type="text/javascript">


</script>

@endsection