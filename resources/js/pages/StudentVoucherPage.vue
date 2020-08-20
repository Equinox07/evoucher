<template>
  <div>
      <div class="container">
      <div class="col-lg-12" >
       <div class="jumbotron">
           <div class="row">

           
        <div class="col-md-6">
            <p class="lead">
                Fill in your card details
        </p>
        </div>
                <div class="col-md-6">
        <div class="card bg-info">
            <div class="card-header">CARD AND PURCHASE INFO</div>
            <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Mobile Number</label>
                            <input type="text"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Voucher Number</label>
                            <input type="text"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Voucher Serial</label>
                            <input type="text"  class="form-control" disabled >
                        </div>
                        <button class="btn btn-primary" :disabled="serial== ''" >PROCEED</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
      </div>
      </div>
  </div>
  </div>
</template>

<script>
export default {
    data () {
        return {
            mobile: '',
            voucher: '',
            serial: ''
        }
    }

}
</script>

<style>

</style>