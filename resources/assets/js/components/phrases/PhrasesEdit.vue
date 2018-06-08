<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Editar lo que chuck ha dicho</h5>
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label>Title</label>
                            <input type="text" v-model="phrase.title" class="form-control">
                        </div>
                        <div class="col-12 form-group">
                            <label>Phrase</label>
                            <input type="text" v-model="phrase.phrase" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		mounted() {
			let app = this;
			let id = app.$route.params.id;
			app.phraseId = id;
			axios.get('/randomchuck/public/api/v1/phrases/' + id)
				.then(function (resp) {
					app.phrase = resp.data;
				})
				.catch(function () {
					alert("Chuck no nos deja cargar la frase")
				});
		},
		data: function () {
			return {
				phraseId: null,
				phrase: {
					title: '',
					phrase: ''
				}
			}
		},
		methods: {
			saveForm() {
				event.preventDefault();
				var app = this;
				var newPhrase = app.phrase;
				axios.patch('/randomchuck/public/api/v1/phrases/' + app.phraseId, newPhrase)
					.then(function (resp) {
						app.$router.replace('/');
					})
					.catch(function (resp) {
						console.log(resp);
						alert("Chuck no ha dicho esto!");
					});
			}
		}
	}
</script>
