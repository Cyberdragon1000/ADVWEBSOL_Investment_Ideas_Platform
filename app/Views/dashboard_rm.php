<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<div id="popupmodals"></div>
<div class="container-fluid text-nowrap " style="">
<div class="row">
  <div class="d-flex align-items-center col-2" style="background-color: white; ">
    <div class="nav flex-column nav-pills" role="tablist"  style="flex-grow:1;">
      <button class="nav-link active"  data-bs-toggle="pill" onclick="$('#newideastable').DataTable().columns.adjust();"  data-bs-target="#newideastab"  role="tab" >New Ideas</button>
      <button class="nav-link"  data-bs-toggle="pill" onclick="$('#sentideastable').DataTable().columns.adjust();" data-bs-target="#sendideastab"  role="tab" >Sent Ideas</button>
      <button class="nav-link"  data-bs-toggle="pill" onclick="$('#investorslisttable').DataTable().columns.adjust();" data-bs-target="#investorspreferencestab"  role="tab" >Investor's Preferences</button>
    </div>
  </div>
  <div class=" col-10 ps-1">
    <div class="tab-content pb-1" style="background-color: white;   min-height: 25em;" >
      <div class="tab-pane fade show active" id="newideastab" role="tabpanel">
        
        <div class="container text-nowrap " >
          <h1 class="text-center">New Ideas</h1>
          <table class="table table-hover mb-0 " id="newideastable">
            <thead >
              <tr class="text-center" >
                <th  style="background-color: #009879;">No.</th>
                <th>Risk</th>
                <th>Publish Date</th>
                <th>Expiry Date</th>
                <th>Title</th>
                <th>Abstract</th>
                <th>Author's Name</th>
                <th style="background-color: #009879;">Actions</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
      <div class="tab-pane fade" id="sendideastab" role="tabpanel" >
        <div class="container text-nowrap">
          <h1 class="text-center">Ideas Investment Status</h1>
          <table class="table table-hover  mb-0" id="sentideastable">
            <thead>
            <tr class="text-center">
                <th  style="background-color: #009879;">No.</th>
                <th>Title</th>
                <th>Risk Rating</th>
                <th>Investor Name</th>
                <th>Expiry Date</th>
                <th style="background-color: #009879;">Decision</th>
                <th style="background-color: #009879;" >Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
      <div class="tab-pane fade" id="investorspreferencestab" role="tabpanel" >
        <div class="container text-nowrap">
          <h1 class="text-center">Investors List</h1>
          <table class="table table-hover  mb-0" id="investorslisttable">
              <thead>
                <tr class="text-center">
                  <th  style="background-color: #009879;">Name</th>
                  <th>Risk Rating</th>
                  <th>Key terms</th>
                  <th>Expiry Date</th>
                  <th>Product Type</th>
                  <th>Instruments</th>
                  <th>Currency</th>
                  <th>Major Sector</th>
                  <th>Minor Sector</th>
                  <th style="background-color: #009879;">Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

  
<script>
$(document).ready(function() {
  $.getScript("/assets/js/jsitems.js",function(){
    initpopups();
    ideastableinit();
  });
});
</script>

