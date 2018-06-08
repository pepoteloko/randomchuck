
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Atras</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Añade una nueva frase</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Sección</label>
                            <input type="text" v-model="phrase.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Frase</label>
                            <input type="text" v-model="phrase.phrase" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		data: function () {
			return {
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
				axios.post('randomchuck/public/api/v1/phrases', newPhrase)
					.then(function (resp) {
						app.$router.push({path: '/'});
					})
					.catch(function (resp) {
						console.log(resp);
						alert("Chuck nunca ha dicho esto!");
					});
			}
		}
	}
</script>
