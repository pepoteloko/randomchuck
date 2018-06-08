
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createPhrase'}" class="btn btn-success">Añade una nueva frase</router-link>
        </div>

        <div class="row">
            <h5 class="card-title">Lista de Frases</h5>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Phrase</th>
                    <th width="100">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="phrase, index in phrases">
                    <td>{{ phrase.title }}</td>
                    <td>{{ phrase.phrase }}</td>
                    <td>
                        <router-link :to="{name: 'editPhrase', params: {id: phrase.id}}" class="btn btn-primary btn-sm">
                            Edit
                        </router-link>
                        <a href="#"
                           class="btn btn-sm btn-danger"
                           v-on:click="deleteEntry(phrase.id, index)">
                            Delete
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
</template>

<script>
	export default {
		data: function () {
			return {
				phrases: []
			}
		},
		mounted() {
			var app = this;
			axios.get('/randomchuck/public/api/v1/phrases/')
				.then(function (resp) {
					app.phrases = resp.data;
				})
				.catch(function (resp) {
					console.log(resp);
					alert("Chuck está mudo");
				});
		},
		methods: {
			deleteEntry(id, index) {
				if (confirm("Estas seguro que chuck no lo dijo?")) {
					var app = this;
					axios.delete('/randomchuck/public/api/v1/phrases/' + id)
						.then(function (resp) {
							app.phrases.splice(index, 1);
						})
						.catch(function (resp) {
							alert("Lo dicho, dicho está...");
						});
				}
			}
		}
	}
</script>
