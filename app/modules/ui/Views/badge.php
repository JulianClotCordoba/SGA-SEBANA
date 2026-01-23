<?php
ob_start();
?>


            <div class="row">
              <div class="col-lg-6">

                <div class="card">
                  <div class="card-header">
                    <strong>Badges</strong>
                    <small>Use
                      <code>.badge</code> class within
                      <code>&lt;span&gt;</code> elements to create badges:
                    </small>
                  </div>
                  <div class="card-body">

                    <a href="#">News
                      <span class="badge bg-primary">5</span>
                    </a>
                    <br>
                    <a href="#">Comments
                      <span class="badge bg-warning">10</span>
                    </a>
                    <br>
                    <a href="#">Updates
                      <span class="badge bg-success">2</span>
                    </a>
                  </div>
                </div>
                <!-- /# card -->


                <div class="card">
                  <div class="card-header">
                    <strong>Labels</strong>
                  </div>
                  <div class="card-body">
                    <p class="text-muted m-b-15">Use the
                      <code>.label</code> class,  followed by one of the six contextual classes
                      <code>.label-default</code>,
                      <code>.label-primary</code>,
                      <code>.label-success</code>,
                      <code>.label-info</code>,
                      <code>.label-warning</code> or
                      <code>.label-danger</code>, within a
                      <code>&lt;span&gt;</code> element to create a label:</p>

                    <h1>Example heading
                      <span class="badge bg-secondary">New</span>
                    </h1>
                    <h2>Example heading
                      <span class="badge bg-secondary">New</span>
                    </h2>
                    <h3>Example heading
                      <span class="badge bg-secondary">New</span>
                    </h3>
                    <h4>Example heading
                      <span class="badge bg-secondary">New</span>
                    </h4>
                    <h5>Example heading
                      <span class="badge bg-secondary">New</span>
                    </h5>
                    <h6>Example heading
                      <span class="badge bg-secondary">New</span>
                    </h6>
                  </div>
                </div>

              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <strong>Badges in Buttons</strong>
                  </div>
                  <div class="card-body">
                    <p class="text-muted m-b-15">Use the
                      <code>.badge</code> class within
                      <code>&lt;span&gt;</code> elements to create badges:</p>

                    <button type="button" class="btn btn-primary m-l-10 m-b-10">Primary
                      <span class="badge bg-light">7</span>
                    </button>
                    <button type="button" class="btn btn-success m-l-10 m-b-10">Success
                      <span class="badge bg-light">7</span>
                    </button>
                    <button type="button" class="btn btn-info m-l-10 m-b-10">Info
                      <span class="badge bg-light">7</span>
                    </button>
                    <button type="button" class="btn btn-warning m-l-10 m-b-10">Warning
                      <span class="badge bg-light">7</span>
                    </button>
                    <button type="button" class="btn btn-danger m-l-10 m-b-10">Danger
                      <span class="badge bg-light">7</span>
                    </button>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <strong>Labels</strong>
                  </div>
                  <div class="card-body">
                    <p class="text-muted m-b-15">Use the
                      <code>.label</code> class,  followed by one of the six contextual classes
                      <code>.label-default</code>,
                      <code>.label-primary</code>,
                      <code>.label-success</code>,
                      <code>.label-info</code>,
                      <code>.label-warning</code> or
                      <code>.label-danger</code>, within a
                      <code>&lt;span&gt;</code> element to create a label:</p>

                    <span class="badge bg-primary">Primary</span>
                    <span class="badge bg-secondary">Secondary</span>
                    <span class="badge bg-success">Success</span>
                    <span class="badge bg-danger">Danger</span>
                    <span class="badge bg-warning">Warning</span>
                    <span class="badge bg-info">Info</span>
                    <span class="badge bg-light">Light</span>
                    <span class="badge bg-dark">Dark</span>


                  </div>
                </div>

              </div>
            </div>
          

<?php
$content = ob_get_clean();
require BASE_PATH . '/public/templates/base.html.php';
?>