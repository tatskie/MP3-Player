<template>
	<div>
		<div class="form-group">
			<div class="card">
			    <div class="card-header">
			    	My mp3

			    	<div class="float-right">
			    		<button type="button" class="btn btn-sm btn-primary" @click="modalTrigger">
						  Upload mp3
						</button>
			    	</div>
			    </div>
			    <!-- Modal -->
				<div class="modal fade" id="songModal" tabindex="-1" role="dialog" aria-labelledby="songModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				  	<form class="form-horizontal" @submit.prevent="createSong()" @keydown="form.errors.clear($event.target.name)">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="songModalLabel">Upload mp3</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <div class="form-group">
							    <label for="title">Title</label>
							    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" v-model="form.title">
							    <div class="form-error">
					                <span v-if="form.errors.has('title')">
					                    <strong v-text="form.errors.get('title')"></strong>
					                </span>
					            </div>
							</div>
							<div class="form-group">
							    <label for="mp3">mp3</label>
							    <input type="file" class="form-control" name="mp3" id="mp3" @change="uploadFile">
							    <small id="mp3" class="form-text text-muted">We'll never share your email with anyone else.</small>
							    <div class="form-error">
					                <span v-if="form.errors.has('mp3')">
					                    <strong v-text="form.errors.get('mp3')"></strong>
					                </span>
					            </div>
							</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Save changes</button>
					      </div>
					    </div>
					</form>
				  </div>
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
            form: new Form({
            	slug: '',
            	title: '',
            	mp3: ''
            })
          };
        },

        methods: {
        	modalTrigger() {
        		$('#songModal').modal('show')
        	},

        	createSong() {
        		this.form.post('/songs')
			      .then(() => {
			      	console.log('created');
			      })
			      .catch(() => {
			        console.log('error');
			      });
        	},

        	uploadFile(e) {
        		let mp3 = e.target.files[0];
        		let reader = new FileReader();
        		reader.onloadend = (mp3) => {
        			console.log(reader.result);
        			this.form.errors.clear('mp3');
        			this.form.mp3 = reader.result;
        		}
        		reader.readAsDataURL(mp3);
        	}
        }
    }
</script>