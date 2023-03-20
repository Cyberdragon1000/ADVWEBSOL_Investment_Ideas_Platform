<div class="container" 
  <div class="row">
    <div class="col-12">
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

                <tr onclick="location.href='./ideapage.html';">
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
                <br><input type="button" onclick="location.href='/ideaform'" value="Give a new idea" />
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group me-2" role="group" aria-label="First group">
  
<div class="modal fade" id="investoridealist">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <div class="modal-header h5 fw-bold ">
        <div class="col-11 modal-title text-center" id="ideatitleinv"></div>
        <button class="btn-close col-1" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid" id="modalbody">

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Idea Number </div>
            <div class="col-4 text-secondary" id="ideanuminv"> </div>
            <div class="col-2 h6 mb-0 fw-bold">Author </div>
            <div class="col-4 text-secondary" id="ideauthorinv"></div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 h6 mb-0 fw-bold">Abstract</div>
            <div class="col-9 text-secondary" id="ideaabstractinv"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Published on </div>
            <div class="col-4 text-secondary" id="idpubinv"></div>
            <div class="col-2 h6 mb-0 fw-bold">Expires on </div>
            <div class="col-4 text-secondary" id="idexpyinv"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Risk
            </div>
            <div class="col-4 text-secondary" id="idriskinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Currency
            </div>
            <div class="col-4 text-secondary" id="idcurrinv">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Product type
            </div>
            <div class="col-4 text-secondary" id="idprotypeinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Instruments
            </div>
            <div class="col-4 text-secondary" id="idinstrumentinv">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Major Sector
            </div>
            <div class="col-4 text-secondary" id="idmajsectorinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Minor Sector
            </div>
            <div class="col-4 text-secondary" id="idminsectorinv">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Region
            </div>
            <div class="col-4 text-secondary" id="idregioninv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Countries
            </div>
            <div class="col-4 text-secondary" id="idcountryinv">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Content
            </div>
            <div class="col-10 text-secondary" id="idcontentinv">
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="modal-footer">
        <form action="/senddecision" method="post" id="ideasendrm">
          <button class="btn btn-success" name="choice" value="A" type="submit">Approve</button>
          <button class="btn btn-danger" name="choice" value="R" type="submit">Deny</button>
          <input type="hidden" name="investorid" id="ideaattr" value="3" />
        </form>
      </div>
    </div>
  </div>
</div>
