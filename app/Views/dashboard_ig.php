<div class="container">
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
                    <td>0</td>
                    <td>7/1/23</td>
                    <td>7/1/24</td>
                    <td>Bonds</td>
                    <td>Pounds</td>
                    <td>Health</td>
                    <td>UK</td>
                </tr>
                </table>
                <br><input type="button" onclick="location.href='./ideapage.html';" value="Give a new idea" />