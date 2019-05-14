    <div class="container-fluid pt70 pb70">
      <div id="santri" class="fh5co-projects-feed row">
      </div>
      <!--END .fh5co-projects-feed-->
      <nav id="nav" aria-label="Page navigation example" data-offset="0" status="normal">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled" id="prev">
            <a class="page-link" href="#">Previous</a>
          </li>
          <li class="page-item disabled"><a class="page-link" href="#"><span id="currentPage">1</span> of <span id="totalPage"></span></a></li>
          <li class="page-item" id="next">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- END .container-fluid -->
    <!-- Modal start -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Semua tentang <span id="modal-title"></span></h5>
            <button type="button" class="close-modal close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <tbody>
                <tr>
                  <th>Nama</th>
                  <td>: <span id="modal-nama"></span></td>
                </tr>
                <tr>
                  <th>Asal</th>
                  <td>: <span id="modal-asal"></span></td>
                </tr>
                <tr>
                  <th>Cabang</th>
                  <td>: <span id="modal-cabang"></span></td>
                </tr>
                <tr>
                  <th>Skiils</th>
                  <td id="modal-skill">: PHP, Codeigniter, Laravel, Javascript, Bootstrap, HTML, CSS, Vue JS, React JS</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Close modal -->
