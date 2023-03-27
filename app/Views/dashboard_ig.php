<div class="container" 
  <div class="row">
    <div class="col-15">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<center> <h1>List of ideas</h1> </center> BY EMMANUEL
            <style>
                table, th, td {
                  border:1px solid black;
                }
                </style>
                <table style="width:95%;border:1px solid black">
      <thead>
                <tr>
                    <th>Title</th>
                    <th>Abstract</th>
                    <th>Risk Rating</th>
                    <th>Published Date</th>
                    <th>Expiry Date</th>
                    <th>Product Type</th>
                    <th>Currency</th>
                    <th>Major Sector</th>
                    <th>Country</th>

                </tr>
<div style="background-color: white;">
                <tr class="table-info" onclick="location.href='./ideapage.html';">
                    <td>Idea A</td>
                    <td>Very good investment</td>
                    <td>Manufactural items</td>
                    <td>27th of January 2023</td>
                    <td>31st of March 2023S</td>
                    <td>Building Materials</td>
                    <td>Pound Sterling</td>
                    <td>Residents of Cambridge Campus</td>
                    <td>UK</td>
                </tr>
              
            </table>
          </div>
            <table style="width:95%;border:1px solid black">
                <tr>
                <div id="dialogboxes"></div>
  <h1 class="text-center">List of ideas invested in</h1>
      <thead>

                    <th>Title</th>
                    <th>Abstract</th>
                    <th>Risk Rating</th>
                    <th>Published Date</th>
                    <th>Expiry Date</th>
                    <th>Product Type</th>
                    <th>Currency</th>
                    <th>Major Sector</th>
                    <th>Country</th>
                </tr>
                <tr onclick="location.href='./ideapage.html';">
                    <td>Idea A</td>
                    <td>Very good investment</td>
                    <td>Milk</td>
                    <td>20th March 2023</td>
                    <td>31st March 2023</td>
          
                    <td>Beveragies</td>
                    <td>Pound Sterling</td>
                    <td>Anglia Ruskin University Main Campus Cambridge</td>
                    <td>UK</td>
                </tr>
                </table>
                <br><input type="button"  class="btn btn-primary" onclick="location.href='/ideaform'" value="Give a new idea" 
                <div class="col-4 text-secondary" id="idcountryinv">      
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  