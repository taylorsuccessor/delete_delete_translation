

<form action="{!! env('APP_URL') !!}/hyperpay_handler"
      class="paymentWidgets" data-brands="VISA MASTER AMEX">

</form>

<script src="{{config('module.HYPERPAY_URL')}}/paymentWidgets.js?checkoutId={{$oResults->checkout_id}}"></script>