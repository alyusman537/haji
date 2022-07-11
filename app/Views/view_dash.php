<!DOCTYPE html>
<html>
    <head>
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900"
            rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css"
            rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css"
            rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1,
            maximum-scale=1, user-scalable=no, minimal-ui">
    </head>
    <body>
        <div id="app">
            <v-app>
                <v-main>
                    <v-toolbar color="info" dark>
                        <v-app-bar-nav-icon class="ml-5" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                        <v-toolbar-title>
                            <p class="d-md-none d-lg-none d-xs-non d-xl-none d-sm-flex">
                                <strong>BMT-MASLAHAH</strong>
                            </p>
                            <p class="d-none d-md-flex">
                            DATA TALANGAN HAJI &nbsp;<strong>BMT-MASLAHAH</strong>
                        </p>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                            <template>
                                <div>
                                    <v-breadcrumbs :items="itemBC">
                                    <template v-slot:divider>
                                        <v-icon>mdi-chevron-right</v-icon>
                                    </template>
                                    </v-breadcrumbs>
                                </div>
                            </template>
                        </v-toolbar-items>
                    </v-toolbar>
                    <v-container>

                    <v-container>
          <div class="row">
            <div class="cols col-4">
                <v-card>
                    <v-card class="pa-1 elevation-0" width="300" height="300" tag="canvas" id="bar-chart-cabang"></v-card>
                </v-card>    
                 
            </div>
            <div class="cols col-4">
                <v-card>
                    <v-card class="pa-1 elevation-0" width="300" height="300" tag="canvas" id="bar-chart-kabupaten"></v-card>
                </v-card>
            </div>
            <div class="cols col-4">
                <v-card>
                    <v-card class="pa-1 elevation-0" width="300" height="300" tag="canvas" id="pie-chart-status"></v-card>
                </v-card>
            </div>
            <div class="cols col-4">
                <v-card>
                    <v-card class="pa-1 elevation-0" width="300" height="300" tag="canvas" id="pie-chart-gender"></v-card>
                </v-card>
            </div>
            <div class="cols col-12">
                <v-card>
                    <v-card class="pa-1 elevation-0" width="auto" height="300" tag="canvas" id="line-chart-bulan"></v-card>
                </v-card>
            </div>

          </div>
          
        </v-container>

                    </v-container>
                </v-main>
            </v-app>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
  <script src="<?=base_url();?>/renderJs/dash.js"></script>
    </body>
</html>