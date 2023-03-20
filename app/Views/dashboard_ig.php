<div class="container" style="background-color: white; ">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<center> <h1>List of ideas</h1> </center> by emmanuel
            <style>
                table, th, td {
                  border:1px solid black;
                }
                </style>
                <table style="width:100%;border:1px solid black">
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
                    <td>prodsucts</td>
                    <td>Food items</td>
                    <td>Bonds</td>
                    <td>Pounds</td>
                    <td>Health</td>
                    <td>UK</td>
                </tr>
            </table>
            <table style="width:100%;border:1px solid black">
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
                    <td>0</td>
                    <td><button type="button" class="btn btn-secondary">Goods</button></td>
                    <td><div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-info">Food</button>
  </div></td>
                    <td>Bonds</td>
                    <td>Pounds</td>
                    <td>Health</td>
                    <td>UK</td>
                </tr>
                </table>
                <br><input type="button" onclick="location.href='./ideapage.html';" value="Give a new idea" />
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
