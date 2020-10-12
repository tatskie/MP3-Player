<template>
	<div>
		<div class="form-group">
			<div class="card">
			    <div class="card-header">
			    	All songs.

			    	<!-- <div class="float-right">
			    		<button type="button" class="btn btn-sm btn-primary" @click="modalTrigger">
						  Launch demo modal
						</button>
			    	</div> -->
			    </div>
			    <!-- Modal -->
				<!-- <div class="modal fade" id="songModal" tabindex="-1" role="dialog" aria-labelledby="songModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="songModalLabel">Add new Song</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary">Save changes</button>
				      </div>
				    </div>
				  </div>
				</div> -->
			</div>
		</div>
		<div class="form-group">
			<div class="card">
				<div class="card-body">
		    		<audio controls>
						<source src="http://www.w3schools.com/html/horse.ogg" type="audio/ogg" />
						<source src="http://www.w3schools.com/html/horse.mp3" type="audio/mpeg" />
						<a href="http://www.w3schools.com/html/horse.mp3">horse</a>
					</audio>
					<p>Title</p>
			    </div>
			</div>
		</div>
		<div class="form-group">
			<div class="card">
				<div class="card-body">
		    		<audio controls>
						<source src="http://www.w3schools.com/html/horse.ogg" type="audio/ogg" />
						<source src="http://www.w3schools.com/html/horse.mp3" type="audio/mpeg" />
						<a href="http://www.w3schools.com/html/horse.mp3">horse</a>
					</audio>
					<p>Title</p>
			    </div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
        data: function() {
          return {
            songs : {},
            form: new Form()
          };
        },

        methods: {
        	modalTrigger() {
        		$('#songModal').modal('show')
        		console.log('Create a song');
        	},
        }
    }
</script>