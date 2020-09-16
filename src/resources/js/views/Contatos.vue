<template>
  <div class="md-layout">
    <div class="md-layout-item tableConteiner">

        <md-table v-model="people" md-card @md-selected="onSelect">
        <md-table-toolbar>
            <h1 class="md-title">Agenda</h1>
            <md-button class="md-raised md-primary" type="button" @click="showDialog = true">Cadastrar Contato</md-button>
        </md-table-toolbar>

        <md-table-row slot="md-table-row" slot-scope="{ item }" :class="getClass(item)" md-selectable="single">
            <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
            <md-table-cell md-label="Nome" md-sort-by="nome">{{ item.nome }}</md-table-cell>
            <md-table-cell md-label="Email" md-sort-by="email">{{ item.email }}</md-table-cell>
            <md-table-cell md-label="Telefone" md-sort-by="telefone">{{ item.telefone }}</md-table-cell>
            <md-table-cell md-label="Ações">
                <md-button class="md-raised md-primary" @click="showDialog = true" type="button">Editar</md-button>
                <md-button class="md-raised md-accent" @click="confirmDelete = true" type="button">Excluir</md-button>
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
                    @click="showDialog = false"
                >Salvar</md-button>
            </md-dialog-actions>
        </md-dialog>

        <md-dialog-confirm
            :md-active.sync="confirmDelete"
            md-title="Deletar Contato"
            md-content="Tem certeza que deseja deletar esse contato?"
            md-confirm-text="Sim"
            md-cancel-text="Não"
            @md-cancel="false"
            @md-confirm="false" />

    </div>
  </div>
</template>

<script>
  export default {
    data: () => ({
      selected: {},
      showDialog: false,
      confirmDelete: false,
      formContato: {
            id        : null,
            nome      : null,
            telefone  : null,
            email     : null,
      },
      people: [
        {
          id        : 1,
          nome      : 'Shawna Dubbin',
          telefone  : '(47) 99625-8781',
          email     : 'sdubbin0@geocities.com',
        },
        {
          id        : 2,
          nome      : 'Shawna Dubbin',
          telefone  : '(47) 99625-8781',
          email     : 'sdubbin0@geocities.com',
        },
        {
          id        : 3,
          nome      : 'Shawna Dubbin',
          telefone  : '(47) 99625-8781',
          email     : 'sdubbin0@geocities.com',
        },
        {
          id        : 4,
          nome      : 'Shawna Dubbin',
          telefone  : '(47) 99625-8781',
          email     : 'sdubbin0@geocities.com',
        },
      ]
    }),
    methods: {
      getClass: ({ id }) => ({
        'md-primary': id === 2,
        'md-accent': id === 3
      }),

      onSelect (item) {
        this.selected = item
      }
    }
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