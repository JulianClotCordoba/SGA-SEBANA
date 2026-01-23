<?php
ob_start();
?>


						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<i class="me-2 fa fa-align-justify"></i>
										<strong class="card-title" v-if="headerText">Modals</strong>
									</div>
									<div class="card-body">

										<!-- Button trigger modal -->
										<button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#smallmodal">
											Small
										</button>

										<button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#mediumModal">
											Medium
										</button>
										<button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#largeModal">
											Large
										</button>
										<button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#scrollmodal">
											Scrolling
										</button>
										<button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#staticModal">
											Static
										</button>

									</div>
								</div>






							</div>
						</div>
					

<?php
$content = ob_get_clean();
require BASE_PATH . '/public/templates/base.html.php';
?>