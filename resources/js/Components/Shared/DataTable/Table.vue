<template>
  <div class="row">
    <div class="col-12">
      <div class="card rounded-20 shadow mb-4 overflow-hidden">
        <div
          class="card-body flex-column flex-md-row mx-0 mx-md-2 d-flex justify-content-between align-items-start align-items-md-center py-4"
        >
          <h3 class="card-title mb-0 text-black fs-2 fw-bold">
            <slot name="TableHeaderTitle"> </slot>
          </h3>
          <div>
            <slot name="TableHeaderButtons"> </slot>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0 account-card table-responsive">
          <table
            id="example1"
            class="table table-striped table-borderless admin-table border-top border-primary mb-0"
          >
            <thead class="text-center">
              <slot name="TableTheadRow"> </slot>
            </thead>
            <tbody class="text-center">
              <slot name="TableBody"> </slot>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <slot name="Pagination"> </slot>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</template>




<style scoped>
.table > :not(caption) > * > * {
  padding: 1rem 0.6rem !important;
}
.table thead tr {
  box-shadow: none!important;
}
.table tbody tr:nth-child(even) {
    box-shadow: 5px 0px 0px 2px rgba(0, 0, 0, 0.1);
}
thead {
    background-color: #f4f9fd!important;
    color: #294481!important;
    font-size: 16px;
    font-weight: 700;
}
th{
    background-color: #f4f9fd!important;
    color: #294481!important;
    font-size: 16px;
    font-weight: 700;
}
</style>
