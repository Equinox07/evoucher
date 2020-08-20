<template>
  <div>
    <div class="container">
       <h1 class="display-4">Welcome Admin</h1>
      <div class="card">
        <div class="card-header">Welcome Admin</div>
        <div class="card-body">
          <div class="form-row">
            <button class="btn btn-primary" @click="generateCards()">Generate Card</button>
            <button class="btn btn-info">Deactivate Cards</button>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">Cards Generated {{voucher_stats.count ? voucher_stats.count : 0 }}</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">Sold Out {{voucher_soldout_stats.count ? voucher_soldout_stats.count: 0}}</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">Students {{student_stats.count ? student_stats.count : 0}}</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">Schools {{school_stats.count ? school_stats.count : 0}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vouchers: {},
      student_stats: {},
      voucher_stats: {},
      school_stats: {},
      voucher_soldout_stats: {}
    };
  },
  methods: {
    async generateCards() {
      await axios
        .post("api/generate_code")
        .then(({ data }) => {
          this.vouchers = data;
          this.loadDashboardStats();
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
    async loadVouchers() {
      await axios
        .get("api/vouchers")
        .then(({ data }) => {
          this.vouchers = data;
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
    async loadDashboardStats() {
      await axios
        .get("api/admin_dashboard_stats")
        .then(({ data }) => {
          this.student_stats = data.student;
          this.voucher_stats = data.voucher;
          this.school_stats = data.schools;
          this.voucher_soldout_stats = data.sold_out;
        })
        .catch(({ response }) => {
          console.log(response);
        });
    },
  },
  mounted() {
    this.loadVouchers();
    this.loadDashboardStats();
  },
};
</script>

<style>
</style>