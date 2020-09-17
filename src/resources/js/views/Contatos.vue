<template>
  <div class="md-layout">
    <div class="md-layout-item tableConteiner">

        <md-table v-model="contato" md-card>
        <md-table-toolbar>
            <h1 class="md-title">Agenda</h1>
            <md-button class="md-raised md-primary" type="button" @click="showDialog = true">Cadastrar Contato</md-button>
        </md-table-toolbar>

        <md-table-row slot="md-table-row" slot-scope="{ item }" md-selectable="single">
            <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
            <md-table-cell md-label="Nome" md-sort-by="nome">{{ item.nome }}</md-table-cell>
            <md-table-cell md-label="Email" md-sort-by="email">{{ item.email }}</md-table-cell>
            <md-table-cell md-label="Telefone" md-sort-by="telefone">{{ item.telefone }}</md-table-cell>
            <md-table-cell md-label="Ações">
                <md-button class="md-raised md-primary" @click="editarContato(item)"    type="button">Editar</md-button>
                <md-button class="md-raised md-accent"  @click="confirmDeleteFunction(item)" type="button">Excluir</md-button>
            </md-table-cell>
        </md-table-row>
        </md-table>

        <md-dialog :md-active.sync="showDialog">
            <md-dialog-title>Contato</md-dialog-title>
            
            <div class="md-layout">
                <div class="md-layout-item">

                    <md-field>
                        <label for="nome">Nome</label>
                        <md-input 
                            name="nome" 
                            id="nome" 
                            v-model="formContato.nome" 
                            :disabled="!showDialog" 
                        />
                    </md-field>
                    <md-field>
                        <label for="email">Email</label>
                        <md-input 
                            name="email" 
                            id="email" 
                            type="email"
                            v-model="formContato.email" 
                            :disabled="!showDialog" 
                        />
                    </md-field>
                    <md-field>
                        <label for="telefone">Telefone</label>
                        <md-input 
                            name="telefone" 
                            id="telefone" 
                            v-model="formContato.telefone" 
                            :disabled="!showDialog" 
                        />
                    </md-field>
                </div>
            </div>

            <md-dialog-actions>
                <md-button 
                    class="md-primary" 
                    @click="showDialog = false"
                >Cancelar</md-button>

                <md-button 
                    class="md-primary" 
                    @click="submeteForm()"
                >Salvar</md-button>
            </md-dialog-actions>
        </md-dialog>

        <md-dialog-confirm
            :md-active.sync="confirmDelete"
            md-title="Deletar Contato"
            md-content="Tem certeza que deseja deletar esse contato?"
            md-confirm-text="Sim"
            md-cancel-text="Não"
            @md-confirm="deleteContato" />


        <md-dialog-alert
            :md-active.sync="alertErro"
            :md-title="alertTitle"
            :md-content="dialogContent"
            md-confirm-text="Ok!" />

    </div>
  </div>
</template>

<script>
  export default {
    data: () => ({
      selected: {},
      showDialog: false,
      confirmDelete: false,
      contato: [],

      alertErro: false,
      dialogContent: null,
      alertTitle: null,

      contatoId: null,

      formContato: {
            id        : null,
            nome      : null,
            telefone  : null,
            email     : null,
      },
    }),

    methods: {

      setAlertMsg(title, msg) {
        this.alertTitle     = title;
        this.dialogContent  = msg;
        this.alertErro      = true;
      },

      catchErrorAxios(error) {
        this.alertTitle     = 'Ops, ocorreu um erro!';
        this.dialogContent  = 'Ocorreu um erro ao buscar os dados de contatos';
        this.alertErro      = true;
      },

      atualizaTabelaContatos() {
        axios.get('/contato', {
          headers: {
            Authorization: 'Bearer ' + localStorage.token
          }
        })
          .then((request) => {
            this.contato = request.data.data; 
          })
          .catch(error => {
            this.catchErrorAxios(error);
          });
      },

      confirmDeleteFunction(item) {
        this.contatoId = item.id;
        this.confirmDelete = true
      },

      deleteContato() {
        axios.delete('/contato/' + this.contatoId, {
          headers: {
            Authorization: 'Bearer ' + localStorage.token
          }
        })
          .then(request => {
            
            this.atualizaTabelaContatos();
            this.setAlertMsg('Contato Deletado com Sucesso!', request.data.message);

          })
          .catch(error => {
            this.catchErrorAxios(error);
          });
      },
      editarContato(item) {
        
        axios.get('/contato/' + item.id, {
          headers: {
            Authorization: 'Bearer ' + localStorage.token
          }
        })
          .then(request => {

            this.formContato = request.data.data.contato;
            this.showDialog = true

          })
          .catch(error => {
            this.catchErrorAxios(error);
          });
      },
      submeteForm() {
        
        if(this.formContato.id != null) {
          this.atualizaContato();
        } else {
          this.cadastraContato();
        }

        this.showDialog = false
      },


      atualizaContato() {

        axios.put('/contato/' + this.formContato.id, this.formContato, {
          headers: {
            Authorization: 'Bearer ' + localStorage.token
          }
        })
          .then(request => {

            this.atualizaTabelaContatos();
            this.formContato = {
                  id        : null,
                  nome      : null,
                  telefone  : null,
                  email     : null,
            };
            this.setAlertMsg('Contato Atualizado com Sucesso!', request.data.message);

          })
          .catch(error => {
            this.catchErrorAxios(error);
          });
      },

      cadastraContato() {
        axios.post('/contato', this.formContato, {
          headers: {
            Authorization: 'Bearer ' + localStorage.token
          }
        })
          .then(request => {
            this.atualizaTabelaContatos();
            this.formContato = {
                  id        : null,
                  nome      : null,
                  telefone  : null,
                  email     : null,
            };
            this.setAlertMsg('Contato Cadastrado com Sucesso!', request.data.message);

          })
          .catch(error => {
            this.catchErrorAxios(error);
          });
      }

    },
    mounted() {
      this.atualizaTabelaContatos();
    },

  }
</script>

<style lang="scss" scoped>

    .tableConteiner {
        padding-top: 100px;
    }

    .md-table + .md-table {
        margin-top: 16px
    }

    .md-dialog-container {
        .md-layout {
            padding: 0 15px;
        }
    }

</style>