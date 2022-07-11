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
            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1,
            maximum-scale=1, user-scalable=no, minimal-ui">
            <!-- csrf untuk kemanaan data di codeigniter4 -->
            <!--meta  class="txt_csrfname" name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>"-->
    </head>
    <body>
        <div id="app">
            <v-app>
                <v-main>
                    <v-toolbar color="blue darken-4" dark>
                        <v-app-bar-nav-icon class="ml-5" @click.stop="drawer=
                            !drawer"></v-app-bar-nav-icon>
                        <v-toolbar-title>
                            <p class="d-md-none d-lg-none d-xs-non d-xl-none
                                d-sm-flex mt-4">
                                <strong>BMT-MASLAHAH</strong>
                            </p>
                            <p class="d-none d-md-flex mt-4">
                                DATA TALANGAN HAJI &nbsp;<strong>BMT-MASLAHAH</strong>
                            </p>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                            <v-btn icon circle><v-icon>mdi-export</v-icon></v-btn>
                        </v-toolbar-items>
                    </v-toolbar>
                    <v-navigation-drawer
                        v-model="drawer"
                        left
                        absolute>
                        <v-list
                            nav
                            dense>
                            <v-list-item-group
                                v-model="group"
                                active-class="deep-purple--text text--accent-4">
                                <v-list-item>
                                    <v-list-item-title>Foo</v-list-item-title>
                                </v-list-item>

                                <v-list-item>
                                    <v-list-item-title>Bar</v-list-item-title>
                                </v-list-item>

                                <v-list-item>
                                    <v-list-item-title>Fizz</v-list-item-title>
                                </v-list-item>

                                <v-list-item>
                                    <v-list-item-title>Buzz</v-list-item-title>
                                </v-list-item>
                            </v-list-item-group>
                        </v-list>
                    </v-navigation-drawer>
                    <v-container>

                        <v-card max-width="800" class="mx-auto">
                            <v-toolbar color="blue darken-4" dark
                                class="elevation-0">
                                <v-toolbar-title>
                                    Data Detail Jamaah
                                </v-toolbar-title>
                            </v-toolbar>

                            <v-card-text>
                                <v-img
                                    max-width="300"
                                    max-height="400"
                                    class="text-center mx-auto"
                                    src="../../writable/uploads/foto/1655773525_d899a5296759747732c7.jpeg">
                                </v-img>
                                <!---->
                                <div class="container">
                                    <!-- CSRF token --> 
                                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                          
                                    <div class="row">
                                       <div class="col-md-12">
                          
                                          <!-- Response message -->
                                          <div class="alert displaynone" id="responseMsg"></div>
                          
                                          <!-- File preview --> 
                                          <div id="filepreview" class="displaynone" > 
                                              <img :src="sumberFoto" class="displaynone" with="200px" height="200px"><br>
                          
                                              <!--a href="#" class="displaynone" >Click Here..</a-->
                                          </div>
                          
                                          <!-- File upload form -->
                                          <form method="post" action="http://localhost:8080/jamaah/fileUpload" enctype="multipart/form-data">
                          
                                             <div class="form-group">
                          
                                                <label for="file">File:</label>
                          
                                                <input type="file" class="form-control" id="file" name="file" />
                                                <!-- Error -->
                                                <div class='alert alert-danger mt-2 d-none' id="err_file"></div>
                          
                                             </div>
                          
                                            <input type="button" class="btn btn-success" id="submit" value="Upload">
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- -->
                                <!--div class=" text-center mx-auto mt-3">
                                    <v-file-input
                                    max-width="200"
                                        show-size
                                        small-chips
                                        truncate-length="10"
                                        >Pilih Foto...</v-file-input>
                                <v-btn color="primary" small class="elevation-0">{{ textTombol }}</v-btn>
                            </div-->
                                <v-row class="mt-5">
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Nomor Sertifikat</div>
                                    </v-col>
                                    <v-col cols="9" md="9">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.nomorSertifikat}}</div>
                                    </v-col>
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Nama</div>
                                    </v-col>
                                    <v-col cols="9" md="9">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.nama}}</div>
                                    </v-col>
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Tempat Tanggal Lahir</div>
                                    </v-col>
                                    <v-col cols="9" md="3">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.tempatLahir+', '+ dataDetail.tanggalLahir}}</div>
                                    </v-col>
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Umur</div>
                                    </v-col>
                                    <v-col cols="9" md="3">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.umur}}</div>
                                    </v-col>
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Alamat</div>
                                    </v-col>
                                    <v-col cols="9" md="3">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.alamat}}</div>
                                    </v-col>
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Tempat Pendaftaran</div>
                                    </v-col>
                                    <v-col cols="9" md="3">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.kantor}}</div>
                                    </v-col>
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Tanggal Pendaftaran</div>
                                    </v-col>
                                    <v-col cols="9" md="3">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.tanggalDaftar}}</div>
                                    </v-col>
                                    <v-col cols="3" md="3">
                                        <div class="subtitle-1">Foto</div>
                                    </v-col>
                                    <v-col cols="9" md="3">
                                        <div class="subtitle-2 mt-1">:
                                            {{dataDetail.linkFoto}}</div>
                                    </v-col>
                                    

                                </v-row>
                            </v-card-text>
                        </v-card>


                    </v-container>
                </v-main>
            </v-app>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="../../JS/jamaahDetail.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script type="text/javascript">
           $(document).ready(function(){
               let lingBaru;

          $('#submit').click(function(){

            const pageURL = window.location.href;
            const lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
            console.log( 'ini last' +lastURLSegment);
            const id = lastURLSegment;

            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            // Get the selected file
            var files = $('#file')[0].files;

            if(files.length > 0){
               var fd = new FormData();

               // Append data 
               fd.append('file',files[0]);
               fd.append([csrfName],csrfHash);
               fd.append('id', id);
               
               // Hide alert 
               $('#responseMsg').hide();

               // AJAX request 
               $.ajax({
                  url: "http://localhost:8080/jamaah/fileUpload",
                  //headers: {'X-Requested-With': 'XMLHttpRequest'},
                  method: 'post',
                  data: fd,
                  contentType: false,
                  processData: false,
                  dataType: 'json',
                  success: function(response){

                     // Update CSRF hash
                     $('.txt_csrfname').val(response.token);

                     // Hide error container
                     $('#err_file').removeClass('d-block');
                     $('#err_file').addClass('d-none');

                     if(response.success == 1){ // Uploaded successfully

                        // Response message
                        $('#responseMsg').removeClass("alert-danger");
                        $('#responseMsg').addClass("alert-success");
                        $('#responseMsg').html(response.message);
                        $('#responseMsg').show();

                        // File preview
                        $('#filepreview').show();
                        $('#filepreview img,#filepreview a').hide();
                        if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){
                            console.log(response.foto);
                            lingBaru = response.filepath;
                            console.log('ini unukt tampil ' +response.filepath);
                            //updateFoto();
                            let da = {linkFoto: response.foto};
                            //da.append('linkFoto', response.foto);

            $.ajax({
                type : "PUT",
                url  : `http://localhost:8080/jamaah/updateFoto/${id}`,
                dataType : "JSON",
                data : da,
                success: function(data){
                    console.log(data);
                    location.reload();
                }
            });
            return false;

                           $('#filepreview img').attr('src','http://localhost:8080/renderImage/'+response.foto);
                           $('#filepreview img').show();
                        }else{
                           $('#filepreview a').attr('href','http://localhost:8080/renderImage/'+response.foto).show();
                           $('#filepreview a').show();
                        }
                        //location.reload();
                     }else if(response.success == 2){ // File not uploaded

                        // Response message
                        $('#responseMsg').removeClass("alert-success");
                        $('#responseMsg').addClass("alert-danger");
                        $('#responseMsg').html(response.message);
                        $('#responseMsg').show();
                     }else{
                        // Display Error
                        $('#err_file').text(response.error);
                        $('#err_file').removeClass('d-none');
                        $('#err_file').addClass('d-block');
                     }
                  },
                  error: function(response){
                      console.log("error : " + JSON.stringify(response) );
                  }
               });
            }else{
               alert("Please select a file.");
            }

          });
          //Update Barang
        function updateFoto(){
            const pageURL = window.location.href;
            const lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
            console.log(lastURLSegment);
            const id = lastURLSegment;
            $.ajax({
                type : "PUT",
                url  : `http://localhost:8080/jamaah/updateFoto/${id}`,
                dataType : "JSON",
                data : {linkFoto: lingBaru},
                success: function(data){
                    location.reload();
                }
            });
            return false;
        };
        });
        </script>

    </body>
</html>