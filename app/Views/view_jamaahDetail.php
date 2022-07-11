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

                        <v-card max-width="800" class="mx-auto">
                            <v-toolbar color="blue darken-4" dark
                                class="elevation-0">
                                <v-toolbar-title>
                                    <p v-if="detail.jenisKelamin == 'Laki-laki'">Data Detail Bapak {{ detail.nama }}</p>
                                    <p v-else> Data Detail Ibu {{ detail.nama }} </p>
                                </v-toolbar-title>
                            </v-toolbar>

                            <v-card-text>
                                <!--figure style="height: 400px; width: 300px;" -->
                                    <img :src="sumberFoto" alt="Image" class="card-img-top ml-5" id="image-display" style="border-radius: 3%; width: 50%; height: auto;">
                                <!--/figure-->
                                <v-form id="upload-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" >
                                    <v-row class="ml-5">
                                        <v-col cols="10">
                                            <v-file-input type="file" label="Pilih foto (format JPEG dan ukuran max 3mb) ..." id="image" name="image"></v-file-input>
                                        </v-col>
                                        <v-col cols="2">
                                            <v-btn color="success" small class="mt-5" type="submit" @click.prevent="unggahFoto">Upload</v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                                <template>
                                    <table class="ml-5">
                                        <tbody>
                                            <tr>
                                                <td width="20%">Nomor Sertifikat</td>
                                                <td width="3%">:</td>
                                                <td width="25%"><strong>{{ detail.nomorSertifikat }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Nama</td>
                                                <td width="3%">:</td>
                                                <td width="25%"><strong>{{ detail.nama }}</strong></td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td width="20%">Tempat Tanggal Lahir</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.tempatLahir}}, {{ detail.tanggalLahir }}</td>
                                                <td width="20%">Umur</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.umur }}</td>
                                            </tr>
                                            <tr>
                                            <td width="20%">Alamat</td>
                                                <td width="3%">:</td>
                                                <td colspan="4">{{ detail.alamat }}</td>
                                            </tr>
                                            <tr>
                                            <td width="20%">Desa</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.desa }}</td>
                                                <td width="20%">Kecamatan</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.kecamatan }}</td>
                                            </tr>
                                            <tr>
                                            <td width="20%">Kota/Kabupaten</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.kabupaten }}</td>
                                                <td width="20%">Propinsi</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.propinsi }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">No. Telepon/HP</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.telepon }}</td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                            <td width="20%">Tanggal Pendaftaran</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.tanggalDaftar }}</td>
                                                <td width="20%">Tempat Pendaftaran</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.kantor }}</td>
                                                </tr>
                                                <tr>
                                                <td width="20%">No. Rek. BMT</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.rekeningBmt }}</td>
                                                <td width="20%">No. Rek. Bank Lain</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.rekeningBank }}</td>
                                                </tr>
                                                <tr>
                                                <td width="20%">Plafond</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.plafond }}</td>
                                                <td width="20%">Keterangan</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.keterangan }}</td>
                                                </tr>
                                                <tr>
                                                <td width="20%">SPH</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.sph }}</td>
                                                <td width="20%">BPIH</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.bpih }}</td>
                                            </tr>
                                            <tr v-if="detail.status == 'Nonaktif'" style="background-color: red;">
                                                <td width="20%">Tanggal Pembatalan</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.tanggalPembatalan }}</td>
                                            </tr>
                                                <tr v-else>
                                                <td width="20%">Tanggal Pembatalan</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.tanggalPembatalan }}</td>
                                            </tr>
                                                <tr>
                                                <td width="20%">Alasan Pembatalan</td>
                                                <td width="3%">:</td>
                                                <td width="25%">{{ detail.keteranganPembatalan }}</td>
                                            </tr>
                                        </tbody>
                                        </template>
                                    </table>
                                   

                                
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="success" class="mb-5 mr-5" @click="cetakPdf">Cetak Pdf</v-btn>
                                <v-btn color="success" class="mb-5 mr-5" v-if="tampilButton" @click="tampilButton = false">Ubah Data</v-btn>
                                <div v-else="!tampilButton">
                                    <v-btn color="success" class="mb-5 mr-5" small @click="dialogKoreksi = true">Koreksi Data Jamaah</v-btn>
                                    <v-btn color="success" class="mb-5 mr-5" small>Pembatalan</v-btn>
                                <!--v-btn color="success" class="mb-5 mr-5"  @click="updateDataJamaah">Simpan</v-btn-->
                                <v-btn color="error" class="mb-5 mr-5" small @click="tampilButton = true">batal</v-btn>
                            </div>
                            </v-card-actions>
                        </v-card>

                        <v-dialog
                        v-model="dialogKoreksi"
                        scrollable
                        persistent :overlay="false"
                        max-width="800px"
                        transition="dialog-transition"
                    >
                    <v-card>
                        <v-card-title primary-title>
                            Koreksi Data Jamaah
                        </v-card-title>
                        <v-card-text>
                            <h3>No. Sertifikat {{detail.nomorSertifikat}} </h3>
                            <v-text-field
                                label="Nama"
                                v-model="detail.nama"
                            ></v-text-field>
                            <v-text-field
                            label="Tempat Lahir"
                                v-model="detail.tempatLahir">
                            </v-text-field>
                            <v-text-field
                            label="Tanggal Daftar"
                            v-model="detail.tanggalLahir"
                            hint="YYYY-MM-DD"></v-text-field>
                            <v-text-field
                            label="Umur"
                            v-model="detail.umur"></v-text-field>
                            <v-radio-group
                                v-model="detail.jenisKelamin"
                                row
                                >
                                <v-radio
                                    label="Laki-laki"
                                    value="Laki-laki"
                                ></v-radio>
                                <v-radio
                                    label="Perempuan"
                                    value="Perempuan"
                                ></v-radio>
                            </v-radio-group>
                            <v-autocomplete
                            label="Propinsi"
                                :items="listPropinsi"
                                item-value="prov_id"
                                item-text="prov_name"
                                v-model="detail.id_propinsi"
                                @change="gantiKota">
                            </v-autocomplete>
                            <v-autocomplete
                            label="Kabupaten/Kota"
                                :items="listKota"
                                item-value="city_id"
                                item-text="city_name"
                                v-model="detail.id_kabupaten"
                                @change="gantiKecamatan">
                            </v-autocomplete>
                            <v-autocomplete
                            label="Kecamatan"
                                :items="listKecamatan"
                                item-value="dis_id"
                                item-text="dis_name"
                                v-model="detail.id_kecamatan"
                                @change="gantiDesa">
                            </v-autocomplete>
                            <v-autocomplete 
                            label="Desa"
                                :items="listDesa"
                                item-value="subdis_id"
                                item-text="subdis_name"
                                v-model="detail.id_desa">
                            </v-autocomplete>
                            <v-text-field 
                            label="Alamat lengkap"
                            v-model="detail.alamat"></v-text-field>
                            <v-text-field
                                label="No. Telepon/HP"
                                v-model="detail.telepon"
                            ></v-text-field>
                            <v-autocomplete
                            label="Kantor Pendaftaran"
                            :items="listCabang"
                            item-value="kode"
                            item-text="nama"
                            v-model="detail.id_kantor"></v-autocomplete>
                            <v-text-field
                            label="Tanggal Daftar"
                            v-model="detail.tanggalDaftar"
                            hint="YYYY-MM-DD"></v-text-field>
                            <v-text-field
                                label="Plafond"
                                v-model="detail.plafond"
                            ></v-text-field>
                            <v-text-field
                                label="SPH"
                                v-model="detail.sph"
                            ></v-text-field>
                            <v-text-field
                                label="BPIH"
                                v-model="detail.bpih"
                            ></v-text-field>
                            <v-text-field
                                label="Keterangan"
                                v-model="detail.keterangan"
                            ></v-text-field>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="success" @click="updateDataJamaah">Simpan</v-btn>
                            <v-btn color="error" @click="dialogKoreksi = false">Batal</v-btn>
                        </v-card-actions>
                    </v-card>
                    </v-dialog>
                    <v-dialog
                    v-model="dialogPembatalan"
                    scrollable
                    persistent :overlay="false"
                    max-width="800px"
                    transition="dialog-transition"
                >
                <v-card>
                    <v-card-title primary-title>
                        Koreksi Data Jamaah
                    </v-card-title>
                    <v-card-text>
                        <h4>Apakah Anda yakin akan melakukan pembatalan untuk <br>
                        No. Sertifikat: {{detail.nomorSertifikat}} <br>
                        Atas nama {{detail.nama}} </h4>
                        <v-text-field
                            label="Tanggal Pembatalan"
                            v-model="detail.tanggalPembatalan"
                            hint="YYYY-MM-DD"
                        ></v-text-field>
                        <v-text-field
                            label="Keterangan Pembatalan"
                            v-model="detail.keteranganPembatalan"
                        ></v-text-field>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn color="success" @click="updatePembatalan">Simpan</v-btn>
                        <v-btn color="error" @click="dialogPembatalan = false">Batal</v-btn>
                    </v-card-actions>
                </v-card>
                </v-dialog>

                    </v-container>
                </v-main>
            </v-app>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
            <!--script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-base64@3.7.2/base64.min.js"></script>
        <script src="<?=base_url();?>/renderJs/jamaahDetail.js"></script>

       
    </body>
</html>