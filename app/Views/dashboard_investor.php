<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<input type="button" value="Change My Profile" onclick="location.href='./investorprofile.html';" style="float: right;"></input>    
            <center> <h1>List of ideas</h1> </center>
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
                    <td>0</td>
                    <td>7/1/23</td>
                    <td>7/1/24</td>
                    <td>Bonds</td>
                    <td>Pounds</td>
                    <td>Health</td>
                    <td>UK</td>
                </tr>
            </table>
            <hr>
            <center> <h1>List of ideas invested in</h1> </center>
            <table style="width:100%;border:1px solid black">
                <tr>
                    <th>Title</th>
                    <th>Abstract</th>
                    <th>Risk Rating</th>
                    <th>Accepted Date</th>
                    <th>Expiry Date</th>
                    <th>Product Type</th>
                    <th>Currency</th>
                    <th>Major Sector</th>
                    <th>Country</th>
                    <th>Changes</th>
                </tr>
                <tr onclick="location.href='./ideapage.html';">
                    <td>Idea old</td>
                    <td>good investment</td>
                    <td>2</td>
                    <td>15/5/22</td>
                    <td>4/3/23</td>
                    <td>Bonds</td>
                    <td>Rupees</td>
                    <td>Sports</td>
                    <td>India</td>
                    <td>None</td>
                </tr>
            </table>