<template>
    <div class="md-layout">
        <div class="md-layout-item"></div>
        <div class="md-layout-item">
            <form novalidate class="md-layout" @submit.prevent="loginCheck">
                <md-card class="md-layout-item md-size-50 md-small-size-100 login-card">
                    <md-card-header>
                        <div class="md-title">Login</div>
                    </md-card-header>
                    <md-card-content>
                        <div class="md-layout md-gutter">

                            <div class="md-layout-item md-small-size-100">
                                <md-field>
                                    <label for="login">Login</label>
                                    <md-input 
                                        name="login" 
                                        id="login" 
                                        v-model="form.login" 
                                        :disabled="enviando" 
                                    />
                                </md-field>

                                <md-field>
                                    <label for="senha">Senha</label>
                                    <md-input 
                                        name="senha" 
                                        id="senha" 
                                        type='password'
                                        v-model="form.senha" 
                                        :disabled="enviando" 
                                    />
                                </md-field>

                                <md-button :disabled="enviando" class="md-primary" type="submit">Enviar</md-button>
                            </div>

                        </div>
                    </md-card-content>
                </md-card>
            </form>
        </div>
        <div class="md-layout-item"></div>
        <md-dialog-alert
            :md-active.sync="alertErro"
            md-title="Ops, ocorreu um erro!"
            :md-content="dialogContent"
            md-confirm-text="Ok!" />
    </div>
</template>
<script>

export default {
    data: () => ({
      form: {
        login   : null,
        senha   : null,
      },
      enviando      : false,
      
      alertErro     : false,
      dialogContent : null,
    }),
    methods: {
        loginCheck() {
            this.enviando = true;
            axios.post('/login', this.form)
                .then(response => {
                    localStorage.token = response.data.data.token;
                    this.$router.push('contatos');
                })
                .catch(error => {
                    this.enviando = false;
                    this.alertErro = true;
                    this.dialogContent = 'Ocorreu um erro durante a validação dos dados, tente novamente.';
                });
        }
    }
}
</script>
<style scoped>
    .login-card {
        margin: auto;
        margin-top: 60px;
    }
</style>