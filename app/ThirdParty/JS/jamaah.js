    //window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    window.csrfName = document.getElementsByClassName('txt_csrfname').name;
    window.csrfHash = document.getElementsByClassName('txt_csrfname').content;

    let rowsHaji = [
      ['No. Sertifikat', 'Nama', 'Tempat/Tanggal Lahir', 'Umur']
    ]

    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data: {
        itemBC: [{
            text: 'Dashboard',
            disabled: false,
            href: '/haji',
          },
          {
            text: 'Jamaah',
            disabled: true,
            href: '/haji/jamaah',
          },
          {
            text: 'Profile',
            disabled: false,
            href: '#',
          },
        ],
        url: 'http://192.168.1.199/haji/',
        drawer: false,
        group: null,
        title: null,
        dialogBaru: false,
        dialogEdit: false,
        listPropinsi: [],
        listKota: [],
        listKecamatan: [],
        listDesa: [],
        selectedPropinsi: null,
        selectedKota: null,
        selectedKecamatan: null,
        selectedDesa: null,
        listCabang: [{
            kode: 101,
            nama: '101 Wonorejo'
          }, {
            kode: 104,
            nama: '104 Sidogiri'
          }, {
            kode: 105,
            nama: '105 Warungdowo'
          }, {
            kode: 106,
            nama: '106 Kraton'
          },
          {
            kode: 107,
            nama: '107 Rembang'
          }, {
            kode: 109,
            nama: '109 Nongkojajar'
          }, {
            kode: 110,
            nama: '110 Grati'
          }, {
            kode: 111,
            nama: '111 Gondangwetan'
          },
          {
            kode: 112,
            nama: '112 Prigen'
          }, {
            kode: 113,
            nama: '113 Kebonagung'
          }, {
            kode: 114,
            nama: '114 Purwosari'
          }, {
            kode: 115,
            nama: '115 Sukorejo'
          },
          {
            kode: 116,
            nama: '116 Pandaan'
          }, {
            kode: 117,
            nama: '117 Nguling'
          }, {
            kode: 118,
            nama: '118 Kedawung'
          }, {
            kode: 119,
            nama: '119 Winongan'
          },
          {
            kode: 120,
            nama: '120 Gerbo'
          }, {
            kode: 121,
            nama: '121 Beji'
          }, {
            kode: 122,
            nama: '122 Lekok'
          }, {
            kode: 123,
            nama: '123 Paserepan'
          },
          {
            kode: 124,
            nama: '124 Tosari'
          }, {
            kode: 125,
            nama: '125 Gempol'
          }, {
            kode: 126,
            nama: '126 Tiris'
          }, {
            kode: 127,
            nama: '127 Krucil'
          },
          {
            kode: 128,
            nama: '128 Maron'
          }, {
            kode: 129,
            nama: '129 Ngoro'
          }, {
            kode: 130,
            nama: '130 Bangsal'
          }, {
            kode: 131,
            nama: '131 Pabean'
          },
          {
            kode: 132,
            nama: '132 Pakis'
          }, {
            kode: 133,
            nama: '133 Tumpang'
          }, {
            kode: 134,
            nama: '134 Lawang'
          }, {
            kode: 135,
            nama: '135 Gresik'
          },
          {
            kode: 136,
            nama: '136 Suboh'
          }, {
            kode: 137,
            nama: '137 Bungatan'
          }, {
            kode: 138,
            nama: '138 Mangaran'
          }, {
            kode: 139,
            nama: '139 Besuk'
          },
          {
            kode: 140,
            nama: '140 Gading'
          }, {
            kode: 141,
            nama: '141 Gending'
          }, {
            kode: 142,
            nama: '142 Turen'
          }, {
            kode: 143,
            nama: '143 Wajak'
          },
          {
            kode: 144,
            nama: '144 Gondang'
          }, {
            kode: 145,
            nama: '145 Bulakbanteng'
          }, {
            kode: 146,
            nama: '146 Pacarkembang'
          }, {
            kode: 147,
            nama: '147 Klakah'
          },
          {
            kode: 148,
            nama: '148 Rowokangkung'
          }, {
            kode: 149,
            nama: '149 Tajinan'
          }, {
            kode: 150,
            nama: '150 Bululawang'
          }, {
            kode: 151,
            nama: '151 Kotaanyar'
          },
          {
            kode: 152,
            nama: '152 Wangkal'
          }, {
            kode: 153,
            nama: '153 Panggungrejo'
          }, {
            kode: 154,
            nama: '154 Olean'
          }, {
            kode: 155,
            nama: '155 Mlandingan'
          },
          {
            kode: 156,
            nama: '156 Pragoto'
          }, {
            kode: 157,
            nama: '157 Sambikerep'
          }, {
            kode: 158,
            nama: '158 Lumbang'
          }, {
            kode: 159,
            nama: '159 Padang'
          },
          {
            kode: 160,
            nama: '160 Pasrujambe'
          }, {
            kode: 161,
            nama: '161 Tekung'
          }, {
            kode: 162,
            nama: '162 Tegalsiwalan'
          }, {
            kode: 163,
            nama: '163 Kertosuko'
          },
          {
            kode: 164,
            nama: '164 Pagelaran'
          }, {
            kode: 165,
            nama: '165 Gedog'
          }, {
            kode: 166,
            nama: '166 Kwadungan'
          }, {
            kode: 167,
            nama: '167 Brangkal'
          },
          {
            kode: 168,
            nama: '168 Mojosari'
          }, {
            kode: 169,
            nama: '169 Sukapura'
          }, {
            kode: 170,
            nama: '170 Manyar'
          }, {
            kode: 172,
            nama: '172 Diwek'
          },
          {
            kode: 173,
            nama: '173 Padas'
          }, {
            kode: 174,
            nama: '174 Karangjati'
          }, {
            kode: 175,
            nama: '175 Pangkur'
          }, {
            kode: 176,
            nama: '176 Kalipare'
          },
          {
            kode: 177,
            nama: '177 Wagir'
          }, {
            kode: 178,
            nama: '178 Ngajum'
          }, {
            kode: 179,
            nama: '179 Wonosari I'
          }, {
            kode: 180,
            nama: '180 Pakisaji'
          },
          {
            kode: 181,
            nama: '181 Poncokusumo'
          }, {
            kode: 182,
            nama: '182 Sumbersuko'
          }, {
            kode: 183,
            nama: '183 Kedungjajang'
          }, {
            kode: 184,
            nama: '184 Dawuhanwetan'
          },
          {
            kode: 185,
            nama: '185 Besukagung'
          }, {
            kode: 186,
            nama: '186 Singosai'
          }, {
            kode: 187,
            nama: '187 Wonosari II'
          }, {
            kode: 188,
            nama: '188 Sumberpucung'
          },
          {
            kode: 189,
            nama: '189 Kromengan'
          }, {
            kode: 190,
            nama: '190 Sukowono'
          }, {
            kode: 191,
            nama: '191 Sumberjambe'
          }, {
            kode: 192,
            nama: '192 Sumobito'
          },
          {
            kode: 193,
            nama: '193 Simorejo'
          }, {
            kode: 194,
            nama: '194 Sedati'
          }, {
            kode: 195,
            nama: '195 Gedangan'
          }, {
            kode: 196,
            nama: '196 Mojoagung'
          },
          {
            kode: 197,
            nama: '197 Maesan'
          }, {
            kode: 198,
            nama: '198 Klabang'
          }, {
            kode: 199,
            nama: '199 Ledokombo'
          }, {
            kode: 200,
            nama: '200 Kedunggalar'
          },
          {
            kode: 201,
            nama: '201 Paron'
          }, {
            kode: 202,
            nama: ' 202 Nangkaan'
          }, {
            kode: 203,
            nama: '203 Buduran'
          }, {
            kode: 204,
            nama: '204 Sukodono'
          }
        ],
        listJamaah: {
          jmlHalaman: null,
          halamanSekarang: null,
          jmlJamaah: null,
          jamaah: []
        },
        listKolom: [{
            kolom: 'nomorSertifikat',
            tampil: 'Nomor Sertifikat'
          },
          {
            kolom: 'tanggalDaftar',
            tampil: 'Tgl. Pendaftaran'
          },
          {
            kolom: 'kantor',
            tampil: 'Kantor'
          },
          {
            kolom: 'nama',
            tampil: 'Nama'
          },
          {
            kolom: 'tanggalLahir',
            tampil: 'Umur'
          },
          {
            kolom: 'alamat',
            tampil: 'Alamat'
          }
        ],
        listUrut: [{
          urut: 'ASC',
          tampil: 'A-Z'
        }, {
          urut: 'DESC',
          tampil: 'Z-A'
        }],
        selectedKolom: 'tanggalDaftar',
        selectedUrut: 'DESC',
        listStatus: [{
            status: 'aktif',
            tampil: 'Aktif'
          },
          {
            status: 'nonaktif',
            tampil: 'Nonaktif'
          }
        ],
        selectedStatus: 'aktif',
        page: 1,
        add: {
          nomorSertifikat: null,
          tanggalDaftar: null,
          kantor: null,
          nama: null,
          tempatLahir: null,
          tanggalLahir: null,
          alamat: null,
          telepon: null,
          linkFoto: null,
          rekeningBmt: null,
          rekeningBank: null,
          plafond: 0,
          sph: null,
          bpih: null,
          keterangan: null,
        },
        date2: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        date3: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        menu2: false,
        menu3: false,
        file: '',
        form_data: {},
        inputCari: null,
        activePicker: null,
        tglStart: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        tglAkhir: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        menu4: false,
        menu5: false,

      },
      watch: {
        group() {
          this.drawer = false
        },
        menu3(val) {
          val && setTimeout(() => (this.activePicker = 'YEAR'))
        },
        tglStart(val) {
          this.getJamaah();
        },
        tglAkhir(val) {
          this.getJamaah();
        },
      },
      computed: {},
      created: function() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        const d = new Date(new Date().getTime()-(30*24*60*60*1000));
        let hr = d.getDay();
        hr = (hr.toString().length < 2 ) ? hr = ("0" + hr) : hr;
        let bln = d.getMonth()+1;
        let bl = bln.toString();
        bl = (bl.length < 2) ? bl = ("0" + bl) : bl;
        let th = d.getFullYear();
        console.log('d :', d);
        this.tglStart = th + '-' + bl +'-'+ hr;
        this.getJamaah();
      },
      methods: {
        saveDate(date) {
          this.$refs.menu3.save(date)
        },
        getJamaah() {
          this.title = 'Daftar Jamaah Haji Aktif';
          this.inputCari = null;
          if (this.tglAkhir < this.tglStart) {
            alert('Tanggal Akhir tidak boleh lebih kecil dari tanggal Awal');
            this.tglAkhir = (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)
            return false
          }
          const param = {
            tglStart: this.tglStart,
            tglAkhir: this.tglAkhir,
            kolom: this.selectedKolom,
            urut: this.selectedUrut,
            status: this.selectedStatus,
            page: this.page
          }

          axios.post(this.url + `jamaah/getJamaah`, param)
            .then(res => {
              this.listJamaah.jamaah = [];
              this.listJamaah.jmlHalaman = res.data.jmlHalaman;
              this.listJamaah.halamanSekarang = res.data.halamanSekarang;
              this.listJamaah.jmlJamaah = res.data.jmlJamaah[0].id;
              const data = res.data.jamaah;
              console.log(res.data.jamaah);
              //nomorSertifikat, tanggalDaftar, kantor, nama, tempatLahir, tanggalLahir, alamat, telepon, status
              for (let i = 0; i < data.length; i++) {
                const umur = this.getAge(new Date(data[i].tanggalLahir));

                const dorong = {
                  id: data[i].id,
                  nomorSertifikat: data[i].nomorSertifikat,
                  nama: data[i].nama,
                  ttl: data[i].tempatLahir + ', ' + data[i].tanggalLahir,
                  umur: umur,
                  jenisKelamin: data[i].jenisKelamin,

                  alamat: data[i].alamat,
                  namaDesa: data[i].namaDesa,
                  namaKecamatan: data[i].namaKecamatan,
                  namaKota: data[i].namaKota,
                  namaPropinsi: data[i].namaPropinsi,
                  telepon: data[i].telepon,

                  tanggalDaftar: data[i].tanggalDaftar,
                  kantor: data[i].namaCabang,
                  rekeningBmt: data[i].rekeningBmt,
                  rekeningBank: data[i].rekeningBank,
                  plafond: data[i].plafond,
                  sph: data[i].sph,
                  bpih: data[i].bpih,
                  keterangan: data[i].keterangan,

                  status: data[i].status,
                }
                this.listJamaah.jamaah.push(dorong);
              }
            })
            .catch(err => {
              console.log(err);
            })
        },

        async cariJamaah() {
          this.title = 'Daftar Jamaah Haji Aktif';
          //if (this.selectedUrut == 'Z-A') this.urut = 'DESC';
          this.page = 1;
          const param = {
            tglStart: this.tglStart,
            tglAkhir: this.tglAkhir,
            cari: this.inputCari,
            status: this.selectedStatus,
            kolom: this.selectedKolom,
            urut: this.selectedUrut,
            page: this.page
          }
          await axios.post(this.url + `jamaah/cariJamaah`, param)
            .then(res => {
              this.listJamaah.jamaah = [];
              this.listJamaah.jmlHalaman = res.data.jmlHalaman;
              this.listJamaah.halamanSekarang = res.data.halamanSekarang;
              this.listJamaah.jmlJamaah = res.data.jmlJamaah;
              const data = res.data.jamaah;

              console.log('ini log data');
              console.log(data);
              //nomorSertifikat, tanggalDaftar, kantor, nama, tempatLahir, tanggalLahir, alamat, telepon, status
              for (let i = 0; i < data.length; i++) {
                const umur = this.getAge(new Date(data[i].tanggalLahir));

                const dorong = {
                  /* id: data[i].id,
                  nomorSertifikat: data[i].nomorSertifikat,
                  nama: data[i].nama,
                  ttl: data[i].tempatLahir + ', ' + data[i].tanggalLahir,
                  umur: umur,
                  jenisKelamin: data[i].jenisKelamin,

                  alamat: data[i].alamat,
                  namaDesa: data[i].namaDesa,
                  namaKecamatan: data[i].namaKecamatan,
                  namaKota: data[i].namaKota,
                  namaPropinsi: data[i].namaPropinsi,
                  telepon: data[i].telepon,

                  tanggalDaftar: data[i].tanggalDaftar,
                  kantor: data[i].namaCabang,
                  rekeningBmt: data[i].rekeningBmt,
                  rekeningBank: data[i].rekeningBank,
                  plafond: data[i].plafond,
                  sph: data[i].sph,
                  bpih: data[i].bpih,
                  keterangan: data[i].keterangan,

                  status: data[i].status, */
                  id: data[i].id,
                  nomorSertifikat: data[i].nomorSertifikat,
                  nama: data[i].nama,
                  ttl: data[i].tempatLahir + ', ' + data[i].tanggalLahir,
                  umur: umur,
                  jenisKelamin: data[i].jenisKelamin,

                  alamat: data[i].alamat,
                  namaDesa: data[i].namaDesa,
                  namaKecamatan: data[i].namaKecamatan,
                  namaKota: data[i].namaKota,
                  namaPropinsi: data[i].namaPropinsi,
                  telepon: data[i].telepon,

                  tanggalDaftar: data[i].tanggalDaftar,
                  kantor: data[i].namaCabang,
                  rekeningBmt: data[i].rekeningBmt,
                  rekeningBank: data[i].rekeningBank,
                  plafond: data[i].plafond,
                  sph: data[i].sph,
                  bpih: data[i].bpih,
                  keterangan: data[i].keterangan,

                  status: data[i].status,
                }
                this.listJamaah.jamaah.push(dorong);
              }
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
        ubahSortir() {
          this.page = 1
          this.getJamaah()
        },
        tambahPage() {
          this.page = this.page + 1;
          this.getJamaah()
        },
        kurangiPage() {
          this.page = this.page - 1;
          this.getJamaah()
        },
        tampilDialogBaru() {
          this.dialogBaru = true
          this.gantiPropinsi();
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
          await axios.get(this.url + `/alamat/kota/${this.selectedPropinsi}`)
            .then(res => {
              this.listKota = res.data
            })
            .catch(err => {
              console.log(err);
            })
        },
        async gantiKecamatan() {
          await axios.get(this.url + `/alamat/kecamatan/${this.selectedKota}`)
            .then(res => {
              this.listKecamatan = res.data
            })
            .catch(err => {
              console.log(err);
            })
        },
        async gantiDesa() {
          await axios.get(this.url + `/alamat/desa/${this.selectedKecamatan}`)
            .then(res => {
              this.listDesa = res.data
            })
            .catch(err => {
              console.log(err);
            })
        },
        insertJamaah() {

          const data = {

            nomorSertifikat: this.add.nomorSertifikat,
            tanggalDaftar: this.date2, //.add.tanggalDaftar,
            kantor: this.add.kantor,
            nama: this.add.nama,
            tempatLahir: this.add.tempatLahir,
            tanggalLahir: this.date3, //.add.tanggalLahir,
            propinsi: this.selectedPropinsi,
            kota: this.selectedKota,
            kecamatan: this.selectedKecamatan,
            desa: this.selectedDesa,
            alamat: this.add.alamat,
            telepon: this.add.telepon,
            linkFoto: this.add.linkFoto,
            rekeningBmt: this.add.rekeningBmt,
            rekeningBank: this.add.rekeningBank,
            plafond: this.add.plafond,
            sph: this.add.sph,
            bpih: this.add.bpih,
            keterangan: this.add.keterangan
          }
          console.log('ini data yang akan di insert :' + JSON.stringify(data));

          axios.post(this.url + 'jamaah/insertJamaah', data)
            .then(res => {
              console.log(res.data);
              //this.submitFile();
              this.getJamaah();
              this.dialogBaru = false;
            })
            .catch(err => {
              console.log(err);
            })
        },
        simpanPdf() {
          const heading = 'Data Calon Jamaah Haji Tgl ' + this.tglStart + ' s/d ' + this.tglAkhir + ' Halaman ke ' + this.page + 'dari ' + this.listJamaah.jmlHalaman
          const columns = [{
              title: "No Sertifikat",
              dataKey: "nomorSertifikat"
            },
            {
              title: "Nama",
              dataKey: "nama"
            },
            {
              title: "TTL",
              dataKey: "ttl"
            },
            {
              title: "Umur",
              dataKey: "umur"
            },
            // {
            //   title: "JK",
            //   dataKey: "jenisKelamin"
            // },

            //                { title: "Alamat", dataKey: "alamat" },
            //                { title: "Desa", dataKey: "namaDesa" },
            {
              title: "Kecamatan",
              dataKey: "namaKecamatan"
            },
            // {
            //   title: "Kabupaten",
            //   dataKey: "namaKota"
            // },
            //                { title: "Propinsi", dataKey: "namaPropinsi" },
            // {
            //   title: "No. Handphone",
            //   dataKey: "telepon"
            // },

            {
              title: "Tgl. Daftar",
              dataKey: "tanggalDaftar"
            },
            {
              title: "Cabang",
              dataKey: "kantor"
            },
            {
              title: "Rek. BMT",
              dataKey: "rekeningBmt"
            },
            {
              title: "Rek. Bank",
              dataKey: "rekeningBank"
            },
            {
              title: "Plafond",
              dataKey: "plafond"
            },
            {
              title: "SPH",
              dataKey: "sph"
            },
            {
              title: "BPIH",
              dataKey: "bpih"
            },
            {
              title: "Keterangan",
              dataKey: "keterangan"
            }

            // {
            //   title: "Status",
            //   dataKey: "status"
            // }
          ];
          const doc = new jsPDF({
            orientation: "landscape", //potrait
            unit: "cm",
            format: "folio"
          });
          // text is placed using x, y coordinates
          doc.setFontSize(13).text(heading, 1, 1);
          // create a line under heading
          doc.setLineWidth(0.01).line(1.0, 1.2, 29.0, 1.2); //
          // Using autoTable plugin

          doc.autoTable({
            columns,
            body: this.listJamaah.jamaah,
            margin: {
              left: 1.0,
              top: 1.35,
              right: 1.0
            },
            columnStyles: {
              0: {
                fontSize: 8
              },
              1: {
                fontSize: 8
              },
              2: {
                fontSize: 8
              },
              3: {
                fontSize: 8
              },
              4: {
                fontSize: 8
              },
              5: {
                fontSize: 8
              },
              6: {
                fontSize: 8
              },
              7: {
                fontSize: 8
              },
              8: {
                fontSize: 8
              },
              9: {
                fontSize: 8
              },
              10: {
                fontSize: 8
              },
              11: {
                fontSize: 8
              },
              12: {
                fontSize: 8
              },
            },
          });
          // Using array of sentences
          /* doc
             .setFont("helvetica")
             .setFontSize(12)
             .text(this.moreText, 0.5, 3.5, { align: "left", maxWidth: "7.5" });
           */
          // Creating footer and saving file
          doc
            .setFont("times")
            .setFontSize(11)
            .setFontStyle("italic")
            .setTextColor(0, 0, 255)
            .text(
              "This is a simple footer located .5 inches from page bottom",
              0.5,
              doc.internal.pageSize.height - 1.5
            )
            .output('dataurlnewwindow');
          //.save(`${this.heading}.pdf`);
        },

        lihatDetail(item) {
          console.log(item.id);
          window.open(this.url + `jamaah/profile/${item.id}`, '_self')
        },

      },
    });
