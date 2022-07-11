$(document).ready(function () {
    cabang();   //pemanggilan fungsi tampil barang.
    kabupaten();
    status();
    gender();
    bulan();

    function cabang() {
        $.ajax({
            type: 'GET',
            //url   : 'http://localhost:8080/dash/getLembaga',
            url: 'dash/jamaahByCabang',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            async: true,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                labels = [];
                values = [];
                length = data.length;
                console.log(length);
                for (i = 0; i < length; i++) {
                    labels.push(data[i].nama);
                    values.push(data[i].kantor);
                }

                new Chart(document.getElementById("bar-chart-cabang"), {
                    type: 'bar', //bar
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: "Cabang Asal Jamaah Terbanyak",
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1,
                                data: values
                            }
                        ]
                    },
                    options: {
                        legend: { display: true },
                        title: {
                            display: true,
                            text: 'U.S population'
                        }
                    }
                });
            }

        });
    }
    function kabupaten() {
        $.ajax({
            type: 'GET',
            //url   : 'http://localhost:8080/dash/getLembaga',
            url: 'dash/jamaahByKabupaten',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            async: true,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                labels = [];
                values = [];
                length = data.length;
                console.log(length);
                for (i = 0; i < length; i++) {
                    labels.push(data[i].city_name);
                    values.push(data[i].kabupaten);
                }

                new Chart(document.getElementById("bar-chart-kabupaten"), {
                    type: 'bar', //bar
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: "Kabupaten/Kota asal jamaah terbanyak",
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1,
                                data: values
                            }
                        ]
                    },
                    options: {
                        legend: { display: true },
                        title: {
                            display: true,
                            text: 'U.S population'
                        }
                    }
                });
            }

        });
    }

    function status() {
        $.ajax({
            type: 'GET',
            //url   : 'http://localhost:8080/dash/getLembaga',
            url: 'dash/jamaahByStatus',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            async: true,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                labels = [];
                values = [];
                length = data.length;
                console.log(length);
                for (i = 0; i < length; i++) {
                    labels.push(data[i].stat);
                    values.push(data[i].status);
                }

                new Chart(document.getElementById("pie-chart-status"), {
                    type: 'doughnut', //bar
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: "Durasi Pembelajaran Perpekan (menit)",
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1,
                                data: values
                            }
                        ]
                    },
                    options: {
                        legend: { display: true },
                        title: {
                            display: true,
                            text: 'U.S population'
                        }
                    }
                });
            }

        });
    }

    function gender() {
        $.ajax({
            type: 'GET',
            //url   : 'http://localhost:8080/dash/getLembaga',
            url: 'dash/jamaahByKelamin',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            async: true,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                labels = [];
                values = [];
                length = data.length;
                console.log(length);
                for (i = 0; i < length; i++) {
                    labels.push(data[i].gender);
                    values.push(data[i].jenisKelamin);
                }

                new Chart(document.getElementById("pie-chart-gender"), {
                    type: 'pie', //bar
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: "Durasi Pembelajaran Perpekan (menit)",
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1,
                                data: values
                            }
                        ]
                    },
                    options: {
                        legend: { display: true },
                        title: {
                            display: true,
                            text: 'U.S population'
                        }
                    }
                });
            }

        });
    }

    function gender() {
        $.ajax({
            type: 'GET',
            //url   : 'http://localhost:8080/dash/getLembaga',
            url: 'dash/jamaahByKelamin',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            async: true,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                labels = [];
                values = [];
                length = data.length;
                console.log(length);
                for (i = 0; i < length; i++) {
                    labels.push(data[i].gender);
                    values.push(data[i].jenisKelamin);
                }

                new Chart(document.getElementById("pie-chart-gender"), {
                    type: 'pie', //bar
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: "Durasi Pembelajaran Perpekan (menit)",
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(153, 102, 255)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1,
                                data: values
                            }
                        ]
                    },
                    options: {
                        legend: { display: true },
                        title: {
                            display: true,
                            text: 'U.S population'
                        }
                    }
                });
            }

        });
    }

    function bulan() {
        $.ajax({
            type: 'GET',
            //url   : 'http://localhost:8080/dash/getLembaga',
            url: 'dash/jamaahByBulan',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            async: true,
            dataType: 'json',
            success: function (data) {

                namaBulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'November', 'Desember'];//Utils.months({count: 12});//[];
                labels = [];
                values = [];
                length = data.length;
                console.log(length);
                for (i = 0; i < length; i++) {
                    labels.push(namaBulan[parseInt(data[i].bulan_ke) - 1]);
                    values.push(data[i].jumlah_jamaah);
                }

                console.log('ini data bulan :');
                console.log(labels);

                new Chart(document.getElementById("line-chart-bulan"), {
                    type: 'line', //bar
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: "Statistik Calon Jamaah haji perbulan",
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1,
                                data: values
                            }
                        ]
                    },
                    options: {
                        legend: { display: true },
                        title: {
                            display: true,
                            text: 'U.S population'
                        }
                    }
                });
            }

        });
    }

    /*       //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/barang/get_barang')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(barang_kode, barang_nama, barang_harga){
                        $('#ModalaEdit').modal('show');
                        $('[name="kobar_edit"]').val(data.barang_kode);
                        $('[name="nabar_edit"]').val(data.barang_nama);
                        $('[name="harga_edit"]').val(data.barang_harga);
                    });
                }
            });
            return false;
        });
    
    
        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
    
        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var kobar=$('#kode_barang').val();
            var nabar=$('#nama_barang').val();
            var harga=$('#harga').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/simpan_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar"]').val("");
                    $('[name="nabar"]').val("");
                    $('[name="harga"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
    
        //Update Barang
        $('#btn_update').on('click',function(){
            var kobar=$('#kode_barang2').val();
            var nabar=$('#nama_barang2').val();
            var harga=$('#harga2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/update_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="harga_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
    
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/barang/hapus_barang')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                    }
                });
                return false;
            });
    */
});

new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data: {
        itemBC: [
            {
                text: 'Dashboard',
                disabled: true,
                href: '/haji',
            },
            {
                text: 'Jamaah',
                disabled: false,
                href: '/haji/jamaah',
            },
            {
                text: 'Profile',
                disabled: false,
                href: '#',
            },
        ],
        drawer: false,
        group: null,
        title: 'Data Statistik Talangan Haji BMT Maslahah',

    },
    watch: {
        group() {
            this.drawer = false
        },
    },
    created: function () {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    },
    methods: {

    },
});