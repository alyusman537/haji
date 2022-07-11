
new Vue({
    el: '#app',
    vuetify: new Vuetify(),

    data: {
        itemBC: [
            {
                text: 'Dashboard',
                disabled: false,
                href: '/haji',
            },
            {
                text: 'Jamaah',
                disabled: false,
                href: '/haji/jamaah',
            },
            {
                text: 'Profile',
                disabled: true,
                href: '#',
            },
        ],
        url: 'http://192.168.1.199/haji/',
        urlPanjang: 'http://192.168.1.199/haji/renderImage/',
        drawer: false,
        group: null,
        title: null,
        jamaahId: null,
        detail: {
            alamat: null,
            id_propinsi: null,
            propinsi: null,
            id_kecamatan: null,
            kecamatan: null,
            id_kabupaten: null,
            kabupaten: null,
            id_desa: null,
            desa: null,
            id: null,
            id_kantor: null,
            kantor: null,
            keterangan: null,
            keteranganPembatalan: null,
            linkFoto: null,
            nama: null,
            nomorSertifikat: null,
            rekeningBank: null,
            rekeningBmt: null,
            plafond: null,
            sph: null,
            bpih: null,
            status: null,
            umur: 0,
            tanggalDaftar: null,
            tanggalLahir: null,
            tanggalPembatalan: null,
            telepon: null,
            tempatLahir: null,
            jenisKelamin: null,
            ttl: null,
        },
        tampilButton: true,
        textTombol: null,
        sumberFoto: null,
        linkCrop: null,
        file_data: '',
        form_data: {},
        dialogKoreksi: false,
        dialogPembatalan: false,
        listCabang: [],
        listPropinsi: [],
        listKabupaten: [],
        listKota: [],
        listKecamatan: [],
        listDesa: [],
        menu3: false,
        activePicker: null,
    },
    watch: {
        group() {
            this.drawer = false
        },
        menu3(val) {
            val && setTimeout(() => (this.activePicker = 'YEAR'))
        },
        tanggalLahir(val) {
            //this.
        }
    },
    created: function () {
        this.GetURLParameter();
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        this.getDetail();
        this.getKomplit();
        this.getKabupaten();
        this.getCabang();

    },
    methods: {
        saveDate(date) {
            this.$refs.menu3.save(date)
        },
        GetURLParameter() {
            const pageURL = window.location.href;
            const lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
            console.log(lastURLSegment);
            this.jamaahId = lastURLSegment;
        },
        async getDetail() {
            await axios.get(this.url + `jamaah/detail/${this.jamaahId}`)
                .then(res => {
                    console.log('ini log res.data' + JSON.stringify(res.data[0]));

                    const uumur = this.getAge(new Date(res.data.tanggalLahir));

                    console.log(uumur);
                    //this.ttl = data.tempatLahir + ', '+ data.tanggalLahir

                    this.detail.alamat = res.data.alamat
                    this.detail.id_propinsi = res.data.propinsi
                    this.detail.propinsi = res.data.namaPropinsi
                    this.detail.id_kecamatan = res.data.kecamatan
                    this.detail.kecamatan = res.data.namaKecamatan
                    this.detail.id_kabupaten = res.data.kabupaten
                    this.detail.kabupaten = res.data.namaKabupaten
                    this.detail.id_desa = res.data.desa
                    this.detail.desa = res.data.namaDesa
                    this.detail.id = res.data.id
                    this.detail.id_kantor = res.data.kantor
                    this.detail.kantor = res.data.namaCabang
                    this.detail.keterangan = res.data.keterangan
                    this.detail.keteranganPembatalan = res.data.keteranganPembatalan
                    this.detail.linkFoto = res.data.linkFoto
                    this.detail.nama = res.data.nama
                    this.detail.nomorSertifikat = res.data.nomorSertifikat
                    this.detail.rekeningBank = res.data.rekeningBank
                    this.detail.rekeningBmt = res.data.rekeningBmt
                    this.detail.plafond = res.data.plafond
                    this.detail.sph = res.data.sph
                    this.detail.bpih = res.data.bpih
                    this.detail.status = res.data.status
                    this.detail.umur = uumur
                    this.detail.tanggalDaftar = res.data.tanggalDaftar
                    this.detail.tanggalLahir = res.data.tanggalLahir
                    this.detail.tanggalPembatalan = res.data.tanggalPembatalan
                    this.detail.telepon = res.data.telepon
                    this.detail.tempatLahir = res.data.tempatLahir
                    this.detail.jenisKelamin = res.data.jenisKelamin
                    this.detail.ttl = res.data.tempatLahir + ', ' + res.data.tanggalLahir

                    console.log('ini log detail ' + JSON.stringify(this.detail));

                    this.sumberFoto = this.urlPanjang + res.data.linkFoto
                    console.log('ini ini nini ' + res.data.linkFoto);//JSON.stringify(this.dataDetail));
                    //ini ya
                })
                .catch(err => {
                    console.log(err);
                })
        },
        getAge(umur) {
            const date = umur;
            const today = new Date();
            const birthday = new Date(date);
            let year = 0;
            if (today.getMonth() < birthday.getMonth()) {
                year = 1;
            } else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
                year = 1;
            }
            let age = today.getFullYear() - birthday.getFullYear() - year;

            if (age < 0) {
                age = 0;
            }
            return age;
        },
        unggahFoto() {
            this.file_data = $('#image').prop('files')[0];
            this.form_data = new FormData();
            this.form_data.append('file', this.file_data);
            let url1 = "jamaah/fileUpload";
            var self = this
            axios.post(this.url + 'jamaah/fileUpload', this.form_data)
                .then(res => {
                    console.log(res.data);
                    this.updateFoto(this.jamaahId, res.data.foto)
                    $('#image-display').attr('src', res.data.filepath)
                    //location.reload()
                })
                .catch(err => {
                    console.log(err);
                })

        },
        updateFoto(id, linkImage) {
            console.log(linkImage);
            axios.put(this.url + `jamaah/updateFoto/${id}`, { linkFoto: linkImage })
                .then(res => {
                    console.log('ini res ganti foto' + JSON.stringify(res.data));
                })
                .catch(err => {
                    console.log(err.response.data);
                })
        },
        updateDataJamaah() {
            const tt = this.detail.ttl.split(',');
            console.log(tt);
            const param = {
                alamat: this.detail.alamat,
                propinsi: this.detail.id_propinsi,
                kecamatan: this.detail.id_kecamatan,
                kota: this.detail.id_kabupaten,
                desa: this.detail.id_desa,
                kantor: this.detail.id_kantor,
                keterangan: this.detail.keterangan,
                keteranganPembatalan: this.detail.keteranganPembatalan,
                linkFoto: this.detail.linkFoto,
                nama: this.detail.nama,
                nomorSertifikat: this.detail.nomorSertifikat,
                rekeningBank: this.detail.rekeningBank,
                rekeningBmt: this.detail.rekeningBmt,
                plafond: this.detail.plafond,
                sph: this.detail.sph,
                bpih: this.detail.bpih,
                status: this.detail.status,
                tanggalDaftar: this.detail.tanggalDaftar,
                tanggalLahir: this.detail.tanggalLahir,
                tanggalPembatalan: this.detail.tanggalPembatalan,
                telepon: this.detail.telepon,
                tempatLahir: this.detail.tempatLahir,
                jenisKelamin: this.detail.jenisKelamin,
            }
            axios.put(this.url + `jamaah/updateData/${this.jamaahId}`, param)
                .then(res => {
                    console.log(JSON.stringify(res.data));
                    this.tampilButton = true;
                    this.dialogKoreksi = false;
                    this.getDetail();
                })
                .catch(err => {
                    console.log(err.response.data);
                })
        },
        updatePembatalan() {
            const param = {
                keteranganPembatalan: this.detail.keteranganPembatalan,
                status: 'Nonaktif',
                tanggalPembatalan: this.detail.tanggalPembatalan,
            }
            axios.put(this.url + `jamaah/setNonaktif/${this.jamaahId}`, param)
                .then(res => {
                    console.log(res.data);
                    this.dialogKoreksi = false;
                })

        },
        batalUbah() {
            console.log(this.tampilButton);
            this.getDetail();
        },
        async gantiPropinsi() {
            await axios.get(this.url + `/alamat/propinsi`)
                .then(res => {
                    this.listPropinsi = res.data
                })
                .catch(err => {
                    console.log(err);
                })
        },
        async gantiKota() {
            await axios.get(this.url + `/alamat/kota/${this.detail.id_propinsi}`)
                .then(res => {
                    this.listKota = res.data
                })
                .catch(err => {
                    console.log(err);
                })
        },
        async gantiKecamatan() {
            await axios.get(this.url + `/alamat/kecamatan/${this.detail.id_kabupaten}`)
                .then(res => {
                    this.listKecamatan = res.data
                })
                .catch(err => {
                    console.log(err);
                })
        },
        async gantiDesa() {
            await axios.get(this.url + `/alamat/desa/${this.detail.id_kecamatan}`)
                .then(res => {
                    this.listDesa = res.data
                })
                .catch(err => {
                    console.log(err);
                })
        },
        async getKabupaten() {
            await axios.get(this.url + `/alamat/kabupaten`)
                .then(res => {
                    this.listKabupaten = res.data
                })
                .catch(err => {
                    console.log(err);
                })
        },
        async getCabang() {
            await axios.get(this.url + 'cabang/semua')
                .then(res => {
                    this.listCabang = res.data
                })
                .catch(err => {
                    console.log(err);
                })
        },
        async getKomplit() {
            await axios.get(this.url + `/alamat/propinsi`)
                .then(res => {
                    this.listPropinsi = res.data
                    axios.get(this.url + `/alamat/kota/${this.detail.id_propinsi}`)
                        .then(res => {
                            this.listKota = res.data
                            axios.get(this.url + `/alamat/kecamatan/${this.detail.id_kabupaten}`)
                                .then(res => {
                                    this.listKecamatan = res.data
                                    axios.get(this.url + `/alamat/desa/${this.detail.id_kecamatan}`)
                                        .then(res => {
                                            this.listDesa = res.data
                                        })
                                })
                        })
                })
                .catch(err => {
                    console.log(err);
                })

        },
        getDataUri(url) {
            return new Promise(resolve => {
                var image = new Image();
                image.setAttribute('crossOrigin', 'anonymous'); //getting images from external domain

                image.onload = function () {
                    var canvas = document.createElement('canvas');
                    canvas.width = this.naturalWidth;
                    canvas.height = this.naturalHeight;

                    //next three lines for white background in case png has a transparent background
                    var ctx = canvas.getContext('2d');
                    ctx.fillStyle = '#fff';  /// set white fill style
                    ctx.fillRect(0, 0, canvas.width, canvas.height);

                    canvas.getContext('2d').drawImage(this, 0, 0);

                    resolve(canvas.toDataURL('image/jpeg'));
                };

                image.src = url;
            })
        },
        toDataURL(url, callback) {
            var xhr = new XMLHttpRequest();
            xhr.onload = function () {
                var reader = new FileReader();
                reader.onloadend = function () {
                    callback(reader.result);
                }
                reader.readAsDataURL(xhr.response);
            };
            xhr.open('GET', url);
            xhr.responseType = 'blob';
            xhr.send();
        },
        cetakPdf() {
            let xt = this.detail.linkFoto.split('.');
            const isi = ': ' + this.detail.nomorSertifikat + '\n' +
            ': ' + this.detail.nama + '\n' +
            ': ' + this.detail.ttl + '\n' +
            ': ' + this.detail.umur + '\n\n'+
            ': ' + this.detail.alamat +'\n  Desa '+this.detail.desa+'\n  Kec. '+this.detail.kecamatan+'\n  Kab. '+this.detail.kabupaten+'\n'+
            ': ' + this.detail.telepon+'\n\n'+
            ': ' + this.detail.tanggalDaftar +'\n'+
            ': ' + this.detail.kantor +'\n'+
            ': ' + this.detail.rekeningBmt +'\n'+
            ': ' + this.detail.rekeningBank +'\n'+
            ': ' + this.formatRupiah(this.detail.plafond, 'Rp') +'\n'+
            ': ' + this.detail.sph +'\n'+
            ': ' + this.detail.bpih;
            this.toDataURL(this.sumberFoto, function (dataUrl) {
                console.log('RESULT:', dataUrl)
                const doc = new jsPDF({
                    orientation: "potrait", //landscape", //potrait
                    unit: "cm",
                    format: "a4"
                });
                // text is placed using x, y coordinates
                doc.setFontSize(13).setFontStyle("bold").text('Data Calon Jamaah', 2, 2);
                // create a line under heading
                doc.setLineWidth(0.01).line(2, 2.2, 20.0, 2.2); //
                let left = 15;
                let top = 8;
                const imgWidth = 100;
                const imgHeight = 100;

                doc.addImage(dataUrl, xt[1], 2, 2.5, 4, 6);
                doc
                    //                    .setFont("times")
                    .setFontSize(12)
                    .setFontStyle("normal")
                    .text(
                        'No. Sertifikat \n' +
                        'Nama \n' +
                        'Tempat/Tanggal Lahir \n' +
                        'Umur \n\n'+
                        'Alamat \n\n\n\n'+
                        'No. Handphone \n\n'+
                        'Tanggal Pendaftaran \n'+
                        'Tempat Pendaftaran \n'+
                        'No. Rek. BMT \n'+
                        'No. Rek. Bank \n'+
                        'Plafond \n'+
                        'SPH \n'+
                        'BPIH \n',
                        2.0, 9.0
                    );
                doc
                    .setFontSize(12)
                    .setFontStyle("normal")
                    .text(isi,6.8, 9.0)
/*                     );
                doc
                    .setFontSize(11)
                    .setFontStyle("italic")
                    .setTextColor(0, 0, 255)
                    .text(
                        "This is a simple footer located .5 inches from page bottom",
                        0.5,
                        doc.internal.pageSize.height - 1.5
                    ) */
                    .output('dataurlnewwindow');
            })
        },
        formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
              split = number_string.split(","),
              sisa = split[0].length % 3,
              rupiah = split[0].substr(0, sisa),
              ribuan = split[0].substr(sisa).match(/\d{3}/gi);
          
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
              separator = sisa ? "." : "";
              rupiah += separator + ribuan.join(".");
            }
          
            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah +',00': "";
          }

    },
})