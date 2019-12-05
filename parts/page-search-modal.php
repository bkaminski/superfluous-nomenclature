	<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="searchModalLabel">Search WBW:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="get" id="searchform" action="<?php echo home_url() ; ?>/" autocomplete="off">
	                	<div class="input-group">
		                	<input class="form-control form-control-lg search-form" type="text" autocomplete="off" placeholder="Search this site" value="<?php echo esc_html($s, 1); ?>" name="s" id="searchWbw" maxlength="33" required />
		                		<div class="input-group-append">
		                    		<button class="btn btn-secondary my-sm-0" type="submit">
		                    			<i class="fas fa-search fa-lg fa-fw"></i>
		                    		</button>
		                    	</div>
		                </div>
	                </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-blue rounded-0" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
